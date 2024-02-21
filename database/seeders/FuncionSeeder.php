<?php

namespace Database\Seeders;

use App\Models\Funcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuncionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //encuentro,comercio,administrativa,almacen,industrial,educacion,hospedaje y salud
        Funcion::create([
            'funcion' => ''
        ]);
        Funcion::create([
            'funcion' => 'Encuentro'
        ]);
        Funcion::create([
            'funcion' => 'Comercio'
        ]);
        Funcion::create([
            'funcion' => 'Administrativa'
        ]);
        Funcion::create([
            'funcion' => 'Almacen'
        ]);
        Funcion::create([
            'funcion' => 'Industrial'
        ]);
        Funcion::create([
            'funcion' => 'Educacion'
        ]);
        Funcion::create([
            'funcion' => 'Hospedaje'
        ]);
        Funcion::create([
            'funcion' => 'Salud'
        ]);
    }
}
