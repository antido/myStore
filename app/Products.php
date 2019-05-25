<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function productDetail()
    {
    	return $this->hasOne('App\ProductDetail');
    }

    public function status()
    {
        return $this->hasMany('App\Status');
    }
}
