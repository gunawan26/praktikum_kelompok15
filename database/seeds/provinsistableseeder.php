<?php

use Illuminate\Database\Seeder;

class provinsistableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('provinsis')->insert([

            'nama_provinsi' =>'bali',

        ]);
    }
}
