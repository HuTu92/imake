<?php

use Illuminate\Database\Seeder;
use imake\Vendor;

class VendorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vendor::create([
            "user_id" => 1,
            "shop_name" => "My Super Shop",
            "shop_description" => "My Super Shop",
            "shop_country" => "Armenia",
            "created_at" => \Illuminate\Support\Carbon::now(),
            "updated_at" => \Illuminate\Support\Carbon::now(),
        ]);
    }
}
