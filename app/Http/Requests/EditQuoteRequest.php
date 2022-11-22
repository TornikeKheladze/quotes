<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditQuoteRequest extends FormRequest
{
	public function rules()
	{
		return [
			'quote_en'       => 'required',
			'quote_ka'       => 'required',
			'movie_id'       => 'required',
			'thumbnail'      => 'image',
		];
	}
}
