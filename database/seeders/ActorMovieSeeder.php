<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actor_movie')->insert([
            'movie_id' => 1,
            'actor_id' => 1,
            'character_name' => 'Shuri'
        ]);
    }
}
