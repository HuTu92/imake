<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users");

            $table->integer("vendor_id")->unsigned();
            $table->foreign("vendor_id")->references("id")->on("vendors");

            $table->integer("product_id")->unsigned();
            $table->foreign("product_id")->references("id")->on("products");

            $table->integer("count")->unsigned();
            $table->double("amount")->unsigned()->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
