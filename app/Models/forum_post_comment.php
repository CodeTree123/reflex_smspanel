<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forum_post_comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function main_post()
    {
        return $this->belongsTo(forum_post::class, 'post_id', 'id');
    }

    public function comment_user()
    {
        return $this->belongsTo(User::class, 'u_id', 'id');
    }
}
