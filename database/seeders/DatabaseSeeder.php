<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Post::factory()->create();
		// $user = User::factory()->create([
		// 	'name'=> 'tornike xeladze',
		// ]);
        Movie::factory(5)->create();

        Quote::factory(3)->create([
            'movie_id'=>'1',
        ]);
        Quote::factory(3)->create([
            'movie_id'=>'2',
        ]);
        Quote::factory(3)->create([
            'movie_id'=>'3',
        ]);
        Quote::factory(3)->create([
            'movie_id'=>'4',
        ]);
        Quote::factory(3)->create([
            'movie_id'=>'5',
        ]);

        
        
    }
}
