<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actors')->insert([
            'name' => 'Letitia Wright',
            'gender' => 'Female',
            'biography' => "With a career spanning over a decade, Emmy-nominated Letitia Wright has cemented her position as one of the industry's most captivating young actresses. From her breakout role as ambitious Summerhouse resident Chantelle in Top Boy, to her critically acclaimed performance as Nish in Black Mirror, not forgetting her scene-stealing turn as Shuri - lead scientist and Princess of Wakanda in Black Panther, Wright has played an integral role in what are arguably the most culture defining projects of the last ten years and whose impact is still felt to this day.",
            'date_of_birth' => date('1993-10-31'),
            'place_of_birth' => 'Georgetown, Guyana',
            'img_url' => 'actor_images/1.jpg',
            'popularity' => 135.9,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
