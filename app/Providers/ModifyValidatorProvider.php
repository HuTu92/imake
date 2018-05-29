<?php

namespace imake\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


class ModifyValidatorProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
	    Validator::extend('greater_than_field', function($attribute, $value, $parameters, $validator) {
		    $min_field = $parameters[0];
		    $data = $validator->getData();
		    $min_value = $data[$min_field];
		    return $value > $min_value;
	    });

	    Validator::replacer('greater_than_field', function($message, $attribute, $rule, $parameters) {
		    return ucfirst(str_replace(':field', str_replace("_", " ", $parameters[0]), $message));
	    });


	    Validator::extend('less_than_field', function($attribute, $value, $parameters, $validator) {
		    $max_field = $parameters[0];
		    $data = $validator->getData();
		    $max_value = $data[$max_field];
		    return $value < $max_value;
	    });

	    Validator::replacer('less_than_field', function($message, $attribute, $rule, $parameters) {
		    return ucfirst(str_replace(':field', str_replace("_", " ", $parameters[0]), $message));
	    });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
