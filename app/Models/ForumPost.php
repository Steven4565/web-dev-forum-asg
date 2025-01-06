<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    protected $fillable = ['category', 'title', 'content', 'user_id'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function voters()
    {
        return $this->belongsToMany(User::class, 'post_user_vote')
                    ->withPivot('vote')
                    ->withTimestamps();
    }
}
