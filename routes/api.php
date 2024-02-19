<?php

use App\Http\Controllers\ControlController;
use App\Http\Controllers\FuncionController;
use App\Http\Controllers\LicenciaController;
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

Route::prefix('v1/control')->group(function(){
    Route::get('/', [ControlController::class,'getAll']);
    Route::post('/', [ControlController::class,'create']);
});

Route::prefix('v1/licencia')->group(function(){
    Route::get('/', [LicenciaController::class,'getAll']);
});

Route::prefix('v1/funcion')->group(function(){
    Route::get('/', [FuncionController::class,'getAll']);
});
