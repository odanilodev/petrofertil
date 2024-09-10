<?php 
	
	$status = $this->session->userdata('usuario');
	
	if($status != "logado"){
		
		redirect('financeiro/verifica_login');
	}
	
	$usuario = $this->session->userdata('login');
	
	$nome_usuario = $this->session->userdata('nome_usuario');

?>

<section class="content">
<input type='hidden' value="<?= base_url()?>" class="base-url">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-3">
                <h2 id='nome-vendedor' data-vendedor="<?= $vendedor['nome'] ?>">CONTAS A PAGAR PARA <?= strtoupper($vendedor['nome']) ?></h2>

            </div>

            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a style="margin-left: 5px" href="<?= base_url('P_contas_pagar/cadastrar_conta/') ?>"><span type="button"
                        class="btn btn-info  waves-effect">ENTRADA</span></a>
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
                        <div class="text">Saldo Vendedor</div><?php $saldo_vendedor = $vendedor['saldo'] ?>
                        <div class="number">R$<?= number_format("$saldo_vendedor", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>

            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="info-box bg-cyan hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Contas a receber</div>
                        <div class="number">R$<?= number_format("$receber_total", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>

            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="info-box bg-brown hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Constas a pagar</div>
                        <div class="number">R$<?= number_format("$pagar_total", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>
            <div class=" col-lg-8 col-md-7 col-sm-7 col-xs-12">
                <form class="" enctype="multipart/form-data"
                    action="<?= site_url('P_vendedores_petrofertil/saldo_vendedor/'. $vendedor['nome']) ?>" method="post">

                    <!-- <div class="col-md-3">

                        <div class="form-group ">
                            <label>Status:</label>
                            <select require name="status" class="form-control show-tick">
                                <option>Selecione</option>
                                <option value="0">Em Aberto</option>
                                <option value="1">Pago</option>
                                <option value="2">Geral</option>

                            </select>
                        </div>

                </div> -->

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
                                CONTAS A PAGAR SOB COMISSÃO        
                                <button class="btn btn-success btn-pagamento" style="display: none; float: right;"
                            onclick="exibirModalContas()">Realizar Pagamento</button>      
                           </h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>
                                                <input type="checkbox" class="check-all-contas" onclick="selecioneTodasContasVendedor()" style="cursor: pointer">
                                            </th>
                                            <th>Vencimento</th>
                                            <th>Valor</th>
                                            <th>Pagar para</th>
                                            <th>Forma Pagamento</th>
                                            <th>Status conta</th>
                                            <th>Valor Pago</th>
                                            <th>Observação</th>
                                            <th>Data emissão</th>

                                            <th>Editar</th>
                                            <th>Deletar</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>

                                        <?php $contador =1;  foreach($contas as $c){ ?>

                                        <tr>
                                            <td><?= $contador ?></td>

                                            <td>
                                                <?php if($c['status'] == 0){ ?>

                                                <input type="checkbox" class="check-contas" value="<?= $c['id']; ?>" data-valor="<?= $c['valor'] ?>" style="cursor: pointer">

                                                <?php } else { ?>

                                                    <input disabled checked type="checkbox">

                                                <?php } ?>
                                            </td>


                                            <td><?= date("d/m/Y", strtotime($c['vencimento'])) ?></td>
                                            <td>R$<?= number_format($c['valor'], 2, ',', '.') ?></td>
                                            <td><?= $c['pago_para'] ?></td>
                                            <td><?= $c['forma_pagamento'] ?></td>

                                            <?php  if($c['status'] == 0){  ?>
                                            <td>
                                                <a class="abre-modal-pagar" data-nome="<?=  $this->uri->segment(3)?>" data-toggle="modal" data-cli-id="<?=$c['id']?>"
                                                    data-cli-dat="<?=$c['vencimento']?>"
                                                    data-cli-nom="<?=$c['contribuinte_nome']?>"
                                                    data-target="#ModalPagar" style="color: red" data-valor="<?= $c['valor']?>">A pagar</a>
                                            </td>
                                            <?php }else{ ?>
                                            <td>
                                                <a href="<?= base_url('P_contas_pagar/deleta_status/').$c['id'] ?>"
                                                    style=" color: green">Pago</a>
                                            </td>
                                            <?php } ?>

                                            <td>R$<?= number_format($c['valor_pago'], 2, ',', '.') ?></td>

                                            <td><?= $c['observacao'] ?></td>

                                            <td><?= date("d/m/Y", strtotime($c['data_emissao'])); ?></td>

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

                                            <td align="center"><a data-toggle="modal" data-target="#deletar_conta"
                                                    data-pegaid="<?= $c['id'] ?>"><i
                                                        class="material-icons">delete</i></a></td>
                                        </tr>

                                        <?php $contador++; }  ?>

                                        <div class="modal fade modal-pagar-vendedor" id="ModalPagar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Digite a data em que foi pago, o valor e a forma de pagamento</h5>
                                                        <button type="button" class="close cancelar-modal" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="modal-danilo" action="#" method="post" class="modal-pagamento-vendedor">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="data_fluxo">Data de Pagamento:</label>
                                                                    <input type="date" name="data_fluxo" id="data_fluxo" class="form-control tt2">
                                                                </div>
                                                            </div>

                                                            <div id="payment-methods" class="mt-3">
                                                                <div class="row">
                                                                    <div class="col-md-4 div-select-pagamento select-pagamento-0">
                                                                        <select name="forma_pagamento_0" class="form-control payment-method-select metodo-pagamento">
                                                                            <option value="" selected disabled>Selecione o método</option>
                                                                            <option value="dinheiro">Dinheiro</option>
                                                                            <option value="pix">Pix</option>
                                                                            <option value="transferencia_bancaria">Transferência Bancária</option>
                                                                            <option value="cheque">Cheque</option>
                                                                            <option value="saldo">Saldo do vendedor</option>

                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4 div-select-banco select-banco-0">

                                                                        <select name="conta_banco_0" class="form-control account-select">
                                                                            <option value="" selected disabled>Selecione o banco</option>

                                                                            <?php foreach($bancos as $banco) { ?>
                                                                                
                                                                                <option value="<?= $banco['descricao']?>"><?= $banco['descricao']?></option>
                                                                            <?php }?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-4 div-cheque select-cheque-0" style="display: none">

                                                                        <select name="cheque_0" class="form-control account-select">
                                                                            <option value="" selected disabled>Selecione o cheque</option>

                                                                            <?php foreach($cheques as $cheque) { ?>
                                                                                
                                                                                <option value="<?= $cheque['id']?>">
                                                                                    <?= $cheque['banco'] . ' - ' . $cheque['valor'] . ' - ' . date('d/m', strtotime($cheque['data_compensasao'])) ?>
                                                                                </option>

                                                                            <?php }?>
                                                                        </select>
                                                                    </div>


                                                                    <div class="col-md-3 div-input-valor input-valor-0">
                                                                        <input type="text" name="valor_0" placeholder="Digite o valor" class="form-control valor input-valor-conta">
                                                                    </div>
                                                                   
                                                                </div>
                                                            </div>

                                                            <div class="elementos-duplicados row">
                                                                
                                                                <!-- JS -->
                                                            </div>


                                                            <button type="button" class="btn btn-secondary btn-duplicar btn-duplica-campos" >Adicionar Forma de Pagamento</button>
                                                        </form>
                                                    </div>

                                                        <input type="hidden" class="id-clicado-val">
                                                        <input type="hidden" class="nome-clicado-val">
                                                        <input type="hidden" class="valores-contas">
                                                        <input type="hidden" id="input-valor-conta">
                                                        <div class="modal-footer">
                                                        <span class="total-valores" style="float: left"></span>
                                                        <button type="button" class="btn btn-danger cancelar-modal" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary waves-effect btn-envia-recebimento-pagar btn-envia-pagamento-vendedor">Enviar</button>
                                                    </div>
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

             <!-- Exportable Table -->
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="margin-top: 15px" class="card">
                        <div class="header">
                            <h2>
                                Contas a Receber

                                <button class="btn btn-success btn-pagamento-receber" style="display: none; float: right;"
                            onclick="exibirModalContasReceber()">Realizar Pagamento</button>      
                            </h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>
                                                <input type="checkbox" class="check-all-contas-receber" onclick="receberVendedor()" style="cursor: pointer">
                                            </th>
                                            <th>Vencimento</th>
                                            <th>Valor</th>
                                            <th>Cliente</th>
                                            <th>Recebido de</th>
                                            <th>Banco referente</th>
                                            <th>Status conta</th>
                                            <th>Valor recebido</th>
                                            <th>Forma recebimento</th>
                                            <th>Observacao</th>
                                            <th>Data emissão</th>

                                            <th>Editar</th>
                                            <th>Deletar</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>

                                        <?php $contador =1;  foreach($contas_receber as $c){ ?>

                                        <tr>
                                            <td><?= $contador ?></td>
                                            <td>
                                                <?php if($c['status'] == 0){ ?>

                                                <input type="checkbox" class="check-contas-receber" value="<?= $c['id']; ?>" data-valor="<?= $c['valor'] ?>" style="cursor: pointer">

                                                <?php } else { ?>

                                                    <input disabled checked type="checkbox">

                                                <?php } ?>
                                            </td>
                                            <td><?= date("d/m/Y", strtotime($c['vencimento'])); ?></td>
                                            <td>R$<?= $c['valor'] ?></td>
                                            <td><?= $c['nome_fantasia'] ?></td>
                                            <td><?= $c['recebido_de'] ?></td>
                                            <td><?= $c['descricao'] ?></td>

                                            <?php  if($c['status'] == 0){  ?>

                                            <td>
                                                <a data-toggle="modal" data-cli-id="<?=$c['id']?>"
                                                    data-cli-dat="<?=$c['vencimento']?>"
                                                    data-cli-nom="<?=$c['nome_fantasia']?>" data-target="#ModalReceber"
                                                    style="color: red">A receber</a>
                                            </td>

                                            <?php }else{ ?>
                                            <td>
                                                <a href="<?= base_url('P_contas_receber/deleta_status/').$c['id'] ?>"
                                                    style=" color: green">Pago</a>
                                            </td>
                                            <?php } ?>

                                            <td>R$<?= $c['valor_recebido'] ?></td>
                                            <td><?= $c['forma_recebimento'] ?></td>

                                            <td><?= $c['observacao'] ?></td>

                                            <td><?= date("d/m/Y", strtotime($c['data_emissao'])); ?></td>


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

                                        <?php $contador++; }  ?>

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

        <div class="modal fade" id="ModalReceber" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Digite as informações do recebimento do valor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="modal-danilo" action="<?= site_url('p_contas_receber/atualiza_status') ?>" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-line col-md-12">
                                        <label>Data de recebimento</label>
                                        <input type="date" name='data_fluxo' value="" class="form-control data-fluxo">
                                    </div>

                                    <div class="col-md-6" style="display: none">
                                    <label>Conta Recebimento</label>

                                    <select name="conta_bancaria" class="form-control id-banco select-conta-recebida">
                                        <option value="" selected disabled>Selecione o banco</option>

                                        <?php foreach($bancos as $bancaria) { ?>
                                            
                                            <option value="<?= $bancaria['id']?>"><?= $bancaria['descricao']?></option>
                                        <?php }?>
                                    </select>

                                    </div>

                                    

                                <div style='margin-top:25px' class="form-line col-md-12">
                                    <button type="button" id="add-forma-recebimento" class="btn btn-success">Adicionar Forma de Pagamento</button>
                                    <button type="button" id="add-cheque" class="btn btn-success">Adicionar Cheque</button>
                                </div>
                                    
                            </div>


                                <div class="col-md-12 multiplas-formas-campos">

                                    <h4 class='hidden titulo-pagamento'>Formas de Pagamento<hr></h4>
                                    <div class="multiplas-formas-container">
                                        <!-- Campos extras para a opção "Multiplas formas" (inicialmente vazio) -->
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <h4 class='hidden titulo-cheque'>Cheques<hr></h4>

                                    <div class="cheques-container">
                                        
                                    
                                    </div>

                                </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" class="input-id-receber">
                        <input type="hidden" class="valores-contas-receber">
                        <span class="total-valores-receber" style="float: left"></span>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary waves-effect btn-envia-recebimento btn-recebe-vendedor">Enviar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>


</section>


<!-- Comeca aqui -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>

    // Detecta quando o modal é fechado
    $(document).ready(function() {

        $('#ModalPagar').on('hidden.bs.modal', function () {
            $('.btn-envia-recebimento-pagar').removeClass('pagamento-multiplo');

        });

        $('#ModalReceber').on('hidden.bs.modal', function () {
            $('.btn-recebe-vendedor').removeClass('pagamento-multiplo');

        });
    });

$(document).ready(function () {

    var count = 1;                                                                        
    $(document).on('click', '.btn-duplica-campos', function () {

    let selectBanco = $('.div-select-banco').html();
    let selectPagamento = $('.div-select-pagamento').html();
    let inputValor = $('.div-input-valor').html();
    let selectCheque =  $('.div-cheque').html();

    let campos = `
        <div class="campos-duplicados row">
            <div class="col-md-4 campo-${count} campo select-pagamento-${count}">${selectPagamento}</div>
            <div class="col-md-4 campo-${count} campo select-banco-${count}">${selectBanco}</div>
            <div class="col-md-4 campo-${count} campo select-cheque-${count}" style="display:none">${selectCheque}</div>
            <div class="col-md-3 campo-${count} campo valor-mask input-valor-${count}">${inputValor}</div>

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


    count ++;

});

function exibeInputCheque(itemSelecionado) {

    var countAtual = itemSelecionado.closest('.campos-duplicados').index() + 1;

    if (itemSelecionado.val() == "cheque") {
        $('.select-banco-' + countAtual).css('display', 'none');
        $('.input-valor-' + countAtual).css('display', 'none');
        $('.select-cheque-' + countAtual).css('display', 'block');
    } else {
        $('.select-banco-' + countAtual).css('display', 'block');
        $('.input-valor-' + countAtual).css('display', 'block');
        $('.select-cheque-' + countAtual).css('display', 'none');
    }
    }

    $(document).on('change', '.select-pagamento-0 select', function () {
        exibeInputCheque($(this));
    });

    $(document).on('click', '.btn-envia-recebimento-pagar', function () {

        let valorTotal = 0;
        $('.input-valor-conta').each(function () {
            valorTotal = parseFloat($(this).val()) + valorTotal;
        })

        let valorConta = $('#input-valor-conta').val();

        if (valorTotal > valorConta) {

            alert('Valor maior que a conta');

            return;
        } 


        let idClicado = $('.id-clicado-val').val();

        let formasPagamento = [];

        // formas de recebimento
        for (let i = 0; i < count; i++) {

            let formaPagamento = {
                forma: $('.select-pagamento-' + i + ' select').val(),
                banco: $('.select-banco-' + i + ' select').val(),
                valor: $('input[name="valor_' + i + '"]').val(),
                cheque: $('.select-cheque-' + i + ' select').val(),

            };

            formasPagamento.push(formaPagamento);
        }

        if ($(this).hasClass('pagamento-multiplo')) {

            var caminhoFuncao = "P_contas_pagar/atualiza_status_multiplo";
        } else {

            var caminhoFuncao = "P_contas_pagar/atualiza_status";

        }

        enviaPagamento(formasPagamento, idClicado, caminhoFuncao);
    })

    function enviaPagamento(formaPagamento, idClicado, caminhoFuncao) {
        
        var baseUrl = $('.base-url').val();

        var data_fluxo = $('#data_fluxo').val();

        var nomeVendedor = $('#nome-vendedor').data('vendedor');

        var valorTotal = $('.total-valores').data('total');

        $.ajax({
            type: 'post',
            url: baseUrl + caminhoFuncao,
            data: {
                formaPagamento: formaPagamento,
                data_fluxo: data_fluxo,
                idConta: idClicado,
                nomeVendedor: nomeVendedor,
                valorTotal: valorTotal

            }, success: function (data) {
                // Recarregar a página após o sucesso da atualização
                location.reload();

                $('.btn-envia-recebimento-pagar').removeClass('pagamento-multiplo');

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

    $('#input-valor-conta').val($(this).data('valor'));

    $('.id-clicado-val').val(idClicado);


})





$(document).ready(function () {
                    
    // Monitora as alterações no select principal
    $('#forma_recebimento').change(function () {
        updateFieldsVisibility($(this));
    });
    
    var contador = 0; // comeca com 0

    $('#add-cheque').click(function () {

        $('.titulo-cheque').removeClass('hidden');

        let chequeCampos = `
            <div class="form-line col-md-6 cheque-campos" style="margin-bottom: 20px">
                <input placeholder="Banco referente" type="text" name="banco_${contador}" style="margin-bottom: 10px" value="" class="form-control tt2 campo-banco">
                <input placeholder="Titular do cheque" type="text" name="titular_${contador}" style="margin-bottom: 10px" value="" class="form-control mb-5 tt2 campo-banco">
                <input placeholder="Recebido por" type="text" name="recebido_${contador}" style="margin-bottom: 10px" value="" class="form-control mb-5  tt2 campo-banco">
                <input placeholder="Valor" type="text" name="valor_cheque_${contador}" style="margin-bottom: 10px" value="" class="form-control mb-5 valor tt2 campo-banco">
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

        $('.titulo-pagamento').removeClass('hidden');

        let optionsContaRecebida = $('.select-conta-recebida').html();

        let formaPagamentoDiv = `
            <div class="form-line col-md-6 formas-campos" style="margin-top: 20px;">

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

        contadorPagamento ++;

    });

    $(document).on('click', '.btn-envia-recebimento', function () {

        let valoresCheques = [];

        // cheques
        for (let i = 0; i < contador; i++) {

            let cheque = {
                banco: $('input[name="banco_' + i + '"]').val(),
                titular: $('input[name="titular_' + i + '"]').val(),
                recebido: $('input[name="recebido_' + i + '"]').val(),
                valor: $('input[name="valor_cheque_' + i + '"]').val(),
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


        if ($(this).hasClass('pagamento-multiplo')) {

            var caminhoFuncao = "P_contas_receber/atualiza_status_multiplo";
            } else {

            var caminhoFuncao = "P_contas_receber/atualiza_status";

        }

        atualizaStatus(valoresFormaPagamento, valoresCheques, caminhoFuncao)
        
    })

    function atualizaStatus(formaPagamento, cheque, caminhoFuncao) {

        var baseUrl = $('.base-url').val();

        var data_fluxo = $('.data-fluxo').val();

        var id_banco = $('.id-banco').val();

        var idClicado = $('.btn-envia-recebimento').data('id') ? $('.btn-envia-recebimento').data('id') : $('.input-id-receber').val();

        var nomeVendedor = $('#nome-vendedor').data('vendedor');

        var valorTotal = $('.total-valores-receber').data('total');

        $.ajax({
            type: 'post',
            url: baseUrl + caminhoFuncao,
            data: {
                formaPagamento: formaPagamento,
                cheque: cheque,
                data_fluxo: data_fluxo,
                id_banco: id_banco,
                id: idClicado,
                nomeVendedor: nomeVendedor,
                valorTotal: valorTotal

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
            //selecioneTodasContasVendedor
            
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

    
});
</script>

<script>
const selecioneTodasContasVendedor = () => {

    var ids = [];
    var valores = [];
    

    if ($('.check-all-contas').is(':checked')) {

        // deixa todos os checkbox ativos
        $('.check-contas').prop("checked", true);

        $('.check-contas').each(function() {

            var value = $(this).val(); //id

            var valor = $(this).data('valor');

            ids.push(value);
            valores.push(valor);

            $('.btn-pagamento').css('display', 'flex');

            $('.btn-pagamento').html('Realizar Pagamento de (' + ids.length +
            ')'); // exibe a quantidade clicada no btn
            $('.btn-pagamento').css('display', 'flex');

        });

        $('.id-clicado-val').val(ids);
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
            valores.push(valor);

            $('.id-clicado-val').val(ids);

            $('.btn-pagamento').css('display', 'flex');

            $('.btn-pagamento').html('Realizar Pagamento de (' + ids.length + ')');

            // $('.recebido-contas').val(recebidos);

            // $('.id-clicado-val').val(ids);

            $('.valores-contas').val(valores);

        } else {

            $(this).prop("checked", false);

            var index = ids.indexOf(value);

            if (index !== -1) {

                ids.splice(index, 1);
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

            $('.id-clicado-val').val(ids);
            $('.valores-contas').val(valores);
        }
        console.log(ids)

    });

    console.log(ids)

}


// click nas contas um por vez
var ids = [];
var valores = [];
$(document).on('click', '.check-contas', function() {

    var value = $(this).val();

    if ($(this).is(':checked')) {

        var recebido = $(this).data('recebido');
        var vencimento = $(this).data('vencimento');
        var valor = $(this).data('valor');

        ids.push(value);
        valores.push(valor);

        $('.btn-pagamento').css('display', 'flex');

        $('.btn-pagamento').html('Realizar Pagamento de (' + ids.length + ')');

        $('.id-clicado-val').val(ids);
        $('.valores-contas').val(valores);

    } else {

        $(this).prop("checked", false);

        var index = ids.indexOf(value);

        if (index !== -1) {

            ids.splice(index, 1);
            valores.splice(index, 1);

            $('.conta-' + value).remove();

            if (ids.length == 0) {

                $('.btn-pagamento').css('display', 'none');
                $('.btn-pagamento').html('Realizar Pagamento de (' + ids.length + ')');

            } else {

                $('.btn-pagamento').css('display', 'flex');
                $('.btn-pagamento').html('Realizar Pagamento de (' + ids.length + ')');
            }

            $('.id-clicado-val').val(ids);
            $('.valores-contas').val(valores);
        }

    }

});

// click nas contas um por vez
var ids = [];
var valores = [];
$(document).on('click', '.check-contas-receber', function() {

    var value = $(this).val();

    if ($(this).is(':checked')) {

        var valor = $(this).data('valor');

        ids.push(value);
        valores.push(valor);

        $('.btn-pagamento-receber').css('display', 'flex');

        $('.btn-pagamento-receber').html('Receber de (' + ids.length + ')');

        $('.input-id-receber').val(ids);
        $('.valores-contas-receber').val(valores);

    } else {

        $(this).prop("checked", false);

        var index = ids.indexOf(value);

        if (index !== -1) {

            ids.splice(index, 1);
            valores.splice(index, 1);

            $('.conta-' + value).remove();

            if (ids.length == 0) {

                $('.btn-pagamento-receber').css('display', 'none');
                $('.btn-pagamento-receber').html('Receber de (' + ids.length + ')');

            } else {

                $('.btn-pagamento-receber').css('display', 'flex');
                $('.btn-pagamento-receber').html('Receber de (' + ids.length + ')');
            }

            $('.input-id-receber').val(ids);
            $('.valores-contas-receber').val(valores);
        }

    }

});


const exibirModalContas = () => {

    $('.btn-envia-recebimento-pagar').addClass('pagamento-multiplo');

    $('.form-contas').html('');
    $('#ModalPagar').modal('show');

    var todosId = $('.id-clicado-val').val().split(',');
    var todosValores = $('.valores-contas').val().split(',');

    var totalValores = 0; // Variável para armazenar o valor total

    for (let c = 0; c < todosId.length; c++) {
       
        totalValores += parseFloat(todosValores[c]); 
    }

    let totalFormatado = totalValores.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });

    // Atualizar o conteúdo HTML
    $('.total-valores').attr('data-total', `${totalValores}`);
    $('.total-valores').html(`Total: <b>${totalFormatado}</b>`);

}

</script>

<script>

function receberVendedor () {
        
    var ids = [];
    var valores = [];

    if ($('.check-all-contas-receber').is(':checked')) {

        // deixa todos os checkbox ativos
        $('.check-contas-receber').prop("checked", true);

        $('.check-contas-receber').each(function() {

            var value = $(this).val(); //id

            var valor = $(this).data('valor');

            ids.push(value);
            valores.push(valor);

            $('.btn-pagamento-receber').css('display', 'flex');

            $('.btn-pagamento-receber').html('Receber de (' + ids.length +
            ')'); // exibe a quantidade clicada no btn
            $('.btn-pagamento-receber').css('display', 'flex');

        });

        $('.input-id-receber').val(ids);
        $('.valores-contas-receber').val(valores); 

    } else {

        $('.check-contas-receber').prop("checked", false);
        $('.btn-pagamento-receber').css('display', 'none'); 

    }

    // click nos ativos para remover o checked do registro (1 por 1)
    $(document).on('click', '.check-contas-receber', function() {

        var value = $(this).val();

        if ($(this).is(':checked')) {

            var recebido = $(this).data('recebido');

            var valor = $(this).data('valor');

            ids.push(value);
            valores.push(valor);

            $('.input-id-receber').val(ids);

            $('.btn-pagamento-receber').css('display', 'flex');

            $('.btn-pagamento-receber').html('Receber de (' + ids.length + ')');

            // $('.recebido-contas').val(recebidos);

            // $('.id-clicado-val').val(ids);

            $('.valores-contas-receber').val(valores);

        } else {

            $(this).prop("checked", false);

            var index = ids.indexOf(value);

            if (index !== -1) {

                ids.splice(index, 1);
                valores.splice(index, 1);

                $('.conta-' + value).remove();

                if (ids.length == 0) {

                    $('.btn-pagamento-receber').css('display', 'none');
                    $('.btn-pagamento-receber').html('Receber de (' + ids.length + ')');

                } else {

                    $('.btn-pagamento-receber').css('display', 'flex');
                    $('.btn-pagamento-receber').html('Receber de (' + ids.length + ')');
                }
            }

            $('.input-id-receber').val(ids);
            $('.valores-contas-receber').val(valores);
        }
        console.log(ids)

    });

    console.log(ids)
}



const exibirModalContasReceber = () => {

    $('.btn-recebe-vendedor').addClass('pagamento-multiplo');

    $('.form-contas').html('');
    $('#ModalReceber').modal('show');

    var todosId = $('.input-id-receber').val().split(',');
    var todosValores = $('.valores-contas-receber').val().split(',');

    var totalValores = 0; // Variável para armazenar o valor total

    for (let c = 0; c < todosId.length; c++) {
    
        totalValores += parseFloat(todosValores[c]); 
    }

    let totalFormatado = totalValores.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });

    // Atualizar o conteúdo HTML
    $('.total-valores-receber').attr('data-total', `${totalValores}`);
    $('.total-valores-receber').html(`Total: <b>${totalFormatado}</b>`);

}

</script>