<?php

namespace Database\Seeders;

use App\Models\Nivel_Riesgo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NivelRiesgoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Nivel_Riesgo::create([
            'descripcion' => 'ECSE'
        ]);
        Nivel_Riesgo::create([
            'descripcion' => 'Muy Alto'
        ]);
        Nivel_Riesgo::create([
            'descripcion' => 'Alto'
        ]);
        Nivel_Riesgo::create([
            'descripcion' => 'Medio'
        ]);
        Nivel_Riesgo::create([
            'descripcion' => 'Bajo'
        ]);
    }
}
