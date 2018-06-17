<?php

namespace imake\Http\Controllers;

use Illuminate\Http\Request;
use imake\Chat;
use imake\Image;
use imake\Message;
use imake\Order;
use imake\Product;

class TestController extends Controller
{
    public function test(){

        dump( Image::create(public_path("images/demo/sample_product.jpg")));

       /* $chat = Chat::find(1);
        dump($chat);
        dump($chat->user);
        dump($chat->vendor);
        dump($chat->product);
        //henc konkret chaty inch namakner uni
        dump($chat->messages);


        $message = Message::find(1);
        dump($message);
        dump($message->chat);

        $product = Product::find(1);
        //producty inch chater uni
        dump($product->chats);
        //nmanatip karelia filtrel collectian
        dump($product->chats->where('user_id',2));
*/

    }


}
