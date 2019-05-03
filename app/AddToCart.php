<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddToCart extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function productDetail()
    {
    	return $this->hasMany('App\ProductDetail');
    }

    public function purchaseRecord()
    {
    	return $this->hasOne('App\PurchaseRecord');
    }
}
