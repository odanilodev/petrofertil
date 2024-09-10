<?php
$status = $this->session->userdata('usuario');

if ($status != "logado") {
    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');
$nome_usuario = $this->session->userdata('nome_usuario');
?>


<style>
    .caixa_display {
        display: none;
    }

    .caixa_display2 {
        display: none;
    }

    .ocultador {
        display: block;
    }

    .ocultador2 {
        display: block;
    }
</style>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-3">
                <h2>FLUXO DE CAIXA</h2>
            </div>

            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">

                <button id="olho" type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">remove_red_eye</i>
                </button>

                <a style="margin-left: 5px" href="<?= base_url('P_caixa/formulario_entrada_fluxo') ?>"><span
                        type="button" class="btn btn-default  waves-effect">ENTRADA</span></a>
                <a style="margin-left: 5px" href="<?= base_url('P_caixa/formulario_saida_fluxo') ?>"><span type="button"
                        class="btn btn-default  waves-effect">SAÍDA</span></a>
                <a style="margin-left: 5px" href="<?= base_url('P_caixa/formulario_contas_bancarias') ?>"><span
                        type="button" class="btn btn-info  waves-effect">CADASTRO DE CONTA BANCÁRIA</span></a>

            </div>

        </div>

        <!-- Widgets -->
        <div class="row clearfix">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box  hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Caixa Total</div>
                        <div id="caixa" class="number caixa_display">
                            R$<?= number_format("$saldo", 2, ",", "."); ?></div>
                        <div id="ocultador" class="number ocultador">R$ ------------ </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-blue-info hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Cheques a Compensar</div>
                        <div id="caixa2" class="number caixa_display2">
                            R$<?= number_format("$valor_acompensar", 2, ",", "."); ?></div>
                        <div id="ocultador2" class="number ocultador">R$ ------------ </div>
                    </div>
                </div>
            </div>

            <?php if (isset($entrada) and isset($gastos)) { ?>


                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">attach_money</i>
                        </div>
                        <div class="content">
                            <div class="text">Entradas</div>
                            <div class="number">R$<?= number_format("$entrada", 2, ",", "."); ?></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-red hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">money_off</i>
                        </div>
                        <div class="content">
                            <div class="text">Saídas</div>
                            <div class="number">R$<?= number_format("$gastos", 2, ",", "."); ?></div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <div class="content">
                            <div class="text">Diferença</div>
                            <div class="number">R$<?= number_format("$lucro", 2, ",", "."); ?></div>
                        </div>
                    </div>
                </div>


            <?php } ?>
        </div>

        <!-- #END# Widgets -->

        <div class="row">
            <div class="container-fluid">
                <form class="col-md-12" enctype="multipart/form-data"
                    action="<?= site_url('P_caixa/filtra_fluxo_geral/') ?>" method="post">

                    <div class="col-md-2 col-sm-12">

                        <div class="form-group ">
                            <label>De</label>
                            <input type="date" value="" name="data_inicial" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-2 col-sm-12">

                        <div class="form-group  ">
                            <label>Até</label>
                            <input type="date" value="" name="data_final" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-2" style="margin-top: -4px">
                        <p>
                            <b>Conta</b>
                        </p>
                        <select required name="id_conta" class="form-control ">

                            <option value="Geral">Geral</option>

                            <?php foreach ($contas as $c) { ?>

                                <option value="<?= $c['id'] ?>"><?= $c['descricao'] ?></option>

                            <?php } ?>
                        </select>

                    </div>

                    <button type="submit" style="margin-top: 27px"
                        class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 ">Filtrar</button>

                    <a href="<?= base_url('P_caixa') ?>"><span style="margin-top: 27px"
                            class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>
                </form>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Contas Bancárias e Saldo</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nome/Descrição</th>
                                    <th>Banco</th>
                                    <th>Agência</th>
                                    <th>Conta</th>
                                    <th>Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($contas as $c) { ?>
                                    <tr>
                                        <td><?= $c['descricao'] ?></td>
                                        <td><?= $c['banco'] ?></td>
                                        <td><?= $c['agencia'] ?></td>
                                        <td><?= $c['conta'] ?></td>
                                        <td>R$<?= number_format($c['saldo'], 2, ',', '.'); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="margin-top: 15px" class="card">
                        <div class="header">
                            <h2>Fluxo de Caixa</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Data Fluxo</th>
                                            <th>Conta</th>
                                            <th>Valor</th>
                                            <th>Despesa</th>
                                            <th>Observação</th>
                                            <th>Pago/Recebido</th>
                                            <th>Excluir</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Data Fluxo</th>
                                            <th>Conta</th>
                                            <th>Valor</th>
                                            <th>Despesa</th>
                                            <th>Observação</th>
                                            <th>Pago/Recebido</th>
                                            <th>Excluir</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $contador = 1;
                                        foreach ($fluxo as $f) { ?>
                                            <tr>
                                                <td><?= $contador ?></td>
                                                <td><?= date("d/m/Y", strtotime($f['data_fluxo'])) ?></td>
                                                <td><?= $f['conta'] ?></td>
                                                <td>R$<?= number_format($f['valor'], 2, ',', '.'); ?></td>
                                                <td style="color: <?= $f['despesa'] == 'Entrada' ? 'green' : 'red' ?>">
                                                    <?= $f['despesa'] ?>
                                                </td>
                                                <td><?= $f['observacao'] ?></td>
                                                <td><?= $f['cliente_nome'] ?></td>
                                                <td align="center"><a
                                                        href="<?= base_url('P_caixa/deleta_movimentacao_fluxo/' . $f['id']) ?>"><i
                                                            class="material-icons">delete</i></a></td>
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

            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deletar Aferição?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Tem certeza que deseja excluir essa aferição permanentemente?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <a class="deleta" href="#"><button type="button" class="btn btn-danger">Deletar</button></a>
                            <a class="deleta_estoque" href="#"><button type="button" class="btn btn-success">Deletar e
                                    atualizar estoque</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<script>
    var olho = document.getElementById("olho")


    olho.addEventListener("click", function () {


        var caixa = document.getElementById("caixa")

        var caixa2 = document.getElementById("caixa2")

        var ocultador = document.getElementById("ocultador")
        var ocultador2 = document.getElementById("ocultador2")


        if (caixa.style.display === "block") {

            caixa.style.display = "none"
            caixa2.style.display = "none"

            ocultador.style.display = "block"
            ocultador2.style.display = "block"

        } else {
            caixa.style.display = "block"
            caixa2.style.display = "block"

            ocultador.style.display = "none"
            ocultador2.style.display = "none"
        }

    });
</script>