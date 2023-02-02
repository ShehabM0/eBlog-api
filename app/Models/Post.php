<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "body",
        "image",
        "user_id"
    ];

    // joins post and user on id's
    public function user() {
        // this refers to the called post object
        // belongsTO refers to one-to-one relationship, i.e., each post has one user
        // class, FK, PK
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
