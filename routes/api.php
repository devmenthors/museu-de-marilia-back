<?php

use App\Http\Controllers\DoadorController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\FichaRegistroController;
use App\Http\Controllers\FluxoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/public/img/{id}', [ImageController::class, 'show'])->where('id', '.*');
Route::get('/img/{id}', [ImageController::class, 'showPrivate'])->where('id', '.*');

// TODO:
// Route::get('/img/{id}', [ImageController::class, 'show'])->where('id', '.*');


// Endereços
Route::post('/endereco/create', [EnderecoController::class, 'createEndereco'])->name('endereco_create');
Route::get('/endereco/{id}', [EnderecoController::class, 'findEnderecoById'])->name('endereco_get_id');
Route::get('/enderecos', [EnderecoController::class, 'getAllEnderecos'])->name('endereco_get');

// FUNCIONARIOS

Route::post('/funcionario/create', [FuncionarioController::class, 'createFuncionario'])->name('funcionario_create');
Route::get('/funcionario/{id}', [FuncionarioController::class, 'findFuncionarioById'])->name('funcionario_get_id');
Route::get('/funcionarios', [FuncionarioController::class, 'getAllFuncionarios'])->name('funcionarios');

// DOADORES

Route::post('/doador/create', [DoadorController::class, 'createDoador'])->name('doador_create');
Route::get('/doador/{id}', [DoadorController::class, 'findDoadorById'])->name('doador_get_id');
Route::get('/doadores', [DoadorController::class, 'getAllDoadores'])->name('doadores');

// FICHA REGISTRO
Route::post('/ficha/create', [FichaRegistroController::class, 'createFichaRegistro'])->name('ficha_create');
Route::get('/ficha/{id}', [FichaRegistroController::class, 'findFichaRegistroById'])->name('ficha_get_id');
Route::get('/fichas', [FichaRegistroController::class, 'getAllFichaRegistros'])->name('fichas');


// FLUXO
Route::post('/fluxo/create', [FluxoController::class, 'createFluxo'])->name('fluxo_create');
Route::get('/fluxo/{id}', [FluxoController::class, 'findFluxoById'])->name('fluxo_get_id');
Route::get('/fluxos', [FluxoController::class, 'getAllFluxos'])->name('fluxos');