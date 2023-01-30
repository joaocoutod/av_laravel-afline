<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\Ordem_servicoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//HOME
Route::get('/', [Ordem_servicoController::class, 'index']);
Route::post('/solicita/inserir', [Ordem_servicoController::class, 'inserir']);
Route::get('/solicita/delete/{id}', [Ordem_servicoController::class, 'delete']);

//CLIENTES
Route::get('/clientes', [ClienteController::class, 'index']);
Route::post('/clientes/inserir', [ClienteController::class, 'insert']);
Route::post('/clientes/update', [ClienteController::class, 'update']);
Route::get('/clientes/delete/{id}', [ClienteController::class, 'delete']);

//SERVICOS
Route::get('/servicos', [ServicoController::class, 'index']);
Route::post('/servicos/inserir', [ServicoController::class, 'insert']);
Route::post('/servicos/update', [ServicoController::class, 'update']);
Route::get('/servicos/delete/{id}', [ServicoController::class, 'delete']);