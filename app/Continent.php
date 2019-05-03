<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    public function country()
    {
    	return $this->hasMany('App\Country');
    }
}
