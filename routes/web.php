<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagement;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user-management', [UserManagement::class, 'render']); // Reemplazar 'index' con el nombre del método que quieres llamar
});
