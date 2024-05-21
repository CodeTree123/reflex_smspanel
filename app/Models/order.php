<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function doc_info()
    {
        return $this->belongsTo(User::class, 'doc_id', 'id');
    }
//    public function product_info()
//    {
//        return $this->belongsTo(s_product::class, 'product_id', 'id');
//    }
    public function sub_order()
    {
        return $this->hasMany(suborder::class, 'order_id', 'id');
    }
}
