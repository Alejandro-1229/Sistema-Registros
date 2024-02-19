<?php

namespace Database\Seeders;

use App\Models\Solicitud;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SolicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Solicitud::create([
            'descripcion' => 'Aprobada'
        ]);
        Solicitud::create([
            'descripcion' => 'Denegado'
        ]);
        Solicitud::create([
            'descripcion' => 'Abandonado'
        ]);
        Solicitud::create([
            'descripcion' => 'En tramite'
        ]);
        Solicitud::create([
            'descripcion' => 'Otros'
        ]);
    }
}
