<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_transaksi');
            $table->timestamp('tanggal_bayar')->default(\DB::raw('CURRENT_TIMESTAMP'));;
            $table->timestamp('tgl_batasbayar')->default(\DB::raw('CURRENT_TIMESTAMP'));;
            $table->String('bukti_pembayaran',100)->nullable(); 
            $table->unsignedTinyInteger('id_status_validasi');
            
            
            $table->foreign('id_transaksi')->references('id')->on('transaksis');
            $table->foreign('id_status_validasi')->references('id')->on('validasipembayarans');
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
        Schema::dropIfExists('pembayarans');
    }
}
