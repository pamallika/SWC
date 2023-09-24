<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserEventController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::resource('users', UserController::class)->only(['show', 'update', 'destroy']);
Route::resource('events', EventController::class);
Route::resource('user-event', UserEventController::class)->only(['store', 'destroy']);

//Route::middleware('auth:sanctum')->group(function () {
//});
