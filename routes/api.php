<?php

use App\Http\Controllers\DescartadoController;
use App\Http\Controllers\DoadorController;
use App\Http\Controllers\EmAnaliseController;
use App\Http\Controllers\EmprestadoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\ExposicaoController;
use App\Http\Controllers\FichaDoacaoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ReservaTecnicaController;
use Illuminate\Support\Facades\Route;

Route::get('/public/img/{id}', [ImageController::class, 'show'])->where('id', '.*');
Route::get('/img/{id}', [ImageController::class, 'showPrivate'])->where('id', '.*');

// TODO:
// Route::get('/img/{id}', [ImageController::class, 'show'])->where('id', '.*');


// Endereços
Route::prefix('enderecos')->name('enderecos.')->group(function () {
    Route::post('/endereco/create', [EnderecoController::class, 'createEndereco'])->name('endereco_create');
    Route::get('/endereco/{id}', [EnderecoController::class, 'findEnderecoById'])->name('endereco_get_id');
    Route::get('/enderecos', [EnderecoController::class, 'getAllEnderecos'])->name('endereco_get');
});

// FUNCIONARIOS CRUD

Route::prefix('funcionarios')->name('funcionarios.')->group(function () {
    Route::post('/', [FuncionarioController::class, 'createFuncionario'])->name('create');
    Route::get('/{id}', [FuncionarioController::class, 'findFuncionarioById'])->name('get_id');
    Route::get('/', [FuncionarioController::class, 'getAllFuncionarios'])->name('index');
    Route::patch('/{id}', [FuncionarioController::class, 'updateFuncionario'])->name('update');
    Route::delete('/{id}', [FuncionarioController::class, 'deleteFuncionario'])->name('delete');
});

// DOADORES

Route::prefix('doadores')->name('doadores.')->group(function () {
    Route::post('/', [DoadorController::class, 'createDoador'])->name('create');
    Route::get('/{id}', [DoadorController::class, 'findDoadorById'])->name('get_id');
    Route::get('/', [DoadorController::class, 'getAllDoadores'])->name('index');
    Route::patch('/{id}', [DoadorController::class, 'updateDoador'])->name('update');
    Route::delete('/{id}', [DoadorController::class, 'deleteDoador'])->name('delete');
});


// FICHA DOACAO
Route::prefix('fichas')->name('fichas.')->group(function () {
    Route::post('/', [FichaDoacaoController::class, 'createFichaDoacao'])->name('create');
    Route::get('/{id}', [FichaDoacaoController::class, 'findFichaDoacaoById'])->name('get_id');
    Route::get('/', [FichaDoacaoController::class, 'getAllFichas'])->name('index');
    Route::patch('/{id}', [FichaDoacaoController::class, 'updateFichaDoacao'])->name('update');
    Route::delete('/{id}', [FichaDoacaoController::class, 'deleteFichaDoacao'])->name('delete');
});

// RESERVA TECNICA

Route::prefix('reservas')->name('reservas.')->group(function () {
    Route::post('/', [ReservaTecnicaController::class, 'createReservaTecnica'])->name('create');
    Route::get('/{id}', [ReservaTecnicaController::class, 'findReservaTecnicaById'])->name('get_id');
    Route::get('/', [ReservaTecnicaController::class, 'getAllReservasTecnica'])->name('index');
    Route::patch('/{id}', [ReservaTecnicaController::class, 'updateReservaTecnica'])->name('update');
    Route::delete('/{id}', [ReservaTecnicaController::class, 'deleteReservaTecnica'])->name('delete');
});

// EM ANALISE

Route::prefix('emanalise')->name('emanalise.')->group(function () {
    Route::post('/', [EmAnaliseController::class, 'createEmAnalise'])->name('create');
    Route::get('/{id}', [EmAnaliseController::class, 'findEmAnaliseById'])->name('get_id');
    Route::get('/', [EmAnaliseController::class, 'getAllEmAnalises'])->name('index');
    Route::patch('/{id}', [EmAnaliseController::class, 'updateEmAnalise'])->name('update');
    Route::delete('/{id}', [EmAnaliseController::class, 'deleteEmAnalise'])->name('delete');
});

// EXPOSICOES

Route::prefix('exposicoes')->name('exposicoes.')->group(function () {
    Route::post('/', [ExposicaoController::class, 'createExposicao'])->name('create');
    Route::get('/{id}', [ExposicaoController::class, 'findExposicaoById'])->name('get_id');
    Route::get('/', [ExposicaoController::class, 'getAllExposicoes'])->name('index');
    Route::patch('/{id}', [ExposicaoController::class, 'updateExposicao'])->name('update');
    Route::delete('/{id}', [ExposicaoController::class, 'deleteExposicao'])->name('delete');
});

// DESCARTADOS 

Route::prefix('descartados')->name('descartados.')->group(function () {
    Route::post('/', [DescartadoController::class, 'createDescartado'])->name('create');
    Route::get('/{id}', [DescartadoController::class, 'findDescartadoById'])->name('get_id');
    Route::get('/', [DescartadoController::class, 'getAllDescartados'])->name('index');
    Route::patch('/{id}', [DescartadoController::class, 'updateDescartado'])->name('update');
    Route::delete('/{id}', [DescartadoController::class, 'deleteDescartado'])->name('delete');
});

// EMPRESTADOS

Route::prefix('emprestados')->name('emprestados.')->group(function () {
    Route::post('/', [EmprestadoController::class, 'createEmprestado'])->name('create');
    Route::get('/{id}', [EmprestadoController::class, 'findEmprestadoById'])->name('get_id');
    Route::get('/', [EmprestadoController::class, 'getAllEmprestados'])->name('index');
    Route::patch('/{id}', [EmprestadoController::class, 'updateEmprestado'])->name('update');
    Route::delete('/{id}', [EmprestadoController::class, 'deleteEmprestado'])->name('delete');
});