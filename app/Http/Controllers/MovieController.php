<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Http\Request;

class MovieController extends Controller
{
	public function index()
	{
		return view('movies', [
			'movie'=> Movie::inRandomOrder()->first(),
		]);
	}

	public function adminPanel()
	{
		if (auth()->user()?->name !== 'tornike')
		{
			abort(403);
		}
		return view('admin');
	}

	public function createQuote()
	{
		if (auth()->user()?->name !== 'tornike')
		{
			abort(403);
		}
		return view('quote.create');
	}

	public function createMovie()
	{
		if (auth()->user()?->name !== 'tornike')
		{
			abort(403);
		}
		return view('movie.create');
	}

	public function storeQuote()
	{
		$attributes = request()->validate([
			'quote'       => 'required',
			'movie_id'    => 'required',
		]);

		Quote::create($attributes);

		return redirect('/');
	}

	public function storeMovie()
	{
		$attributes = request()->validate([
			'name'       => 'required',
			'slug'       => 'required',
		]);

		Movie::create($attributes);

		return redirect('/');
	}

	public function show(Movie $movie)
	{
		return view('movie', [
			'movie'=> $movie,
		]);
	}

	public function edit(Movie $movie)
	{
	}

	public function update(Request $request, Movie $movie)
	{
	}

	public function destroy(Movie $movie)
	{
	}
}
