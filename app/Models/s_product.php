<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class s_product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function supplier()
    {
        return $this->belongsTo(User::class, 'supplier_id', 'id');
    }

    public function pro_stock()
    {
        return $this->hasOne(s_product_stock::class, 'pro_id', 'id');
    }
    public function orderd_product()
    {
        return $this->hasMany(suborder::class, 'order_id', 'id');
    }
}
