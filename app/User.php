<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function product()
    {
        return $this->hasMany('App\Products');
    }

    public function userInfo()
    {
        return $this->belongsTo('App\UserInfo');
    }

    public function userCredit()
    {
        return $this->hasOne('App\UserCredit');
    }

    public function addToCart()
    {
        return $this->hasMany('App\AddToCart');
    }

    public function purchaseRecord()
    {
        return $this->hasOne('App\PurchaseRecord');
    }

    public function userLogs()
    {
        return $this->hasMany('App\UserLog');
    }

    public function status()
    {
        return $this->hasMany('App\Status');
    }
}
