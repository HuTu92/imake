<?php

namespace imake\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use imake\Vendor;
use Countries;
use Lang;

class VendorController extends Controller
{

	protected function validator(array $data)
	{


		return Validator::make($data, [
			'shop_name' => 'required|string|max:255',
			'shop_description' => 'required|string',
			'shop_country' => 'required|country',

		]);
	}


	public function update(Request $request){
		$validator = $this->validator($request->all());

		$user = Auth::user();
		$user->load("vendor");

		if(!$validator->fails()) {

			$user->vendor->shop_name         = $request->get( 'shop_name' );
			$user->vendor->shop_description  = $request->get( 'shop_description' );
			$user->vendor->shop_country      = $request->get( 'shop_country' );

			$user->vendor->save();

		}else{
			return redirect()->back()->withErrors($validator)->withInput($request->input());
		}
		return redirect()->back()->with("message", Lang::get('strings.account-success-updated'));
	}

}
