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
            'nivel_riesgo' => ' '
        ]);
        Nivel_Riesgo::create([
            'nivel_riesgo' => 'Bajo'
        ]);
        Nivel_Riesgo::create([
            'nivel_riesgo' => 'Medio'
        ]);
        Nivel_Riesgo::create([
            'nivel_riesgo' => 'Alto'
        ]);
        Nivel_Riesgo::create([
            'nivel_riesgo' => 'Muy Alto'
        ]);
        Nivel_Riesgo::create([
            'nivel_riesgo' => 'ECSE'
        ]);
        
        
        
        
    }
}
