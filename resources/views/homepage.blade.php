@extends('header')
@section('pageTitle', 'HomePage')
@section('homepage-content')
    <div class="middle">
        <div class="text-container">
            <div class="hidden">
                <h1>Welcome To Our eBlog</h1>
                <h6>The Way Of Your Knowladge</h6>
            </div>
        </div>
    </div>
    <div class="post-container">
        @foreach ($posts as $post)
            <a href="/post/{{ $post->id }}" id="post-link">
                <div class="post">
                    <img src="{{ asset("uploads/$post->image") }}" alt="">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->body }}</p>
                    <div class="user">
                        <img src="{{ asset('img/bx-user-circle.svg') }}" alt="">
                        <p>{{ $post->user['name'] }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    @if (count($posts) == 0)
        <div>
            <p class="no-search">No results for your search!</p>
        </div>
    @endif

    <!-- create post window background -->
    <div class="create-modal overlay"></div>

@stop
