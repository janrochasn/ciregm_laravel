<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Atividade;

class AlteracaoSasController extends Controller
{
    public function index(Request $request) {
        $id_usuario = Auth::user()->id;
        $tipo_carimbo = 'ALTERACAO';
        date_default_timezone_set('America/Sao_Paulo');
        $data_hora = date("d/m/Y H:i:s");
        $alteracao_nm_ocorrencia = $request->alteracao_nm_ocorrencia;
        $alteracao_nm_sas = $request->alteracao_nm_sas;
        $alteracao_tipo_afetacao = "";
        $alteracao_descricao_afetacao = $request->alteracao_descricao_afetacao;
        $alteracao_observacao = $request->alteracao_observacao;

        if($request->alteracao_tipo_afetacao == 'Parcial') {
            $alteracao_tipo_afetacao = 'Total ( ) Parcial (X)';
            //regras de validação
            $rules = [
                'alteracao_nm_ocorrencia' => 'required|max:100',
                'alteracao_nm_sas' => 'required|max:100',
                'alteracao_tipo_afetacao' => 'required|max:100',
                'alteracao_descricao_afetacao' => 'required|max:100',
                'alteracao_observacao' => 'max:300'
            ];
        }

        else {
            $alteracao_tipo_afetacao = 'Total (X) Parcial ( )';
            //regras de validação
            $rules = [
                'alteracao_nm_ocorrencia' => 'required|max:100',
                'alteracao_nm_sas' => 'required|max:100',
                'alteracao_tipo_afetacao' => 'required|max:100',
                'alteracao_observacao' => 'max:300'
            ];
        } 

        //mensagens de validação
        $feedback = [
            'alteracao_nm_ocorrencia.required' => 'O campo ocorrência deve ser preenchido.',
            'alteracao_nm_sas.required' => 'O campo SAS deve ser preenchido.',
            'alteracao_tipo_afetacao.required' => 'Campo de preenchimento obrigatório.',
            'alteracao_tipo_afetacao.required' => 'Favor informar o tipo de afetação.',
            'alteracao_descricao_afetacao.required' => 'Campo afetação é de preenchimento obrigatório.',
            'alteracao_nm_ocorrencia.max' => 'O campo ocorrência deve possuir no máximo :max caracteres.',
            'alteracao_nm_sas.max' => 'O campo SAS deve possuir no máximo :max caracteres.',
            'alteracao_tipo_afetacao.max' => 'O campo tipo afetação deve possuir no máximo :max caracteres.',
            'alteracao_descricao_afetacao.max' => 'O campo afetação deve possuir no máximo :max caracteres.',
            'alteracao_observacao.max' => 'O campo observação deve possuir no máximo :max caracteres.'
        ];

        //índice acrescentado no request para inserção na coluna carimbo no banco de dados
        $carimbo = $tipo_carimbo. ' /Ocorrência: '.$alteracao_nm_ocorrencia. ' /SAS: '.$alteracao_nm_sas. ' /'.$alteracao_tipo_afetacao. ' /Obs: '.$alteracao_observacao;

        //validação dos requests
        $request->validate($rules, $feedback);

        //instância do model atividade
        $atividade = new Atividade();

        //salvar os dados no banco de dados
        $atividade->id_usuario = $id_usuario;
        $atividade->tipo_carimbo = $tipo_carimbo;
        $atividade->data_hora = $data_hora;
        $atividade->nm_ocorrencia = $alteracao_nm_ocorrencia;
        $atividade->carimbo = $carimbo;
        $atividade->save();
        /*
        $atividade->save([
            'id_usuario' => $id_usuario,
            'tipo_carimbo' => $tipo_carimbo,
            'data_hora' => $data_hora,
            'nm_ocorrencia' => $alteracao_nm_ocorrencia,
            'carimbo' => $carimbo
        ]);
        */

        //carimbo para resposta (retorno ao usuário)
        $response['carimbo'] = "#Alteração SAS\nSAS: $alteracao_nm_sas\n$alteracao_tipo_afetacao Afetação: $alteracao_descricao_afetacao\nObs: $alteracao_observacao";

        return response()->json($response);
    }
}
