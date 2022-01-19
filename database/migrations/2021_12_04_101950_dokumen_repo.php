<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DokumenRepo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('dokumen_repo', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('reff_id');
          $table->integer('reff_type');
          $table->string('filename');
          $table->string('mime_type');
          $table->longText('path');
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
      Schema::dropIfExists('dokumen_repo');
    }
}
