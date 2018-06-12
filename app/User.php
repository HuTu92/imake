<?php

namespace imake;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;
	use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table  = 'users';
    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'is_vendor', "image_id"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function vendor(){
        return $this->hasOne('imake\Vendor', "user_id", "id");
    }

    public function image(){
        return $this->hasOne('imake\Image', "id", "image_id");
    }

    public function products(){
    	return $this->hasMany("imake\Product", "user_id", "id");
    }

    public function orders(){
    	return $this->hasMany("imake\Order", "user_id", "id");
    }

    public function carts(){
    	return $this->hasMany("imake\Cart", "user_id", "id");
    }


    public function getAvatar(User $user = null){
    	if(!$user){
    		$user = $this;
	    }
	    if($user->image){
		    return $user->image->file;
	    }
	    return asset('images/avatar.png');
    }

    public static function currentUser(){
    	return Auth::user();
    }

    public function comments(){
        return $this->hasMany("imake\Comment", "user_id", "id");
    }
}
