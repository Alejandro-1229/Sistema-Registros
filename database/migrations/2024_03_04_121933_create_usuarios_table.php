<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('idUsua');
            $table->string('codUsuario',10);
            $table->string('password',150);
            $table->foreignId('idEmpleado')->constrained('empleados','idEmpl')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('idTipoUsuario')->constrained('tipo_usuarios','idTiUs')->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
