@extends('header')
@section('pageTitle', 'Post')
@section('post-content')
    {{-- page background --}}
    <div class="img-bg"></div>
    {{-- page post --}}
    <div class="img-container">
        <div class="img">
            <img src="{{ asset("uploads/$passedPost->image") }}" alt="" />
        </div>
    </div>

    <div class="post-title">
        <h3>{{ $passedPost->title }}</h3>
        <div class="user">
            <img src="{{ asset('img/bx-user-circle.svg') }}" alt="" />
            <p>{{ $passedPost->user['name'] }}</p>
        </div>
    </div>

    <div class="post-body">
        <p>{{ $passedPost->body }}</p>
    </div>

    {{-- post buttons --}}
    @if (Auth::id() == $passedPost->user_id)
        <div class="buttons">
            <div class="buttons-container">
                <button class="Edit" id="edit-post">Edit</button>
                <button form="delete-form" type="submit" class="Delete" name="post-delete-form"
                    value="DELETE">Delete</button>
                {{-- delete post form --}}
                <form action="/post/delete" method="POST" id="delete-form">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $passedPost->id }}">
                </form>
            </div>
        </div>
    @endif

    {{-- Comments and Categories Section --}}
    @include('posts.comments-categories')

    {{-- edit-post window --}}
    @include('posts.editPost')

    {{-- create/edit post overlay --}}
    <div class="create-modal overlay"></div>
    <div class="edit-modal overlay"></div>

@stop
