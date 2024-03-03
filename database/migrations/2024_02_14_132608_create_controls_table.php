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
        Schema::create('controls', function (Blueprint $table) {
            $table->id('idCont');
            $table->string('numeroExpediente',10)->unique();
            $table->foreignId('idTipoItse')->constrained('tipo__itses', 'idTiIt')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('idFuncion')->constrained('funcions','idFunc')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('idNivelRiesgo')->constrained('nivel__riesgos','idNiRi')->cascadeOnUpdate()->nullOnDelete();
            $table->string('razonSocial',100);
            $table->string('nombreEstablecimiento',100)->nullable;
            $table->string('giroDelNegocio',150);
            $table->string('datosSolicitante',500);
            $table->date('fechaIngreso');
            $table->date('fechaIngresoSGDC');
            $table->string('barrio',10)->nullable();
            $table->string('nombreHabilitacionUrbana',100);
            $table->string('areaOcupada',15);
            $table->string('numeroPisos',10);
            $table->string('manzana',10)->nullable();
            $table->string('lote',10)->nullable();
            $table->string('tipoVia',20)->nullable();
            $table->string('nombreVia',200)->nullable();
            $table->string('numeroMunicipal',50);
            $table->foreignId('idLicencia')->constrained('licencias','idLice')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('idSolicitud')->constrained('solicituds','idEsSo')->cascadeOnUpdate()->nullOnDelete();
            $table->date('fechaResolucion')->nullable();
            $table->string('numeroResolucion',20)->nullable();
            $table->string('numeroCertificado',20)->nullable();
            $table->date('vigenciaCertificado')->nullable();
            $table->string('inspector_1',150)->nullable();
            $table->string('inspector_2',400)->nullable();
            $table->date('fechaInspeccion_1')->nullable();
            $table->date('fechaInspeccion_2')->nullable();
            $table->date('fechaInspeccion_3')->nullable();
            $table->date('fechaInspeccionIlo')->nullable();
            $table->date('fechaDevolucion_1')->nullable();
            $table->date('fechaDevolucion_2')->nullable();
            $table->string('numeroObservaciones',50)->nullable();
            $table->foreignId('idAreaRecepcion')->constrained('area_recepcions','idArRe')->cascadeOnUpdate()->nullOnDelete();
            $table->decimal('pagoDerechoInspeccion')->nullable();
            $table->timestamps();
        });

       // DB::statement('CREATE INDEX filtros_busqueda ON chapters (idFuncion, idTipoItse, razonSocial, nombreEstablecimiento, numeroExpediente);');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controls');
    }
};
