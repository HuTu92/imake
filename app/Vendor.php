<?php

namespace imake;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
	protected $table  = 'vendors';

	public function user(){
		return $this->belongsTo("imake\User");
	}

    public function image(){
        return $this->hasOne('imake\Image', "id", "image_id");
    }


	public function products(){
		return $this->hasMany("imake\Product", "vendor_id", "id");
	}

    public function chats(){
        return $this->hasMany("imake\Chat", "vendor_id", "id");
    }


    public function getLogo(User $user = null){
        if(!$user){
            $vendor = $this;
        }elseif($user->is_vendor){
            $vendor = $user->vendor;
        }else{
            return null;
        }
        if($vendor->image){
            return $vendor->image->file;
        }
        return asset('images/vendor-logo.png');
    }
}
