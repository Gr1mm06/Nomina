<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo' => $this->faker->bothify('?###??##'),
            'nombre' => $this->faker->name(),
            'apellido_paterno' => $this->faker->lastName(),
            'apellido_materno' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'tipo_contrato' => $this->faker->word(),
            'estado' => $this->faker->randomElement(['Activo', 'Inactivo']),
            'estatus' => $this->faker->boolean()
        ];
    }
}
