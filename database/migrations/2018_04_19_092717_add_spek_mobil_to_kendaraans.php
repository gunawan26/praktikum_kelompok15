<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSpekMobilToKendaraans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('kendaraans', function (Blueprint $table) {
            $table->enum('transmisi',['Manual','Otomatis']);
            $table->unsignedSmallInteger('id_bahan_bakar');
            Schema::disableForeignKeyConstraints();  
            $table->foreign('id_bahan_bakar')->references('id')->on('jenis_bahanbakars');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('kendaraans', function (Blueprint $table) {
            //
        });
    }
}
