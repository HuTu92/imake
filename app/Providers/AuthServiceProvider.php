<?php

namespace imake\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use imake\Chat;
use imake\Policies\ChatPolicy;
use imake\Policies\ProductPolicy;
use imake\Product;
use imake\Cart;
use imake\Policies\CartPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'imake\Model' => 'imake\Policies\ModelPolicy',
        Product::class => ProductPolicy::class,
        Chat::class => ChatPolicy::class,
        Cart::class => CartPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
