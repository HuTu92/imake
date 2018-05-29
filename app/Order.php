<?php

namespace imake;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
	use SoftDeletes;
	protected $table  = 'orders';

	public function products(){
		return $this->belongsToMany("imake\Product", "order_product");
	}

	public function user(){
		return $this->belongsTo("imake\User", "user_id", "id");
	}
}
