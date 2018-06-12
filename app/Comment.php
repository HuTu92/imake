<?php

namespace imake;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
    use SoftDeletes;
    protected $table  = 'comments';
    protected $primaryKey = 'id';
    protected $fillable =  [
        'comment',
        'product_id',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user(){
        return $this->hasOne('imake\User', "id", "user_id");
    }

    public function product(){
        return $this->hasOne('imake\Product', "id", "product_id");
    }




}
