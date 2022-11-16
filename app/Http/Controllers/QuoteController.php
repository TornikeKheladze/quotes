<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Support\Facades\App;

class QuoteController extends Controller
{
	public function index()
	{
	}

	public function store()
	{
		$attributes = request()->validate([
			'quote_en'       => 'required',
			'quote_ka'       => 'required',
			'movie_id'       => 'required',
			'thumbnail'      => 'required|image',
		]);

		$quote = new Quote();
		$quote
		   ->setTranslation('quote', 'en', $attributes['quote_en'])
		   ->setTranslation('quote', 'ka', $attributes['quote_ka'])
		   ->setAttribute('movie_id', $attributes['movie_id'])
		   ->setAttribute('thumbnail', request()->file('thumbnail')->store('thumbnails'))
		   ->save();

		return redirect()->route('admin', ['lang'=>app()->getLocale()]);
	}

	public function create($lang)
	{
		App::setLocale($lang);
		if (auth()->user()?->name !== 'tornike')
		{
			abort(403);
		}
		return view('quote.create', [
			'movies'=> Movie::all(),
		]);
	}

	public function show(Quote $quote)
	{
	}

	public function edit(Quote $quote, $lang)
	{
		App::setLocale($lang);
		return view('quote.edit', [
			'quote' => $quote,
			'movies'=> Movie::all(),
		]);
	}

	public function update(Quote $quote)
	{
		$attributes = request()->validate([
			'quote_en'       => 'required',
			'quote_ka'       => 'required',
			'movie_id'       => 'required',
			'thumbnail'      => 'image',
		]);
		$translations = ['en' => $attributes['quote_en'], 'ka' => $attributes['quote_ka']];
		$withTranslations = [
			'quote'    => $translations,
			'movie_id' => $attributes['movie_id'],
		];

		if (request()->file('thumbnail'))
		{
			$withTranslations['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
		}
		$quote->update($withTranslations);

		return redirect()->route('admin', ['lang'=>app()->getLocale()]);
	}

	public function destroy(Quote $quote)
	{
		$quote->delete();

		return redirect()->route('admin', ['lang'=>app()->getLocale()]);
	}
}
