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
            'razon' => 'Por ausencia del la administradora o de la persoba a quien estela designe'
        ]);
        Razon::create([
            'razon' => 'Por la complejidad del establecimiento objeto de inspeccion'
        ]);
        Razon::create([
            'razon' => 'Por existir impedimientos para la verificacion de todo o parte del establecimiento objeto de inspeccion'
        ]);
        Razon::create([
            'razon' => 'Por caso fortuito o caso mayor'
        ]);
        Razon::create([
            'razon' => 'Otro'
        ]);
    }
}
