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
        <div class="block-header">
            <h2>Faturamento <?= isset($faturamento) ? $faturamento : 'Líquido' ?></h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">SALDO TOTAL DA EMPRESA</div>
                        <div class="number">R$<?= number_format($saldo, 2, ',', '.'); ?></div>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-red  hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">money_off</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL SAÍDA</div>
                        <div class="number">R$<?= number_format($total_saida, 2, ',', '.'); ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">attach_money</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL ENTRADA</div>
                        <div class="number">R$<?= number_format($total_entrada, 2, ',', '.'); ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-gray hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">Balanço</div>
                        <div class="number">R$<?= number_format($balanco, 2, ',', '.'); ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">attach_money</i>
                </div>
                <div class="content">
                    <div class="text">Contas a pagar</div>
                    <div class="number">R$<?= number_format($pagar_total, 2, ',', '.'); ?></div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">attach_money</i>
                </div>
                <div class="content">
                    <div class="text">Contas a receber</div>
                    <div class="number">R$<?= number_format($receber_total, 2, ',', '.'); ?></div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->

        <div class="row">
            <div class="container-fluid">
                <form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('P_faturamento/index/') ?>"
                    method="post">

                    <div class="col-md-2 col-sm-12">

                        <div class="form-group ">
                            <label>De</label>
                            <input type="date" value="<?= $data_inicial ?>" name="data_inicial" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-2 col-sm-12">

                        <div class="form-group  ">
                            <label>Até</label>
                            <input type="date" value="<?= $data_final ?>" name="data_final" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-2" style="margin-top: -4px">
                        <p>
                            <b>Faturamento</b>
                        </p>
                        <select required name="faturamento" class="form-control ">
                            <option <?= $faturamento == 'Liquído' ? 'selected' : '' ?> value="Liquído">Liquído</option>
                            <option <?= $faturamento == 'Bruto' ? 'selected' : '' ?> value="Bruto">Bruto</option>
                        </select>

                    </div>

                    <button type="submit" style="margin-top: 27px"
                        class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 ">Filtrar</button>

                    <a href="<?= base_url('P_faturamento') ?>"><span style="margin-top: 27px"
                            class="btn btn-success col-md-3 col-sm-6 col-xs-6">Mês Atual</span></a>
                </form>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>TOTAL DE VENDAS POR VENDEDOR</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Vendedor</th>
                                        <th>Total Vendido</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $contador = 1;
                                    foreach ($totalPorVendedor as $vendedor => $total): ?>
                                        <tr>
                                            <td><?= $contador ?></td>
                                            <td><?= $vendedor ?></td>
                                            <td>R$<?= number_format($total, 2, ',', '.') ?></td>
                                        </tr>
                                        <?php $contador++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div style="margin-top: 15px" class="card">
                        <div class="header">
                            <h2>Tabela de cheques</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Data Compensação</th>
                                            <th>Valor</th>
                                            <th>Recebido por</th>
                                            <th>Status</th>
                                            <th>Observação</th>

                                        </tr>
                                    </thead>

                                    <?php $data_atual = date('Y/m/d'); ?>
                                    <tbody>
                                        <?php $contador = 1;
                                        foreach ($cheques as $c) { ?>
                                            <tr>
                                                <td><?= date('d/m/Y', strtotime($c['data_compensasao'])) ?></td>
                                                <td>R$<?= $c['valor'] ?></td>
                                                <td><?= $c['recebido'] ?></td>
                                                <td><?= $c['status'] ?></td>
                                                <td><?= $c['observacao'] ?></td>

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
                                    <th>Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($contas_bancarias as $co) { ?>
                                    <tr>
                                        <td><?= $co['descricao'] ?></td>
                                        <td><?= $co['banco'] ?></td>
                                        <td>R$<?= number_format($co['saldo'], 2, ',', '.'); ?></td>
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
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $contador = 1;
                                        foreach ($fluxos as $f) { ?>
                                            <tr>
                                                <td><?= $contador ?></td>
                                                <td><?= date("d/m/Y", strtotime($f['data_fluxo'])) ?></td>
                                                <td><?= $f['conta_nome'] ?></td>
                                                <td><?= $f['valor'] ?></td>
                                                <td style="color: <?= $f['despesa'] == 'Entrada' ? 'green' : 'red' ?>">
                                                    <?= $f['despesa'] ?>
                                                </td>
                                                <td><?= $f['observacao'] ?></td>
                                                <td><?= $f['cliente_nome'] ?></td>
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





</section>


<!-- Morris Plugin Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>