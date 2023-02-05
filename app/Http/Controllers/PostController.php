<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function show(int $post_id) {
        $post = Post::find($post_id);
        if(!$post)
            return redirect("/")->with("message", "The post you are trying to access doesn't exist!");
        else
            return view("posts.post")->with("passedPost", $post);
    }

    public function create(Request $req) {
        $post = $req->validate([
            'title' => 'required|min:3|max:30',
            'image' => 'required|mimes:jpg,png,jpeg|max:2048',
            'body' => 'required'
        ],[
            'image.max' => 'The image must not be greater than 2 mb.'
        ]);
        $post["user_id"] = Auth::id();
        // generating unique img name to avoid overlapping of similar img names
        $newImgName = time() . '-' . Auth::user()["email"] . '.' . $req->image->extension();
        $newImgPath = $req->image->move(public_path('uploads'), $newImgName);

        $post["image"] = $newImgName;
        Post::create($post);
        return redirect('/')->with("message", "Post Created Successfully.");
    }
}
