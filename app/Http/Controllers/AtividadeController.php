<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AtividadeController extends Controller
{
    public function index() {
        return view('app.atividades');
    }

    public function aberturaSas(Request $request) {

        $id_usuario = Auth::user()->id;
        $tipo_carimbo = 'ABERTURA';
        date_default_timezone_set('America/Sao_Paulo');
        $data_hora = date("d/m/Y H:i:s");


        $rules = [
            '',
        ];

        $feedback = [
            '',
        ];


        //echo json_encode($request->all());
        return response()->json($request->all());
    }

    public function alteracaoSas() {
        return 'Abertura Sas';
    }

    public function testes() {
        return 'Abertura Sas';
    }

    public function escalonamento() {
        return 'Abertura Sas';
    }

    public function atualizacao() {
        return 'Abertura Sas';
    }

    public function ligacao() {
        return 'Abertura Sas';
    }

    public function falhaSistemica() {
        return 'Abertura Sas';
    }
}
