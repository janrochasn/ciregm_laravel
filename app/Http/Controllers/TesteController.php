<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Atividade;

class TesteController extends Controller
{
    public function index(Request $request) {
        $id_usuario = Auth::user()->id;
        $tipo_carimbo = 'TESTES';
        date_default_timezone_set('America/Sao_Paulo');
        $data_hora = date("d/m/Y H:i:s");
        $teste_ocorrencia = $request->teste_ocorrencia;
        $teste_solicitante = $request->teste_solicitante;
        //$teste_resultado = $request->teste_resultado;
        $teste_observacao = $request->teste_observacao;

        if($request->teste_resultado == 'OK') {
            $teste_resultado = 'OK (X) NOK ( )';
        } elseif ($request->teste_resultado == 'NOK') {
            $teste_resultado = 'OK ( ) NOK (X)';
        }

        //regras de validação
        $rules = [
            'teste_ocorrencia' => 'required|max:100',
            'teste_solicitante' => 'required|max:100',
            'teste_resultado' => 'required|max:100',
            'teste_observacao' => 'max:300'
        ];

        //mensagens de validação
        $feedback = [
            'teste_ocorrencia.required' => 'O campo ocorrência deve ser preenchido.',
            'teste_solicitante.required' => 'O campo solicitante deve ser preenchido.',
            'teste_resultado.required' => 'Informar o resultado do teste.',
            'teste_ocorrencia.max' => 'O campo ocorrência deve possuir no máximo :max caracteres.',
            'teste_solicitante.max' => 'O campo solicitante deve possuir no máximo :max caracteres.',
            'teste_resultado.max' => 'Entrada inválida no campo de resultado do teste.',
            'teste_observacao.max' => 'O campo tipo observação deve possuir no máximo :max caracteres.',
        ];

        //índice acrescentado no request para inserção na coluna carimbo no banco de dados
        $carimbo = $tipo_carimbo. ' /Ocorrência: '.$teste_ocorrencia. ' /Solicitante: '.$teste_solicitante. ' /'.$teste_resultado. ' /Obs: '.$teste_observacao;

        //validação dos requests
        $request->validate($rules, $feedback);

        //instância do model atividade
        $atividade = new Atividade();

        //salvar os dados no banco de dados
        $atividade->id_usuario = $id_usuario;
        $atividade->tipo_carimbo = $tipo_carimbo;
        $atividade->data_hora = $data_hora;
        $atividade->nm_ocorrencia = $teste_ocorrencia;
        $atividade->carimbo = $carimbo;
        $atividade->save();

        //carimbo para resposta (retorno ao usuário)
        $response['carimbo'] = "#Testes\nOcorrência: $teste_ocorrencia\nSolicitante: $teste_solicitante\n$teste_resultado\nObs: $teste_observacao";

        return response()->json($response);

    }
}
