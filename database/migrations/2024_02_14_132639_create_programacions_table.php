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
        Schema::create('programacions', function (Blueprint $table) {
            $table->id('idProg');
            $table->foreignId('idControl')->constrained('constrols','idCont')->cascadeOnUpdate()->nullOnDelete();
            $table->date('firma')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->date('fechaDevolucion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programacions');
    }
};
