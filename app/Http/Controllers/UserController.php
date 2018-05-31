<?php

namespace imake\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use imake\Vendor;
use imake\Image;
use Intervention\Image\ImageManagerStatic;

// import the Intervention Image Manager Class


class UserController extends Controller
{
	protected function validator(array $data)
	{
		$passval = '';
		if(!empty($data['password'])){
			$passval = 'string|min:6|same:password_confirmation';
		};

		return Validator::make($data, [
			'name' => 'required|string|max:255',
			'last_name' => 'required|string|max:255',
			//'email' => 'required|string|email|max:255',
			'password' => $passval,
			'avatar' => 'image',
		]);
	}

	public function update(Request $request){
		$validator = $this->validator($request->all());
		$user = Auth::user();

		//fileuploader-list-avatar
		if(!$validator->fails()) {

            $user->image_id = null;

		    if(!empty(json_decode($request->{"fileuploader-list-avatar"}))){
                if($request->hasFile("avatar")){
                    $image = Image::create( $request->file("avatar"), [400, 400] );
                    $image->save();
                    $user->image_id = $image->id;
                }else{
                    $image = Image::where("file", json_decode($request->{"fileuploader-list-avatar"})[0]->file)->first();
                    if($image){
                        $user->image_id = $image->id;
                    }
                }
		    }

			$user->name         = $request->get( 'name' );
			$user->last_name    = $request->get( 'last_name' );
		//	$user->email        = $request->get( 'email' );
			$user->is_vendor    = $request->get( 'is_vendor',0 );


			if ( ! $request->has( 'password' ) == '' ) {
				$user->password = bcrypt( $request->get( 'password' ) );
			}

			if(!$user->vendor && $user->is_vendor){
				$vendo = new  Vendor();
				$vendo->user_id = $user->id;
				$vendo->save();
			}

			$user->save();

			return redirect()->back()->with("message", __('strings.account-success-updated'));
		}else{
			return redirect()->back()->withErrors($validator->messages());
		}
	}
}
