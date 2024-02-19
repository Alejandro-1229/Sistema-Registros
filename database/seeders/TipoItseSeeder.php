<?php

namespace Database\Seeders;

use App\Models\Tipo_Itse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoItseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Tipo_Itse::create([
            'descripcion' => 'Previa'
        ]);
        Tipo_Itse::create([
            'descripcion' => 'Posterior'
        ]);
    }
}
