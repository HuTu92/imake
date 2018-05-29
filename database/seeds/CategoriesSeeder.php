<?php

use Illuminate\Database\Seeder;
use imake\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $categoriesNames = [
	    "first category",
	    "second category",
	    "tree category",
    ];
    public function run()
    {
    	foreach ($this->categoriesNames as $catname)
        Category::create(
        	['category_name' => $catname]
        );
    }
}
