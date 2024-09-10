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
                <h2>FECHAMENTOS DIÁRIOS</h2>
            </div>

            <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                    <a href="<?= base_url('F_quebra/lancar_quebra') ?>"><span type="button" class="btn btn-warning waves-effect">QUEBRA</span></a>
                    <a style="margin-left: 5px" href="<?= base_url('F_destinacoes/lancar_destinacao') ?>"><span type="button" class="btn bg-green waves-effect">DESTINAÇÕES</span></a>
                </div>
            <?php } ?>

        </div>

        <!-- Widgets -->
        <div class="row clearfix">


            <?php $peso = $estoque_dia * 0.92; ?>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">move_to_inbox</i>
                    </div>
                    <div class="content">
                        <div class="text">QUANTIDADE EM LITROS</div>
                        <div style="font-size: 32px" class="number "><?= round($estoque_dia) ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-brown hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">move_to_inbox</i>
                    </div>
                    <div class="content">
                        <div class="text">QUANTIDADE EM QUILOS</div>
                        <div style="font-size: 32px" class="number"><?= round($peso) ?></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- #END# Widgets -->


        <div class="container-fluid">

            <form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_estoque/busca_diario/') ?>" method="post">


                <div class="col-md-offset-2 col-md-4 ">

                    <div class="form-group ">
                        <label>Buscar Estoque Diário</label>
                        <input required type="date" value="" name="data_inicial" class="form-control">
                    </div>

                </div>

                <button type="submit" style="margin-top: 27px" class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 ">Filtrar</button>

                <a href="<?= site_url('f_estoque/inicio/3') ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>

        </div>

        </form>

    </div>


    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div style="margin-top: 15px" class="card">
                <div class="header">
                    <h2>
                        Fechamentos
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>

                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Data Fechamento</th>
                                    <th>Estoque</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Data Fechamento</th>
                                    <th>Estoque</th>


                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $contador = 1;
                                foreach ($fechamentos as $f) { ?>

                                    <tr>
                                        <td><?= $contador ?></td>
                                        <td><?= date("d/m/Y", strtotime($f['data_fechamento'])); ?></td>
                                        <td><?= number_format($f['estoque'], 0, ".", ".") ?></td>


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