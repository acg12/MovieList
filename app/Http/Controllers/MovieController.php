<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    public function createMovie() {
        $genres = Genre::all();
        $actors = Actor::all();
        return view('createMovie', ['genres' => $genres, 'actors' => $actors]);
    }
    
    public function insertMovie (Request $req) {
        $rules = [
            'title' => 'required|min:2|max:50',
            'description' => 'required|min:8',
            'genre' => 'required|array|min:1',
            'genre.*' => 'required|string|distinct',
            'actors' => 'required|array|min:1',
            'actors.*' => 'required|string|distinct',
            'characters' => 'required|array|min:1',
            'characters.*' => 'required|string|distinct',
            'director' => 'required|min:3',
            'releaseDate' => 'required',
            'imgUrl' => 'required|mimes:jpeg,jpg,png,gif',
            'backgroundUrl' => 'required|mimes:jpeg,jpg,png,gif',
        ];
        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        else {
            $movie = new Movie();
            $movie->title = $req->title;
            $movie->description = $req->description;
            $movie->director = $req->director;
            $movie->release_date = $req->releaseDate;
            
            // movie thumbnail
            $thumbnail = $req->file('imgUrl');
            $imageName = $movie->title.$movie->release_date.'.'.$thumbnail->getClientOriginalExtension();
            Storage::putFileAs('public/images', $thumbnail, $imageName);
            $imageName = 'images/movie_images/'.$imageName;
            $movie->img_url = $imageName;
            
            // movie background
            $thumbnail = $req->file('backgroundUrl');
            $imageName = $movie->title.$movie->release_date.'.'.$thumbnail->getClientOriginalExtension();
            Storage::putFileAs('public/images', $thumbnail, $imageName);
            $imageName = 'images/movie_backgrounds/'.$imageName;
            $movie->background_url = $imageName;
            $movie->save();
            
            // insert genres
            foreach ($req->genre as $g) {
                $genre = Genre::where('genre', $g)->first();
                $movie->genres()->attach($genre->id);
            }

            // insert actors & character names
            for ($i = 0; $i < sizeof($req->actors); $i++) {
                $actor = Actor::where('name', $req->actors[$i])->first();
                $movie->actors()->attach($actor->id, ['character_name' => $req->characters[$i]]);
            }

            return redirect()->back();
        }
    }
}
