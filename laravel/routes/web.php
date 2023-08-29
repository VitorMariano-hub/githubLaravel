<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GitController;


Route::get('/', [GitController::class, 'index']);

Route::post('/', [GitController::class, 'show'])->name('show');


