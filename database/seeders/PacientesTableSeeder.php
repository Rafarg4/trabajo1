<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PacientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->insert([
            [
                'nombre' =>'Juan',
                'apellido' =>'Britez',
                'documento' =>'4521123',
                'direccion' =>'Barrio Mosquito',
                'telefono' => '0981282374',
                'estado' =>'Activo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Brenda',
                'apellido' =>'Lopez',
                'documento' =>'55123',
                'direccion' =>'Barrio La amistad',
                'telefono' => '09895645',
                'estado' =>'Activo',
                'created_at' => now(),
                'updated_at' => now(),
            ]
            ]);
   }
}
