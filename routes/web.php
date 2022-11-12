<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index']);

Route::get('/movie/{movie:slug}', [MovieController::class, 'show']);

Route::get('/admin/quote/create', [MovieController::class, 'createQuote']);

Route::get('/admin/movie/create', [MovieController::class, 'createMovie']);

Route::post('admin/quote', [MovieController::class, 'storeQuote'])->middleware('auth');

Route::post('admin/movie', [MovieController::class, 'storeMovie'])->middleware('auth');

Route::get('admin', [MovieController::class, 'adminPanel'])->middleware('auth');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');

Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
