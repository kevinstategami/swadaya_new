<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('member_no');
            $table->string('email');
            $table->string('invoice_code');
            $table->double('amount');
            $table->double('admin_fee');
            $table->double('additional_amount');
            $table->double('total_amount');
            $table->integer('payment_method_id');
            $table->integer('target_bank_id')->nullable();
            $table->string('target_bank_name')->nullable();
            $table->string('target_bank_account_name')->nullable();
            $table->string('target_bank_account_no')->nullable();
            $table->string('invoice_type');
            $table->string('invoice_type_id');
            $table->integer('status')->default(0);
            $table->integer('approved_by')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
