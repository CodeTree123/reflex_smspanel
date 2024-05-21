<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class s_sub_subcat1 extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function SubCat()
    {
        return $this->belongsTo(s_sub_category::class, 'sub_cat_id', 'id');
    }

    public function subSubCat2()
    {
        return $this->hasMany(s_sub_subcat2::class, 'sub_subcat1_id', 'id');
    }
}
