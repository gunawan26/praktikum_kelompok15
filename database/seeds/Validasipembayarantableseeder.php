<?php

use Illuminate\Database\Seeder;

class Validasipembayarantableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('validasipembayarans')->insert([

            'status_validasi' =>'sudah_bayar',

        ]);

        DB::table('validasipembayarans')->insert([

            'status_validasi' =>'belum_bayar',

        ]);

        DB::table('validasipembayarans')->insert([

            'status_validasi' =>'batal',

        ]);
        //php artisan db:seed --class=UsersTableSeeder
    }
}
