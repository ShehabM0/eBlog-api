<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signupPage() {
        if(Auth::user()) Auth::logout();
        return view("auth.signup");
    }

    public function loginPage() {
        if(Auth::user()) Auth::logout();
        return view("auth.login");
    }

    public function signup(Request $req) {
        $user = $req->validate([
            'name' => 'required|string|min:3|max:20',
            'email' => 'required|regex:/^[\w\-\.]+@([\w-]+\.)+[\w-]{2,4}$/|unique:users',
            'password' => 'required|confirmed|min:8'
        ]);
        $user['password'] = Hash::make($user['password']);
        User::create($user);
        return redirect("/login")->with("message", "Account Created Successfully.");
    }

    public function login(Request $req) {
        $user = $req->validate([
            'email' => 'required|regex:/^[\w\-\.]+@([\w-]+\.)+[\w-]{2,4}$/',
            'password' => 'required'
        ]);
        $findUser = User::where("email", $user["email"])->first();
        if($findUser) 
        {
            if(Hash::check($user["password"], $findUser["password"]))
            {
                Auth::attempt($user);
                return redirect("/")->with("message", "Logged-in Successfully.");
            }
            else 
                return back()->with("message", "Incorrect password!");
        }
        else
            return back()->with("message", "User doesn't exist!");
    }

    public function logout(Request $req) {
        Auth::logout();
        return redirect("/")->with("message", "Logged-out");
    }
}
