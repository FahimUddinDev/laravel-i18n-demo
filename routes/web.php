<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
Route::get('/', function () {
    return view('home');
});

Route::get('/web', [HomeController::class, 'index']);