<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kendaraan',50);
            $table->unsignedbigInteger('id_pemilik');
            $table->string('plat_nomor',15);
            $table->text('deskripsi');
            $table->unsignedDecimal('harga_sewa',10,2);
            $table->unsignedSmallInteger('id_kategori');
            $table->unsignedInteger('id_kabupatenkota');
            $table->unsignedTinyInteger('id_status');

    
            $table->timestamps();
            Schema::disableForeignKeyConstraints();  
            $table->foreign('id_status')->references('id')->on('statuses');
            $table->foreign('id_pemilik')->references('id')->on('pemiliks');
            $table->foreign('id_kategori')->references('id')->on('kategoris');
            $table->foreign('id_kabupatenkota')->references('id')->on('kabupatenkotas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraans');
    }
}
