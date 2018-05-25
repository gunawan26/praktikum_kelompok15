<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKabupatenkotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //
    public function up()
    {
        Schema::create('kabupatenkotas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kabupaten',50);
            $table->unsignedInteger('provinsi_id');
            $table->timestamps();

            $table->foreign('provinsi_id')->references('id')->on('provinsis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kabupatenkotas');
    }
}
