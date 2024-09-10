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
            <div class="block-header col-md-5">
                <h2>MANUTENÇÕES DE VEÍCULOS DE <?= date('d/m/Y', strtotime($data_inicial)); ?> até <?= date('d/m/Y', strtotime($data_final)); ?> </h2>
            </div>


        </div>

        <?php

        $contador = 0;

        $valor_total = 0;

        foreach ($manutencao as $a) {


            $val_array = json_decode($a['valor'], true);


            $tot[$contador] = array_sum($val_array);


            if ($a['desconto'] > 0) {

                $valor_total = $valor_total + $tot[$contador] - $a['desconto'];
            } else {

                $valor_total = $valor_total + $tot[$contador];
            }

            $contador++;
        }



        ?>

        <!-- Widgets -->
        <div class="row clearfix">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">move_to_inbox</i>
                    </div>
                    <div class="content">
                        <div class="text">GASTO TOTAL EM MANUTENÇÕES</div>
                        <div style="font-size: 32px" class="number ">R$<?= number_format("$valor_total", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-brown hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">move_to_inbox</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL DE MANUTENÇÕES REALIZADAS</div>
                        <div style="font-size: 32px" class="number "><?= $contador ?></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- #END# Widgets -->


        <div class="row">
            <div class="container-fluid">
                <form class="col-md-12" enctype="multipart/form-data" action="<?= base_url('F_veiculos/ver_geral_veiculos_filtrado') ?>" method="post">

                    <div class="col-md-3 col-sm-12">

                        <div class="form-group ">
                            <label>De</label>
                            <input type="date" value="" name="data_inicial" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-3 col-sm-12">

                        <div class="form-group  ">
                            <label>Até</label>
                            <input type="date" value="" name="data_final" class="form-control">
                        </div>

                    </div>


                    <button type="submit" style="margin-top: 27px" class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 ">Filtrar</button>

                    <a href="<?= base_url('F_veiculos/ver_geral_veiculos/') ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>
                </form>
            </div>
        </div>

        <!-- alerta de registros nao encontraros -->

        <?php if ($alerta == 'nao_encontrado') { ?>
            <div class="alert bg-teal alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Não foram encontradas manutenções no período selecionado.
            </div>
        <?php } ?>


        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Manutenções dos Veículos
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">#</th>
                                        <th style="text-align: center">Data</th>
                                        <th style="text-align: center">Placa</th>
                                        <th style="text-align: center">Oficina</th>
                                        <th style="text-align: center">Reclamação</th>
                                        <th style="text-align: center">Valor</th>
                                        <th style="text-align: center">Ver Mais</th>


                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th style="text-align: center">#</th>
                                        <th style="text-align: center">Data</th>
                                        <th style="text-align: center">Placa</th>
                                        <th style="text-align: center">Oficina</th>
                                        <th style="text-align: center">Reclamação</th>
                                        <th style="text-align: center">Valor</th>
                                        <th style="text-align: center">Ver Mais</th>


                                    </tr>
                                </tfoot>
                                <?php $contador = 1;
                                foreach ($manutencao as $m) { ?>

                                    <?php

                                    $serv_array = json_decode($m['servico'], true);
                                    $val_array = json_decode($m['valor'], true);

                                    $desconto = $m['desconto'];

                                    if ($desconto > 0) {

                                        $total = array_sum($val_array) - $m['desconto'];
                                    } else {

                                        $total = array_sum($val_array);
                                    }


                                    ?>


                                    <tr align="center">
                                        <td><?= $contador ?></td>
                                        <td><?= date("d/m/Y", strtotime($m['data'])); ?></td>
                                        <td><?= $m['placa'] ?></td>
                                        <td><?= $m['oficina'] ?></td>
                                        <td><?= $m['reclamacao'] ?></td>
                                        <td>R$<?= number_format("$total", 2, ",", "."); ?></td>

                                        <td><a href="<?= base_url('F_veiculos/ver_manutencao') . '/' . $m['id'] ?>"><i class="material-icons">remove_red_eye</i></a></td>


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