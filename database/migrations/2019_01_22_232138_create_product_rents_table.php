<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_rents', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('description');
            $table->text('long_description')->nullable();
            $table->float('price');

            //FK
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('category_rents')->onDelete('cascade');
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
        Schema::dropIfExists('product_rents');
    }
}
