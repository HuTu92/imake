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
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use imake\Cart;

Route::get('test',['uses'=>'TestController@test']);

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

    Route::post("/cart/destroy", [
        "as" => "cart.destroy",
        'middleware' => 'auth',
        'uses' => 'CartController@destroy',
    ]);


	Route::get( '/account', [
		'as' => 'account',
		'middleware' => 'auth',
		function () {
			return view( 'auth.account' );
		}
	] );




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

	Route::post("/products/change-status/", [
		"as" => "products.status",
		'middleware' => ['auth', 'auth.vendor'],
        'uses' => 'Products\ProductController@productDisable'
	]);




    Route::resource("/vendors", "Vendors\VendorController" );

	Route::resource("/products", "Products\ProductController" );

	Route::resource("/messages", "Messages\MessageController" );

	Route::resource("/chats", "Chats\ChatController" );


    Route::post("/product/comment/", [
        "as" => "product.comment",
        'middleware' => ['auth'],
        'uses' => 'CommentController@store'
    ]);




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

    Route::post( '/images/store', [
        'as' => 'images.store',
        'middleware' => 'auth',
        'uses' => 'ImageController@store',
    ] );


});