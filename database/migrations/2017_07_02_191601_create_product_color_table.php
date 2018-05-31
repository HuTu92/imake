<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductColorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('product_color', function (Blueprint $table) {
		    $table->integer("product_id")->unsigned()->default(null);
		    $table->foreign("product_id")->references("id")->on("products");
		    $table->integer("color_id")->unsigned()->default(null);
		    $table->foreign("color_id")->references("id")->on("colors");

	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('product_color');
    }
}
