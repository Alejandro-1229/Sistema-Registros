<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\control>
 */
class ControlFactory extends Factory
{
    /**
     * Define the model's default state.
     * 
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numeroExpediente' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'idTipoItse' => $this->faker->numberBetween(2,3),
            'idFuncion' => $this->faker->numberBetween(1,9),
            'idNivelRiesgo' => $this->faker->numberBetween(1,6),
            'razonSocial' => $this->faker->sentence(1),
            'nombreEstablecimiento' => $this->faker->company(),
            'giroDelNegocio' => $this->faker->sentence(),
            'datosSolicitante' => $this->faker->name(),
            'fechaIngreso' => $this->faker->date(),
            'fechaIngresoSGDC' => $this->faker->date(),
            'barrio' => $this->faker->randomLetter(3),
            'nombreHabilitacionUrbana' => $this->faker->sentence(1),
            'areaOcupada' => $this->faker->numberBetween(160,2000),
            'numeroPisos' => $this->faker->numberBetween(1,5),
            'manzana' => $this->faker->numberBetween(1,5),
            'lote' => $this->faker->randomElement(['A','B','C','D']),
            'tipoVia' => $this->faker->randomElement(['AV.','Calle','Jr.','Prlg.']),
            'nombreVia' => $this->faker->address(),
            'numeroMunicipal' => $this->faker->randomNumber(3),
            'idLicencia' => $this->faker->numberBetween(1,2),
            'idSolicitud' => 1,
            "inspector_1" => $this->faker->name(),
            "inspector_2" => $this->faker->name().', '.$this->faker->name(),
            'idAreaRecepcion' => 1
        ];
    }
}
