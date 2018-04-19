<?php

use Illuminate\Database\Seeder;

class JenisbahanbakarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jenis_bahanbakars')->insert([

            'nama_bahan_bakar' =>'Premium/Pertalite/Pertamax',

        ]);

        DB::table('jenis_bahanbakars')->insert([

            'nama_bahan_bakar' =>'Solar',

        ]);
    }
}
