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
            'img_url' => 'images/actor_images/1.jpg',
            'popularity' => 135.9,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // popularity drmn ya scorenya? ini temp ngasal dl ya hhe ...
        DB::table('actors')->insert([
            'name' => "Lupita Nyong'o",
            'gender' => 'Female',
            'biography' => "Lupita Amondi Nyong'o was born March 1, 1983 in Mexico City, Mexico, to Kenyan parents, Dorothy Ogada Buyu and Peter Anyang' Nyong'o. Her father, a senator, was then a visiting lecturer in political science. She was raised in Kenya. At age 16, her parents sent her back to Mexico for seven months to learn Spanish. She read film studies at Hampshire College, Massachusetts and, after working as a production assistant on several films, graduated from the Yale School of Drama's acting program. In 2013, she impressed cinema audiences in her film debut, as brutalized slave Patsey in acclaimed director Steve McQueen's 12 Years a Slave (2013). She was also the lead in MTV's award-winning drama series, Shuga (2009), appeared in the thriller Non-Stop (2014) and had roles in the big-budget films Star Wars: Episode VII - The Force Awakens (2015) and The Jungle Book (2016).",
            'date_of_birth' => date('1983-03-01'),
            'place_of_birth' => 'Mexico City, Mexico',
            'img_url' => 'images/actor_images/2.jpg',
            'popularity' => 132.1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('actors')->insert([
            'name' => 'Danai Gurira',
            'gender' => 'Female',
            'biography' => "Danai Gurira was born in Grinnell, Iowa, to Josephine and Roger Gurira, who were from Zimbabwe. Her father was then teaching Chemistry at Grinnell College. When she was five, the family moved back to Zimbabwe, residing in the capital Harare. Gurira later returned to the United States, and studied social psychology at Macalester College, receiving an MFA from New York University's Tisch School of the Arts. She is the co-author of the play, 'In the Continuum', with Nikkole Salter.",
            'date_of_birth' => date('1978-02-14'),
            'place_of_birth' => 'Grinnell, USA',
            'img_url' => 'images/actor_images/3.jpg',
            'popularity' => 130.7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('actors')->insert([
            'name' => 'Winston Duke',
            'gender' => 'Female',
            'biography' => "Winston Duke was born on November 15, 1986 in Trinidad and Tobago. He is an actor and producer, known for Black Panther (2018), Avengers: Infinity War (2018) and Person of Interest (2011).",
            'date_of_birth' => date('1986-11-15'),
            'place_of_birth' => 'Trinidad and Tobago',
            'img_url' => 'images/actor_images/4.jpg',
            'popularity' => 128.5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
