<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\control;
use App\Models\Expediente;
use App\Models\programacion_semanal;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(AreaRecepcionSeeder::class);
        $this->call(FuncionSeeder::class);
        $this->call(LicenciaSeeder::class);
        $this->call(NivelRiesgoSeeder::class);
        $this->call(SolicitudSeeder::class);
        $this->call(RazonSeeder::class);
        $this->call(TipoItseSeeder::class);
        $this->call(EstadoSeeder::class);

        control::factory(5000)->create();
        Expediente::factory(5000)->create();
    }
}
