<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Quote;

class QuoteController extends Controller
{
	public function index()
	{
	}

	public function store()
	{
		$attributes = request()->validate([
			'quote'       => 'required',
			'movie_id'    => 'required',
			'thumbnail'   => 'required|image',
		]);

		$attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

		Quote::create($attributes);

		return redirect()->route('admin');
	}

	public function create()
	{
		if (auth()->user()?->name !== 'tornike')
		{
			abort(403);
		}
		return view('quote.create');
	}

	public function show(Quote $quote)
	{
	}

	public function edit(Quote $quote)
	{
		return view('quote.edit', [
			'quote' => $quote,
			'movies'=> Movie::all(),
		]);
	}

	public function update(Quote $quote)
	{
		$attributes = request()->validate([
			'quote'       => 'required',
			'movie_id'    => 'required',
			'thumbnail'   => 'image',
		]);
		$quote->update($attributes);

		return redirect()->route('admin');
	}

	public function destroy(Quote $quote)
	{
		$quote->delete();

		return redirect()->route('admin');
	}
}
