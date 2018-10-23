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
            $table->integer('user_id')->unsigned();
            $table->integer('voucher_id')->nullable()->unsigned();
            $table->integer('offer_id')->nullable()->unsigned();
            $table->tinyInteger('payment_mode')->default(1)->comment("1: COD, 2: DebitCard, 3: Net Banking");
            $table->tinyInteger('payment_status')->comment('1: No, 2: Yes')->default(1);
            $table->string('payment_reference')->nullable();
            $table->integer('cart_amount')->unsigned()->default(0)->comment("In Paisa");
            $table->integer('discount')->unsigned()->default(0)->comment("In Paisa");
            $table->integer('extra_discount')->unsigned()->default(0)->comment("In Paisa");
            $table->integer('total')->unsigned()->default(0)->comment("In Paisa, Payamount");
            $table->tinyInteger('status')->comment('1: In Process, 2: Order Place, 3: Success, 4: Cancel, 5: Pending')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('voucher_id')->references('id')->on('vouchers');
            $table->foreign('offer_id')->references('id')->on('offers');
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
