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
        Schema::create('solencio_positivos', function (Blueprint $table) {
            $table->id('idSiPo');
            $table->string('encargado');
            $table->date('fecha establecida');
            $table->date('reestablecer_fecha');
            $table->char('cancelar_inspeccion');
            $table->foreignId('idProgramacionSemanal')->constrained('programacion_semanals','idPrSe')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solencio_positivos');
    }
};
