<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dislike;

class Sauce extends Model
{
    use HasFactory;

    public $timestamps = false;

     protected $fillable = [
        'userId',
        'name',
        'manufacturer',
        'description',
        'mainPepper',
        'imageUrl',
        'heat',
        'likes',
        'dislikes',
        'usersLiked',
        'usersDisliked'
    ];

    protected $attributes = [
        'userId' => 0, 
        'likes' => 0,
        'dislikes' => 0,
    
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function likedBy()
    {
        return $this->belongsToMany(User::class, 'likes', 'sauce_id', 'user_id');
    }

    public function dislikedBy()
    {
        return $this->belongsToMany(User::class, 'dislikes', 'sauce_id', 'user_id');
    }


}