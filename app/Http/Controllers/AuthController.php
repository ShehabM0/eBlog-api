<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signupPage() {
        return view("auth.signup");
    }

    public function loginPage() {
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
}
