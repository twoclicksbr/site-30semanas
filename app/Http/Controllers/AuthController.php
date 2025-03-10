<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // public function authenticate(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|string',
    //     ]);

    //     $username = Config::get('api.username');
    //     $token = Config::get('api.token');
    //     $endpoint = session('api_endpoint', 'https://sandbox.30semanas.test/api/login');

    //     // Faz a requisição à API
    //     $response = Http::withHeaders([
    //         'username' => $username,
    //         'token' => $token,
    //     ])->post($endpoint, [
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ]);

    //     // Verifica se a requisição falhou
    //     if ($response->failed()) {
    //         return back()->with('error', 'Erro na API: ' . $response->body());
    //     }

    //     $data = $response->json();

    //     // Verifica se a API retornou o campo id_person
    //     if (isset($data['id_person'])) {

    //         $id_person = $data['id_person'];

    //         // Busca o nome do usuário na API
    //         $personResponse = Http::withHeaders([
    //             'username' => $username,
    //             'token' => $token,
    //         ])->get("https://sandbox.30semanas.test/api/person/{$id_person}");

    //         if ($personResponse->successful()) {
    //             $personData = $personResponse->json();

    //             // dd($personData);

    //             $fullName = $personData['result']['name'];

    //             // Salva na sessão
    //             Session::put('auth_id_person', $id_person);
    //             Session::put('auth_name', $fullName);
    //         }

    //         return redirect()->route('home')->with('success', 'Login realizado com sucesso!');
    //     } else {
    //         return back()->with('error', 'Erro na API: Resposta inesperada: ' . json_encode($data));
    //     }
    // }

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
            return back()->with('error', 'E-mail de aceso ou Senha Inválido.');
            // return back()->with('error', 'E-mail de aceso ou Senha Inválido.' . $response->body());
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
                $fullName = $personData['result']['name'];

                // Salva na sessão
                Session::put('auth_id_person', $id_person);
                Session::put('auth_name', $fullName);
            }

            // Buscar restrições do usuário
            $restrictionsResponse = Http::withHeaders([
                'username' => $username,
                'token' => $token,
            ])->get("https://sandbox.30semanas.test/api/person_restriction", [
                'id_person' => $id_person
            ]);

            if ($restrictionsResponse->successful()) {
                $restrictionsData = $restrictionsResponse->json();
                $restrictions = $restrictionsData['result']['data']; // Pegamos os registros corretos
            
                foreach ($restrictions as $restriction) {
                    $idTypePerson = $restriction['id_type_person'];
            
                    // Buscar o nome do tipo de pessoa
                    $typePersonResponse = Http::withHeaders([
                        'username' => $username,
                        'token' => $token,
                    ])->get("https://sandbox.30semanas.test/api/type_person/{$idTypePerson}");
            
                    if ($typePersonResponse->successful()) {
                        $typePersonData = $typePersonResponse->json();
            
                        // Agora acessamos 'result.name' corretamente
                        if (isset($typePersonData['result']['name'])) {
                            $sessionName = 'auth_' . strtolower(str_replace(
                                [' ', 'á', 'é', 'í', 'ó', 'ú', 'ã', 'õ', 'ç'], 
                                ['_', 'a', 'e', 'i', 'o', 'u', 'a', 'o', 'c'], 
                                $typePersonData['result']['name']));
            
                            // Criar sessão dinâmica com "auth_" antes do nome
                            Session::put($sessionName, true);
                        } else {
                            dd('Erro: A API type_person não retornou um nome válido.', $typePersonData);
                        }
                    } else {
                        dd('Erro: Falha ao buscar type_person.', $typePersonResponse->body());
                    }
                }
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
        session()->flush();

        return redirect('/login')->with('success', 'Você saiu com sucesso.');
    }

}
