<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditQuoteRequest;
use App\Http\Requests\StoreQuoteRequest;
use App\Models\Movie;
use App\Models\Quote;

class QuoteController extends Controller
{
	public function store(StoreQuoteRequest $request)
	{
		$attributes = $request->validated();
		$translations = ['en' => $attributes['quote_en'], 'ka' => $attributes['quote_ka']];
		$withTranslations = [
			'quote'    => $translations,
			'movie_id' => $attributes['movie_id'],
		];
		$withTranslations['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

		Quote::create($withTranslations);

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

	public function update(Quote $quote, EditQuoteRequest $request)
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
