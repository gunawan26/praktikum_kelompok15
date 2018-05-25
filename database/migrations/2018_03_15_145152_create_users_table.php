<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('nama_depan',100);
            $table->string('nama_belakang',100);
            $table->string('email')->unique();
            $table->string('no_telp',20);
            $table->string('username',30);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('ktp',100);
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
