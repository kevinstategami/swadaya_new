<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Membership extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('membership_account', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id');
          $table->string('email');
          $table->string('member_no');
          $table->string('fullname');
          $table->integer('member_type');
          $table->string('identity_no');
          $table->text('address');
          $table->bigInteger('province_id');
          $table->bigInteger('city_id');
          $table->bigInteger('postal_code');
          $table->bigInteger('phone_no');
          $table->string('birth_place');
          $table->date('birth_date');
          $table->string('gender');
          $table->date('member_since');
          $table->longText('description');
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
        Schema::dropIfExists('membership_account');
    }
}
