<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('product_tag', function (Blueprint $table) {
		    $table->integer("product_id")->unsigned()->default(null);
		    $table->foreign("product_id")->references("id")->on("products");
		    $table->integer("tag_id")->unsigned()->default(null);
		    $table->foreign("tag_id")->references("id")->on("tags");

	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('product_tag');
    }
}
