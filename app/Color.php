<?php

namespace imake;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
	protected $table  = 'colors';

    public function products(){
    	return $this->belongsToMany('imake\Product', 'product_color');
    }
}
