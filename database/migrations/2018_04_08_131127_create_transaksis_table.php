<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_kendaraan');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_pemilik');
            $table->timestamp('tgl_transaksi')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('tgl_pesan')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('tgl_rencanakembali')->default(\DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('id_kendaraan')->references('id')->on('kendaraans');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_pemilik')->references('id')->on('pemiliks');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
