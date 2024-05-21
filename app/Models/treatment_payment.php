<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class treatment_payment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function treat()
    {
        return $this->belongsTo(treatment_info::class, 't_id', 'id');
    }
    public function patient_data()
    {
        return $this->belongsTo(patient_infos::class, 'p_id', 'id');
    }
}
