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
    Route::get('users/me', [UserController::class, 'getAuthUser']);
    Route::get('events', [EventController::class, 'index']);
    Route::get('events/{event}', [EventController::class, 'show']);
    Route::post('events', [EventController::class, 'store']);
    Route::put('events/{event}', [EventController::class, 'update']);
    Route::delete('events/{event}', [EventController::class, 'destroy']);
    Route::get('users/{user}', [UserController::class, 'show']);
    Route::put('users/{user}', [UserController::class, 'update']);
    Route::delete('users/{user}', [UserController::class, 'destroy']);
    Route::resource('user-event', UserEventController::class)->only(['show', 'store', 'destroy']);
});
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
