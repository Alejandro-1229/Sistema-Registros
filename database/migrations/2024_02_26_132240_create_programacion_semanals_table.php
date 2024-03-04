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
        Schema::create('programacion_semanals', function (Blueprint $table) {
            $table->id('idPrSe');
            $table->date('fechaInspeccion')->nullable();
            $table->string('numeroExp')->nullable();
            $table->string('funcs')->nullable();
            $table->string('local')->nullable();
            $table->string('direccion')->nullable();
            $table->string('ingeniero_1')->nullable();
            $table->string('ingeniero_2')->nullable();
            $table->foreignId('idEstado')->constrained('estados','idEsta')->cascadeOnUpdate()->restrictOnDelete();
            $table->char('realizado',1)->nullable();
            $table->foreignId('idExpediente')->constrained('expedientes','idExpe')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programacion_semanals');
    }
};
