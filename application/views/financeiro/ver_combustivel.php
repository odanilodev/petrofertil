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
                <h2>EXIBIR GASTO COMBUSTIVEL</h2>
            </div>

        </div>

        <?php

        $contador = 0;

        $valor_total = 0;

        $placa = '';

        foreach ($combustivel as $c) {

            $valor_total = $valor_total + $c['valor'];
            $contador++;
            $placa = $c['carro'];
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
                        <div class="text">GASTO TOTAL EM COMBUSTÍVEL</div>
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

        <div class="container-fluid">
               
                <form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_veiculos/exibir_combustivel_filtrado/').$placa ?>" method="post">

                    <div class="col-md-3">

                        <div class="form-group ">
                            <label>De</label>
                            <input required type="date" value="" name="data_inicial" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group  ">
                            <label>Até</label>
                            <input required type="date" value="" name="data_final" class="form-control">
                        </div>

                    </div>



                    <button type="submit" style="margin-top: 27px" class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 ">Filtrar</button>

                    <a href="<?= site_url('F_veiculos/exibir_combustivel/').$placa ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>


                   

            </div>

        <div class="container-fluid">

            <form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_estoque/busca_diario/') ?>" method="post">







        </div>

        </form>

    </div>
   
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div style="margin-top: 15px" class="card">
                <div class="header">
                    <h2>
                        Tabela de Abastecimentos
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
                                    <th style="text-align: center">KM</th>
                                    <th style="text-align: center">Litros</th>
                                    <th style="text-align: center">Valor</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="text-align: center">#</th>
                                    <th style="text-align: center">Data</th>
                                    <th style="text-align: center">Placa</th>
                                    <th style="text-align: center">KM</th>
                                    <th style="text-align: center">Litros</th>
                                    <th style="text-align: center">Valor</th>
                                </tr>
                            </tfoot>
                            <?php $contador = 1;
                            foreach ($combustivel as $m) {   $preco = $m['valor']; ?>

                                

                                <tr align="center">
                                    <td><?= $contador ?></td>
                                    <td><?= date("d/m/Y", strtotime($m['data_cadastro'])); ?></td>
                                    <td><?= $m['carro'] ?></td>
                                    <td><?= $m['km'] ?></td>
                                    <td><?= $m['litragem'] ?></td>
                                    <td>R$<?= number_format("$preco", 2, ",", "."); ?></td>



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