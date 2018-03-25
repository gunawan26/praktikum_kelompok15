<?php

use Illuminate\Database\Seeder;

class kategoristableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('kategoris')->insert([

            'nama_kategori' =>'sedan',

        ]);
        DB::table('kategoris')->insert([

            'nama_kategori' =>'suv',

        ]);
        DB::table('kategoris')->insert([

            'nama_kategori' =>'pickup',

        ]);
        DB::table('kategoris')->insert([

            'nama_kategori' =>'keluarga/MPV',

        ]);
        DB::table('kategoris')->insert([

            'nama_kategori' =>'sport',

        ]);
    }
}
