<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert(['nombre' => 'Administración']);
        DB::table('areas')->insert(['nombre' => 'Contabilidad']);
        DB::table('areas')->insert(['nombre' => 'Marketing']);
        DB::table('areas')->insert(['nombre' => 'Ventas']);
        DB::table('areas')->insert(['nombre' => 'Sistemas']);
        DB::table('areas')->insert(['nombre' => 'Calidad']);
        DB::table('areas')->insert(['nombre' => 'Producción']);
    }
}
