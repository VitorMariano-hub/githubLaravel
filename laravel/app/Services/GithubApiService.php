<?php

namespace App\Services;
use Illuminate\Support\Facades\Log;

class GitHubApiService
{
    public function getUserData($username)
    {
        try {
            $url = env('GITHUB_API_URL') . "users/{$username}";

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_USERAGENT, 'GitHub');
            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new \Exception('Erro cURL: ' . curl_error($ch));
            }

            curl_close($ch);

            if (!$response) {
                throw new \Exception('Resposta vazia da API do GitHub');
            }

            return json_decode($response, true);
        } catch (\Exception $e) {
            Log::error('Erro na API do GitHub: ' . $e->getMessage());

            return ['error' => 'Ocorreu um erro ao acessar a API do GitHub.'];
        }
    }
}
