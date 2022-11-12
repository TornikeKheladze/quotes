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

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function adminPanel()
	{
		if (auth()->user()?->name !== 'tornike')
		{
			abort(403);
		}
		return view('admin');
	}

	public function create()
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
			// 'thumbnail'     => 'required|image',
			'quote'       => 'required',
			'movie_id'    => 'required',
		]);
		// $attributes['user_id'] = auth()->id();
		// $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

		Quote::create($attributes);

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
