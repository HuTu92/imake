<?php

namespace imake;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;


	protected $table  = 'products';
    public $appends = ['real_price'];
    protected $fillable =  [
		'name', 'description', "regular_price", "sale_price", "weight", "length", "width", "height", "stock", "deleted_at", "variations"
	];
    protected $dates = ['deleted_at'];

    public function user(){
		return $this->belongsTo("imake\User", "user_id", "id");
	}

	public function vendor(){
		return $this->belongsTo("imake\Vendor", "vendor_id", "id");
	}

	public function categories(){
		return $this->belongsToMany("imake\Category", "product_category");
	}

	public function colors(){
		return $this->belongsToMany('imake\Color', 'product_color');
	}

	public function tags(){
		return $this->belongsToMany("imake\Tag", "product_tag");
	}

	public function images(){
		return $this->belongsToMany("imake\Image", "product_image" );
	}


	public function getStock(){
	    return $this->stock;
    }

	public function getRealPriceAttribute()
	{
		if($this->sale_price){
			return $this->sale_price;
		}
		return $this->regular_price;
	}

    public function comments(){
        return $this->hasMany("imake\Comment", "product_id", "id");
    }


    /**
	 * cyustom
	 */



	public function getGeneralImage(){
		return $this->images->first()["file"];
	}



    public function chats(){
        return $this->hasMany("imake\Chat", "product_id", "id");
    }






}