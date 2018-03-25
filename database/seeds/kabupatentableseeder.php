<?php

use Illuminate\Database\Seeder;

class kabupatentableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $provid = App\Provinsi::where('nama_provinsi','bali')->first()->id;

        DB::table('kabupatenkotas')->insert([

            'nama_kabupaten' =>'denpasar',
            'provinsi_id' => $provid,

        ]);
        DB::table('kabupatenkotas')->insert([

            'nama_kabupaten' =>'badung',
            'provinsi_id' => $provid,

        ]);
        DB::table('kabupatenkotas')->insert([

            'nama_kabupaten' =>'gianyar',
            'provinsi_id' => $provid,

        ]);
        DB::table('kabupatenkotas')->insert([

            'nama_kabupaten' =>'karangasem',
            'provinsi_id' => $provid,

        ]);
        DB::table('kabupatenkotas')->insert([

            'nama_kabupaten' =>'bangli',
            'provinsi_id' => $provid,

        ]);
        DB::table('kabupatenkotas')->insert([

            'nama_kabupaten' =>'jembrana',
            'provinsi_id' => $provid,

        ]);
        DB::table('kabupatenkotas')->insert([

            'nama_kabupaten' =>'buleleng',
            'provinsi_id' => $provid,

        ]);
        DB::table('kabupatenkotas')->insert([

            'nama_kabupaten' =>'tabanan',
            'provinsi_id' => $provid,

        ]);
    
    }
}
