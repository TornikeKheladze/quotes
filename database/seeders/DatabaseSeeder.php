<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		Movie::factory(5)->create();

		Quote::factory(3)->create([
			'movie_id'=> '1',
		]);
		Quote::factory(3)->create([
			'movie_id'=> '2',
		]);
		Quote::factory(3)->create([
			'movie_id'=> '3',
		]);
		Quote::factory(3)->create([
			'movie_id'=> '4',
		]);
		Quote::factory(3)->create([
			'movie_id'=> '5',
		]);
	}
}
