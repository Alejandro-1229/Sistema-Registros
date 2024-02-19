<?php

namespace Database\Seeders;

use App\Models\Area_Recepcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaRecepcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Area_Recepcion::create([
            'descripcion' => 'Mesa de Partes'
        ]);
        Area_Recepcion::create([
            'descripcion' => 'Licencia'
        ]);
        Area_Recepcion::create([
            'descripcion' => 'Subgerencia'
        ]);
        Area_Recepcion::create([
            'descripcion' => 'Ingeniería'
        ]);
        Area_Recepcion::create([
            'descripcion' => 'Area Legal'
        ]);
        Area_Recepcion::create([
            'descripcion' => 'Administracion'
        ]);
    }
}
