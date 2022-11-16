<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            'title' => 'Black Panther: Wakanda Forever',
            'description' => "The people of Wakanda fight to protect their home from intervening world powers as they mourn the death of King T'Challa.",
            'director' => 'Ryan Coogler',
            'release_date' => date('2022-11-09'),
            'img_url' => 'movie_images/1.jpg',
            'background_url' => 'movie_backgrounds/1.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
