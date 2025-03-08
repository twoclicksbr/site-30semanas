<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    public function boot()
    {
        if (Auth::check()) { // Só executa se o usuário estiver logado
            $this->storeUserPermissions();
        }
    }

    private function storeUserPermissions()
    {
        // Buscar TODAS as permissões possíveis
        $responseTypes = Http::withHeaders([
            'username' => env('API_USERNAME'),
            'token' => env('API_TOKEN'),
        ])->get('https://sandbox.30semanas.test/api/type_person');

        if (!$responseTypes->successful()) {
            return;
        }

        // Criar um mapa de permissões (id => name)
        $typesData = $responseTypes->json();
        $permissionsMap = collect($typesData['type_person']['data'] ?? [])
            ->pluck('name', 'id')
            ->toArray();

        // Buscar permissões do usuário
        $responsePermissions = Http::withHeaders([
            'username' => env('API_USERNAME'),
            'token' => env('API_TOKEN'),
        ])->get('https://sandbox.30semanas.test/api/person_restriction');

        if ($responsePermissions->successful()) {
            $userPermissions = collect($responsePermissions->json()['result'] ?? [])
                ->pluck('id_type_person')
                ->toArray();

            // Criar sessões dinamicamente para cada permissão
            foreach ($permissionsMap as $id => $name) {
                $sessionKey = 'auth_is_' . strtolower(str_replace(' ', '_', $name));
                $hasPermission = in_array($id, $userPermissions);

                // Salvar na sessão
                Session::put($sessionKey, $hasPermission);
            }

            // Armazena também a lista de permissões disponíveis
            Session::put('auth_permissions_list', $permissionsMap);
        }
    }
}
