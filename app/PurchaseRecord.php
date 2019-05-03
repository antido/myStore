<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseRecord extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function addToCart()
    {
    	return $this->belongsTo('App\AddToCart');
    }
}
