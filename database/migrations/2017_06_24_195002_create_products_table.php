 <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string("name",255);
	        $table->string("description",5000);
	        $table->string("variations",5000)->nullable();

           // $table->string("currency", 20);

            $table->double("regular_price")->unsigned()->nullable();
            $table->double("sale_price")->unsigned()->nullable();

            $table->double("weight")->nullable();
            $table->double("length")->nullable();
            $table->double("width")->nullable();
            $table->double("height")->nullable();

            $table->boolean("manage_stock")->default(true);
            $table->integer("stock")->unsigned();
            $table->boolean("disable")->default(false);

            $table->integer("user_id")->unsigned()->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->integer("vendor_id")->unsigned()->nullable();
            $table->foreign("vendor_id")->references("id")->on("vendors");
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
        Schema::dropIfExists('products');
    }
}
