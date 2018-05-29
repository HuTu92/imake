<?php

namespace imake\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VendorAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	$user = Auth::user();
    	if(!$user->is_vendor){
    		return redirect()->route("account");
	    }
        return $next($request);
    }
}
