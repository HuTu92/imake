<?php

namespace imake;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $table  = 'tags';

	public function products(){
		return $this->belongsToMany("imake\Products", 'product_tag');
	}
}
