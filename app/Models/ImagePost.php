<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagePost extends Model
{
    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
