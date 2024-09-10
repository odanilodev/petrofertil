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
                <h2>Motoristas/Metas</h2>
            </div>
        </div>

        <?php

        foreach ($afericoes as $a) {

            $motorista[$a['motorista']]['aferido'] = $motorista[$a['motorista']]['aferido'] + $a['aferido'];

            $motorista[$a['motorista']]['pago'] = $motorista[$a['motorista']]['pago'] + $a['pago'];

            $motorista[$a['motorista']]['nome'] = $a['motorista'];
        }

        foreach ($afericoes as $c) {

            $cidade[$c['cidade']]['aferido'] = $cidade[$c['cidade']]['aferido'] + $c['aferido'];

            $cidade[$c['cidade']]['pago'] = $cidade[$c['cidade']]['pago'] + $c['pago'];

            $cidade[$c['cidade']]['nome'] = $c['cidade'];
        }


        ?>

        <div class="row">
            <div class="container-fluid">
                <?php if ($pagina == 'erro') { ?>
                    <div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Não foram encontradas <b>aferições</b> nas datas selecionadas, ou os campos nao foram preenchidos corretamente.
                    </div>
                <?php } ?>
                <form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_relatorios/relatorio_motoristas_filtrado/') ?>" method="post">


                    <div class="col-md-3">

                        <div class="form-group">
                            <label>De</label>
                            <input type="date" value="" name="data_inicial" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group">
                            <label>Até</label>
                            <input type="date" value="" name="data_final" class="form-control">
                        </div>

                    </div>

                    <button type="submit" style="margin-top: 27px" class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 ">Filtrar</button>

                    <a href="<?= site_url('F_relatorios/relatorio_motoristas') ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>


                </form>

            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Aferição dos Motoristas</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Pago</th>
                                    <th>Aferido</th>
                                    <th>Diferença</th>
                                    <th>Meta</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php


                                foreach ($motorista as $m) {

                                    $porcentagem =  ($m['aferido'] / 11000) * 100;

                                    $relacao = $m['aferido'] - $m['pago'];
                                ?>

                                    <tr>
                                        <td><?= $m['nome'] ?></td>
                                        <td><?= $m['pago'] ?></td>
                                        <td><?= $m['aferido'] ?></td>
                                        <td style="color: <?= $relacao < 0 ? 'red' : 'green' ?>;"><?= $relacao ?></td>

                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped active <?php if ($porcentagem < 25) {
                                                                                                            echo 'bg-red';
                                                                                                        } elseif ($porcentagem > 25 and $porcentagem < 75) {
                                                                                                            echo 'bg-blue';
                                                                                                        } elseif ($porcentagem > 75 and $porcentagem < 98) {
                                                                                                            echo 'bg-green';
                                                                                                        } else {
                                                                                                            echo 'bg-amber';
                                                                                                        } ?>" role="progressbar" aria-valuenow="<?= $porcentagem ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $porcentagem ?>%"></div>
                                            </div>
                                        </td>
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