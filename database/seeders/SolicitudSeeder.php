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
            'solicitud' => ' '
        ]);
        Solicitud::create([
            'solicitud' => 'Aprobada'
        ]);
        Solicitud::create([
            'solicitud' => 'Denegado'
        ]);
        Solicitud::create([
            'solicitud' => 'Abandonado'
        ]);
        Solicitud::create([
            'solicitud' => 'En tramite'
        ]);
        Solicitud::create([
            'solicitud' => 'Otros'
        ]);
    }
}
