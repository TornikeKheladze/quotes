<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

///

Route::get('/', [MovieController::class, 'index']);
Route::get('/movie/{movie:slug}', [MovieController::class, 'show']);
Route::get('/admin/movie/create', [MovieController::class, 'create'])->middleware('auth');
Route::get('/admin/movie/{movie:slug}', [MovieController::class, 'quoteList'])->middleware('auth');
Route::post('admin/movie', [MovieController::class, 'store'])->middleware('auth');
Route::get('admin', [MovieController::class, 'adminPanel'])->middleware('auth');
Route::get('/admin/movie/{movie}/edit', [MovieController::class, 'edit'])->middleware('auth');
Route::patch('/admin/movie/{movie}', [MovieController::class, 'update'])->middleware('auth');
Route::delete('/admin/movie/{movie}', [MovieController::class, 'destroy'])->middleware('auth');

Route::get('/admin/quote/create', [QuoteController::class, 'create'])->middleware('auth');
Route::post('admin/quote', [QuoteController::class, 'store'])->middleware('auth');
Route::get('admin/movie/quote/{quote}/edit', [QuoteController::class, 'edit'])->middleware('auth');
Route::patch('admin/quote/{quote}', [QuoteController::class, 'update'])->middleware('auth');
Route::delete('admin/quote/{quote}', [QuoteController::class, 'destroy'])->middleware('auth');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
