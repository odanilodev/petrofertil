<input type="hidden" value="<?=base_url()?>" class="base_url">

<!-- Jquery Core Js -->
<script src="<?= base_url('assets/financeiro/plugins/jquery/jquery.min.js') ?>"></script>

<!-- Bootstrap Core Js -->
<script src="<?= base_url('assets/financeiro/plugins/bootstrap/js/bootstrap.js') ?>"></script>

<!-- Select Plugin Js -->
<!--<script src="<?= base_url('assets/financeiro/plugins/bootstrap-select/js/bootstrap-select.js') ?>"></script>  qualquer coisa vc volta isso .. mais acho que nao vai afetar nada fuiiiii-->

<!-- Slimscroll Plugin Js -->
<script src="<?= base_url('assets/financeiro/plugins/jquery-slimscroll/jquery.slimscroll.js') ?>"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?= base_url('assets/financeiro/plugins/node-waves/waves.js') ?>"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="<?= base_url('assets/financeiro/plugins/jquery-countto/jquery.countTo.js') ?>"></script>

<!-- Morris Plugin Js -->
<script src="<?= base_url('assets/financeiro/plugins/morrisjs/morris.js') ?>"></script>


<!-- Jquery DataTable Plugin Js -->
<script src="<?= base_url('assets/financeiro/plugins/jquery-datatable/jquery.dataTables.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') ?>">
</script>
<script src="<?= base_url('assets/financeiro/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') ?>">
</script>
<script src="<?= base_url('assets/financeiro/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') ?>">
</script>
<script src="<?= base_url('assets/financeiro/plugins/jquery-datatable/extensions/export/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/jquery-datatable/extensions/export/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/jquery-datatable/extensions/export/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') ?>">
</script>
<script src="<?= base_url('assets/financeiro/plugins/jquery-datatable/extensions/export/buttons.print.min.js') ?>">
</script>

<!-- Custom Js -->
<script src="<?= base_url('assets/financeiro/js/admin.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/js/pages/tables/jquery-datatable.js') ?>"></script>

<!-- ChartJs -->
<script src="<?= base_url('assets/financeiro/plugins/chartjs/Chart.bundle.js') ?>"></script>

<!-- Flot Charts Plugin Js -->
<script src="<?= base_url('assets/financeiro/plugins/flot-charts/jquery.flot.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/flot-charts/jquery.flot.resize.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/flot-charts/jquery.flot.pie.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/flot-charts/jquery.flot.categories.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/flot-charts/jquery.flot.time.js') ?>"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="<?= base_url('assets/financeiro/plugins/jquery-sparkline/jquery.sparkline.js') ?>"></script>

<!-- Custom Js -->
<?php /*?><script src="<?= base_url('assets/financeiro/js/admin.js') ?>"></script><?php */ ?>
<script src="<?= base_url('assets/financeiro/js/pages/index.js') ?>"></script>

<script src="<?= base_url('assets/financeiro/plugins/sweetalert/sweetalert.min.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/js/pages/ui/dialogs.js') ?>"></script>

<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>



<script>
//https://api.jquery.com/click/ --
$("#add-campo").click(function() {
    //https://api.jquery.com/append/ --

    var dateNow = Date.now();

    $("#formulario").append(
        "<div class='col-sm-3'><p><b>Produto</b></p><select required='' id='macros' name='produto[]' class='form-control macros show-tick'><option>Selecione</option><?php foreach ($produtos as $p) { ?><option value='<?= $p['nome'] ?>'><?= $p['nome'] ?></option><?php } ?></select></div><div class='col-sm-3'><label>KG/Quantidade</label><div class='form-group'><div class='form-line'><input type='text' onblur='calcular(" +
        dateNow + ");' name='unidade_peso[]' value='' class='form-control num_" + dateNow +
        "' placeholder='Quantidade'></div></div></div><div class='col-sm-3'><label>Preço de venda</label><div class='form-group'><div class='form-line'><input type='text' onblur='calcular(" +
        dateNow + ");' name='valor_venda[]' value='' class='form-control valor num2_" + dateNow +
        "' placeholder='Valor venda?'></div></div></div><div class='col-sm-3'><label>Valor total </label><div class='form-group'><div class='form-line'><input type='text' onblur='calcular(" +
        dateNow + ");' name='valor_total[]' value='' class='form-control resultado" + dateNow +
        " valor resultado' Readonly></div></div></div>"
    );
});


