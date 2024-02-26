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
            $table->integer('restoDias')->nullable();
            $table->string('dias')->nullable();
            $table->string('direccion')->nullable();
            $table->string('ingeniero_1')->nullable();
            $table->string('ingeniero_2')->nullable();
            $table->char('realizado')->nullable();
            $table->date('aplazo_fecha')->nullable();
            $table->foreignId('idControl')->constrained('controls','idCont')->cascadeOnUpdate()->nullOnDelete();
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
