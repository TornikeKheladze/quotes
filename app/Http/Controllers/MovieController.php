<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovie;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class MovieController extends Controller
{
	public function index($lang)
	{
		App::setLocale($lang);
		$quoteWithMovie = Quote::inRandomOrder()->with(['movie'])->first();

		return view('movies', [
			'quoteWithMovie'=> $quoteWithMovie,
		]);
	}

	public function adminPanel($lang)
	{
		App::setLocale($lang);
		if (!auth()->user())
		{
			abort(403);
		}

		return view('admin', [
			'movies'=> Movie::all(),
		]);
	}

	public function create($lang)
	{
		App::setLocale($lang);
		if (!auth()->user())
		{
			abort(403);
		}

		return view('movie.create');
	}

	public function store(StoreMovie $request)
	{
		$attributes = $request->validated();

		$slug = Str::replace(' ', '-', $attributes['name_en']);

		$movie = new Movie();
		$movie
		   ->setTranslation('name', 'en', $attributes['name_en'])
		   ->setTranslation('name', 'ka', $attributes['name_ka'])
		   ->setAttribute('slug', $slug)
		   ->save();

		return redirect()->route('admin', ['lang'=>app()->getLocale()]);
	}

	public function show(Movie $movie, $lang)
	{
		App::setLocale($lang);
		return view('movie', [
			'movie'=> $movie,
		]);
	}

	public function quoteList(Movie $movie, $lang)
	{
		App::setLocale($lang);
		return view('quote.list', [
			'movie'=> $movie,
		]);
	}

	public function update(Movie $movie, StoreMovie $request)
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
		App::setLocale($lang);
		return view('movie.edit', [
			'movie'=> $movie,
		]);
	}
}