//calcular soma de 2 input
function calcular(codigo) {

    var num1 = Number($('.num_' + codigo).val());
    var num2 = Number($('.num2_' + codigo).val());
    var elemResult = $('.resultado' + codigo).val();


    if (elemResult.textContent === undefined) {

        $('.resultado' + codigo).val(num1 * num2);

        elemResult.textContent = "R$" + String(num1 * num2) + "";
    } else {

        $('.resultado' + codigo).val(num1 * num2);

        elemResult.innerText = "R$" + String(num1 * num2) + "";
    }
}


$('#macros').change(function() {

    var pega_id = $('#macros option:selected').data('id');

    var pega_url = $('#macros option:selected').data('url');

    $.ajax({
        type: "POST",
        url: pega_url, // aqui vc coloca o controler  // 
        data: {
            id_macro: pega_id
        }, // aqui vai ser a variavel que vc vai chama la .. 
        success: function(
            data) // esse data que ta aqui dentro é o que ta retornando la no controler ... no caso o echo que vc deu la 
        {
            $('.micros').html(data);
        }
    });


});


var formCustos =
    " <div style='margin-left: 18px;'><h4>Formulario de Custos</h4></div></br><div class='col-sm-4'><label>Clientes</label><div class='form-group'><div class='form-line'><input type='text' name='clientes' value='' class='form-control' placeholder='Insira o valor gasto'></div></div></div><div class='col-sm-4'><label>Alimentação</label><div class='form-group'><div class='form-line'><input type='text' name='alimentacao' value='' class='form-control' placeholder='Insira o valor gasto'></div></div></div><div class='col-sm-4'><label>Combustivel</label><div class='form-group'><div class='form-line'><input type='text' name='combustivel' value='' class='form-control' placeholder='Insira o valor gasto'></div></div></div><div class='col-sm-4'><label>Estacionamento</label><div class='form-group'><div class='form-line'><input type='text' name='estacionamento' value='' class='form-control' placeholder='Insira o valor gasto'></div></div></div><div class='col-sm-4'><label>Pedágio</label><div class='form-group'><div class='form-line'><input type='text' name='pedagio' value='' class='form-control' placeholder='Insira o valor gasto'></div></div></div><div class='col-sm-4'><label>Detergente</label><div class='form-group'><div class='form-line'><input type='text' name='detergente' value='' class='form-control' placeholder='Insira o valor gasto'></div></div></div><div class='col-sm-4'><label>Óleo</label><div class='form-group'><div class='form-line'><input type='text' name='oleo' value='' class='form-control' placeholder='Insira o valor gasto'></div></div></div><div class='col-sm-4'><label>Outros</label><div class='form-group'><div class='form-line'><input type='text' name='outros' value='' class='form-control' placeholder='Insira o valor gasto'></div></div></div><div class='col-sm-4'><label>Oque?</label><div class='form-group'><div class='form-line'><input type='text' name='oque' value='' class='form-control' placeholder='Insira o valor gasto'></div></div></div";

$('.micros').change(function() {

    var pega_id = $(this).find('option:selected').val();
    if (pega_id == 10) {
        $('.form_custos').html(formCustos);
    } else {
        $('.form_custos').html("");
    }
});


$('.btn-baixar').click(function() {

    var base_url = $('.base_url').val();

    var documento = $(this).data('cli-end');

    $.ajax({
        type: "POST",
        url: base_url + 'F_documentos/download_documento',
        data: {
            documento: documento
        },
        success: function(data) {
            alert(data);
        }
    });
})



$('.valor').mask('###0.00', {
    reverse: true
});
$('.cnpj').mask('00.000.000/0000-00', {
    reverse: true
});
$('.cpf').mask('000.000.000-00', {
    reverse: true
});
$('.telefone').mask('00 00000-0000', {
    reverse: true
});
$('.inscricao').mask('000.000.000.000', {
    reverse: true
});

