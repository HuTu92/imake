<?php

use Illuminate\Database\Seeder;
use imake\Tag;

class TagsSeeder extends Seeder
{
	private $tagsNames = [
		"first tag",
		"second tag",
		"tree tag",
	];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    foreach ($this->tagsNames as $tagname)
		    Tag::create(
			    ['tag_name' => $tagname]
		    );
    }
}
