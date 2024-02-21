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
        Schema::create('tipo__itses', function (Blueprint $table) {
            $table->id('idTiIt');
            $table->string('tipo_itse');
            $table->timestamps();
            $table->index('tipo_itse');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo__itses');
    }
};
