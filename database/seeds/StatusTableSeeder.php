<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('status')->insert([
            'nb_nombre'      => 'Activo'
        ]);

          DB::table('status')->insert([
            'nb_nombre'      =>'Inactivo'
        ]);

    }
}
