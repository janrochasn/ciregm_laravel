//Alteração
$('#alteracao-parcial').click(function () {
    if ($('#alteracao-parcial').prop('checked')) {
        $('#input-alteracao-descricao-afetacao').show();
    };
});
$('#alteracao-total').click(function () {
    if ($('#alteracao-total').prop('checked')) {
        $('#input-alteracao-descricao-afetacao').hide();
    };
});
$("#form_carimbo_alteracao").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "carimbo_alteracao.php",
        dataType: "json",
        data: $(this).serialize(),
        beforeSend: function () {
            $("#btnGerarCarimboAlteracao").hide();
            $('#divCarimboAlteracaoGerado').show();
            $('#carimbo_alteracao_gerado').html('Aguarde enquanto o seu carimbo é gerado...');
        },
        success: function (data) {
            $('#carimbo_alteracao_gerado').empty();
            $('#carimbo_alteracao_gerado').html(data.carimbo);
            $("#btnGerarCarimboAlteracao").show();
            $("#form_carimbo_alteracao").trigger("reset");
            $('#input-alteracao-descricao-afetacao').hide();
        },
        error: function (error) {
            console.log(error)
        }
    });
});
$(document).on('click', '#form_carimbo_alteracao', function (e) {
    $('#divCarimboAlteracaoGerado').hide();
});
//Fim Alteração

//Testes
$("#form_carimbo_testes").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "carimbo_testes.php",
        dataType: "json",
        data: $(this).serialize(),
        beforeSend: function () {
            $("#btnGerarCarimboTestes").hide();
            $('#divCarimboTestesGerado').show();
            $('#carimbo_testes_gerado').html('Aguarde enquanto o seu carimbo é gerado...');
        },
        success: function (data) {
            $('#carimbo_testes_gerado').empty();
            $('#carimbo_testes_gerado').html(data.carimbo);
            $('#btnGerarCarimboTestes').show();
            $("#form_carimbo_testes").trigger("reset");
        },
        error: function (error) {
            alert(error)
        }
    });
});
$(document).on('click', '#form_carimbo_testes', function (e) {
    $('#divCarimboTestesGerado').hide();
});
//Fim Testes

//Escalonamento
$("#form_carimbo_escalonamento").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "carimbo_escalonamento.php",
        dataType: "json",
        data: $(this).serialize(),
        beforeSend: function () {
            $("#btnGerarCarimboEscalonamento").hide();
            $('#divCarimboEscalonamentoGerado').show();
            $('#carimbo_escalonamento_gerado').html('Aguarde enquanto o seu carimbo é gerado...');
        },
        success: function (data) {
            $('#carimbo_escalonamento_gerado').empty();
            $('#carimbo_escalonamento_gerado').html(data.carimbo);
            $("#btnGerarCarimboEscalonamento").show();
            $("#form_carimbo_escalonamento").trigger("reset");
        },
        error: function (error) {
            alert(error)
        }
    });
});
$(document).on('click', '#form_carimbo_escalonamento', function (e) {
    $('#divCarimboEscalonamentoGerado').hide();
});
//Fim Escalonamento

//Atualização
$("#form_carimbo_atualizacao").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "carimbo_atualizacao.php",
        dataType: "json",
        data: $(this).serialize(),
        beforeSend: function () {
            $("#btnGerarCarimboAtualizacao").hide();
            $('#divCarimboAtualizacaoGerado').show();
            $('#carimbo_Atualizacao_gerado').html('Aguarde enquanto o seu carimbo é gerado...');
        },
        success: function (data) {
            $('#carimbo_atualizacao_gerado').empty();
            $('#carimbo_atualizacao_gerado').html(data.carimbo);
            $("#btnGerarCarimboAtualizacao").show();
            $("#form_carimbo_atualizacao").trigger("reset");
        },
        error: function (error) {
            console.log(error)
        }
    });
});
$(document).on('click', '#form_carimbo_atualizacao', function (e) {
    $('#divCarimboAtualizacaoGerado').hide();
});
//Fim Atualização

//Ligação
$("#form_carimbo_ligacao").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "carimbo_ligacao.php",
        dataType: "json",
        data: $(this).serialize(),
        beforeSend: function () {
            $("#btnGerarCarimboLigacao").hide();
            $('#divCarimboLigacaoGerado').show();
            $('#carimbo_Ligacao_gerado').html('Aguarde enquanto o seu carimbo é gerado...');
        },
        success: function (data) {
            $('#carimbo_ligacao_gerado').empty();
            $('#carimbo_ligacao_gerado').html(data.carimbo);
            $("#btnGerarCarimboLigacao").show();
            $("#form_carimbo_ligacao").trigger("reset");
        },
        error: function (error) {
            alert(error)
        }
    });
});
$(document).on('click', '#form_carimbo_ligacao', function (e) {
    $('#divCarimboLigacaoGerado').hide();
});
//Fim Ligação

//Falha Sistêmica
$("#form_carimbo_falha_sistemica").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "carimbo_falha_sistemica.php",
        dataType: "json",
        data: $(this).serialize(),
        beforeSend: function () {
            $("#btnGerarCarimboFalhaSistemica").hide();
            $('#divCarimboFalhaSistemicaGerado').show();
            $('#carimbo_falha_sistemica_gerado').html('Aguarde enquanto o seu carimbo é gerado...');
        },
        success: function (data) {
            $('#carimbo_falha_sistemica_gerado').empty();
            $('#carimbo_falha_sistemica_gerado').html(data.carimbo);
            $("#btnGerarCarimboFalhaSistemica").show();
            $("#form_carimbo_falha_sistemica").trigger("reset");
        },
        error: function (error) {
            alert(error)
        }
    });
});
$(document).on('click', '#form_carimbo_falha_sistemica', function (e) {
    $('#divCarimboFalhaSistemicaGerado').hide();
});
//Fim Falha Sistêmica