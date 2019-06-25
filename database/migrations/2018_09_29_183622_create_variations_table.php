<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->string('product_type_id')->nullable();
            $table->integer('color_id')->unsigned();
            $table->integer('size_id')->unsigned()->nullable();
            $table->text('images')->nullable();
            $table->integer('purchase_price')->unsigned()->default(0)->comment("In Paisa, Purchase price");
            $table->integer('price')->unsigned()->default(0)->comment("In Paisa, Selling Price");
            $table->integer('qty');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('size_id')->references('id')->on('sizes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variations');
    }
}
