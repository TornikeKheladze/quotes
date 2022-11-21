<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::middleware('setLocale')->group(function () {
	Route::get('/{lang}', [MovieController::class, 'index'])->name('home');
	Route::get('/movie/{movie:slug}/{lang}', [MovieController::class, 'show'])->name('show_movie');

	Route::prefix('admin')->group(function () {
		Route::middleware(['auth'])->group(function () {
			Route::get('/movie/create/{lang}', [MovieController::class, 'create'])->name('create_movie');
			Route::get('/movie/{movie:slug}/{lang}', [MovieController::class, 'quoteList'])->name('admin_movie');
			Route::get('/{lang}', [MovieController::class, 'adminPanel'])->name('admin');
			Route::get('/movie/{movie}/edit/{lang}', [MovieController::class, 'edit'])->name('movie_edit');
			Route::post('/movie/{lang}', [MovieController::class, 'store'])->name('store_movie');
			Route::patch('/movie/{movie}/{lang}', [MovieController::class, 'update'])->name('edit_movie');
			Route::delete('/movie/{movie}/{lang}', [MovieController::class, 'destroy'])->name('delete_movie');

			Route::get('/quote/create/{lang}', [QuoteController::class, 'create'])->name('quote_create');
			Route::post('/quote/{lang}', [QuoteController::class, 'store'])->name('store_quote');
			Route::get('/movie/quote/{quote}/edit/{lang}', [QuoteController::class, 'edit'])->name('quote_edit');
			Route::patch('/quote/{quote}/{lang}', [QuoteController::class, 'update'])->name('edit_quote');
			Route::delete('/quote/{quote}/{lang}', [QuoteController::class, 'destroy'])->name('delete_quote');

			Route::post('/logout/{lang}', [SessionsController::class, 'destroy'])->name('logout');
		});
	});

	Route::middleware(['guest'])->group(function () {
		Route::get('login/{lang}', [SessionsController::class, 'create']);
		Route::post('/sessions/{lang}', [SessionsController::class, 'store'])->name('login');
	});
});
