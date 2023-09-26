<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserEventController;
use Illuminate\Support\Facades\Route;
Route::middleware('guest')->group(function () {
    Route::post('register', [RegisteredUserController::class, 'store'])
        ->name('api.register');
    Route::post('login', [RegisteredUserController::class, 'create'])
        ->name('api.login');
});
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('events', EventController::class);
    Route::resource('users', UserController::class)->only(['show', 'update', 'destroy']);
    Route::resource('user-event', UserEventController::class)->only(['show', 'store', 'destroy']);
});
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
