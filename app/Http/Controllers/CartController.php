<?php

namespace imake\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use imake\Cart;
use imake\Product;

class CartController extends Controller
{


	public function __construct() {
		$this->middleware(['auth']);
	}

	protected function validator(array $data)
	{


		$rules = [
			'product_id' => 'required|integer',
			'count' => 'required|integer',
		];

		return Validator::make($data, $rules);
	}


	public function index(){
		$user = Auth::user();
		return view( 'cart' );
	}

	public function update(Request $request){

		$validator = $this->validator($request->all());


		if($validator->fails()){
			return redirect()->back()->withErrors($validator);
		}


		$product = Product::findOrFail($request->get("product_id"));
		$user = Auth::user();



		$curreent_product_in_cart = $user->carts->where("product_id", $request->get("product_id"))->first();

		if($curreent_product_in_cart){
			$old_count = $curreent_product_in_cart->count;
		}else{
			$old_count = 0;
		}


		if( $product->stock < $request->get("count") +  $old_count){
			return redirect()->back()->withErrors(["error" =>  Lang::get('strings.stock-error')])->withInput($request->input());
		}

		if( $product->disable ){
			return redirect()->back()->withErrors(["error" =>  Lang::get('strings.disable-error')])->withInput($request->input());
		}






		if(!$old_count) {
			$cart = new Cart();

			$cart->user_id    = $user->id;
			$cart->product_id = $request->get( "product_id" );
			$cart->count      = $request->get( "count" );

			$cart->save();
		}else{
			$curreent_product_in_cart->count = $request->get("count") +  $old_count;
			$curreent_product_in_cart->update();
		}


		return redirect()->back()->with("message", Lang::get('strings.product-added-to-cart'));
	}



    public function destroy(Request $request)
    {
        $user = Auth::user();
        $cart = Cart::findOrFail($request->get('cart_id'));
        if($user->cannot("update", $cart)){
            return redirect()->route("cart");
        };
        $cart->delete();
        return redirect()->route("cart")->with('message' ,__("strings.product-deleted-from-cart"));
    }

}
