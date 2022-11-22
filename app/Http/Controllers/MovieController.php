<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Support\Str;

class MovieController extends Controller
{
	public function index()
	{
		$quoteWithMovie = Quote::inRandomOrder()->with(['movie'])->first();

		return view('movies', [
			'quoteWithMovie'=> $quoteWithMovie,
		]);
	}

	public function adminPanel()
	{
		return view('admin', [
			'movies'=> Movie::all(),
		]);
	}

	public function create()
	{
		return view('movie.create');
	}

	public function store(StoreMovieRequest $request)
	{
		$attributes = $request->validated();

		$slug = Str::replace(' ', '-', $attributes['name_en']);

		$translations = ['en' => $attributes['name_en'], 'ka' => $attributes['name_ka']];
		$withTranslations = [
			'name'=> $translations,
			'slug'=> $slug,
		];

		Movie::create($withTranslations);

		return redirect()->route('admin', ['lang'=>app()->getLocale()]);
	}

	public function show(Movie $movie)
	{
		return view('movie', [
			'movie'=> $movie,
		]);
	}

	public function delete(Movie $movie)
	{
		return view('movie.delete-movie', [
			'movie'=> $movie,
		]);
	}

	public function quoteList(Movie $movie)
	{
		return view('quote.list', [
			'movie'=> $movie,
		]);
	}

	public function update(Movie $movie, StoreMovieRequest $request)
	{
		$attributes = $request->validated();

		$slug = Str::replace(' ', '-', $attributes['name_en']);

		$translations = ['en' => $attributes['name_en'], 'ka' => $attributes['name_ka']];
		$withTranslations = [
			'name'=> $translations,
			'slug'=> $slug,
		];

		$movie->update($withTranslations);

		return redirect()->route('admin', ['lang'=>app()->getLocale()]);
	}

	public function destroy(Movie $movie)
	{
		$movie->delete();

		return redirect()->route('admin', ['lang'=>app()->getLocale()]);
	}

	public function edit(Movie $movie, $lang)
	{
		return view('movie.edit', [
			'movie'=> $movie,
		]);
	}
}