$('#exampleModalDeletaFuncionario').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_cliente = button.data('pegaid') // peguei o data que coloquei la 

    $('.deleta').attr('href', '<?= site_url('F_funcionarios/deleta_funcionario/') ?>' + id_cliente);

})


$('#exampleModal2').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_cliente = button.data('pegaid') // peguei o data que coloquei la 

    $('.inp').val(id_cliente); // mandei dentro de um imput que criei dentro do modal

    $('.deleta_estoque').attr('href', '<?= site_url('F_afericao/deleta_afericao_estoque/') ?>' + id_cliente);

    $('.deleta').attr('href', '<?= site_url('F_afericao/deleta_afericao/') ?>' + id_cliente);

})

$('#exampleModal3').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_fornecedor = button.data('pegaid') // peguei o data que coloquei la 

    $('.inp').val(id_fornecedor); // mandei dentro de um imput que criei dentro do modal

    $('.link_id').attr('href', '<?= site_url('F_fornecedores/deleta_fornecedor/') ?>' + id_fornecedor);

})

$('#exampleModalCidade').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_cidade = button.data('pegaid') // peguei o data que coloquei la 

    $('.link_id').attr('href', '<?= site_url('F_cidades/deleta_cidade/') ?>' + id_cidade);

})

$('#exampleModalProduto').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_produto = button.data('pegaid') // peguei o data que coloquei la 

    $('.inp').val(id_produto); // mandei dentro de um imput que criei dentro do modal

    $('.link_id').attr('href', '<?= site_url('F_produtos_reciclagem/deleta_produto/') ?>' + id_produto);


})

$('#exampleModalVenda').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_produto = button.data('pegaid') // peguei o data que coloquei la 

    $('.inp').val(id_produto); // mandei dentro de um imput que criei dentro do modal

    $('.link_id').attr('href', '<?= site_url('F_venda_reciclagem/deleta_venda/') ?>' + id_produto);


})

$('#exampleModal4').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_fornecedor = button.data('pegaid') // peguei o data que coloquei la 

    $('.inp').val(id_fornecedor); // mandei dentro de um imput que criei dentro do modal

    $('.deleta').attr('href', '<?= site_url('F_afericao/deleta_afericao_terceiros/') ?>' + id_fornecedor);

    $('.deleta_estoque').attr('href', '<?= site_url('F_afericao/deleta_afericao_estoque_terceiros/') ?>' +
        id_fornecedor);


})


$('#exampleModal5').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_fornecedor = button.data('pegaid') // peguei o data que coloquei la 

    $('.inp').val(id_fornecedor); // mandei dentro de um imput que criei dentro do modal

    $('.deleta').attr('href', '<?= site_url('F_destinacoes/deleta_destinacao/') ?>' + id_fornecedor);

    $('.deleta_destinacao').attr('href', '<?= site_url('F_destinacoes/deleta_destinacao_estoque/') ?>' +
        id_fornecedor);


})


$('#exampleModalAcido').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_fornecedor = button.data('pegaid') // peguei o data que coloquei la 

    $('.inp').val(id_fornecedor); // mandei dentro de um imput que criei dentro do modal

    $('.deleta').attr('href', '<?= site_url('F_oleo_acido/deleta_afericao/') ?>' + id_fornecedor);

    $('.deleta_destinacao').attr('href', '<?= site_url('F_oleo_acido/deleta_afericao_estoque/') ?>' +
        id_fornecedor);


})

$('#exampleModalQuebraAcido').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_fornecedor = button.data('pegaid') // peguei o data que coloquei la 

    $('.inp').val(id_fornecedor); // mandei dentro de um imput que criei dentro do modal

    $('.deleta').attr('href', '<?= site_url('F_oleo_acido/deleta_quebra_oleo_acido/') ?>' + id_fornecedor);

    $('.deleta_quebra').attr('href', '<?= site_url('F_oleo_acido/deleta_quebra_estoque_oleo_acido/') ?>' +
        id_fornecedor);


})

$('#exampleModal6').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_fornecedor = button.data('pegaid') // peguei o data que coloquei la 

    $('.inp').val(id_fornecedor); // mandei dentro de um imput que criei dentro do modal

    $('.deleta').attr('href', '<?= site_url('F_quebra/deleta_quebra/') ?>' + id_fornecedor);

    $('.deleta_quebra').attr('href', '<?= site_url('F_quebra/deleta_quebra_estoque/') ?>' + id_fornecedor);


})

