<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('vendors', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('user_id')->unsigned()->unique();
		    $table->foreign("user_id")->references("id")->on("users");
		    $table->string('shop_name')->nullable();
		    $table->string('shop_description')->nullable();
		    $table->string('shop_country', 250)->nullable();
		    $table->timestamps();
		    $table->softDeletes();
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('vendors');
    }
}
