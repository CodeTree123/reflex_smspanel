<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forum_post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function doc_post()
    {
        return $this->belongsTo(User::class, 'u_doc_id', 'id');
    }

    public function post_Like()
    {
        return $this->hasMany(forum_post_like::class, 'post_id', 'id');
    }

    public function post_Fav()
    {
        return $this->hasMany(forum_post_favorite::class, 'post_id', 'id');
    }
    
    public function post_comment()
    {
        return $this->hasMany(forum_post_comment::class, 'post_id', 'id');
    }
}
