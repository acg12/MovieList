<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function actors() {
        return $this->belongsToMany(Actor::class, 'actor_movie')->withPivot('character_name');
    }

    public function genres() {
        return $this->belongsToMany(Genre::class, 'genre_movie');
    }

    public function watchlists() {
        return $this->belongsToMany(User::class, 'watchlists');
    }

    public function getReleaseYear() {
        $year = Carbon::createFromFormat('Y-m-d', $this->release_date)->year;
        return $year;
    }
}
