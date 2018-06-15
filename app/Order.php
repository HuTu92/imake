<?php

namespace imake;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    protected $table  = 'orders';
    protected $primaryKey = 'id';


	public function user(){
		return $this->belongsTo("imake\User", "user_id", "id");
	}

    public function vendor(){
        return $this->belongsTo("imake\Vendor", "vendor_id", "id");
    }

	public function product(){
		return $this->belongsTo("imake\Product", "product_id", "id");
	}


}
