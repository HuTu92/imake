<?php

namespace imake;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table  = 'chats';
    protected $primaryKey = 'id';
    protected $fillable =  [
        'user_id',
        'vendor_id',
        'product_id',
        'order_id',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo("imake\User", "user_id", "id");
    }

    public function vendor(){
        return $this->belongsTo("imake\Vendor", "vendor_id", "id");
    }

    public function product(){
        return $this->belongsTo("imake\Product", "product_id", "id");
    }

    public function messages(){
        return $this->hasMany("imake\Message", "chat_id", "id");
    }
}
