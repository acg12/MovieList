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
            'img_url' => 'images/movie_images/blackpanther.jpg',
            'background_url' => 'images/movie_backgrounds/blackpanther.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('movies')->insert([
            'title' => 'The Menu',
            'description' => "A young couple travels to a remote island to eat at an exclusive restaurant where the chef has prepared a lavish menu, with some shocking surprises.",
            'director' => 'Mark Mylod',
            'release_date' => date('2022-11-18'),
            'img_url' => 'images/movie_images/aksjaksja2202-02-20.png',
            'background_url' => 'images/movie_backgrounds/aksjaksja2202-02-20.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