$('#exampleModal7').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_fornecedor = button.data('pegaid') // peguei o data que coloquei la 

    $('.inp').val(id_fornecedor); // mandei dentro de um imput que criei dentro do modal

    $('.deleta').attr('href', '<?= site_url('F_fluxo/deleta_fluxo/') ?>' + id_fornecedor);

    $('.deleta_fluxo').attr('href', '<?= site_url('F_fluxo/deleta_caixa_fluxo/') ?>' + id_fornecedor);


})

$('#exampleModal8').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_contribuinte = button.data('pegaid') // peguei o data que coloquei la 

    $('.inp').val(id_contribuinte); // mandei dentro de um imput que criei dentro do modal

    $('.deleta').attr('href', '<?= site_url('F_contas/deleta_contribuinte/') ?>' + id_contribuinte);

})

$('#exampleModal9').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_conta = button.data('pegaid') // peguei o data que coloquei la 

    $('.inp').val(id_conta); // mandei dentro de um imput que criei dentro do modal

    $('.deleta').attr('href', '<?= site_url('F_contas/deleta_conta/') ?>' + id_conta);



})



$('#exampleModal10').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_conta = button.data('pegaid') // peguei o data que coloquei la 

    $('.inp').val(id_conta); // mandei dentro de um imput que criei dentro do modal

    $('.deleta').attr('href', '<?= site_url('F_contas_receber/deleta_conta/') ?>' + id_conta);



})

$('#exampleModal11').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_cliente = button.data('pegaid') // peguei o data que coloquei la 

    $('.inp').val(id_cliente); // mandei dentro de um imput que criei dentro do modal

    $('.deleta').attr('href', '<?= site_url('F_clientes_reciclagem/deleta_cliente/') ?>' + id_cliente);


})


$('#exampleModal12').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_cliente = button.data('cli-id') // peguei o data que coloquei la 

    var vencimento = button.data('cli-dat') // peguei o data que coloquei la 

    var nome = button.data('cli-nom') // peguei o data que coloquei la 

    var valor_recebido = button.data('cli-dat') // peguei o data que coloquei la 

    $('#modal-danilo').attr('action', '<?= site_url('F_contas_receber/atualiza_status/') ?>' + id_cliente +
        '/' + vencimento + '/' + nome);

})

$('.envia_dataaaa').click(function() {
    var data_pagamento = $('.data_pagamento').val();
    var base_url = $('.base_url').val();

    alert(base_url)

    $.ajax({
        url: base_url + "F_contas/atualiza_status/",
        method: "POST",
        data: {
            data_pagamento: data_pagamento
        },
        success: function(data) {
            alert('deubao')

        },
    });
})


$('#exampleModal13').on('shown.bs.modal', function(event) {

    event.preventDefault();

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_cliente = button.data('cli-id') // peguei o data que coloquei la 


    var recebido = button.data('cli-rec')
    var recebido = recebido.replace(/\(|\)/g, "");


    var emissao = button.data('cli-emi')

    var micro = button.data('cli-micro')

    var macro = button.data('cli-macro')

    var observacao = button.data('cli-obs')


    if (observacao == "") {

        var observacao = 'Ndd';
    }


    $('.envia_data').click(function() {
        var data_pagamento = $('.data_pagamento').val();
        var valor_pago = $('.valor_pago').val();


        window.location.href = '<?= site_url('F_contas/atualiza_status/') ?>' + id_cliente + '/' +
            recebido + '/' + emissao + '/' + micro + '/' + macro + '/' + observacao + '/' +
            data_pagamento + '/' + valor_pago;
        return false;
    })

    return false;

    // $('#modal-danilo').attr('action', '<?= site_url('F_contas/atualiza_status/') ?>' + id_cliente + '/' + recebido + '/' + emissao + '/' + micro + '/' + macro + '/' + observacao);


})

$('#exampleModalfile').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var endereco = button.data('cli-end') // peguei o data que coloquei la 


    $('#caminho_file').attr('action', '<?= site_url('F_documentos/insere_documento/') ?>' + endereco);

})



