<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\AberturaSasController;
use App\Http\Controllers\AlteracaoSasController;
use App\Http\Controllers\AtualizacaoController;
use App\Http\Controllers\EscalonamentoController;
use App\Http\Controllers\FalhaSistemicaController;
use App\Http\Controllers\LigacaoControllerController;
use App\Http\Controllers\TesteController;

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
Route::post('/atividades/abertura-sas', [AberturaSasController::class, 'index'])->name('atividades.abertura.sas')->middleware('auth');
Route::post('/atividades/alteracao-sas', [AlteracaoSasController::class, 'index'])->name('atividades.alteracao.sas')->middleware('auth');
Route::post('/atividades/testes', [TesteController::class, 'index'])->name('atividades.testes')->middleware('auth');
Route::post('/atividades/escalonamento', [EscalonamentoController::class, 'index'])->name('atividades.escalonamento')->middleware('auth');
Route::post('/atividades/atualizacao', [AtualizacaoController::class, 'index'])->name('atividades.atualizacao')->middleware('auth');
Route::post('/atividades/ligacao', [LigacaoControllerController::class, 'index'])->name('atividades.ligacao')->middleware('auth');
Route::post('/atividades/falha-sistemica', [FalhaSistemicaController::class, 'index'])->name('atividades.falha.sistemica')->middleware('auth');
