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
                <h2>MICROS DE <?= strtoupper($macro['nome']) ?></h2>
            </div>
            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">

                <a href="<?= $_SERVER['HTTP_REFERER'] ?>"><span type="button" class="btn bg-orange waves-effect">VOLTAR</span></a>
                <a href="<?= base_url('F_micro/cadastrar_micro/') . $macro['id'] ?>"><span type="button" class="btn bg-green waves-effect">CADASTRAR MICRO</span></a>
            </div>
        </div>
        <!-- Widgets -->

        <div class="row">
            <div class="container-fluid">
                <form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_macro/exibir_macro_filtrado/'.$macro['id']) ?>" method="post">

                    <div class="col-md-3 col-sm-12">

                        <div class="form-group ">
                            <label>De</label>
                            <input type="date" value="" name="data_inicial" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-3 col-sm-12">

                        <div class="form-group">
                            <label>Até</label>
                            <input type="date" value="" name="data_final" class="form-control">
                        </div>

                    </div>

                    <button type="submit" style="margin-top: 27px" class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 ">Filtrar</button>

                    <a href="<?= base_url('F_macro/exibir_macro/'.$macro['id']) ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>
                </form>
            </div>
        </div>

        
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Contas a pagar
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Vencimento</th>
                                        <th>Valor</th>
                                        <th>Empresa</th>
                                        <th>Recebido</th>
                                        <th>Tipo</th>
                                        <th>Status</th>
                                        <th>Observação</th>



                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Vencimento</th>
                                        <th>Valor</th>
                                        <th>Empresa</th>
                                        <th>Recebido</th>
                                        <th>Tipo</th>
                                        <th>Status</th>
                                        <th>Observação</th>



                                    </tr>
                                </tfoot>
                                <tbody>


                                    <?php $count = 1;
                                    foreach ($contas as $b) { ?>

                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= date("d/m/Y", strtotime($b['vencimento'])); ?></td>
                                            <td>R$<?= $b['valor'] ?></td>
                                            <td><?= $b['despesa'] ?></td>
                                            <td><?= $b['recebido'] ?></td>
                                            <td><?= $b['categoria'] ?></td>


                                            <?php if ($b['status'] == 0) {  ?>

                                                <td><a data-toggle="modal" data-cli-id="<?= $b['id'] ?>" data-target="#exampleModal13" style=" color: <?= $b['status'] == 1 ? 'green' : 'red' ?>"><?= $b['status'] == 0 ? "Em aberto" : "Pago" ?></a></td>



                                            <?php } else { ?>

                                                <td><a href="<?= base_url('F_contas/deleta_status/') . $b['id'] ?>" style=" color: <?= $b['status'] == 1 ? 'green' : 'red' ?>"><?= $b['status'] == 0 ? "A receber" : "Pago" ?></a></td>

                                            <?php } ?>

                                            <td><?= $b['observacao'] ?></td>


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


        <!-- Exportable Table -->
        <div class="row clearfix">


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Micros
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;">Nome/Categoria Micro</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;">Nome/Categoria Micro</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php $contador = 1;
                                    foreach ($micros as $m) {  ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $contador ?></td>
                                            <td style="text-align: center;"><?= $m['nome'] ?></td>
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
    </div>



</section>