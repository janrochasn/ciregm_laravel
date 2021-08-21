<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AtividadeController extends Controller
{
    public function index() {
        return view('app.atividades');
    }

    public function aberturaSas() {
        
        $teste['resposta'] = 'Requisição feita com sucesso';
        echo json_encode($teste);
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
