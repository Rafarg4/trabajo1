<?php

namespace Database\Factories;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Paciente::class;
    public function definition()
    {
        $faker =$this->faker;
        return [
            'nombre' =>$faker->firstName,
            'apellido'=>$faker->lastName,
            'documento' => $faker->unique()->numerify('#######'),
            'telefono' => $faker->numerify('595######'),
            'direccion' => $faker->address,
            'estado' => $faker->randomElement(['activo','inactivo']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
