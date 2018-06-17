<?php

use Illuminate\Database\Seeder;
use imake\Chat;

class ChatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chat::create([
            "user_id" => 2,
            "vendor_id" => 1,
            "product_id" => 1,
            "created_at" => \Illuminate\Support\Carbon::now(),
            "updated_at" => \Illuminate\Support\Carbon::now(),
        ]);
    }
}
