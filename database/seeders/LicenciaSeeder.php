<?php

namespace Database\Seeders;

use App\Models\Licencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LicenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Licencia::create([
            'activo' => true
        ]);
        Licencia::create([
            'activo' => false
        ]);
    }
}
