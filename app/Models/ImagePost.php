<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagePost extends Model
{
    protected $fillable = ['title', 'description', 'user_id', 'url'];
    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
