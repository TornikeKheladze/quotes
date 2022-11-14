<?php

namespace App\Http\Controllers;

use App\Models\Movie;

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
		return view('admin', [
			'movies'=> Movie::all(),
		]);
	}

	public function create()
	{
		if (auth()->user()?->name !== 'tornike')
		{
			abort(403);
		}
		return view('movie.create');
	}

	public function store()
	{
		$attributes = request()->validate([
			'name'       => 'required',
			'slug'       => 'required',
		]);

		Movie::create($attributes);

		return redirect()->route('admin');
	}

	public function show(Movie $movie)
	{
		return view('movie', [
			'movie'=> $movie,
		]);
	}

	public function quoteList(Movie $movie)
	{
		return view('quote.list', [
			'movie'=> $movie,
		]);
	}

	public function update(Movie $movie)
	{
		$attributes = request()->validate([
			'name'       => 'required',
			'slug'       => 'required',
		]);

		$movie->update($attributes);

		return redirect()->route('admin');
	}

	public function destroy(Movie $movie)
	{
		$movie->delete();

		return redirect()->route('admin');
	}

	public function edit(Movie $movie)
	{
		return view('movie.edit', [
			'movie'=> $movie,
		]);
	}
}
