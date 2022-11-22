<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditQuote;
use App\Http\Requests\StoreQuote;
use App\Models\Movie;
use App\Models\Quote;

class QuoteController extends Controller
{
	public function store(StoreQuote $request)
	{
		$attributes = $request->validated();

		$quote = new Quote();
		$quote
		   ->setTranslation('quote', 'en', $attributes['quote_en'])
		   ->setTranslation('quote', 'ka', $attributes['quote_ka'])
		   ->setAttribute('movie_id', $attributes['movie_id'])
		   ->setAttribute('thumbnail', request()->file('thumbnail')->store('thumbnails'))
		   ->save();

		return redirect()->route('admin', ['lang'=>app()->getLocale()]);
	}

	public function create()
	{
		return view('quote.create', [
			'movies'=> Movie::all(),
		]);
	}

	public function edit(Quote $quote)
	{
		return view('quote.edit', [
			'quote' => $quote,
			'movies'=> Movie::all(),
		]);
	}

	public function update(Quote $quote, EditQuote $request)
	{
		$attributes = $request->validated();
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
