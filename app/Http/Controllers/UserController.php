<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
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
            $user->password = $req->password;

            $user->save();
            return redirect()->route('index');
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
            return redirect()->route('index');
        } else {
            return back()->withErrors(['Incorrect email or password']);
        }
    }

    public function logout () {
        Auth::logout();
        return redirect()->route('index');
    }
}
