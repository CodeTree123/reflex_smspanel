<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suborder extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function supplier_info()
    {
        return $this->belongsTo(User::class, 'supplier_id', 'id');
    }
    public function order_info()
    {
        return $this->belongsTo(order::class, 'order_id', 'id');
    }

    public function product_info()
    {
        return $this->belongsTo(s_product::class, 'product_id', 'id');
    }
}
