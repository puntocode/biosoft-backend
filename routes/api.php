<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::post('/login', AuthController::class . '@login');
Route::post('/register', AuthController::class . '@register');

Route::get('/test', function () {
    return User::all();
});
