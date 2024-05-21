<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class s_category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function subCat()
    {
        return $this->hasMany(s_sub_category::class, 'cat_id', 'id');
    }
}
