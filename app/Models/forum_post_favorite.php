<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forum_post_favorite extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function fav_post()
    {
        return $this->belongsTo(forum_post::class, 'post_id', 'id');
    }
}
