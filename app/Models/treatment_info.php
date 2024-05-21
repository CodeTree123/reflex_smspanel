<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class treatment_info extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function patient(){

        return $this->belongsTo(patient_infos::class, 'p_id', 'id');
    }

}
