<?php

namespace App\Services;
use Illuminate\Support\Facades\Log;

class GitHubApiService
{
    public function getUserData($username)
    {
        try {
            $url = env('GITHUB_API_URL') . "users/{$username}";

            $options = array(
                'http' => array(
                    'method' => 'GET',
                    'header' => array(
                        'User-Agent: GitHub'
                    ),
                )
            );

            $context = stream_context_create($options);
            $response = file_get_contents($url, false, $context);

            if (!empty($response)) {
                return json_decode($response, true);
            }

        } catch (\Exception $e) {
            Log::error('Erro na API do GitHub: ' . $e->getMessage());

            return ['error' => 'Usuário não encontrado.'];
        }
    }
}
