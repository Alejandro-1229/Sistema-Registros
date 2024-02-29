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
        Schema::create('actualizacion_fechas', function (Blueprint $table) {
            $table->id(' idAcFe');
            $table->foreignId('idProgramacionSemanal')->constrained('programacion_semanals',  'idPrSe')->cascadeOnUpdate()->restrictOnDelete();
            $table->date('fechaAnterior');
            $table->date('fechaActualizada');
            $table->foreignId('idRazon')->constrained('razons', 'idRazon')->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actualizacion_fechas');
    }
};
