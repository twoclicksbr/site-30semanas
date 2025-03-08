<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $username = Config::get('api.username');
        $token = Config::get('api.token');
        $endpoint = session('api_endpoint', 'https://sandbox.30semanas.test/api/login');

        // Faz a requisição à API
        $response = Http::withHeaders([
            'username' => $username,
            'token' => $token,
        ])->post($endpoint, [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Verifica se a requisição falhou
        if ($response->failed()) {
            return back()->with('error', 'Erro na API: ' . $response->body());
        }

        $data = $response->json();

        // Verifica se a API retornou o campo id_person
        if (isset($data['id_person'])) {

            $id_person = $data['id_person'];

            // Busca o nome do usuário na API
            $personResponse = Http::withHeaders([
                'username' => $username,
                'token' => $token,
            ])->get("https://sandbox.30semanas.test/api/person/{$id_person}");

            if ($personResponse->successful()) {
                $personData = $personResponse->json();

                // dd($personData);

                $fullName = $personData['result']['name'];

                // Salva na sessão
                Session::put('auth_id_person', $id_person);
                Session::put('auth_name', $fullName);
            }

            return redirect()->route('home')->with('success', 'Login realizado com sucesso!');
        } else {
            return back()->with('error', 'Erro na API: Resposta inesperada: ' . json_encode($data));
        }
    }

    public function logout(Request $request)
    {
        // Pega os dados da API
        $username = Config::get('api.username');
        $token = Config::get('api.token');
        $endpoint = session('api_endpoint', 'https://sandbox.30semanas.test/api/logout');

        // Envia a requisição para a API de logout
        $response = Http::withHeaders([
            'username' => $username,
            'token' => $token,
        ])->post($endpoint);

        // Limpa a sessão do Laravel
        session()->forget('auth_id_person');
        session()->flush();

        return redirect('/login')->with('success', 'Você saiu com sucesso.');
    }

}
