<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class VideoController extends Controller
{
    public function index()
    {
        // Pega os dados da API
        $username = Config::get('api.username');
        $token = Config::get('api.token');
        $endpoint = session('api_endpoint', 'https://sandbox.30semanas.test/api/video?sort_by=date&sort_order=desc');

        // Envia a requisição para a API
        $response = Http::withHeaders([
            'username' => $username,
            'token' => $token,
        ])->get($endpoint);

        // Verifica se a resposta foi bem-sucedida
        if ($response->successful()) {
            $videos = $response->json()['result']['data'] ?? [];

            // Obtém o primeiro vídeo (se houver)
            $featuredVideo = !empty($videos) ? $videos[0] : null;
    
            // Remove o primeiro item da lista
            array_shift($videos);
        } else {
            $featuredVideo = null;
            $videos = [];
        }

        // Retorna a view com os vídeos
        return view('videos.index', compact('featuredVideo', 'videos'));
    }
}
