<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Simpanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('simpanan', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id');
        $table->string('member_no');
        $table->string('email');
        $table->integer('invoice_id');
        $table->string('simpanan_no');
        $table->double('amount')->default(0);
        $table->double('admin_fee')->default(0);
        $table->double('total')->default(0);
        $table->integer('simpanan_type_id');
        $table->date('deposit_date');
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
        Schema::dropIfExists('simpanan');
    }
}
