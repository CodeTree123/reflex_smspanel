<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notice extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable = ['title', 'description', 'read_at'];

    public function isNew()
    {
        return is_null($this->read_at);
    }
}
