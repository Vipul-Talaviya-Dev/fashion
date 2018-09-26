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
            $table->integer('category_id')->unsigned();
            $table->integer('brand_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('slug');
            $table->unsignedInteger('price');
            $table->unsignedInteger('max_price');
            $table->unsignedInteger('discount')->default(0);
            $table->double('weight', 15, 8)->default(0);
            $table->string('thumb_image');
            $table->longText('small_image');
            $table->longText('description')->nullable();
            $table->text('short_description')->nullable();
            $table->tinyInteger('status')->comment('1: Active, 2: In-active')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('brand_id')->references('id')->on('brands');
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
