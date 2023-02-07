<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "category"
    ];
    
    public $timestamps = false;

    // joins category and post
    public function posts() {
        // belongsToMany refers to many-to-many relationship, i.e., each category -
        // belongs to one post or more and each post has one category or more.
        // class, relation table
        return $this->belongsToMany(Post::class, "post_categories");
    }
}
