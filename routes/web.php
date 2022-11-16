<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/{lang}', [MovieController::class, 'index'])->name('home');
Route::get('/movie/{movie:slug}/{lang}', [MovieController::class, 'show'])->name('show_movie');

Route::prefix('admin')->group(function () {
	Route::get('/movie/create/{lang}', [MovieController::class, 'create'])->middleware('auth')->name('create_movie');
	Route::get('/movie/{movie:slug}/{lang}', [MovieController::class, 'quoteList'])->middleware('auth')->name('admin_movie');
	Route::get('/{lang}', [MovieController::class, 'adminPanel'])->middleware('auth')->name('admin');
	Route::get('/movie/{movie}/edit/{lang}', [MovieController::class, 'edit'])->middleware('auth')->name('movie_edit');
	Route::post('/movie', [MovieController::class, 'store'])->middleware('auth');
	Route::patch('/movie/{movie}', [MovieController::class, 'update'])->middleware('auth')->name('edit_movie');
	Route::delete('/movie/{movie}', [MovieController::class, 'destroy'])->middleware('auth')->name('delete_movie');

	Route::get('/quote/create/{lang}', [QuoteController::class, 'create'])->middleware('auth')->name('quote_create');
	Route::post('/quote', [QuoteController::class, 'store'])->middleware('auth')->name('store_quote');
	Route::get('/movie/quote/{quote}/edit/{lang}', [QuoteController::class, 'edit'])->middleware('auth')->name('quote_edit');
	Route::patch('/quote/{quote}', [QuoteController::class, 'update'])->middleware('auth')->name('edit_quote');
	Route::delete('/quote/{quote}', [QuoteController::class, 'destroy'])->middleware('auth')->name('delete_quote');
});

Route::get('login/{lang}', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
