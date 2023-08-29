<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GitHubApiService;

class GitController extends Controller
{

    protected $githubApiService;

    public function __construct(GitHubApiService $githubApiService)
    {
        $this->githubApiService = $githubApiService;
    }

    public function index()
    {
        $user = $this->githubApiService->getUserData('VitorMariano-hub');

        if (isset($user['error'])) {
            $error = $user['error'];
            return view('home', ['error' => $error]);
        }

        return view('home', ['user' => $user]);

    }

    public function show(Request $request)
    {
        $search = $request->input('search');

        $user = $this->githubApiService->getUserData($search);

        if (isset($user['error'])) {
            $error = $user['error'];
            return view('home', ['error' => $error]);
        }

        return view('home', ['user' => $user]);

    }
}
