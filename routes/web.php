<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/{lang}', [MovieController::class, 'index'])->name('home');
Route::get('/movie/{movie:slug}/{lang}', [MovieController::class, 'show'])->name('show_movie');

Route::prefix('admin')->group(function () {
	Route::middleware(['auth'])->group(function () {
		Route::get('/movie/create/{lang}', [MovieController::class, 'create'])->name('create_movie');
		Route::get('/movie/{movie:slug}/{lang}', [MovieController::class, 'quoteList'])->name('admin_movie');
		Route::get('/{lang}', [MovieController::class, 'adminPanel'])->name('admin');
		Route::get('/movie/{movie}/edit/{lang}', [MovieController::class, 'edit'])->name('movie_edit');
		Route::post('/movie', [MovieController::class, 'store'])->middleware('auth');
		Route::patch('/movie/{movie}', [MovieController::class, 'update'])->name('edit_movie');
		Route::delete('/movie/{movie}', [MovieController::class, 'destroy'])->name('delete_movie');

		Route::get('/quote/create/{lang}', [QuoteController::class, 'create'])->name('quote_create');
		Route::post('/quote', [QuoteController::class, 'store'])->name('store_quote');
		Route::get('/movie/quote/{quote}/edit/{lang}', [QuoteController::class, 'edit'])->name('quote_edit');
		Route::patch('/quote/{quote}', [QuoteController::class, 'update'])->name('edit_quote');
		Route::delete('/quote/{quote}', [QuoteController::class, 'destroy'])->name('delete_quote');
	});
});

Route::middleware(['guest'])->group(function () {
	Route::get('login/{lang}', [SessionsController::class, 'create'])->middleware('guest');
	Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
});

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
