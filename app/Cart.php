<?php

namespace imake;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
	protected $table  = 'carts';
	protected $fillable = ['user_id', 'product_id', 'count'];



	public function user(){
		return $this->belongsTo("imake\User", "user_id", "id");
	}


	public function product(){
		return $this->belongsTo("imake\Product", "product_id", "id");
	}


}
