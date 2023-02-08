@extends('header')
@section('pageTitle', 'SignUp')
@section('signup-content')
    <div class="container">
        <div class="auth-img-container">
            <div class="img">
                <img src="{{ asset('img/11.jpg') }}" alt="" />
            </div>
        </div>
        <div class="form-container">
            <form action="/signup" method="POST">
                <!-- avoid 419 page expired error (token verification failure) -->
                @csrf
                <h2>Create an account</h2>
                <input type="text" placeholder="Username" required="required" name="name" />
                <input type="email" placeholder="Email" required="required" name="email" />
                <input type="password" placeholder="Password" required="required" name="password" />
                <input type="password" placeholder="Confirm Password" required="required" name="password_confirmation" />
                <div class="p-class">
                    <input type="submit" id="submit-btn" value="Create Account" name="signupform" />
                    <p>Already have an account?<a href="{{ asset('login') }}">Login</a></p>
                </div>
            </form>
        </div>
    </div>
@stop
