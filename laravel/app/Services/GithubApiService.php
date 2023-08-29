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
                    'ignore_errors' => true
                )
            );

            $context = stream_context_create($options);
            $response = file_get_contents($url, false, $context);

            return json_decode($response, true);
        } catch (\Exception $e) {
            Log::error('Erro na API do GitHub: ' . $e->getMessage());

            return ['error' => 'Ocorreu um erro ao acessar a API do GitHub.'];
        }
    }
}
