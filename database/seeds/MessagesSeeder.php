<?php

use Illuminate\Database\Seeder;
use imake\Message;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public $_messages = [
        [
            "chat_id" => 1,
            "user_id" => 1,
            "message" => "trullala message",
        ],
        [
            "chat_id" => 1,
            "user_id" => 2,
            "message" => "urish message",
        ],
        [
            "chat_id" => 1,
            "user_id" => 2,
            "message" => "eli urish message",
        ],
        [
            "chat_id" => 1,
            "user_id" => 2,
            "message" => "savsem ujex message",
        ],
        [
            "chat_id" => 1,
            "user_id" => 1,
            "message" => "qu asacna brat",
        ],
        [
            "chat_id" => 1,
            "user_id" => 1,
            "message" => "esa poxerd het xrgem",
        ],
    ];

    public function run()
    {
        foreach ($this->_messages as $m){
            Message::create($m);
        }
    }
}
