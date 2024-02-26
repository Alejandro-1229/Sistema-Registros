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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id('idExpe');
            $table->string('ruc',15)->nullable();
            $table->foreignId('idControl')->constrained('controls','idCont')->cascadeOnUpdate()->nullOnDelete();
            $table->date('fechaIngresoMesaPartes')->nullable();
            $table->date('fechaIngresoSGDC')->nullable(); 
            $table->date('fechaRecepcionInspeccion')->nullable();
            $table->date('recepcionLicenciaFuncionamiento')->nullable();
            $table->date('fechaLimiteInspeccion')->nullable();
            $table->string('numeroInforme',10)->nullable();
            $table->boolean('estado')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->date('ILO')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
