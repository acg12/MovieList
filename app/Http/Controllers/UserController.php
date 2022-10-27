<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function viewLogin () {
        return view('loginPage');
    }

    public function viewRegister () {
        return view('registerPage');
    }

    public function register (Request $req) {
        $rules = [
            'name' => 'required|min:5|unique:users,name',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|alpha_num|min:6',
            'password_conf' => 'required|same:password'
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors(($validator));
        }
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;

        $user->save();
        return redirect()->back();
    }

    // public function login (Request $req) {
    //     $credentials = [

    //     ]
    // }
}
