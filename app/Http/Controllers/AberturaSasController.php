<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Atividade;

class AberturaSasController extends Controller
{
    public function index(Request $request) {
        //atribuição das variáveis aos dados do usuário/atividade/form
        $id_usuario = Auth::user()->id;
        $tipo_carimbo = 'ABERTURA';
        date_default_timezone_set('America/Sao_Paulo');
        $data_hora = date("d/m/Y H:i:s");
        $abertura_nm_ocorrencia = $request->abertura_nm_ocorrencia;
        $abertura_nm_sas = $request->abertura_nm_sas;
        $abertura_tipo_afetacao = "";
        $abertura_descricao_afetacao = $request->abertura_descricao_afetacao;
        $abertura_observacao = $request->abertura_observacao;

        if($request->abertura_tipo_afetacao == 'Parcial') {
            $abertura_tipo_afetacao = 'Total ( ) Parcial (X)';
            //regras de validação
            $rules = [
                'abertura_nm_ocorrencia' => 'required|max:100',
                'abertura_nm_sas' => 'required|max:100',
                'abertura_tipo_afetacao' => 'required|max:100',
                'abertura_descricao_afetacao' => 'required|max:100',
                'abertura_observacao' => 'max:300'
            ];
        }

        else {
            $abertura_tipo_afetacao = 'Total (X) Parcial ( )';
            //regras de validação
            $rules = [
                'abertura_nm_ocorrencia' => 'required|max:100',
                'abertura_nm_sas' => 'required|max:100',
                'abertura_tipo_afetacao' => 'required|max:100',
                'abertura_observacao' => 'max:300'
            ];
        } 

        //mensagens de validação
        $feedback = [
            'abertura_nm_ocorrencia.required' => 'O campo ocorrência deve ser preenchido.',
            'abertura_nm_sas.required' => 'O campo SAS deve ser preenchido.',
            'abertura_tipo_afetacao.required' => 'Campo de preenchimento obrigatório.',
            'abertura_tipo_afetacao.required' => 'Favor informar o tipo de afetação.',
            'abertura_descricao_afetacao.required' => 'Campo afetação é de preenchimento obrigatório.',
            'abertura_nm_ocorrencia.max' => 'O campo ocorrência deve possuir no máximo :max caracteres.',
            'abertura_nm_sas.max' => 'O campo SAS deve possuir no máximo :max caracteres.',
            'abertura_tipo_afetacao.max' => 'O campo tipo afetação deve possuir no máximo :max caracteres.',
            'abertura_descricao_afetacao.max' => 'O campo afetação deve possuir no máximo :max caracteres.',
            'abertura_observacao.max' => 'O campo observação deve possuir no máximo :max caracteres.'
        ];

        //índice acrescentado no request para inserção na coluna carimbo no banco de dados
        $carimbo = $tipo_carimbo. ' /Ocorrência: '.$abertura_nm_ocorrencia. ' /SAS: '.$abertura_nm_sas. ' /'.$abertura_tipo_afetacao. ' /Obs: '.$abertura_observacao;

        //validação dos requests
        $request->validate($rules, $feedback);

        //instância do model atividade
        $atividade = new Atividade();

        //salvar os dados no banco de dados
        $atividade->id_usuario = $id_usuario;
        $atividade->tipo_carimbo = $tipo_carimbo;
        $atividade->data_hora = $data_hora;
        $atividade->nm_ocorrencia = $abertura_nm_ocorrencia;
        $atividade->carimbo = $carimbo;
        $atividade->save();
        /*
        $atividade->save([
            'id_usuario' => $id_usuario,
            'tipo_carimbo' => $tipo_carimbo,
            'data_hora' => $data_hora,
            'nm_ocorrencia' => $abertura_nm_ocorrencia,
            'carimbo' => $carimbo
        ]);
        */

        //carimbo para resposta (retorno ao usuário)
        $response['carimbo'] = "#Abertura\nSAS: $abertura_nm_sas\n$abertura_tipo_afetacao Afetação: $abertura_descricao_afetacao\nObs: $abertura_observacao";

        return response()->json($response);
    }
}
