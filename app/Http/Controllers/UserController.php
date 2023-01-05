<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function viewLogin() {
        return view('loginPage');
    }

    public function viewRegister() {
        return view('registerPage');
    }

    public function register(Request $req) {
        $rules = [
            'name' => 'required|min:5|unique:users,name',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|alpha_num|min:6',
            'password_conf' => 'required|same:password'
        ];

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        else {
            $user = new User();
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = bcrypt($req->password);

            $user->save();
            return redirect('/');
        }
    }

    public function login (Request $req) {
        $credentials = [
            'email' =>  $req->email,
            'password' => $req->password
        ];

        if ($req->remember) {
            Cookie::queue('mycookie', $req->email, 120);
        }

        if(Auth::attempt($credentials, true)) {
            return redirect('/');
        } else {
            return back()->withErrors(['Incorrect email or password']);
        }
    }

    public function logout () {
        Auth::logout();
        return redirect('/');
    }

    public function edit () {
        $user = Auth::user();
        return view('updateProfile', ['user' => $user]);
    }

    public function editData (Request $req) {
        $rules = [
            'name' => 'required|min:5|unique:users,name',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'dob' => 'required',
            'phone' => 'required|min:5|max:13'
        ];

        $validator = Validator::make($req->all(), $rules);

        if($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $temp = Auth::user();
            $temp->name = $req->name;
            $temp->email = $req->email;
            $temp->date_of_birth = $req->dob;
            $temp->phone = $req->phone;
            $temp->save();
            return redirect()->back();
        }
    }

    public function editImage (Request $req) {
        $rules = [
            'img_url' => 'required'
        ];

        $validator = Validator::make($req->all(), $rules);

        if($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $temp = Auth::user();
            if ($temp->img_url != 'images/profile_images/profile.png') Storage::delete('public/'.$temp->img_url);

            $url = $req->img_url;
            $contents = file_get_contents($url);
            $imageName = $temp->name.time().'.'.substr($url, strrpos($url, '.') + 1);
            Storage::put('public/images/profile_images/', $contents, $imageName);
            $imageName = 'images/profile_images/' . $imageName;
            $temp->img_url = $imageName;
            $temp->save();

            return redirect()->back();
        }
    }

    public function watchlists (Request $req) {
        $user = Auth::user();
        $user_id = $user->id;
        $search = $req->search;
        if (isset($req)) {
            $movies = Movie::whereHas('watchlists', function($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })->where("title", "LIKE", "%$search%")->simplePaginate(15);
        } else {
            $movies = Movie::whereHas('watchlists', function($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })->simplePaginate(15);
        }

        return view('watchlists', ['movies' => $movies]);
    }

    public function addMovieToWatchlist ($movieId) {
        $user = User::find(Auth::user()->id);
        $user->watchlists()->attach($movieId);
        return redirect()->back();
    }

    public function removeMovieFromWatchlist ($movieId) {
        $user = User::find(Auth::user()->id);
        $user->watchlists()->detach($movieId);
        return redirect()->back();
    }

    public function changeStatus (Request $req) {
        $user = Auth::user();
        $user_id = $user->id;
        if ($req->status == 'Remove') {
            $movie = DB::table('watchlists')->where('user_id', $user_id)->first();
            self::removeMovieFromWatchlist($movie->movie_id);
        } else {
            DB::table('watchlists')->where('user_id', $user_id)->update([
                'status' => $req->status
            ]);
        }
        return redirect()->back();
    }
}
