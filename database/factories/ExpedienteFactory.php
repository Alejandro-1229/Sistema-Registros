<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expediente>
 */
class ExpedienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ruc' => $this->faker->numberBetween(500000000,800000000),
            'idControl' => $this->faker->numberBetween(1,5000),
            'fechaIngresoMesaPartes' => $this->faker->date(),
            'fechaIngresoSGDC' => $this->faker->date(),
            'fechaRecepcionInspeccion' => $this->faker->date(),
            'recepcionLicenciaFuncionamiento' => $this->faker->date(),
            'fechaLimiteInspeccion' => $this->faker->dateTimeBetween('2024-01-01', '2024-04-30'),
            'numeroInforme' => $this->faker->unique()->regexify('[A-Z0-9]{8}'),
            'idEstado' => $this->faker->numberBetween(1,3),
            'fecha' => $this->faker->date(),
            'hora' => $this->faker->time(),
            'ILO' => $this->faker->date(),
        ];
    }
}
