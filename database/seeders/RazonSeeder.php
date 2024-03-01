<?php

namespace Database\Seeders;

use App\Models\Razon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RazonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Razon::create([
            'razon' => 'Ausencia del la administradora o de la persoNa a quien estela designe'
        ]);
        Razon::create([
            'razon' => 'Complejidad del establecimiento objeto de inspeccion'
        ]);
        Razon::create([
            'razon' => 'Impedimientos para la verificacion de todo o parte del establecimiento objeto de inspeccion'
        ]);
        Razon::create([
            'razon' => 'Caso fortuito o caso mayor'
        ]);
        Razon::create([
            'razon' => 'Otro'
        ]);
    }
}
