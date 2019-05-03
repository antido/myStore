<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    public function product()
    {
    	return $this->belongsTo('App\Products');
    }

    public function addToCart()
    {
    	return $this->belongsTo('App\AddToCart');
    }
}
