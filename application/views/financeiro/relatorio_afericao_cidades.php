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
            <div class="block-header col-md-10">
                <h2>Relatório de coletas nas cidades selecionadas entre <?= date("d/m/Y", strtotime($data_inicial));  ?> e <?= date("d/m/Y", strtotime($data_final));  ?></h2>
            </div>
            <div class="block-header col-md-2" align="right">
               <a href="<?= $_SERVER['HTTP_REFERER'] ?>"><span type="button" class="btn bg-cyan waves-effect">VOLTAR</span></a>
            </div>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">attach_money</i>
                    </div>
                    <div class="content">
                        <div class="text">PAGO</div>
                        <div class="number"><?= $pago  ?>L</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">done</i>
                    </div>
                    <div class="content">
                        <div class="text">AFERIDO</div>
                        <div class="number"><?= $aferido  ?>L</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-deep-purple hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">done</i>
                    </div>
                    <div class="content">
                        <div class="text">MÉDIA</div>
                        <div class="number"><?= number_format("$media_dia", 2, ",", "."); ?>L</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">money_off</i>
                    </div>
                    <div class="content">
                        <div class="text">GASTO</div>
                        <div class="number">R$<?= number_format("$gasto", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">CUSTO</div>
                        <div class="number">R$<?= number_format("$custo", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->


        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Aferição dos Motoristas
                        </h2>

                    </div>

                    <div class="body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Data</th>
                                        <th>Veículo</th>
                                        <th>Coletor</th>
                                        <th>Ajudante</th>
                                        <th>Cidade</th>
                                        <th>Qts Paga</th>
                                        <th>Qts aferida</th>
                                        <th>Custo</th>
                                        <th>Gasto</th>


                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Data</th>
                                        <th>Veículo</th>
                                        <th>Coletor</th>
                                        <th>Ajudante</th>
                                        <th>Cidade</th>
                                        <th>Qts Paga</th>
                                        <th>Qts aferida</th>
                                        <th>Custo</th>
                                        <th>Gasto</th>


                                    </tr>
                                </tfoot>
                                <tbody>



                                    <?php $contador = 1;
                                    foreach ($afericoes as $a) {

                                        $ajudante = $a['ajudante'];

                                        $gastos = $a['gasto'];
                                    ?>

                                        <tr>
                                            <td><?= $contador; ?></td>
                                            <td><?= date("d/m/Y", strtotime($a['data_afericao']));  ?></td>
                                            <td><?= $a['veiculo'] ?></td>
                                            <td><?= $a['motorista'] ?></td>
                                            <td><?= mb_strimwidth("$ajudante", 0, 14, "...") ?></td>
                                            <td><?= $a['cidade'] ?></td>
                                            <td style="color: <?= $a['pago'] > $a['aferido'] ? 'red' : 'green' ?>"><?= $a['pago'] ?>L</td>
                                            <td><?= $a['aferido'] ?>L</td>
                                            <td>R$<?= $a['custo'] ?></td>
                                            <td><a href="<?= base_url('F_afericao/visualizar_custos/') . $a['id']; ?>">R$<?= number_format("$gastos", 2, ",", "."); ?></a></td>

                                        </tr>


                                    <?php $contador++;
                                    } ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div></br></br>


    </div>
</section>