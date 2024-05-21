<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class s_sub_category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function cat()
    {
        return $this->belongsTo(s_category::class, 'cat_id', 'id');
    }

    public function subSubCat1()
    {
        return $this->hasOne(s_sub_subcat1::class, 'sub_cat_id', 'id');
    }
}
