<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AtividadeController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/atividades', [AtividadeController::class, 'index'])->name('atividades.index')->middleware('auth');
Route::post('/atividades/abertura-sas', [AtividadeController::class, 'aberturaSas'])->name('atividades.abertura.sas');
Route::post('/atividades/alteracao-sas', [AtividadeController::class, 'alteracaoSas'])->name('atividades.alteracao.sas')->middleware('auth');
Route::post('/atividades/testes', [AtividadeController::class, 'testes'])->name('atividades.testes')->middleware('auth');
Route::post('/atividades/escalonamento', [AtividadeController::class, 'escalonamento'])->name('atividades.escalonamento')->middleware('auth');
Route::post('/atividades/atualizacao', [AtividadeController::class, 'atualizacao'])->name('atividades.atualizacao')->middleware('auth');
Route::post('/atividades/ligacao', [AtividadeController::class, 'ligacao'])->name('atividades.ligacao')->middleware('auth');
Route::post('/atividades/falha-sistemica', [AtividadeController::class, 'falhaSistemica'])->name('atividades.falha.sistemica')->middleware('auth');
