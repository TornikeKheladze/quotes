<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index'])->name('home');
Route::get('/movie/{movie:slug}', [MovieController::class, 'show']);

Route::prefix('admin')->group(function () {
	Route::get('/movie/create', [MovieController::class, 'create'])->middleware('auth');
	Route::get('/movie/{movie:slug}', [MovieController::class, 'quoteList'])->middleware('auth');
	Route::post('/movie', [MovieController::class, 'store'])->middleware('auth');
	Route::get('/', [MovieController::class, 'adminPanel'])->middleware('auth')->name('admin');
	Route::get('/movie/{movie}/edit', [MovieController::class, 'edit'])->middleware('auth');
	Route::patch('/movie/{movie}', [MovieController::class, 'update'])->middleware('auth');
	Route::delete('/movie/{movie}', [MovieController::class, 'destroy'])->middleware('auth');

	Route::get('/quote/create', [QuoteController::class, 'create'])->middleware('auth');
	Route::post('/quote', [QuoteController::class, 'store'])->middleware('auth');
	Route::get('/movie/quote/{quote}/edit', [QuoteController::class, 'edit'])->middleware('auth');
	Route::patch('/quote/{quote}', [QuoteController::class, 'update'])->middleware('auth');
	Route::delete('/quote/{quote}', [QuoteController::class, 'destroy'])->middleware('auth');
});

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
