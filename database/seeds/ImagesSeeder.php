<?php

use Illuminate\Database\Seeder;
use imake\Image;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $file = new \Illuminate\Http\UploadedFile(
            public_path("images/demo/sample_product.jpg"),
            'sample_product.jpg',
            'image/jpg',
            filesize(public_path("images/demo/sample_product.jpg")),
            null,
            false
        );

       // dump($file);
        Image::create(
            $file
        )->save();
    }
}
