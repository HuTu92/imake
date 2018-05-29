<?php

namespace imake\Policies;

use imake\Product;
use imake\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function add(User $user){
    	if($user->is_vendor){
    		return true;
	    }
	    return false;
    }

    public function update(User $user, Product $product){
	    if($user->is_vendor && $user->id == $product->user_id){
			return true;
	    }
	    return false;
    }
}
