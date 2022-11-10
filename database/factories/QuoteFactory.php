<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteFactory extends Factory
{
	public function definition()
	{
		return [
			'movie_id'    => Movie::factory(),
			'quote'       => $this->faker->slug(),
		];
	}
}
