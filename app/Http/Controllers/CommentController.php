<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        // in case not logged-in user trying to create or edit (unauthenticated)
        $this->middleware("auth");
    }

    public function create(Request $req) {
        $comment = $req->validate([
            'comment' => 'required|max:255',
            'post_id' => 'required|numeric'
        ]);
        $post_exist = Post::find($comment["post_id"]);
        // in case user changed post_id from console
        if(!$post_exist)
            return redirect("/")->with("message", "The post you are trying to access doesn't exist!");
        // no need to check for user auth as the middleware does
        $comment['user_id'] = Auth::id();
        Comment::create($comment);
        return redirect('/post/'.$post_exist->id)->with("message", "Comment Added Successfully.");
    }

    public function delete(Request $req) {
        $comment = $req->validate([
            'comment_id' => 'required|numeric'
        ]);
        $comment_exist = Comment::find($req->comment_id);
        if(!$comment_exist)
            return redirect("/")->with("message", "The post you are trying to access doesn't exist!"); 
        if($comment_exist->user_id != Auth::id())
            return abort(403); // Forbidden
        $comment_exist->delete();
        return redirect('/post/' . $comment_exist->post_id)->with("message", "Message deleted successfully.");
    }

    public function edit(Request $req) {
        $comment = $req->validate([
            'comment' => 'required|max:255',
            'comment_id' => 'required|numeric',
            'post_id' => 'required|numeric'
        ]);
        $comment_exist = Comment::find($req->comment_id);
        if(!$comment_exist)
            return redirect("/")->with("message", "The post you are trying to access doesn't exist!"); 
        if($comment_exist->user_id != Auth::id())
            return abort(403); // Forbidden
        $comment_exist->update([
            'comment' => $req->comment,
            'updated_at' => now()
        ]);
        return redirect('post/'.$req->post_id)->with("message", "Comment updated successfully.");
    }
}
