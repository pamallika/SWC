<?php

use App\Http\Controllers\LayoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LayoutController::class, 'index']);
Route::get('/login', [LayoutController::class, 'login']);
Route::get('/register', [LayoutController::class, 'register']);
