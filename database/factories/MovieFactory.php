<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class MovieFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [

            'name'      => $this->faker->sentence(),
			'slug'       => $this->faker->slug(),
			// 'post_id'=> Post::factory(),
			// 'user_id'=> User::factory(),
			// 'body'   => $this->faker->paragraph(),
		];
	}
}
