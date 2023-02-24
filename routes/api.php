<?php

use App\Http\Controllers\Api\ClienteController as ApiClienteController;
use App\Http\Controllers\ClienteController;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
//Route::resource('clientes', ClienteController::class);
Route::get('/clientes', [ClienteController::class, 'getAllClientes']);
//Route::get('/adicioanar', [ClienteController::class, 'create']);
Route::post('/adicionar', [ClienteController::class, 'createCliente']);
Route::get('/editar/{id}', [ClienteController::class, 'editCliente']);
Route::put('/atualizar/{id}', [ClienteController::class, 'updateCliente']);
Route::delete('/clientes/{id}', [ClienteController::class, 'deleteCliente']);
*/
/*
Route::group([
    'prefix' => 'v1'
], function() {
    Route::apiResource('clientes', ApiClienteController::class);
});
*/