<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class treatment_plan extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function tPaln()
    {
        return $this->belongsTo(treatment_plan::class, 't_plan_id', 'id');
    }
}
