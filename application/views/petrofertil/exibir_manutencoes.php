<?php

$status = $this->session->userdata('usuario');

if ($status != "logado") {

    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');

$nome_usuario = $this->session->userdata('nome_usuario');

?>

<style>
    #ModalPagar .modal-dialog {
        max-width: 600px;
    }

    #ModalPagar .modal-content {
        border-radius: 10px;
    }

    #ModalPagar .modal-body {
        padding: 20px;
    }

    #ModalPagar .modal-footer {
        justify-content: space-between;
        border-top: none;
    }

    #ModalPagar .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    #ModalPagar .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

<input type='hidden' value="<?= base_url() ?>" class="base-url">


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-3">
                <h2>Manutenções realizadas</h2>
            </div>

            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a style="margin-left: 5px" href="<?= base_url('P_manutencao/formulario_manutencao') ?>"><span
                        type="button" class="btn btn-info  waves-effect">ENTRADA</span></a>
            </div>

        </div>

        <!-- Widgets -->
        <div class="row clearfix">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-blue-grey hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Gasto total em manutenções
                        </div>
                        <div class="number">R$<?= number_format("$saldo", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-blue-grey hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Total de manutenções realizadas
                        </div>
                        <div class="number">R$<?= number_format("$previsao_caixa", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>


            <div class=" col-lg-8 col-md-7 col-sm-7 col-xs-12">
                <form class="" enctype="multipart/form-data"
                    action="<?= site_url('P_contas_pagar/filtra_contas_pagar/') ?>" method="post">

                    <div class="col-md-3">

                        <div class="form-group ">
                            <label>De:</label>
                            <input required type="date" value="" name="data_inicial" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group  ">
                            <label>Até:</label>
                            <input required type="date" value="" name="data_final" class="form-control">
                        </div>

                    </div>

                    <button type="submit" style="margin-top: 27px"
                        class="btn btn-primary ml-3 col-sm-3 col-md-3 col-xs-3 ">Filtrar</button>

            </div>

            </form>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="margin-top: 15px" class="card">
                        <div class="header">
                            <h2>
                                Manutenção
                            </h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr align="center">
                                            <th>#</th>
                                            <th>Data</th>
                                            <th>Placa</th>
                                            <th>Oficina</th>
                                            <th>Reclamação</th>
                                            <th>Ordem</th>
                                            <th>Valor</th>
                                            <th>Ver Mais</th>
                                            <th>Deletar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $contador = 1;
                                        foreach ($manutencoes as $m) {
                                            $serv_array = json_decode($m['servico'], true);
                                            $val_array = json_decode($m['valor'], true);

                                            if ($m['desconto'] == '') {
                                                $total = array_sum($val_array);
                                            } else {
                                                $total = array_sum($val_array) - $m['desconto'];
                                            }
                                            ?>
                                            <tr align="center">
                                                <td><?= $contador ?></td>
                                                <td><?= date("d/m/Y", strtotime($m['data'])); ?></td>
                                                <td><?= $m['placa'] ?></td>
                                                <td><?= $m['oficina'] ?></td>
                                                <td><?= $m['reclamacao'] ?></td>
                                                <td><a
                                                        href="<?= site_url('Ordem_servico/rever_ordem/' . $m['codigo']) ?>"><?= $m['codigo'] ?></a>
                                                </td>
                                                <td>R$<?= number_format($total, 2, ',', '.'); ?></td>
                                                <td><a
                                                        href="<?= base_url('manutencoes/ver_manutencao') . '/' . $m['id'] ?>"><i
                                                            class="fas fa-eye"></i></a></td>
                                                <td><a
                                                        href="<?= base_url('manutencoes/deleta_manutencao') . '/' . $m['id'] ?>"><i
                                                            class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                            <?php $contador++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->

            <div class="modal fade" id="deletar_conta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            Tem certeza que deseja excluir essa conta?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <a class="deleta" href="#"><button type="button" class="btn btn-danger">
                                    Deletar</button></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</section>

<script type="text/javascript">
    var bancos = <?php echo json_encode($bancos); ?>;
    var cheques = <?php echo json_encode($cheques); ?>;

</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>

    $(document).ready(function () {

        var count = 1;
        $(document).on('click', '.btn-duplica-campos', function () {

            let selectBanco = $('.div-select-banco').html();
            let selectPagamento = $('.div-select-pagamento').html();
            let inputValor = $('.div-input-valor').html();
            let selectCheque = $('.div-cheque').html();

            let inputQtdParcela = $('.input-quantidade-parcela').html();
            let inputParcela = $('.input-parcela').html();


            let campos = `
                <div class="campos-duplicados row">
                    <div class="col-md-4 campo-${count} campo select-pagamento-${count}">${selectPagamento}</div>
                    <div class="col-md-3 campo-${count} campo input-quantidade-parcela-${count}" style="display:none">${inputQtdParcela}</div>
                    <div class="col-md-3 campo-${count} campo input-parcela-${count}" style="display:none">${inputParcela}</div>
                    <div class="col-md-4 campo-${count} campo select-banco-${count}">${selectBanco}</div>
                    <div class="col-md-4 campo-${count} campo select-cheque-${count}" style="display:none">${selectCheque}</div>
                    <div class="col-md-3 campo-${count} campo input-valor-${count}">${inputValor}</div>

                    <div class="col-md-auto">
                        <button type="button" class="btn btn-danger remove-payment-method  btn-remover">X</button>
                    </div>
                </div>

            `;

            $('.elementos-duplicados').append(campos);

            $('.select-banco-' + count + ' select').attr('name', 'conta_banco_' + count);
            $('.select-pagamento-' + count + ' select').attr('name', 'forma_pagamento_' + count);
            $('.input-valor-' + count + ' input').attr('name', 'valor_' + count);

            $('.select-pagamento-' + count + ' select').on('change', function () {
                exibeInputCheque($(this));
            });


            count++;

        });

        function exibeInputCheque(itemSelecionado) {
            var countAtual = itemSelecionado.closest('.campos-duplicados').index() + 1;

            if (itemSelecionado.val() == "cheque") {
                $('.select-banco-' + countAtual).css('display', 'none');
                $('.input-valor-' + countAtual).css('display', 'none');
                $('.select-cheque-' + countAtual).css('display', 'block');
            } else if (itemSelecionado.val() == "parcelado") {

                $('.select-banco-' + countAtual).css('display', 'none');
                $('.input-valor-' + countAtual).css('display', 'none');
                $('.input-parcela-' + countAtual).css('display', 'block');
                $('.input-quantidade-parcela-' + countAtual).css('display', 'block');

            } else {
                $('.select-banco-' + countAtual).css('display', 'block');
                $('.input-valor-' + countAtual).css('display', 'block');
                $('.select-cheque-' + countAtual).css('display', 'none');
                $('.input-parcela-' + countAtual).css('display', 'none');
                $('.input-quantidade-parcela-' + countAtual).css('display', 'none');
            }
        }

        $(document).on('change', '.select-pagamento-0 select', function () {
            exibeInputCheque($(this));
        });

        $(document).on('click', '.btn-envia-recebimento', function () {

            let idClicado = $('.id-clicado-val').val();

            let formasPagamento = [];

            // formas de recebimento
            for (let i = 0; i < count; i++) {

                let formaPagamento = {
                    forma: $('.select-pagamento-' + i + ' select').val(),
                    banco: $('.select-banco-' + i + ' select').val(),
                    valor: $('input[name="valor_' + i + '"]').val(),
                    cheque: $('.select-cheque-' + i + ' select').val(),
                    valorParcela: $('.input-parcela-' + i + ' input').val(),
                    qtdParcela: $('.input-quantidade-parcela-' + i + ' input').val(),

                };

                formasPagamento.push(formaPagamento);
            }

            enviaPagamento(formasPagamento, idClicado);
        })

        function enviaPagamento(formaPagamento, idClicado) {

            var baseUrl = $('.base-url').val();

            var data_fluxo = $('#data_fluxo').val();


            $.ajax({
                type: 'post',
                url: baseUrl + 'P_contas_pagar/atualiza_status',
                data: {
                    formaPagamento: formaPagamento,
                    data_fluxo: data_fluxo,
                    idConta: idClicado
                }, success: function (data) {
                    // Recarregar a página após o sucesso da atualização
                    location.reload();
                }

            })
        }

        $(document).on('click', '.btn-remover', function () {

            // pega a posicao do array que foi removido, soma 1 por causa dos campos fixos
            var posicaoRemovida = $(this).closest('.campos-duplicados').index() + 1;

            $(this).closest('.campos-duplicados').remove();

            $('.campos-duplicados').find('.campo').each(function (index) {
                // Atualiza os names dos inputs e selects dentro desta div
                $(this).find('input, select').each(function () {
                    var nameVelho = $(this).attr('name');
                    var nameNovo = nameVelho.replace(new RegExp('_\\d+'), '_' + posicaoRemovida);
                    $(this).attr('name', nameNovo);
                });


            });


            $('.campos-duplicados').each(function (index) {

                // atualiza os names dos inputs
                $(this).find('input, select').each(function () {

                    var nameVelho = $(this).attr('name');

                    var nameNovo = nameVelho.replace(new RegExp('_\\d+'), '_' + index);

                    $(this).attr('name', nameNovo);
                });
            });

            // remove um do contador pra voltar somar dnv
            count--;

            // atualiza a posicao do array
            valoresCheques.splice(posicaoRemovida, 1);

        });

    })

    $(document).on('click', '.abre-modal-pagar', function () {

        let idClicado = $(this).data('cli-id');

        $('.id-clicado-val').val(idClicado);
    })




    document.getElementById('add-payment-method').addEventListener('click', addPaymentMethod);


    function generateBankOptions() {
        var optionsHTML = '<option value="">Selecione o Banco</option>';
        bancos.forEach(function (banco) {
            optionsHTML += `<option value="${banco.id}">${banco.descricao}</option>`;
        });
        return optionsHTML;
    }


    function addPaymentMethod() {
        var paymentMethodsDiv = document.getElementById('payment-methods');
        var newPaymentMethod = document.createElement('div');
        newPaymentMethod.classList.add('row', 'payment-method');
        newPaymentMethod.innerHTML = `
        <div class="col-md-4">
            <select name="forma_pagamento[]" class="form-control payment-method-select">
                <option value="dinheiro">Dinheiro</option>
                <option value="pix">Pix</option>
                <option value="transferencia bancaria">Transferência Bancária</option>
                <option value="cheque">Cheque</option>
            </select>
        </div>
        <div class="col-md-4">
            <select name="conta_banco[]" class="form-control account-select">
                ${generateBankOptions()}
            </select>
        </div>
        <div class="col-md-3">
            <input type="text" name="valor[]" placeholder="Digite o valor" class="form-control valor">
        </div>
        <div class="col-md-auto">
            <button type="button" class="btn btn-danger remove-payment-method">X</button>
        </div>
    `;
        paymentMethodsDiv.appendChild(newPaymentMethod);

        // Adiciona um segundo select para cheques se a forma de pagamento escolhida for "cheque"
        var selects = newPaymentMethod.querySelectorAll('.payment-method-select');
        selects.forEach(function (select) {
            select.addEventListener('change', function () {
                if (select.value === 'cheque') {
                    addChequeSelect(newPaymentMethod);
                } else {
                    removeChequeSelect(newPaymentMethod);
                }
            });
        });
    }

    // comecando






</script>