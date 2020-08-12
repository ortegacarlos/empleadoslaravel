<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empleados')->insert([
            'nombre' => 'Gladis Fernández',
            'email' => 'gfernandez@example.com',
            'sexo' => 'F',
            'area_id' => 4,
            'boletin' => 1,
            'descripcion' => 'Descripción el empleado Gladis Fernández.'
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Felipe Gómez',
            'email' => 'fgomez@example.com',
            'sexo' => 'M',
            'area_id' => 6,
            'boletin' => 0,
            'descripcion' => 'Descripción el empleado Felipe Gómez.'
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Adriana Loaiza',
            'email' => 'aloaiza@example.com',
            'sexo' => 'F',
            'area_id' => 7,
            'boletin' => 1,
            'descripcion' => 'Descripción el empleado Adriana Loaiza.'
        ]);
    }
}
