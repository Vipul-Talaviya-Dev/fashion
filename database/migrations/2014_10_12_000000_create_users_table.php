<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->date('birth_date')->nullable();
            $table->date('anniversary_date')->nullable();
            $table->string('password')->nullable();
            $table->string('member_ship_code')->unique()->nullable();
            $table->string('referral_code')->unique();
            $table->tinyInteger('status')->comment('1: Active, 2: In-active')->default(1);
            $table->tinyInteger('social_login')->comment('0: default, 1: Google, 2: Facebook, 3: Twitter')->default(0);
            $table->tinyInteger('login_type')->comment('1: Web, 2: Android, 3: IOS')->default(1);
            $table->unsignedBigInteger('login_count')->comment('User login Count')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
