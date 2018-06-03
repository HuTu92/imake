<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use imake\Product;
use imake\User;

Route::group([ 'prefix' => LaravelLocalization::setLocale()], function() {

	Route::get( '/', [
		'as' => 'home',

		function () {
			return view( 'home', [
				"news" => Product::with("categories", "colors", "tags", "vendor", "user", "images")
				                 ->orderBy('id', 'desc')
				                 ->take(5)
				                 ->get()
			] );
		}
	] );



	Route::get( '/cart', [
		'as' => 'cart',
		'middleware' => 'auth',
		'uses' => 'CartController@index',
	] );

	Route::post( '/cart/update', [
		'as' => 'cart.update',
		'middleware' => 'auth',
		'uses' => 'CartController@update',
	] );



	Route::get( '/account', [
		'as' => 'account',
		'middleware' => 'auth',
		function () {
			return view( 'auth.account' );
		}
	] );

	Route::get( '/account/shop/settings', [
		'as' => 'shop.settings',
		'middleware' => ['auth', 'auth.vendor'],
		function () {
			$user = Auth::user();
			return view( 'vendor.settings', ['countries' => Countries::all()] );
		}
	] );

	//update vendor data post request
	Route::post( '/account/shop/settings', [
		'middleware' => ['auth', 'auth.vendor'],
		'uses' => 'VendorController@update'
	]);

	Route::get( '/logout', [
		'as' => 'logout',
		function () {
			Auth::logout();

			return redirect()->route( 'home' );
		}
	] );


	/**
	 * Product Controllers
	 */
	Route::get("/products/my/", [
		"as" => "products.my",
		'middleware' => ['auth', 'auth.vendor'],
		function (){
			$user = Auth::user();
			$products = $user->products()->orderBy('id', 'desc')->paginate(10);
			return view( 'products.my', ['products' => $products] );
		}
	]);
	Route::resource("/products", "Products\ProductController" );


	/**
	 * Auth Controllers
	 */

	Auth::routes();

	Route::get('/user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');

	//update user data post request
	Route::post( '/account', [
		"as" => "auth.account",
		'middleware' => 'auth',
		'uses' => 'UserController@update'
	]);




	/*
	 * Ajax Requests
	 */

	Route::get('/product-form-variation-fields',function (){
	    return view("inc.product-form-variation-fields",  ["variation_number" => $_GET["variation_number"], "product_images" => $_GET["product_images"]] );
    });

    Route::post( '/images/store', [
        'as' => 'images.store',
        'middleware' => 'auth',
        'uses' => 'ImageController@store',
    ] );


});