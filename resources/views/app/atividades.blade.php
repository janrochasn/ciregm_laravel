@extends('layout.basico_atividades')
@section('title', 'CIREGM')

@section('content')

    <header>
        <nav class="navbar navbar-expand-sm navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-target">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav-target">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link">{{ Auth::user()->nome_usuario }}</a>
                    </li>
                    <li class="nav-item">
                        <a href='javascript:logout.submit()' class="nav-link">Sair</a>
                        <form name='logout' method="post" action='{{ route('logout') }}'>
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <center>
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <div class="box-botoes col align-self-center">
                        <button type="button" style="min-width:150px;" class="btn botao" data-toggle="modal"
                            data-target="#modalAberturaSAS">Abertura SAS</button>
                        <br>
                        <br>
                        <button type="button" style="min-width:150px;" class="btn botao" data-toggle="modal"
                            data-target="#modalAlteracaoSAS">Alteração SAS</button>
                        <br>
                        <br>
                        <button type="button" style="min-width:150px;" class="btn botao" data-toggle="modal"
                            data-target="#modalTestes">Testes</button>
                        <br>
                        <br>
                        <button type="button" style="min-width:150px;" class="btn botao" data-toggle="modal"
                            data-target="#modalEscalonamento">Escalonamento</button>
                        <br>
                        <br>
                        <button type="button" style="min-width:150px;" class="btn botao" data-toggle="modal"
                            data-target="#modalAtualizacao">Atualização</button>
                        <br>
                        <br>
                        <button type="button" style="min-width:150px;" class="btn botao" data-toggle="modal"
                            data-target="#modalLigacao">Ligação</button>
                        <br>
                        <br>
                        <button type="button" style="min-width:150px;" class="btn botao" data-toggle="modal"
                            data-target="#modalFalhaSistemica">Falha Sistêmica</button>
                        <br>
                        <br>
                        @if (Auth::user()->nivel == 'adm')
                            <a href="dash.php" type="button" style="min-width:150px;" class="btn botao">Dashboard</a>
                        @endif
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </center>

    <!-- Modal Carimbo de Abertura -->
    <div class="modal fade" id="modalAberturaSAS" tabindex="-1" role="dialog" aria-labelledby="modalAberturaSASLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header fundo">
                    <h5 class="modal-title" id="modalAberturaSASlLabel">Abertura SAS</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body fundo">
                    <form id="form_carimbo_abertura" method="post">
                        @csrf
                        <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="tipo_carimbo" value="ABERTURA">
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="ocorrencia_abertura_sas">Ocorrência:&nbsp;</label>
                            <input type="text" name="abertura_nm_ocorrencia" id="ocorrencia_abertura_sas"
                                class="form-control" style="min-width:215px;" required>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="abertura-sas">SAS:</label>
                            <input type="text" name="abertura_nm_sas" id="abertura-sas" class="form-control"
                                style="min-width:215px;" required>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo"></label>
                            <label class="form-check-label" for="abertura-total">Total&nbsp;</label>
                            <input class="form-check-input" type="radio" name="abertura_tipo_afetacao"
                                value="Total (X) Parcial ( )" id="abertura-total" required>
                            &nbsp &nbsp
                            <label class="form-check-label" for="abertura-parcial">Parcial&nbsp;</label>
                            <input class="form-check-input" type="radio" name="abertura_tipo_afetacao"
                                value="Total ( ) Parcial (X)" id="abertura-parcial" required>
                        </div>
                        <div class="form-group form-inline" id="input-abertura-descricao-afetacao" style="display:none;">
                            <label class="itensFormCarimbo" for="abertura-afetacao">Afetação:</label>
                            <input type="text" name="abertura_descricao_afetacao" id="abertura-afetacao"
                                class="form-control" style="min-width:215px;">
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="abertura-observacao">Obs:</label>
                            <textarea name="abertura_observacao" id="abertura-observacao" cols="25" rows="2"
                                class="form-control"></textarea>
                        </div>
                        <div class="form-group form-inline d-flex justify-content-center">
                            <input type="submit" id="btnGerarCarimboAbertura" class="btn btn-success" value="Gerar Carimbo">
                            &nbsp;&nbsp;&nbsp;
                            <input type="reset" id="btnResetFormCarimboAbertura" class="btn btn-danger"
                                value="Limpar Campos">
                        </div>
                    </form>
                    <div id="divCarimboAberturaGerado" class="form-group form-inline justify-content-center"
                        style="display:none;">
                        <textarea id="carimbo_abertura_gerado" rows="5" cols="40" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer fundo">
                    <button type="button" class="btn botao" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim do Modal Carimbo de Abertura -->

    <!-- Modal Carimbo de Alteração -->
    <div class="modal fade" id="modalAlteracaoSAS" tabindex="-1" role="dialog" aria-labelledby="modalAlteracaoSASLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header fundo">
                    <h5 class="modal-title" id="modalAlteracaoSASlLabel">Alteração SAS</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body fundo">
                    <form id="form_carimbo_alteracao" method="post">
                        @csrf
                        <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="tipo_carimbo" value="ALTERACAO">
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="ocorrencia_alteracao_sas">Ocorrência:&nbsp;</label>
                            <input type="text" name="alteracao_nm_ocorrencia" id="ocorrencia_alteracao_sas"
                                class="form-control" style="min-width:215px;" required>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="alteracao-sas">SAS:</label>
                            <input type="text" name="alteracao_nm_sas" id="alteracao-sas" class="form-control"
                                style="min-width:215px;" required>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="alteracao-solicitante">Solicitante:&nbsp;</label>
                            <input type="text" name="alteracao_solicitante" id="alteracao-solicitante" class="form-control"
                                style="min-width:215px;">
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo"></label>
                            <label for="alteracao-total">Total&nbsp;</label>
                            <input type="radio" name="alteracao_tipo_afetacao" value="Total (X) Parcial ( )"
                                id="alteracao-total" required>
                            &nbsp &nbsp
                            <label for="alteracao-parcial">Parcial&nbsp;</label>
                            <input type="radio" name="alteracao_tipo_afetacao" value="Total ( ) Parcial (X)"
                                id="alteracao-parcial" required>
                        </div>
                        <div class="form-group form-inline" id="input-alteracao-descricao-afetacao" style="display:none;">
                            <label class="itensFormCarimbo" for="alteracao-afetacao">Afetação:</label>
                            <input type="text" name="alteracao_descricao_afetacao" id="alteracao-afetacao"
                                class="form-control" style="min-width:215px;">
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="alteracao-observacao">Obs:</label>
                            <textarea name="alteracao_observacao" id="alteracao-observacao" cols="25" rows="2"
                                class="form-control"></textarea>
                        </div>
                        <div class="form-group form-inline d-flex justify-content-center">
                            <input type="submit" id="btnGerarCarimboAlteracao" class="btn btn-success"
                                value="Gerar Carimbo">
                            &nbsp;&nbsp;&nbsp;
                            <input type="reset" id="btnResetFormAlteracao" class="btn btn-danger" value="Limpar Campos">
                        </div>

                    </form>
                    <div id="divCarimboAlteracaoGerado" class="form-group form-inline justify-content-center"
                        style="display:none;">
                        <textarea id="carimbo_alteracao_gerado" rows="5" cols="40" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer fundo">
                    <button type="button" class="btn botao" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim do Modal do Carimbo de Alteração -->

    <!-- Modal Carimbo de Teste -->
    <div class="modal fade" id="modalTestes" tabindex=" -1" role="dialog" aria-labelledby="modalTestesLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header fundo">
                    <h5 class="modal-title" id="modalTestesLabel">Testes</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body fundo">
                    <form id="form_carimbo_testes" method="post">
                        @csrf
                        <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="tipo_carimbo" value="TESTES">
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="teste_ocorrencia">Ocorrência:&nbsp;&nbsp;</label>
                            <input class="form-control" type="text" name="teste_ocorrencia" id="teste_ocorrencia"
                                style="min-width:215px;" required>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="teste-solicitante">Solicitante:&nbsp;</label>
                            <input class="form-control" type="text" name="teste_solicitante" id="teste-solicitante"
                                style="min-width:215px;" required>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo"></label>
                            <label for="teste-ok">OK&nbsp;</label>
                            <input type="radio" name="teste_resultado" value="OK (X) NOK ( )" id="teste-ok" required>
                            &nbsp &nbsp
                            <label for="teste-nok">NOK&nbsp;</label>
                            <input type="radio" name="teste_resultado" value="OK ( ) NOK (X)" id="teste-nok" required>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="teste-observacao">Obs:</label>
                            <textarea name="teste_observacao" id="teste-observacao" cols="25" rows="2"
                                class="form-control"></textarea>
                        </div>
                        <div class="form-group form-inline d-flex justify-content-center">
                            <input type="submit" id="btnGerarCarimboTestes" class="btn btn-success" value="Gerar Carimbo">
                            &nbsp;&nbsp;&nbsp;
                            <input type="reset" id="btnResetFormTestes" class="btn btn-danger" value="Limpar Campos">
                        </div>
                    </form>
                    <div id="divCarimboTestesGerado" class="form-group form-inline justify-content-center"
                        style="display:none;">
                        <textarea id="carimbo_testes_gerado" rows="5" cols="40" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer fundo">
                    <button type="button" class="btn botao" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim do Modal Carimbo de Teste -->

    <!-- Modal Carimbo de Escalonamento -->
    <div class="modal fade" id="modalEscalonamento" tabindex=" -1" role="dialog" aria-labelledby="modalEscalonamentoLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header fundo">
                    <h5 class="modal-title" id="modalEscalonamentoLabel">Escalonamento</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body fundo">
                    <form id="form_carimbo_escalonamento" method="post">
                        @csrf
                        <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="tipo_carimbo" value="ESCALONAMENTO">
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="escalonamento_ocorrencia">Ocorrência:&nbsp;&nbsp;</label>
                            <input class="form-control" type="text" name="escalonamento_ocorrencia"
                                id="escalonamento_ocorrencia" style="min-width:215px;" required>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="escalonamento_nivel">Nível: &nbsp;</label>
                            <select id="escalonamento_nivel" name="escalonamento_nivel" class="form-control"
                                style="min-width:215px" required>
                                <option value="">Nível</option>
                                <option name="escalonamento_nivel" value="N1">N1</option>';
                                <option name="escalonamento_nivel" value="N2">N2</option>';
                                <option name="escalonamento_nivel" value="N3">N3</option>';
                                <option name="escalonamento_nivel" value="N4">N4</option>';
                                <option name="escalonamento_nivel" value="N5">N5</option>';
                                <option name="escalonamento_nivel" value="N6">N6</option>';
                            </select>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="escalonamento_motivo">Motivo: &nbsp;</label>
                            <select class="form-control" id="escalonamento_motivo" name="escalonamento_motivo"
                                style="min-width:215px;" required>
                                <option value="">Motivo</option>
                                <option name="escalonamento_motivo" value="Atualização">Atualização</option>';
                                <option name="escalonamento_motivo" value="Sem Equipe">Sem Equipe</option>';
                                <option name="escalonamento_motivo" value="SLA">SLA</option>';
                            </select>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="escalonamento_nome">Nome:</label>
                            <input class="form-control" type="text" name="escalonamento_nome" id="escalonamento_nome"
                                style="min-width:215px;" required>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="escalonamento_contato">Contato:</label>
                            <input class="form-control" type="text" name="escalonamento_contato" id="escalonamento_contato"
                                style="min-width:215px;" required>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="escalonamento_observacao">Obs:</label>
                            <textarea name="escalonamento_observacao" id="escalonamento_observacao" cols="25" rows="2"
                                class="form-control"></textarea>
                        </div>
                        <div class="form-group form-inline d-flex justify-content-center">
                            <input type="submit" id="btnGerarCarimboEscalonamento" class="btn btn-success"
                                value="Gerar Carimbo">
                            &nbsp;&nbsp;&nbsp;
                            <input type="reset" id="btnResetFormEscalonamento" class="btn btn-danger" value="Limpar Campos">
                        </div>
                    </form>
                    <div id="divCarimboEscalonamentoGerado" class="form-group form-inline justify-content-center"
                        style="display:none;">
                        <textarea id="carimbo_escalonamento_gerado" rows="5" cols="40" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer fundo">
                    <button type="button" class="btn botao" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim do Modal Carimbo de Escalonamento -->

    <!-- Modal Carimbo de Atualização -->
    <div class="modal fade" id="modalAtualizacao" tabindex=" -1" role="dialog" aria-labelledby="modalAtualizacaoLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header fundo">
                    <h5 class="modal-title" id="modalAtualizacaoLabel">Atualização</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body fundo">
                    <form id="form_carimbo_atualizacao" method="post">
                        @csrf
                        <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="tipo_carimbo" value="ATUALIZACAO">
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="atualizacao_ocorrencia">Ocorrência:</label>&nbsp;&nbsp;
                            <input class="form-control" type="text" name="atualizacao_ocorrencia"
                                id="atualizacao_ocorrencia" style="min-width:215px;" required>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="atualizacao_responsavel">Responsável:</label>&nbsp;&nbsp;
                            <input class="form-control" type="text" name="atualizacao_responsavel"
                                id="atualizacao_responsavel" style="min-width:215px;" required>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="atualizacao_contato">Contato:</label>&nbsp;&nbsp;
                            <input class="form-control" type="text" name="atualizacao_contato" id="atualizacao_contato"
                                style="min-width:215px;" required>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="atualizacao_observacao">Obs:</label>&nbsp;&nbsp;
                            <textarea name="atualizacao_observacao" id="atualizacao_observacao" cols="25" rows="2"
                                class="form-control"></textarea>
                        </div>
                        <div class="form-group form-inline d-flex justify-content-center">
                            <input type="submit" id="btnGerarCarimboAtualizacao" class="btn btn-success"
                                value="Gerar Carimbo">
                            &nbsp;&nbsp;&nbsp;
                            <input type="reset" id="btnResetFormAtualizacao" class="btn btn-danger" value="Limpar Campos">
                        </div>
                    </form>
                    <div id="divCarimboAtualizacaoGerado" class="form-group form-inline justify-content-center"
                        style="display:none;">
                        <textarea id="carimbo_atualizacao_gerado" rows="5" cols="40" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer fundo">
                    <button type="button" class="btn botao" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim do Modal Carimbo de Atualização -->

    <!-- Modal Carimbo de Ligação -->
    <div class="modal fade" id="modalLigacao" tabindex=" -1" role="dialog" aria-labelledby="modalLigacaoLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header fundo">
                    <h5 class="modal-title" id="modalLigacaoLabel">Ligação</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body fundo">
                    <form id="form_carimbo_ligacao" method="post">
                        @csrf
                        <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="tipo_carimbo" value="LIGACAO">
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="ligacao_ocorrencia">Ocorrência:&nbsp;&nbsp;</label>
                            <input class="form-control" type="text" name="ligacao_ocorrencia" id="ligacao_ocorrencia"
                                style="min-width:215px;" required>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo"></label>
                            <label for="ligacao-devida">Devida&nbsp;</label>
                            <input type="radio" name="ligacao_indevida" value="Devida (X) Indevida ( )" id="ligacao-devida"
                                required>
                            &nbsp &nbsp
                            <label for="ligacao-indevida">Indevida&nbsp;</label>
                            <input type="radio" name="ligacao_indevida" value="Devida ( ) Indevida (X)"
                                id="ligacao-indevida" required>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="ligacao_motivo">Motivo: &nbsp;</label>
                            <select id="ligacao_motivo" name="ligacao_motivo" class="form-control" style="min-width:215px;"
                                required>
                                <option value="">Motivo da ligação</option>
                                <option name="ligacao_motivo" value="Informação">Informação</option>';
                                <option name="ligacao_motivo" value="Reclamação">Reclamação</option>';
                                <option name="ligacao_motivo" value="Escalonamento">Escalonamento</option>';
                                <option name="ligacao_motivo" value="Retorno de testes">Retorno de testes</option>';
                                <option name="ligacao_motivo" value="Falha sistêmica">Falha sistêmica</option>';
                            </select>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="ligacao_nome">Nome:</label>
                            <input class="form-control" type="text" name="ligacao_nome" id="ligacao_nome"
                                style="min-width: 215px;" required>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="ligacao_setor">Setor:</label>
                            <input class="form-control" type="text" name="ligacao_setor" id="ligacao_setor"
                                style="min-width: 215px;">
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="ligacao_obs">Obs:</label> <br>
                            <textarea class="form-control" name="ligacao_obs" id="ligacao_obs" cols="25"
                                rows="2"></textarea>
                        </div>
                        <div class="form-group form-inline d-flex justify-content-center">
                            <input type="submit" id="btnGerarCarimboLigacao" class="btn btn-success" value="Gerar Carimbo">
                            &nbsp;&nbsp;&nbsp;
                            <input type="reset" id="btnResetFormLigacao" class="btn btn-danger" value="Limpar Campos">
                        </div>
                    </form>
                    <div id="divCarimboLigacaoGerado" class="form-group form-inline justify-content-center"
                        style="display:none;">
                        <textarea id="carimbo_ligacao_gerado" rows="6" cols="40" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer fundo">
                    <button type="button" class="btn botao" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim do Modal Carimbo de Ligação -->

    <!-- Modal Carimbo de Falha Sistêmica -->
    <div class="modal fade" id="modalFalhaSistemica" tabindex="-1" role="dialog" aria-labelledby="modalFalhaSistemicaLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header fundo">
                    <h5 class="modal-title" id="modalFalhaSistemicaLabel">Falha Sistêmica</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body fundo">
                    <form id="form_carimbo_falha_sistemica" method="post">
                        @csrf
                        <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="tipo_carimbo" value="FALHA SISTEMICA">
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="falha_sistemica_ocorrencia">Ocorrência:&nbsp;&nbsp;</label>
                            <input class="form-control" type="text" name="falha_sistemica_ocorrencia"
                                id="falha_sistemica_ocorrencia" style="min-width:215px;" required>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="falha_sistemica_protocolo">Protocolo:&nbsp;&nbsp;</label>
                            <input type="text" name="falha_sistemica_protocolo" id="falha_sistemica_protocolo"
                                class="form-control" style="min-width:215px;">
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="falha_sistemica_ferramenta">Ferramenta:&nbsp;&nbsp;</label>
                            <input type="text" name="falha_sistemica_ferramenta" id="falha_sistemica_ferramenta"
                                class="form-control" style="min-width:215px;" required>
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="falha_sistemica_descricao">Descrição:&nbsp;&nbsp;</label>
                            <select id="falha_sistemica_descricao" name="falha_sistemica_descricao" class="form-control"
                                style="min-width:215px;" required>
                                <option value="">Descrição da Falha</option>
                                <option name="falha_sistemica_descricao" value="Inoperante">Inoperante</option>';
                                <option name="falha_sistemica_descricao" value="Lentidão">Lentidão</option>';
                                <option name="falha_sistemica_descricao" value="Quedas">Quedas</option>';
                                <option name="falha_sistemica_descricao" value="Erro na Interface">Erro na Interface
                                </option>';
                            </select>
                        </div>
                        <div class="form-group form-inline" id="input-abertura-descricao-afetacao">
                            <label class="itensFormCarimbo" for="falha_sistemica_inicio">Início:&nbsp;&nbsp;</label>
                            <input type="text" name="falha_sistemica_inicio" id="falha_sistemica_inicio"
                                class="form-control" style="min-width:215px;">
                        </div>
                        <div class="form-group form-inline">
                            <label class="itensFormCarimbo" for="falha_sistemica_observacao">Obs:&nbsp;&nbsp;</label>
                            <br>
                            <textarea name="falha_sistemica_observacao" id="falha_sistemica_observacao" cols="25" rows="2"
                                class="form-control"></textarea>
                        </div>
                        <div class="form-group form-inline d-flex justify-content-center">
                            <input type="submit" id="btnGerarCarimboFalhaSistemica" class="btn btn-success"
                                value="Gerar Carimbo">
                            &nbsp;&nbsp;&nbsp;
                            <input type="reset" id="btnResetFormCarimboFalhaSistemica" class="btn btn-danger"
                                value="Limpar Campos">
                        </div>
                    </form>
                    <div id="divCarimboFalhaSistemicaGerado" class="form-group form-inline justify-content-center"
                        style="display:none;">
                        <textarea id="carimbo_falha_sistemica_gerado" rows="7" cols="40" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer fundo">
                    <button type="button" class="btn botao" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim do Modal Carimbo de Falha Sistêmica -->

    <div class='contente'></div>

    <script src="{{ asset('js/jquery.js') }}" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script>
        //Abertura
        $('#abertura-parcial').click(function() {
            if ($('#abertura-parcial').prop('checked')) {
                $('#input-abertura-descricao-afetacao').show();
            };
        });

        $('#abertura-total').click(function() {
            if ($('#abertura-total').prop('checked')) {
                $('#input-abertura-descricao-afetacao').hide();
            };
        });

        $("#form_carimbo_abertura").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "{{ route('atividades.abertura.sas') }}",
                dataType: "json",
                data: $(this).serialize(),

                success: function(request) {
                    console.log(request);
                },

                error: function(error) {
                    console.log(error)
                }

            });
        });
        //Fim Abertura
    </script>
@endsection