$('#ModalReciclagemVenda').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_cliente = button.data('cli-id') // peguei o data que coloquei la 

    var cli_com = button.data('cli-com') // peguei o comprador que coloquei la 


    $('#ModalReciclagemVendaCaminho').attr('action', '<?= site_url('F_venda_reciclagem/recebe_valor/') ?>' +
        id_cliente + '/' + cli_com);

})


$('#ModalOleoVenda').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_cliente = button.data('cli-id') // peguei o data que coloquei la 

    var cli_dest = button.data('cli-dest') // peguei o data que coloquei la 

    $('#ModalOleoVendaCaminho').attr('action', '<?= site_url('F_estoque/recebe_valor/') ?>' + id_cliente + '/' +
        cli_dest);

})


$('#exampleModal14').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_cliente = button.data('pegaid') // peguei o data que coloquei la 

    $('.inp').val(id_cliente); // mandei dentro de um imput que criei dentro do modal


    $('.deleta').attr('href', '<?= site_url('F_visitas/deleta_visita/') ?>' + id_cliente);


})

$('#exampleModal15').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_cliente = button.data('pegaid') // peguei o data que coloquei la 

    $('.inp').val(id_cliente); // mandei dentro de um imput que criei dentro do modal


    $('.deleta').attr('href', '<?= site_url('F_visitas_reciclagem/deleta_visita/') ?>' + id_cliente);


})


$('#exampleModal16').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id_cliente = button.data('pegaid') // peguei o data que coloquei la 

    $('.inp').val(id_cliente); // mandei dentro de um imput que criei dentro do modal

    $('.deleta').attr('href', '<?= site_url('F_producao/deleta_empresa/') ?>' + id_cliente);


})


$('#exampleModal17').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id = button.data('pegaid') // peguei o data que coloquei la 

    $('.inp').val(id); // mandei dentro de um imput que criei dentro do modal

    $('.deleta').attr('href', '<?= site_url('F_estoque_motoristas/deleta_saida_motorista/') ?>' + id);


})

$('#exampleModal18').on('shown.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Botão que acionou o modal

    var id = button.data('pegaid') // peguei o data que coloquei la 

    $('.inp').val(id); // mandei dentro de um imput que criei dentro do modal

    $('.deleta').attr('href', '<?= site_url('F_estoque_motoristas/deleta_volta_motorista/') ?>' + id);

})
</script>

<script>
const selecioneTodasContas = () => {

    var ids = [];
    var recebidos = [];
    var venc = [];
    var valores = [];

    if ($('.check-all-contas').is(':checked')) {

        // deixa todos os checkbox ativos
        $('.check-contas').prop("checked", true);

        $('.check-contas').each(function() {

            var value = $(this).val(); //id

            var recebido = $(this).data('recebido');

            var vencimento = $(this).data('vencimento');

            var valor = $(this).data('valor');

            ids.push(value);
            recebidos.push(recebido);
            venc.push(vencimento);
            valores.push(valor);

            $('.btn-pagamento').css('display', 'flex');

            $('.btn-pagamento').html('Realizar Pagamento de (' + ids.length +
            ')'); // exibe a quantidade clicada no btn
            $('.btn-pagamento').css('display', 'flex');

        });

        $('.ids-contas').val(ids);
        $('.recebido-contas').val(recebidos);
        $('.vencimento-contas').val(venc);
        $('.valores-contas').val(valores);

    } else {

        $('.check-contas').prop("checked", false);
        $('.btn-pagamento').css('display', 'none');

    }

    // click nos ativos para remover o checked do registro (1 por 1)
    $(document).on('click', '.check-contas', function() {

        var value = $(this).val();

        if ($(this).is(':checked')) {

            var recebido = $(this).data('recebido');

            var vencimento = $(this).data('vencimento');

            var valor = $(this).data('valor');

            ids.push(value);
            recebidos.push(recebido);
            venc.push(vencimento);
            valores.push(valor);

            $('.ids-contas').val(ids);

            $('.btn-pagamento').css('display', 'flex');

            $('.btn-pagamento').css('display', 'flex');

            $('.btn-pagamento').html('Realizar Pagamento de (' + ids.length + ')');

            // $('.recebido-contas').val(recebidos);

            // $('.ids-contas').val(ids);
            $('.recebido-contas').val(recebidos);
            $('.vencimento-contas').val(venc);
            $('.valores-contas').val(valores);

        } else {

            $(this).prop("checked", false);

            var index = ids.indexOf(value);

            if (index !== -1) {

                ids.splice(index, 1);
                recebidos.splice(index, 1);
                venc.splice(index, 1);
                valores.splice(index, 1);

                $('.conta-' + value).remove();

                if (ids.length == 0) {

                    $('.btn-pagamento').css('display', 'none');
                    $('.btn-pagamento').html('Realizar Pagamento de (' + ids.length + ')');

                } else {

                    $('.btn-pagamento').css('display', 'flex');
                    $('.btn-pagamento').html('Realizar Pagamento de (' + ids.length + ')');
                }
            }

            $('.ids-contas').val(ids);
            $('.recebido-contas').val(recebidos);
            $('.vencimento-contas').val(venc);
            $('.valores-contas').val(valores);
        }

    });

}


