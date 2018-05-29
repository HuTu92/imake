<?php

use Illuminate\Database\Seeder;
use imake\Color;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	private $colors = [
		"red" => "#FF0000",
		"green" => "#008000",
		"yellow" => "#FFFF00",
	];
	public function run()
	{
		foreach ($this->colors as $name => $hex)
			Color::create(
				[
					'color_name' => $name,
					'color_hex' => $hex
				]
			);
	}
}
