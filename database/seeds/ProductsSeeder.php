<?php

use Illuminate\Database\Seeder;
use imake\Product;
use Imake\Image;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::create([
            "created_at" =>\Illuminate\Support\Carbon::now(),
            "updated_at" =>\Illuminate\Support\Carbon::now(),
            "name" => "Gazar",
            "description" => "Shat hamov gazar",
            "regular_price" => 150,
            "sale_price" => 50,
            "weight" => 10,
            "length" => 10,
            "width" => 10,
            "height" => 3,
            "manage_stock" => true,
            "stock" => 15,
            "user_id" => 1,
            "vendor_id" => 1,
        ]);



        $product->images()->saveMany(
            Image::where(["id"=> 1])->get()
        );

    }
}
