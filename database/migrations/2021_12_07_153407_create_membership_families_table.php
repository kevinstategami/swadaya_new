<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_families', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('member_no');
            $table->string('email');
            $table->string('family_fullname');
            $table->string('family_address');
            $table->string('family_phone_no');
            $table->string('family_relationship');
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
        Schema::dropIfExists('membership_families');
    }
}
