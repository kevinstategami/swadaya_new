<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_banks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('member_no');
            $table->string('email');
            $table->string('branch');
            $table->string('account_number');
            $table->string('account_name');
            $table->string('swift_code');
            $table->string('account_bank');
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
        Schema::dropIfExists('membership_banks');
    }
}
