<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient_infos extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function m_type()
    {
        return $this->belongsTo(mobile_type::class, 'mobile_type', 'id');
    }
    public function monthP()
    {
        return $this->hasMany(treatment_info::class, 'p_id', 'id');
    }
    public function treat_pay()
    {
        return $this->hasMany(treatment_payment::class, 'p_id', 'id');
    }
}
