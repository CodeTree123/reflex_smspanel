<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function doctor()
    {
        return $this->hasOne(doctor::class, 'u_id', 'id');
    }
    public function shop()
    {
        return $this->hasOne(shop::class, 'u_id', 'id');
    }
    public function s_product()
    {
        return $this->hasMany(s_product::class, 'supplier_id', 'id');
    }
    public function order()
    {
        return $this->hasMany(order::class, 'doc_id', 'id');
    }
    public function supplier()
    {
        return $this->hasMany(suborder::class, 'supplier_id', 'id');
    }
    public function cham_add()
    {
        return $this->hasOne(chember_info::class, 'd_id', 'id');
    }

    public function subscribeUser()
    {
        return $this->hasOne(subscription::class, 'd_id', 'id');
    }
    //user sms
    public function userSms()
    {
        return $this->hasOne(UserSms::class, 'user_id', 'id');
    }
}
