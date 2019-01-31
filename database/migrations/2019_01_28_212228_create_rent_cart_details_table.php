<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_cart_details', function (Blueprint $table) {
            $table->increments('id');
            //FK header
            $table->integer('cart_id')->unsigned();
            $table->foreign('cart_id')->references('id')->on('rent_carts');

            //FK header
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('rents');

            $table->integer('quantity');
            $table->integer('discount')->default(0); // % de descuento int
            
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
        Schema::dropIfExists('rent_cart_details');
    }
}
