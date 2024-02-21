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
            'tipo_itse' => ' '
        ]);
        Tipo_Itse::create([
            'tipo_itse' => 'Previa'
        ]);
        Tipo_Itse::create([
            'tipo_itse' => 'Posterior'
        ]);
    }
}
