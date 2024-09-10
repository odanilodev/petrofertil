<?php

$status = $this->session->userdata('usuario');

if ($status != "logado") {

    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');

$nome_usuario = $this->session->userdata('nome_usuario');

?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-3">
                <h2>Cadastrar Conta</h2>
            </div>
            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a href="<?= $_SERVER['HTTP_REFERER'] ?>"><span type="button"
                        class="btn bg-orange waves-effect">VOLTAR</span></a>
            </div>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Formulário de Cadastro
                        </h2>
                    </div>

                    <?php if (empty($conta)) { ?>
                        <form method="post" action="<?= site_url('P_contas_pagar/inserir_conta') ?>">
                        <?php } else { ?>
                            <form method="post" action="<?= site_url('F_contas/inserir_conta/') . $conta['id'] ?>">
                            <?php } ?>
                            <input type="hidden" name="id" value=""></input>

                            <div class="body">

                                <div class="row clearfix">

                                    <input type="hidden" name="id"
                                        value="<?= isset($conta['id']) ? $conta['id'] : '' ?>"></input>

                                    <div class="col-md-3">
                                        <label>Categoria de pagador</label>
                                        <select name="cadastro" class="form-control">
                                            <option value="">Selecione</option>
                                            <option value="Cliente">Cliente</option>
                                            <option value="Vendedor">Vendedor</option>
                                            <option value="Fornecedor">Fornecedor</option>
                                            <option value="Transportador">Transportador</option>
                                            <option value="Motorista">Motorista</option>
                                            <option value="Prestador">Prestador de serviço</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label>Pagar para</label>
                                        <select name="pago_para" class="form-control">
                                            <option value="">Selecione</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label>Despesa</label>

                                        <select name="categoria" required class="form-control show-tick">
                                            <option>Selecione</option>

                                            <option value="ADM">ADM</option>
                                            <option value="Alimentação">Alimentação</option>
                                            <option value="Ativo">Ativo</option>
                                            <option value="Coleta">Coleta</option>
                                            <option value="Combustivel">Combustivel</option>
                                            <option value="Fixa">Fixa</option>
                                            <option value="Frete">Frete</option>
                                            <option value="Geral">Geral</option>
                                            <option value="Imposto">Imposto</option>
                                            <option value="Limpeza">Limpeza</option>
                                            <option value="Investimento">Investimento</option>
                                            <option value="Manutenção Veiculos">Manutenção Veiculos</option>
                                            <option value="Manutenção Geral">Manutenção Geral</option>
                                            <option value="Obras">Obras</option>
                                            <option value="Operacional">Operacional</option>
                                            <option value="Passivo">Passivo</option>
                                            <option value="Tarifa Bancaria">Tarifa bancaria</option>
                                            <option value="Vale Transporte">Vale Transporte</option>

                                        </select>

                                    </div>

                                    <div class="col-md-3">
                                        <label>Data Emissão</label>

                                        <div class="input-group ">
                                            <div class="form-line">
                                                <input type="date" name="data_emissao" required
                                                    value="<?= isset($conta['data_emissao']) ? $conta['data_emissao'] : '' ?>"
                                                    class="form-control" placeholder="Please choose a date...">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label>Valor</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" required name="valor"
                                                    value="<?= isset($conta['valor']) ? $conta['valor'] : '' ?>"
                                                    class="form-control valor" placeholder="Insira o valor da conta">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label>Numero de Nota</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="numero_nota"
                                                    value="<?= isset($conta['numero_nota']) ? $conta['numero_nota'] : '' ?>"
                                                    class="form-control" placeholder="Digite o numero de nota">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-4">
                                        <p>
                                            <b>Data para Pagamento/Primeira Parcela</b>
                                        </p>
                                        <div class="input-group ">
                                            <div class="form-line">
                                                <input type="date" name="vencimento" required
                                                    value="<?= isset($conta['vencimento']) ? $conta['vencimento'] : '' ?>"
                                                    class="form-control" placeholder="Please choose a date...">
                                            </div>
                                        </div>
                                    </div> -->


                                    <!-- <div class="col-md-6">
                                        <p>
                                            <b>Conta</b>
                                        </p>
                                        <select name="id_conta" class="form-control show-tick">
                                            <option>Selecione</option>
                                            <?php foreach ($contas as $b) { ?>
                                            <option value="<?php $b['id'] ?>"><?php $b['descricao'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div> -->


                                    <?php if (empty($conta)) { ?>

                                        <!-- Botão que ativa o modal -->
                                        <div class="col-md-3">
                                            <label>Quantidade de Parcelas</label>
                                            <select required name="quantidade_parcela" class="form-control"
                                                id="quantidade_parcela">
                                                <option>Selecione</option>
                                                <?php for ($c = 1; $c <= 24; $c++) { ?>
                                                    <option value="<?= $c ?>"><?= $c . 'x' ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>


                                    <?php } ?>


                                    <div class="col-md-3">
                                        <label>Tipo de Pagamento</label>
                                        <select name="tipo_pagamento" class="form-control">
                                            <option value="">Selecione</option>
                                            <option value="Boleto">Boleto</option>
                                            <option value="Transferencia">Transferencia</option>
                                        </select>
                                    </div>


                                    <div class="col-md-12">
                                        <label>Observação</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="observacao"
                                                    value="<?= isset($conta['observacao']) ? $conta['observacao'] : '' ?>"
                                                    class="form-control" placeholder="Digite uma observação">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Campos ocultos para datas das parcelas -->
                                    <div id="parcelasHiddenFields">
                                        <!-- Campos ocultos serão adicionados dinamicamente aqui -->
                                    </div>

                                    <div class="col-sm-2 col-md-offset-5">
                                        <div class="form-group">

                                            <input type="submit"
                                                class="btn bg-red btn-block waves-effect col-md-3"></input>

                                        </div>
                                    </div>

                                </div>

                        </form>
                </div>

            </div>
        </div>
    </div>
    </div>
    <!-- #END# Input -->

    </div>
</section>

<!-- Modal para adicionar as datas das parcelas -->
<div class="modal fade" id="parcelasModal" tabindex="-1" role="dialog" aria-labelledby="parcelasModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="parcelasModalLabel">Datas das Parcelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="parcelasForm">
                    <div id="parcelasContainer">
                        <!-- Campos de data serão gerados aqui -->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="salvarParcelas">Salvar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script>
    $(document).ready(function () {
        $('#quantidade_parcela').change(function () {
            var quantidade = $(this).val();
            if (quantidade >= 1) {
                var parcelasContainer = $('#parcelasContainer');
                parcelasContainer.empty(); // Limpa campos anteriores

                // Remove campos ocultos anteriores
                $('#parcelasHiddenFields').empty();

                for (var i = 1; i <= quantidade; i++) {
                    parcelasContainer.append(`
                    <div class="form-group">
                        <label>Data da Parcela ${i}</label>
                        <input type="date" name="data_parcela_${i}" class="form-control" required>
                    </div>
                `);
                }

                $('#parcelasModal').modal('show'); // Exibe o modal
            }
        });

        // Botão para salvar as datas das parcelas
        $('#salvarParcelas').click(function () {
            var quantidade = $('#quantidade_parcela').val();

            if (quantidade >= 1) {
                // Limpa campos ocultos anteriores
                $('#parcelasHiddenFields').empty();

                for (var i = 1; i <= quantidade; i++) {
                    var dataParcela = $(`input[name="data_parcela_${i}"]`).val();
                    if (dataParcela) {
                        $('#parcelasHiddenFields').append(`
                        <input type="hidden" name="data_parcela_${i}" value="${dataParcela}">
                    `);
                    }
                }
            }

            $('#parcelasModal').modal('hide');
        });
    });




    $(document).ready(function () {
        // Detecta mudança no select de Cadastro do pagador
        $('select[name="cadastro"]').change(function () {
            var tipoPagador = $(this).val(); // Pega o valor selecionado
            var baseUrl = "<?= base_url(); ?>"; // Define a base URL
            var endpoint = ""; // Inicializa a variável do endpoint

            // Mapeia o tipo de pagador para o endpoint apropriado
            var endpoints = {
                "Cliente": "P_clientes_petrofertil/recebe_todos_clientes_nome",
                "Vendedor": "P_vendedores_petrofertil/recebe_vendedores_nome",
                "Transportador": "P_transportadores/recebe_transportadores_nome",
                "Motorista": "P_motoristas/recebe_motoristas_nome",
                "Prestador": "P_prestadores_servico/recebe_prestadores_nome",
                "Fornecedor": "P_clientes/recebe_clientes_nome"

            };

            // Define o endpoint com base no tipo de pagador selecionado
            endpoint = endpoints[tipoPagador];

            // Constrói a URL completa
            var url = baseUrl + endpoint;

            // Verifica se o endpoint foi definido (isto é, se o tipoPagador é válido)
            if (endpoint) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        var options = '<option value="">Selecione</option>';
                        // Itera sobre os dados recebidos para adicionar as opções
                        // A chave para 'nome' ou 'nome_fantasia' deve ser ajustada baseado no retorno de cada endpoint
                        $.each(data, function (key, value) {
                            var nome = value.nome || value.nome_fantasia; // Ajuste conforme necessário
                            options += '<option value="' + nome + '">' + nome + '</option>';
                        });
                        // Atualiza o select de Pagador com as novas opções
                        $('select[name="pago_para"]').html(options);
                    }
                });
            }
        });
    });

</script>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>