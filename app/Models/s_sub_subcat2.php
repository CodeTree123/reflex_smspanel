<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class s_sub_subcat2 extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function SubsubCat1()
    {
        return $this->belongsTo(s_sub_subcat1::class, 'sub_subcat1_id', 'id');
    }

    public function subSubCat3()
    {
        return $this->hasMany(s_sub_subcat3::class, 'sub_subcat2_id', 'id');
    }
}
