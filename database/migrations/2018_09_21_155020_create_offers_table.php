<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('offer_code')->unique();
            $table->unsignedInteger('discount')->default(0)->comment('In %');
            $table->unsignedInteger('amount')->default(0)->comment('In Paisa');
            $table->unsignedInteger('amount_limit')->default(0);
            $table->date('start_date');
            $table->date('end_date');
            $table->tinyInteger('use_time')->default(1)->unsigned()->comment('1: Multiple, 2: Single Time');
            $table->tinyInteger('use_member')->default(0)->unsigned()->comment('0: No, 1: Yes');
            $table->tinyInteger('status')->comment('1: Active, 2: In-active')->default(1);
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
        Schema::dropIfExists('offers');
    }
}
