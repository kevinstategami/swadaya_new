<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDownlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downlines', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('user_id_downline');
            $table->string('member_no');
            $table->string('member_no_downline');
            $table->string('email');
            $table->string('email_downline');
            $table->string('referal_code_id');
            $table->string('referal_code');
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
        Schema::dropIfExists('downlines');
    }
}
