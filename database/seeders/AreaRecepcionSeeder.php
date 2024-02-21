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
            'area' => ' '
        ]);
        Area_Recepcion::create([
            'area' => 'Mesa de Partes'
        ]);
        Area_Recepcion::create([
            'area' => 'Licencia'
        ]);
        Area_Recepcion::create([
            'area' => 'Subgerencia'
        ]);
        Area_Recepcion::create([
            'area' => 'Ingeniería'
        ]);
        Area_Recepcion::create([
            'area' => 'Area Legal'
        ]);
        Area_Recepcion::create([
            'area' => 'Administracion'
        ]);
    }
}
