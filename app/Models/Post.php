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
        // belongsTo refers to one-to-one relationship, i.e., each post has one user.
        // class, FK, PK
        return $this->belongsTo(User::class, "user_id", "id");
    }

    // joins post and comments
    public function comments() {
        // hasMany refers refers to one-to-many relationship, i.e., each post -
        // has many comments (one or more).
        return $this->hasMany(Comment::class);
    }

    // joins post and categories
    public function categories() {
        // belongsToMany refers to many-to-many relationship, i.e., each post -
        // has more than one category and each category belogns to one post or more.
        // class, relation table
        return $this->belongsToMany(Category::class, "post_categories");
    }
}
