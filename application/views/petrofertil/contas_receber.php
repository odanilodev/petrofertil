<?php

$status = $this->session->userdata('usuario');

if ($status != "logado") {

    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');

$nome_usuario = $this->session->userdata('nome_usuario');

?>

<input type='hidden' value="<?= base_url() ?>" class=" base-url">

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-3">
                <h2>CONTAS A RECEBER</h2>
            </div>

            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a style="margin-left: 5px" href="<?= base_url('P_contas_receber/cadastrar_conta') ?>"><span
                        type="button" class="btn btn-info  waves-effect">ENTRADA</span></a>
            </div>

        </div>

        <!-- Widgets -->
        <div class="row clearfix">

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="info-box bg-blue-grey hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Caixa Total</div>
                        <div class="number">R$<?= number_format("$saldo", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="info-box bg-blue-grey hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Previsão de caixa</div>
                        <div class="number">R$<?= number_format("$previsao_caixa", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="info-box bg-cyan hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Contas Totais a Receber</div>
                        <div class="number">R$<?= number_format("$receber_total", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>

            <div class=" col-lg-12 col-md-12 col-sm-7 col-xs-12">
                <form class="" enctype="multipart/form-data"
                    action="<?= site_url('P_contas_receber/filtra_contas_receber/') ?>" method="post">

                    <div class="col-md-3">

                        <div class="form-group ">
                            <label>Cliente:</label>
                            <select name="cliente_id" class="form-control show-tick">
                                <option>Selecione</option>

                                <?php foreach ($clientes as $cliente) { ?>
                                    <option value="<?= $cliente['id'] ?>"><?= $cliente['nome_fantasia'] ?></option>
                                <?php } ?>

                            </select>
                        </div>

                    </div>

                    <div class="col-md-2">

                        <div class="form-group ">
                            <label>Status:</label>
                            <select require name="status" class="form-control show-tick">
                                <option>Selecione</option>
                                <option value="0">A receber</option>
                                <option value="1">Recebido</option>
                                <option value="2">Geral</option>

                            </select>
                        </div>

                    </div>


                    <div class="col-md-2">

                        <div class="form-group ">
                            <label>De:</label>
                            <input required type="date" value="" name="data_inicial" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-2">

                        <div class="form-group  ">
                            <label>Até:</label>
                            <input required type="date" value="" name="data_final" class="form-control">
                        </div>

                    </div>

                    <button type="submit" style="margin-top: 27px"
                        class="btn btn-primary ml-3 col-sm-3 col-md-3 col-xs-6 ">Filtrar</button>

                    <?php if ($pagina == 'deletado') { ?>

                        <div class="alert bg-teal alert-dismissible col-xs-12" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            Aferição deletada com sucesso
                        </div>
                    <?php } ?>

            </div>

            </form>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="margin-top: 15px" class="card">
                        <div class="header">
                            <h2>
                                Contas a Receber
                            </h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Vencimento</th>
                                            <th>Valor</th>
                                            <th>Cliente</th>
                                            <th>Recebido de</th>
                                            <th>Banco referente</th>
                                            <th>Status conta</th>
                                            <th>Valor recebido</th>
                                            <th>Forma Recebimento</th>
                                            <th>Observacao</th>
                                            <th>Data emissão</th>

                                            <th>Venda</th>
                                            <th>Editar</th>
                                            <th>Deletar</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php foreach ($contas as $c) { ?>

                                            <tr>
                                                <td>
                                                    <?= date("d/m/Y", strtotime($c['vencimento'])); ?>
                                                </td>
                                                <td>R$<?= number_format($c['valor'], 2, ',', '.'); ?></td>
                                                <td><?= $c['nome_fantasia'] ?></td>
                                                <td><?= $c['recebido_de'] ?></td>
                                                <td><?= $c['descricao'] ?></td>

                                                <?php if ($c['status'] == 0) { ?>

                                                    <td>
                                                        <a data-toggle="modal" data-cli-id="<?= $c['id'] ?>"
                                                            data-cli-dat="<?= $c['vencimento'] ?>"
                                                            data-cli-nom="<?= $c['nome_fantasia'] ?>"
                                                            data-target="#ModalReceber" style="color: red">A receber</a>
                                                    </td>

                                                <?php } else { ?>
                                                    <td>
                                                        <a href="#" style=" color: green">Pago</a>
                                                    </td>
                                                <?php } ?>

                                                <td>R$<?= number_format($c['valor_recebido'], 2, ',', '.'); ?></td>
                                                <td>
                                                    <?= $c['forma_recebimento'] ?>
                                                </td>
                                                <td>
                                                    <?= $c['observacao'] ?>
                                                </td>
                                                <td><?= date("d/m/Y", strtotime($c['data_emissao'])); ?>
                                                </td>

                                                <td align="center">
                                                    <?php if ($c['codigo_venda']): ?>
                                                        <a
                                                            href="<?= site_url('P_vendas/ver_venda_codigo/') . $c['codigo_venda'] ?>">
                                                            <i class="material-icons">remove_red_eye</i>
                                                        </a>
                                                    <?php else: ?>
                                                        <i class="material-icons gray">remove_red_eye</i>

                                                    <?php endif; ?>
                                                </td>

                                                <td align="center">
                                                    <?php if ($c['status'] == 1): ?>
                                                        <i class="material-icons gray">mode_edit</i>
                                                    <?php else: ?>
                                                        <a
                                                            href="<?= site_url('P_contas_receber/editar_conta_receber/') . $c['id'] ?>">
                                                            <i class="material-icons">mode_edit</i>
                                                        </a>
                                                    <?php endif; ?>
                                                </td>

                                                <td align="center"><a data-toggle="modal" data-target="#exampleModal10"
                                                        data-pegaid="<?= $c['id'] ?>"><i
                                                            class="material-icons">delete</i></a></td>
                                            </tr>

                                        <?php } ?>

                                        <div class="modal fade" id="ModalReceber" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Digite as
                                                            informações do recebimento do valor</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="modal-danilo"
                                                            action="<?= site_url('p_contas_receber/atualiza_status') ?>"
                                                            method="post">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-line col-md-12">
                                                                        <label>Data de recebimento</label>
                                                                        <input type="date" name='data_fluxo' value=""
                                                                            class="form-control data-fluxo">
                                                                    </div>

                                                                    <div class="form-line col-md-6"
                                                                        style="display: none">
                                                                        <label>Conta Recebida</label>
                                                                        <!-- Uso os options no JS -->
                                                                        <select name="id_conta"
                                                                            class="form-control id_conta select-conta-recebida">
                                                                            <option value="">Selecione</option>

                                                                            <?php foreach ($bancos as $banco) { ?>
                                                                                <option value="<?= $banco['id'] ?>">
                                                                                    <?= $banco['descricao'] ?>
                                                                                </option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>

                                                                    <div style='margin-top:25px' class="form-line
                                                                        col-md-12">
                                                                        <button type="button" id="add-forma-recebimento"
                                                                            class="btn btn-success">Adicionar Forma de
                                                                            Pagamento</button>
                                                                        <button type="button" id="add-cheque" class="btn
                                                                            btn-success">Adicionar Cheque</button>
                                                                    </div>

                                                                </div>


                                                                <div class="col-md-12 multiplas-formas-campos">

                                                                    <h4 class='hidden titulo-pagamento'>Formas de
                                                                        Pagamento
                                                                        <hr>
                                                                    </h4>
                                                                    <div class="multiplas-formas-container">
                                                                        <!-- Campos extras para a opção "Multiplas formas" (inicialmente vazio) -->
                                                                    </div>

                                                                </div>

                                                                <div class="col-md-12">
                                                                    <h4 class='hidden titulo-cheque'>Cheques
                                                                        <hr>
                                                                    </h4>

                                                                    <div class="cheques-container">


                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Cancelar</button>
                                                                <button type="button"
                                                                    class="btn btn-primary waves-effect btn-envia-recebimento">Enviar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->

            <div class="modal fade" id="exampleModal10" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deseja excluir essa conta?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Tem certeza que deseja excluir essa conta de recebimento?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <a class="deleta" href="#"><button type="button" class="btn btn-danger">
                                    Deletar</button></a>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

            <script>

                $(document).ready(function () {

                    // Monitora as alterações no select principal
                    $('#forma_recebimento').change(function () {
                        updateFieldsVisibility($(this));
                    });

                    var contador = 0; // comeca com 0

                    $('#add-cheque').click(function () {

                        $('.titulo-cheque').removeClass('hidden');

                        let chequeCampos = `
                            <div class="form-line col-md-6 cheque-campos">
                                <input placeholder="Banco referente" type="text" name="banco_${contador}" style="margin-bottom: 10px" value="" class="form-control tt2 campo-banco">
                                <input placeholder="Titular do cheque" type="text" name="titular_${contador}" style="margin-bottom: 10px" value="" class="form-control mb-5 tt2 campo-banco">
                                <input placeholder="Recebido por" type="text" name="recebido_${contador}" style="margin-bottom: 10px" value="" class="form-control mb-5  tt2 campo-banco">
                                <input placeholder="Valor" type="text" name="valor_${contador}" style="margin-bottom: 10px" value="" class="form-control mb-5  tt2 campo-banco">
                                <input placeholder="Vencimento do Cheque" type="date" name="vencimento_cheque_${contador}" style="margin-bottom: 10px" value="" class="form-control mb-5 tt2 campo-banco">
                                <button type="button" class="btn btn-danger remove-cheque">Remover Cheque</button>
                            </div>
                        `;

                        $('.cheques-container').append(chequeCampos);

                        contador++; // soma 1 cada vez que adiciona um cheque novo pra poder alterar os names dos inputs

                    });

                    // Adiciona dinamicamente campos para múltiplas formas

                    var contadorPagamento = 0;
                    $('#add-forma-recebimento').click(function () {

                        let optionsContaRecebida = $('.select-conta-recebida').html();


                        $('.titulo-pagamento').removeClass('hidden');

                        let formaPagamentoDiv = `
                            <div class="form-line col-md-6 formas-campos">

                                <label>Conta recebida</label>
                                <select name="conta_bancaria_${contadorPagamento}" style="margin-bottom: 10px" required class="form-control show-tick mb-3 campos-pagamentos">
                                    ${optionsContaRecebida}
                                </select>

                                <label>Forma recebimento</label>
                                <select name="forma_recebimento_${contadorPagamento}" style="margin-bottom: 10px" required class="form-control show-tick mb-3 campos-pagamentos ">
                                    <option value="Dinheiro">Dinheiro</option>
                                    <option value="PIX">PIX</option>
                                    <option value="Débito">Débito</option>
                                    <option value="Crédito">Crédito</option>
                                    <option value="Transfêrencia Bancária">Transfêrencia Bancária</option>
                                    <option value="saldo">Saldo do Vendedor</option>

                                </select>
                                <label>Valor recebido</label>

                                <input placeholder="Digite o valor recebido" type="text" name="valor_recebido_${contadorPagamento}" style="margin-bottom: 10px" value="" class="form-control mb-3 mt-2 tt2 valor valor_pago campos-pagamentos">
                                <button type="button" class="btn btn-danger remove-forma-recebimento">Remover Forma</button>
                            </div>
                        `;


                        $('.multiplas-formas-container').append(formaPagamentoDiv);

                        contadorPagamento++;

                    });

                    $(document).on('click', '.btn-envia-recebimento', function () {

                        let valoresCheques = [];

                        // cheques
                        for (let i = 0; i < contador; i++) {

                            let cheque = {
                                banco: $('input[name="banco_' + i + '"]').val(),
                                titular: $('input[name="titular_' + i + '"]').val(),
                                recebido: $('input[name="recebido_' + i + '"]').val(),
                                valor: $('input[name="valor_' + i + '"]').val(),
                                vencimento_cheque: $('input[name="vencimento_cheque_' + i + '"]').val(),
                            };

                            valoresCheques.push(cheque);
                        }

                        let valoresFormaPagamento = [];

                        // formas de pagamentos
                        for (let c = 0; c < contadorPagamento; c++) {

                            let formaPagamento = {
                                conta: $('select[name="conta_bancaria_' + c + '"]').val(),
                                forma: $('select[name="forma_recebimento_' + c + '"]').val(),
                                valor: $('input[name="valor_recebido_' + c + '"]').val(),
                            };

                            valoresFormaPagamento.push(formaPagamento);
                        }

                        atualizaStatus(valoresFormaPagamento, valoresCheques)

                    })

                    function atualizaStatus(formaPagamento, cheque) {

                        var baseUrl = $('.base-url').val();

                        var data_fluxo = $('.data-fluxo').val();

                        var id_conta = $('.id_conta').val();

                        var idClicado = $('.btn-envia-recebimento').data('id');

                        let permissao = true;

                        if (formaPagamento.length == 0 && cheque.length == 0) {
                            alert('Preencha pelo menos uma forma de recebimento!');
                            permissao = false;
                        }

                        if (permissao) {

                            $.ajax({
                                type: 'post',
                                url: baseUrl + 'P_contas_receber/atualiza_status',
                                data: {
                                    formaPagamento: formaPagamento,
                                    cheque: cheque,
                                    id_banco: id_conta,
                                    data_fluxo: data_fluxo,
                                    id: idClicado
                                }, success: function (data) {
                                    var responseData = JSON.parse(data);
                                    if (responseData.success) {
                                        // Recarregar a página após o sucesso da atualização
                                        location.reload();
                                    } else {
                                        // Lidar com erros ou outras condições
                                        console.error('Erro ao atualizar status.');
                                    }
                                }

                            })

                        }


                    }

                    // Remove dinamicamente campos para múltiplos cheques
                    $(document).on('click', '.remove-cheque', function () {

                        // pega a posicao do array que foi removido
                        var posicaoRemovida = $(this).parent().index();

                        $(this).parent().remove();

                        $('.cheque-campos').each(function (index) {

                            // atualiza os names dos inputs
                            $(this).find('input').each(function () {

                                var nameVelho = $(this).attr('name');

                                var nameNovo = nameVelho.replace(new RegExp('_\\d+'), '_' + index);

                                $(this).attr('name', nameNovo);
                            });
                        });

                        // remove um do contador pra voltar somar dnv
                        contador--;

                        // atualiza a posicao do array
                        valoresCheques.splice(posicaoRemovida, 1);

                    });



                    // Remove dinamicamente campos para múltiplas formas
                    $(document).on('click', '.remove-forma-recebimento', function () {

                        // pega a posicao do array que foi removido
                        var posicaoRemovidaPagamento = $(this).parent().index();

                        $(this).parent().remove();

                        $('.formas-campos').each(function (index) {

                            // atualiza os names dos inputs
                            $(this).find('input, select').each(function () {
                                var nameElementoVelho = $(this).attr('name');
                                var nameElementoNovo = nameElementoVelho.replace(new RegExp('_\\d+'), '_' + index);
                                $(this).attr('name', nameElementoNovo);
                            });


                        });

                        // remove um do contador pra voltar somar dnv
                        contadorPagamento--;

                        // atualiza a posicao do array
                        valoresFormaPagamento.splice(posicaoRemovidaPagamento, 1);

                    });

                    // Monitora as alterações no select principal
                    $('#forma_recebimento').change(function () {
                        updateFieldsVisibility($(this));
                    });

                    // Função para atualizar a visibilidade dos campos
                    function updateFieldsVisibility(selectElement) {
                        // Se a opção "Cheque" estiver selecionada, mostra os campos extras para cheque
                        if (selectElement.val() === 'Cheque') {
                            selectElement.closest('.row').find('.cheque-campos').removeClass('hidden');
                        } else {
                            // Se outra opção estiver selecionada, oculta os campos extras de cheque
                            selectElement.closest('.row').find('.cheque-campos').addClass('hidden');
                        }

                        // Se a opção "Multiplas formas" estiver selecionada, mostra campos adicionais para múltiplas formas
                        if (selectElement.val() === 'Multiplas formas') {
                            $('.multiplas-formas-campos').removeClass('hidden');
                        } else {
                            // Se outra opção estiver selecionada, oculta os campos extras de múltiplas formas
                            $('.multiplas-formas-campos').addClass('hidden');
                        }
                    }

                });
            </script>

        </div>
</section>