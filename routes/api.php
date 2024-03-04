<?php

use App\Http\Controllers\ActualizacionFechaController;
use App\Http\Controllers\AreaRecepcionController;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\FuncionController;
use App\Http\Controllers\LicenciaController;
use App\Http\Controllers\NivelRiesgoController;
use App\Http\Controllers\ProgramacionController;
use App\Http\Controllers\ProgramacionSemanalController;
use App\Http\Controllers\RazonController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\TipoItseController;
use App\Models\programacion_semanal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::prefix('v1/controles')->group(function(){
    Route::get('/', [ControlController::class,'getAll']);
    Route::post('/', [ControlController::class,'create']);
    Route::get('/filterId/{id}', [ControlController::class,'filtroId']);
    Route::get('/filterFuncion/{idFuncion}', [ControlController::class,'filtroFuncion']);
    Route::get('/filterRazon/{nombreComercial}', [ControlController::class,'filtroRazonSocial']);
    Route::get('/filterExpediente/{expediente}', [ControlController::class,'filtroNumeroExpediente']);
    Route::get('/filterTipoItse/{tipoItse}', [ControlController::class,'filtroTipoItse']);
    Route::put('/{id}',[ControlController::class,'update']);
});
Route::prefix('v1/expedientes')->group(function(){
    Route::get('/', [ExpedienteController::class,'getAll']);
    Route::post('/', [ExpedienteController::class,'create']);
    Route::put('/{id}', [ExpedienteController::class,'update']);
});
Route::prefix('v1/programaciones')->group(function(){
    Route::get('/', [ProgramacionController::class,'getAll']);
    Route::post('/', [ProgramacionController::class,'create']);
}); 
Route::prefix('v1/programacionSemanal')->group(function(){  
    Route::post('/', [ProgramacionSemanalController::class,'create']);
    Route::get('/listadoPendientes', [ProgramacionSemanalController::class,'listPendiente']); 
    Route::get('/listadoSilencioPositivo', [ProgramacionSemanalController::class,'listSilencioPositivo']);
    Route::get('/listadoCancelados', [ProgramacionSemanalController::class,'listCancelado']);
    Route::get('/verificacionFecha',[ProgramacionSemanalController::class, 'verificacionFechas']);
    Route::patch('/updatePendiente/{id}', [ProgramacionSemanalController::class,'updatePendiente']);
    Route::patch('/updateAplazo/{id}', [ProgramacionSemanalController::class,'updateAplazoFecha']);
    Route::patch('/updateCancelar/{id}', [ProgramacionSemanalController::class,'updateCancelar']);
});
Route::prefix('v1/actualizarFecha')->group(function(){
    Route::post('/', [ActualizacionFechaController::class,'create']);
});


Route::prefix('v1/licencias')->group(function(){
    Route::get('/', [LicenciaController::class,'getAll']);
});
Route::prefix('v1/funciones')->group(function(){
    Route::get('/', [FuncionController::class,'getAll']);
});
Route::prefix('v1/recepcion')->group(function(){
    Route::get('/', [AreaRecepcionController::class,'getAll']);
});
Route::prefix('v1/riesgos')->group(function(){
    Route::get('/', [NivelRiesgoController::class,'getAll']);
});
Route::prefix('v1/solicitudes')->group(function(){
    Route::get('/', [SolicitudController::class,'getAll']);
});
Route::prefix('v1/tipoItse')->group(function(){
    Route::get('/', [TipoItseController::class,'getAll']);
});
Route::prefix('v1/razon')->group(function(){
    Route::get('/', [RazonController::class,'getAll']);
});
Route::prefix('v1/estado')->group(function(){
    Route::get('/', [EstadoController::class,'getAll']);
});

