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

    $('.cliente-select').change(function () {
        alert('teste'),
})
</script>

<script>
    //https://api.jquery.com/click/
    $("#add-campo").click(function () {
        //https://api.jquery.com/append/

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


    $('#exampleModalDeletaFuncionario').on('shown.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Botão que acionou o modal

        var id_cliente = button.data('pegaid') // peguei o data que coloquei la 

        $('.deleta').attr('href', '<?= site_url('P_funcionarios/deleta_funcionario/') ?>' + id_cliente);

    })



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



    $('#macros').change(function () {

        var pega_id = $('#macros option:selected').data('id');

        var pega_url = $('#macros option:selected').data('url');

        $.ajax({
            type: "POST",
            url: pega_url, // aqui vc coloca o controler  // vai faz // php nao funciona aqui .. coloca a url msm ou melhor vamos fazer assim 
            data: {
                id_macro: pega_id
            }, // aqui vai ser a variavel que vc vai chama la .. 
            success: function (
                data
            ) // esse data que ta aqui dentro é o que ta retornando la no controler ... no caso o echo que vc deu la 
            {
                $('.micros').html(data);
            }
        });


    });
</script>


<script>
    $('.valor').mask('###0.00', {
        reverse: true
    });
    $('.valor-banco').mask('#.##0,00', {
        reverse: true
    });

    $('.mask-quilo').mask('###0.000', {
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
</script>

<script>
    $('#exampleModal2').on('shown.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Botão que acionou o modal

        var id_cliente = button.data('pegaid') // peguei o data que coloquei la 

        $('.inp').val(id_cliente); // mandei dentro de um imput que criei dentro do modal

        $('.deleta').attr('href', '<?= site_url('P_clientes_petrofertil/deleta_cliente/') ?>' + id_cliente);

    })

    $('#exampleModal7').on('shown.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Botão que acionou o modal

        var id_fornecedor = button.data('pegaid') // peguei o data que coloquei la 

        $('.inp').val(id_fornecedor); // mandei dentro de um imput que criei dentro do modal

        $('.deleta').attr('href', '<?= site_url('F_fluxo/deleta_fluxo/') ?>' + id_fornecedor);

        $('.deleta_fluxo').attr('href', '<?= site_url('F_fluxo/deleta_caixa_fluxo/') ?>' + id_fornecedor);




    })

    $('#exampleModal8').on('shown.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Botão que acionou o modal

        var id_contribuinte = button.data('pegaid') // peguei o data que coloquei la 

        $('.inp').val(id_contribuinte); // mandei dentro de um imput que criei dentro do modal

        $('.deleta').attr('href', '<?= site_url('F_contas/deleta_contribuinte/') ?>' + id_contribuinte);






    })

    $('#exampleModal9').on('shown.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Botão que acionou o modal

        var id_conta = button.data('pegaid') // peguei o data que coloquei la 

        $('.inp').val(id_conta); // mandei dentro de um imput que criei dentro do modal

        $('.deleta').attr('href', '<?= site_url('F_contas/deleta_conta/') ?>' + id_conta);



    })


    $('#deletar_conta').on('shown.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Botão que acionou o modal

        var id_conta = button.data('pegaid') // peguei o data que coloquei la 

        $('.inp').val(id_conta); // mandei dentro de um imput que criei dentro do modal

        $('.deleta').attr('href', '<?= site_url('P_contas_pagar/deleta_conta/') ?>' + id_conta);

    })

    $('#deletar_veiculo_empresa').on('shown.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Botão que acionou o modal

        var id_veiculo = button.data('pegaid') // peguei o data que coloquei la 

        $('.inp').val(id_veiculo); // mandei dentro de um imput que criei dentro do modal

        $('.deleta').attr('href', '<?= site_url('P_veiculos_empresa/deleta_veiculo/') ?>' + id_veiculo);

    })

    $('#exampleModal10').on('shown.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Botão que acionou o modal

        var id_conta = button.data('pegaid') // peguei o data que coloquei la 

        $('.inp').val(id_conta); // mandei dentro de um imput que criei dentro do modal

        $('.deleta').attr('href', '<?= site_url('P_contas_receber/deleta_conta/') ?>' + id_conta);

    })


    $('#modalDeleteMotorista').on('shown.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Botão que acionou o modal

        var id_motorista = button.data('pegaid') // peguei o data que coloquei la 

        $('.inp').val(id_motorista); // mandei dentro de um imput que criei dentro do modal

        $('.deleta').attr('href', '<?= site_url('P_motoristas/deleta_motorista/') ?>' + id_motorista);

    })

    $('#modalDeleteTransportador').on('shown.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Botão que acionou o modal

        var id_transportador = button.data('pegaid') // peguei o data que coloquei la 

        $('.inp').val(id_transportador); // mandei dentro de um imput que criei dentro do modal

        $('.deleta').attr('href', '<?= site_url('P_transportadores/deleta_transportador/') ?>' + id_transportador);

    })

    $('#modalDeleteVeiculo').on('shown.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Botão que acionou o modal

        var id_veiculo = button.data('pegaid') // peguei o data que coloquei la 

        $('.inp').val(id_veiculo); // mandei dentro de um imput que criei dentro do modal

        $('.deleta').attr('href', '<?= site_url('P_veiculos/deleta_veiculo/') ?>' + id_veiculo);

    })


    $('#exampleModal11').on('shown.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Botão que acionou o modal

        var id_cliente = button.data('pegaid') // peguei o data que coloquei la 

        $('.inp').val(id_cliente); // mandei dentro de um imput que criei dentro do modal

        $('.deleta').attr('href', '<?= site_url('F_clientes_reciclagem/deleta_cliente/') ?>' + id_cliente);


    })


    $('#ModalReceber').on('shown.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Botão que acionou o modal

        var id_cliente = button.data('cli-id') // peguei o data que coloquei la 

        $('.btn-envia-recebimento').attr('data-id', id_cliente);


        $('#modal-danilo').attr('action', '<?= site_url('P_contas_receber/atualiza_status/') ?>' + id_cliente);


    })


    $('#ModalReceberVendedor').on('shown.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Botão que acionou o modal

        var id_cliente = button.data('cli-id') // peguei o data que coloquei la 


        $('#modal-receber2').attr('action', '<?= site_url('P_contas_receber/atualiza_status_saldo/') ?>' + id_cliente);


    })


    $('#ModalPagar').on('shown.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Botão que acionou o modal

        var id_cliente = button.data('cli-id') // peguei o data que coloquei la 

        $('#modal-danilo').attr('action', '<?= site_url('P_contas_pagar/atualiza_status/') ?>' + id_cliente);


    })

    $('#ModalPagarVendedor').on('shown.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Botão que acionou o modal

        var id_cliente = button.data('cli-id') // peguei o data que coloquei la 

        $('#modal-danilo').attr('action', '<?= site_url('P_contas_pagar/atualiza_status_saldo/') ?>' + id_cliente);


    })




    const selecionarTodosClientes = () => {

        var ids = [];

        if ($('.check-all-clientes').is(':checked')) {

            // deixa todos os checkbox ativos
            $('.check-cleintes').prop("checked", true);

            $('.check-clientes').each(function () {

                $(this).prop('checked', true);

                var value = $(this).val(); //id

                ids.push(value);

            });

            $('.ids_clientes').val(ids);

        } else {

            $('.check-clientes').prop("checked", false);
            $('.ids_clientes').val('');

        }

        // click nos ativos para remover o checked do registro (1 por 1)
        $(document).on('click', '.check-clientes', function () {

            var value = $(this).val();

            if ($(this).is(':checked')) {

                var recebido = $(this).data('recebido');

                var vencimento = $(this).data('vencimento');

                var valor = $(this).data('valor');

                ids.push(value);

                $('.ids_clientes').val(ids);

            } else {

                $(this).prop("checked", false);

                var index = ids.indexOf(value);

                if (index !== -1) {

                    ids.splice(index, 1);
                }

                $('.ids_clientes').val(ids);
            }

        });

    }


    // click nas contas um por vez
    var ids = [];
    $(document).on('click', '.check-clientes', function () {

        var value = $(this).val();

        if ($(this).is(':checked')) {

            ids.push(value);

            $('.ids_clientes').val(ids);

        } else {

            $(this).prop("checked", false);

            var index = ids.indexOf(value);

            if (index !== -1) {

                ids.splice(index, 1);

                $('.ids_clientes').val(ids);
            }

        }

    });





</script>

<script src="<?= base_url('assets/financeiro/js/demo.js') ?>"></script>
</body>

</html>