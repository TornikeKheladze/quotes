<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return redirect('home/en');
});

Route::middleware('setLocale')->group(function () {
	Route::get('admin/login', function () {
		return redirect('login/en');
	});

	Route::get('/home/{lang}', [MovieController::class, 'index'])->name('home');
	Route::get('/movie/{movie:slug}/{lang}', [MovieController::class, 'show'])->name('show.movie');

	Route::prefix('admin')->group(function () {
		Route::middleware(['auth'])->group(function () {
			Route::get('/', function () {
				return redirect('/admin/en');
			});
			Route::get('/movie/create/{lang}', [MovieController::class, 'create'])->name('movie.show.create');
			Route::get('/movie/{movie:slug}/{lang}', [MovieController::class, 'quoteList'])->name('admin.movie');
			Route::get('/{lang}', [MovieController::class, 'adminPanel'])->name('admin');
			Route::get('/movie/{movie}/edit/{lang}', [MovieController::class, 'edit'])->name('movie.show.edit');
			Route::post('/movie/{lang}', [MovieController::class, 'store'])->name('movie.store');
			Route::patch('/movie/{movie}/{lang}', [MovieController::class, 'update'])->name('movie.edit');
			Route::delete('/movie/{movie}/{lang}', [MovieController::class, 'destroy'])->name('movie.delete');

			Route::get('/delete/movie/{movie}/{lang}', [MovieController::class, 'delete'])->name('movie.show.delete');
			Route::get('/delete/quote/{quote}/{lang}', [QuoteController::class, 'delete'])->name('quote.show.delete');

			Route::get('/quote/create/{lang}', [QuoteController::class, 'create'])->name('quote.show.create');
			Route::get('/movie/quote/{quote}/edit/{lang}', [QuoteController::class, 'edit'])->name('quote.show.edit');
			Route::get('/quote/all/{lang}', [QuoteController::class, 'listAll'])->name('quote.show.all');
			Route::post('/quote/{lang}', [QuoteController::class, 'store'])->name('quote.store');
			Route::patch('/quote/{quote}/{lang}', [QuoteController::class, 'update'])->name('quote.edit');
			Route::delete('/quote/{quote}/{lang}', [QuoteController::class, 'destroy'])->name('quote.delete');

			Route::post('/logout/{lang}', [SessionsController::class, 'destroy'])->name('logout');
		});
	});

	Route::middleware(['guest'])->group(function () {
		Route::get('login/{lang}', [SessionsController::class, 'create']);
		Route::post('/sessions/{lang}', [SessionsController::class, 'store'])->name('login');
	});
});
