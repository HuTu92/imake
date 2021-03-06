<?php

namespace imake;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table  = 'messages';
    protected $primaryKey = 'id';
    protected $fillable =  [
        'chat_id',
        'user_id',
        'message',
        'created_at',
        'updated_at',
    ];


    public function chat(){
        return $this->belongsTo("imake\Chat", "chat_id", "id");
    }

    public function user(){
        return $this->belongsTo("imake\User", "user_id", "id");
    }

}
