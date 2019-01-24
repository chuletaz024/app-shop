<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImageRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_image_rents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->boolean('featured')->default(false);

            //FK LLAVE FORANEA
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('product_rents')->onDelete('cascade');
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
        Schema::dropIfExists('product_image_rents');
    }
}
