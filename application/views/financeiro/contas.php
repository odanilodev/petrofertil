<?php

$status = $this->session->userdata('usuario');


if ($status != "logado") {

    redirect('financeiro/verifica_login');
}


$usuario = $this->session->userdata('login');

$nome_usuario = $this->session->userdata('nome_usuario');


?>

<style>
[type="checkbox"]:not(:checked),
[type="checkbox"]:checked {
    position: relative !important;
    opacity: 1 !important;
    left: 0 !important;
    cursor: pointer !important;
}
</style>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-3">
                <h2>CONTAS A PAGAR</h2>
            </div>


            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a style="margin-left: 5px" href="<?= base_url('F_contas/cadastrar_conta') ?>"><span type="button"
                        class="btn btn-success  waves-effect">ENTRADA</span></a>
                <a style="margin-left: 5px" href="<?= base_url('F_contas/cadastrar_contribuinte') ?>"><span
                        type="button" class="btn btn-info  waves-effect">NOVA PESSOA/EMPRESA</span></a>


            </div>



        </div>

        <?php

        $total_caixa = $caixa['caixa'];

        $total_caixa_reciclagem = $caixa_reciclagem['caixa'];

        ?>

        <!-- Widgets -->
        <div class="row clearfix">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-blue-grey hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Caixa Óleo</div>
                        <div class="number">R$<?= number_format("$total_caixa", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-blue-grey hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Caixa Reciclagem</div>
                        <div class="number">R$<?= number_format("$total_caixa_reciclagem", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>

            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="info-box bg-brown hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Despesas em aberto</div>
                        <div class="number">R$<?= number_format("$despesa_total", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>
            <div class=" col-lg-8 col-md-7 col-sm-7 col-xs-12">
                <form class="" enctype="multipart/form-data" action="<?= site_url('F_contas/filtra_contas_pagar/') ?>"
                    method="post">

                    <div class="col-md-3">

                        <div class="form-group ">
                            <label>Status:</label>
                            <select require name="status" class="form-control show-tick">
                                <option>Selecione</option>
                                <option value="0">Em Aberto</option>
                                <option value="1">Pago</option>
                                <option value="2">Geral</option>

                            </select>
                        </div>

                    </div>

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
        </div>



        <?php if (isset($entrada) and isset($gastos)) { ?>

        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-green hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">attach_money</i>
                </div>
                <div class="content">
                    <div class="text">Ganhos</div>
                    <div class="number">R$<?= number_format("$entrada", 2, ",", "."); ?></div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-red hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">money_off</i>
                </div>
                <div class="content">
                    <div class="text">Despesas</div>
                    <div class="number">R$<?= number_format("$gastos", 2, ",", "."); ?></div>
                </div>
            </div>
        </div>


        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-teal hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">equalizer</i>
                </div>
                <div class="content">
                    <div class="text">Lucro</div>
                    <div class="number">R$<?= number_format("$lucro", 2, ",", "."); ?></div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div style="margin-top: 15px" class="card">
                <div class="header">
                    <h2>
                        Contas a pagar

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
                                        <input type="checkbox" class="check-all-contas"
                                            onclick="selecioneTodasContas()">
                                    </th>

                                    <th>Vencimento</th>
                                    <th>Data Emissão</th>
                                    <th>Valor</th>
                                    <th>Valor Pago</th>
                                    <th>Empresa</th>
                                    <th>Recebido</th>
                                    <th>Status</th>
                                    <th>Observação</th>
                                    <th>Visualizar</th>

                                    <th>Editar</th>
                                    <th>Deletar</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>

                                    </th>

                                    <th>Vencimento</th>
                                    <th>Data Emissão</th>
                                    <th>Valor</th>
                                    <th>Valor Pago</th>
                                    <th>Empresa</th>
                                    <th>Recebido</th>
                                    <th>Status</th>
                                    <th>Observação</th>
                                    <th>Visualizar</th>
                                    <th>Editar</th>
                                    <th>Deletar</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php $count = 1;
                                foreach ($contas as $b) { ?>

                                <tr>
                                    <td><?= $count ?></td>
                                    <td>
                                        <?php if($b['status'] == 0){ ?>

                                        <input type="checkbox" class="check-contas" value="<?= $b['id']; ?>"
                                            data-recebido="<?= $b['recebido'] ?>" data-valor="<?= $b['valor'] ?>"
                                            data-vencimento="<?=$b['vencimento']; ?>">

                                        <?php }else{ ?>
                                        <input disabled checked type="checkbox">
                                        <?php } ?>
                                    </td>

                                    <td><?= date("d/m/Y", strtotime($b['vencimento'])); ?></td>
                                    <td><?= date("d/m/Y", strtotime($b['data_emissao'])); ?></td>
                                    <td>R$<?= $b['valor'] ?></td>
                                    <td>R$<?= $b['valor_pago'] ?></td>

                                    <td><?= $b['despesa'] ?></td>
                                    <td><?= $b['recebido'] ?></td>


                                    <?php if ($b['status'] == 0) {  ?>

                                    <td><a data-toggle="modal" data-cli-obs="<?= $b['observacao'] ?>"
                                            data-cli-id="<?= $b['id'] ?>" data-cli-emi="<?= $b['data_emissao'] ?>"
                                            data-cli-micro="<?= $b['id_micro'] ?>"
                                            data-cli-macro="<?= $b['id_macro'] ?>" data-cli-rec="<?= $b['recebido'] ?>"
                                            data-target="#exampleModal13"
                                            style=" color: <?= $b['status'] == 1 ? 'green' : 'red' ?>"
                                            href="<?= base_url('F_contas/atualiza_status/') . $b['id'] ?>"><?= $b['status'] == 0 ? "Em aberto" : "Pago" ?></a>
                                    </td>

                                    <?php } else { ?>

                                    <td><a href="<?= base_url('F_contas/deleta_status/') . $b['id'] ?>"
                                            style=" color: <?= $b['status'] == 1 ? 'green' : 'red' ?>"><?= $b['status'] == 0 ? "A receber" : date("d/m/Y", strtotime($b['data_pagamento'])) ?></a>
                                    </td>

                                    <?php } ?>

                                    <td><?= $b['observacao'] ?></td>
                                    <td align="center"><a
                                            href="<?= base_url('F_contas/visualizar_conta/') . $b['id'] ?>"><i
                                                class="material-icons">visibility</i></a></td>

                                    <td align="center"><a href="<?= base_url('F_contas/editar_conta/') . $b['id'] ?>"><i
                                                class="material-icons">mode_edit</i></a></td>
                                    <td align="center"><a style="cursor: pointer;" data-toggle="modal"
                                            data-target="#exampleModal9" data-pegaid="<?= $b['id'] ?>"><i
                                                class="material-icons">delete</i></a></td>


                                </tr>

                                <?php $count++;
                                } ?>


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
                        Pessoas e Empresas
                    </h2>

                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                    <th>CNPJ</th>
                                    <th>E-mail</th>

                                    <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                    <th>Deletar</th>
                                    <?php } ?>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>

                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                    <th>CNPJ</th>
                                    <th>E-mail</th>

                                    <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                    <th>Deletar</th>
                                    <?php } ?>

                                </tr>
                            </tfoot>
                            <tbody>

                                <?php $contador = 1;
                                foreach ($contribuintes as $c) { ?>

                                <tr>
                                    <td><?= $contador ?></td>
                                    <td><?= $c['nome'] ?></td>
                                    <td><?= $c['telefone'] ?></td>
                                    <td><?= $c['cnpj'] ?></td>
                                    <td><?= $c['email'] ?></td>

                                    <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                    <td align="center"><a data-toggle="modal" data-target="#exampleModal8"
                                            data-pegaid="<?= $c['id'] ?>"><i class="material-icons">delete</i></a></td>
                                    <?php } ?>


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


    <div class="modal fade" id="exampleModal8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja excluir essa pessoa/empresa?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir essa pessoa/empresa?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <a class="deleta" href="#"><button type="button" class="btn btn-danger"> Deletar</button></a>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <a class="deleta" href="#"><button type="button" class="btn btn-danger"> Deletar</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal13" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div style="background-color: #fff;" class="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Digite a data do pagamento e valor pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="modal-danilo" method="post">
                        <div class="row">
                            <div class=" col-md-12">
                                <div class="form-line col-md-6">
                                    <input type="date" name='data_fluxo' value=""
                                        class="form-control tt2 data_pagamento">
                                </div>
                                <div class="form-line col-md-6">
                                    <input placeholder="Digite o valor pago" type="text" name='valor_recebido' value=""
                                        class="form-control tt2 valor valor_pago">
                                </div>

                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary  waves-effect envia_data">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div id="modalContas" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Digite a data do pagamento e valor pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url("F_contas/pagar_varias") ?>">
                    <div class="row">

                        <div class="col-md-12 form-contas">
                            <!-- Ajax -->
                        </div>

                    </div>
                    <input type="hidden" name="ids-contas" class="ids-contas">
                    <input type="hidden" name="recebidos-contas" class="recebido-contas">
                    <input type="hidden" class="vencimento-contas">
                    <input type="hidden" class="valores-contas">


                    <div class="modal-footer">
                        <span class="total-valores" style="float: left"></span>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary waves-effect">Enviar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</section>