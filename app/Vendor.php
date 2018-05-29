<?php

namespace imake;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
	protected $table  = 'vendors';

	public function user(){
		return $this->belongsTo("imake\User");
	}

	public function products(){
		return $this->hasMany("imake\Product", "vendor_id", "id");
	}
}
