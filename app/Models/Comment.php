<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        "comment",
        "user_id",
        "post_id"
    ];

    // joins comment and user
    public function user () {
        // this refers to the called post object
        // belongsTo refers to one-to-one relationship, i.e., each comment - 
        // belongs to one user
        // class, FK, PK
        return $this->belongsTo(User::class, "user_id", "id");
    }

    // joins comment and post
    public function post () {
        // belongsTo refers to one-to-one relationship, i.e., each comment - 
        // belongs to one post
        // class, FK, PK
        return $this->belongsTo(Post::class, "post_id", "id");
    }
}
