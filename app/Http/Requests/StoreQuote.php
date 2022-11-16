<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuote extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'quote_en'       => 'required',
			'quote_ka'       => 'required',
			'movie_id'       => 'required',
			'thumbnail'      => 'required|image',
		];
	}
}
