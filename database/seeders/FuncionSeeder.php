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
            'descripcion' => 'Encuentro'
        ]);
        Funcion::create([
            'descripcion' => 'Comercio'
        ]);
        Funcion::create([
            'descripcion' => 'Administrativa'
        ]);
        Funcion::create([
            'descripcion' => 'Almacen'
        ]);
        Funcion::create([
            'descripcion' => 'Industrial'
        ]);
        Funcion::create([
            'descripcion' => 'Educacion'
        ]);
        Funcion::create([
            'descripcion' => 'Hospedaje'
        ]);
        Funcion::create([
            'descripcion' => 'Salud'
        ]);
    }
}
