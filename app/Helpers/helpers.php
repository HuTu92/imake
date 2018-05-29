<?php

use Illuminate\Support\Facades\Auth;

if (! function_exists('getCartCount')) {
	function getCartCount()
	{
		$user = Auth::user();
		if($user->carts->count()){
			return array_sum($user->carts->pluck("count")->toArray());
		}
		return 0;
	}
}