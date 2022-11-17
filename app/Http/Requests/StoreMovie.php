<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovie extends FormRequest
{
	public function rules()
	{
		return [
			'name_ka'       => 'required',
			'name_en'       => 'required',
		];
	}
}