// click nas contas um por vez
var ids = [];
var recebidos = [];
var venc = [];
var valores = [];
$(document).on('click', '.check-contas', function() {

    var value = $(this).val();

    if ($(this).is(':checked')) {

        var recebido = $(this).data('recebido');
        var vencimento = $(this).data('vencimento');
        var valor = $(this).data('valor');

        ids.push(value);
        recebidos.push(recebido);
        venc.push(vencimento);
        valores.push(valor);

        $('.btn-pagamento').css('display', 'flex');

        $('.btn-pagamento').html('Realizar Pagamento de (' + ids.length + ')');

        $('.ids-contas').val(ids);
        $('.recebido-contas').val(recebidos);
        $('.vencimento-contas').val(venc);
        $('.valores-contas').val(valores);

    } else {

        $(this).prop("checked", false);

        var index = ids.indexOf(value);

        if (index !== -1) {

            ids.splice(index, 1);
            recebidos.splice(index, 1);
            venc.splice(index, 1);
            valores.splice(index, 1);

            $('.conta-' + value).remove();

            if (ids.length == 0) {

                $('.btn-pagamento').css('display', 'none');
                $('.btn-pagamento').html('Realizar Pagamento de (' + ids.length + ')');

            } else {

                $('.btn-pagamento').css('display', 'flex');
                $('.btn-pagamento').html('Realizar Pagamento de (' + ids.length + ')');
            }

            $('.ids-contas').val(ids);
            $('.recebido-contas').val(recebidos);
            $('.vencimento-contas').val(venc);
            $('.valores-contas').val(valores);
        }

    }

});


const exibirModalContas = () => {

    $('.form-contas').html('');
    $('#modalContas').modal('show');

    var todosId = $('.ids-contas').val().split(',');
    var todosRecebidos = $('.recebido-contas').val().split(',');
    var todosValores = $('.valores-contas').val().split(',');
    var todosVenci = $('.vencimento-contas').val().split(',');

    var totalValores = 0; // Variável para armazenar o valor total

    for (let c = 0; c < todosId.length; c++) {
        var inputs = `
            <div class="conta-${todosId[c]}">
                <div class="col-md-4" style="margin-top: 20px" title="${todosRecebidos[c]}">
                    ${todosRecebidos[c].length > 30 ? todosRecebidos[c].substring(0, 30) + '...' : todosRecebidos[c]}
                </div>

                <div class="col-md-4" style="margin-top: 20px">
                    <input type="date" name='data-fluxo[]' value="${todosVenci[c]}" class="form-control data-pagamento" required>
                </div>

                <div class="col-md-4" style="margin-top: 20px">
                    <input placeholder="Digite o valor pago" type="text" name='valor-recebido[]' value="${todosValores[c]}" class="form-control valor valor-pago" required>
                </div>
            </div>
        `;

        totalValores += parseFloat(todosValores[c]); 
        $('.form-contas').append(inputs);
    }

    let totalFormatado = totalValores.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });

    // Atualizar o conteúdo HTML
    $('.total-valores').html(`Total: <b>${totalFormatado}</b>`);

}

</script>


<script src="<?= base_url('assets/financeiro/js/demo.js') ?>"></script>
</body>

</html>