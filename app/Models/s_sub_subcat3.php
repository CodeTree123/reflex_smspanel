<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class s_sub_subcat3 extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function SubsubCat2()
    {
        return $this->belongsTo(s_sub_subcat2::class, 'sub_subcat2_id', 'id');
    }
}
