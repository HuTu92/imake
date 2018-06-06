<?php

namespace imake\Policies;

use imake\User;
use imake\Cart;
use Illuminate\Auth\Access\HandlesAuthorization;

class CartPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the cart.
     *
     * @param  \imake\User  $user
     * @param  \imake\Cart  $cart
     * @return mixed
     */
    public function view(User $user, Cart $cart)
    {
        return true;
    }

    /**
     * Determine whether the user can create carts.
     *
     * @param  \imake\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the cart.
     *
     * @param  \imake\User  $user
     * @param  \imake\Cart  $cart
     * @return mixed
     */
    public function update(User $user, Cart $cart)
    {
        if($cart->user_id == $user->id){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the cart.
     *
     * @param  \imake\User  $user
     * @param  \imake\Cart  $cart
     * @return mixed
     */
    public function delete(User $user, Cart $cart)
    {
        if($cart->user_id == $user->id){
            return true;
        }
        return false;
    }
}
