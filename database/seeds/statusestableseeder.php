<?php

use Illuminate\Database\Seeder;

class statusestableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('statuses')->insert([

            'nama_status' =>'tersedia',

        ]);

        DB::table('statuses')->insert([

            'nama_status' =>'tidak_tersedia',

        ]);
    }
}
