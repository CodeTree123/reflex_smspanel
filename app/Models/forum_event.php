<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forum_event extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function doc_event()
    {
        return $this->belongsTo(User::class, 'u_id', 'id');
    }

    public function response()
    {
        return $this->hasMany(forum_event_response::class, 'event_id', 'id');
    }
}
