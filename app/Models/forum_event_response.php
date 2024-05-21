<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forum_event_response extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user_event()
    {
        return $this->belongsTo(User::class, 'u_id', 'id');
    }
}
