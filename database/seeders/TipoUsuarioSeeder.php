<?php

namespace Database\Seeders;

use App\Models\TipoUsuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TipoUsuario::create([
            'tipoUsuario' => 'Ingeniero'
        ]);
        TipoUsuario::create([
            'tipoUsuario' => 'Administrador'
        ]);
    }
}
