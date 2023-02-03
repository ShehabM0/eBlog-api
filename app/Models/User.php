<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     * Won't be included on response
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // joins user and post on id's
    public function posts() {
        // this refers to the called post object
        // hasMany refers to one-to-many relationship, i.e., each user has many posts
        // class, FK, PK
        return $this->hasMany(Post::class, "user_id", "id");
    }

    // joins user and comment
    public function comments() {
        // hasMany refers to one-to-many relationship, i.e., each user has one or comment more
        // class, FK, PK
        return $this->hasMany(Comment::class, "user_id", "id");
    }
}
