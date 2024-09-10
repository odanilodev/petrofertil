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
                <div id="like_button_container"></div>
                <h2>CUSTOS DE COLETA <?= $dias ?></h2>
            </div>

          

        </div>

        <!-- We will put our React component inside this div. -->

        <div class="row">
            <div class="container-fluid">
                <?php if ($pagina == 'erro') { ?>
                    <div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Não foram encontradas <b>aferições</b> nas datas selecionadas, ou os campos nao foram preenchidos corretamente.
                    </div>
                <?php } ?>
                <form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_custos_coleta/geral_custos_filtrado/') ?>" method="post">

                    <div class="col-md-3">

                        <div class="form-group ">
                            <label>De</label>
                            <input required type="date" value="" name="data_inicial" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group">
                            <label>Até</label>
                            <input required type="date" value="" name="data_final" class="form-control">
                        </div>

                    </div>

                    <button type="submit" style="margin-top: 27px" class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 ">Filtrar</button>

                    <a href="<?= site_url('F_custos_coleta/geral_custos/23') ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>

            </div>

            </form>

        </div>

        <div class="row clearfix">
               
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">money_off</i>
                        </div>
                        <div class="content">
                            <div class="text">CUSTO DO PERÍODO <?= strtoupper(date('m')) ?></div>
                            <div class="number">R$<?= number_format("$gasto_total",2,",","."); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">QUANTIDADE DE AFERIÇÕES</div>
                            <div class="number"><?= $quantidade_afericoes ?></div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="row clearfix">
            <!-- Visitors
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="body bg-pink">
                        <div class="sparkline" data-type="line" data-spot-radius="4" data-highlight-spot-color="rgb(233, 30, 99)" data-highlight-line-color="#fff" data-min-spot-color="rgb(255,255,255)" data-max-spot-color="rgb(255,255,255)" data-spot-color="rgb(255,255,255)" data-offset="90" data-width="100%" data-height="92px" data-line-width="2" data-line-color="rgba(255,255,255,0.7)" data-fill-color="rgba(0, 188, 212, 0)"><canvas width="454" height="92" style="display: inline-block; width: 454px; height: 92px; vertical-align: top;"></canvas></div>
                        <ul class="dashboard-stat-list">
                            <li>
                                TODAY
                                <span class="pull-right"><b>1 200</b> <small>USERS</small></span>
                            </li>
                            <li>
                                YESTERDAY
                                <span class="pull-right"><b>3 872</b> <small>USERS</small></span>
                            </li>
                            <li>
                                LAST WEEK
                                <span class="pull-right"><b>26 582</b> <small>USERS</small></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
             #END# Visitors -->
            <!-- Latest Social Trends -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="body bg-cyan">
                        <div class="m-b--35 font-bold">CUSTOS TOTAIS NO PERÍODO</div>
                        <ul class="dashboard-stat-list">
                            <li>
                                Gasto Clientes
                                <span class="pull-right">
                                <b>R$<?= number_format("$gasto_clientes",2,",","."); ?></b>
                                </span>
                            </li>
                            <li>
                                Alimentação
                                <span class="pull-right">
                                <b>R$<?= number_format("$gasto_alimentacao",2,",","."); ?></b>
                                </span>
                            </li>
                            <li>
                                Combustivel
                                <span class="pull-right">
                                <b>R$<?= number_format("$gasto_combustivel",2,",","."); ?></b>
                                </span>
                            </li>
                            <li>
                                Estacionamento
                                <span class="pull-right">
                                <b>R$<?= number_format("$gasto_estacionamento",2,",","."); ?></b>
                                </span>
                            </li>
                            <li>
                                Pedagio
                                <span class="pull-right">
                                <b>R$<?= number_format("$gasto_pedagio",2,",","."); ?></b>
                                </span>
                            </li>
                            <li>
                                Detergente
                                <span class="pull-right">
                                <b>R$<?= number_format("$gasto_detergente",2,",","."); ?></b>
                                </span>
                            </li>
                            <li>
                                Óleo
                                <span class="pull-right">
                                <b>R$<?= number_format("$gasto_oleo",2,",","."); ?></b>
                                </span>
                            </li>
                            <li>
                                Outros
                                <span class="pull-right">
                                    <b>R$<?= number_format("$gasto_outros",2,",","."); ?></b>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #END# Latest Social Trends -->
            <!-- Answered Tickets -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="body bg-teal">
                        <div class="font-bold m-b--35">MÉDIA DE GASTOS TOTAL (<?= $dias ?> dias contados)</div>
                        <ul class="dashboard-stat-list">
                            <li>
                                MÉDIA DIÁRIA TOTAL
                                <span class="pull-right"><b>R$</b><?= number_format("$media_dia_gasto",2,",","."); ?></span>
                            </li>
                            <li>
                                MÉDIA POR AFERIÇÃO
                                <span class="pull-right"><b>R$</b><?= number_format("$media_gasto_afericoes",2,",","."); ?> </span>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #END# Answered Tickets -->
        </div>


        <!-- <div class="row clearfix">
           
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="header">
                        <h2>GASTOS POR MOTORISTA/SUPERVISORES</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Função</th>
                                        <th>Aferições</th>
                                        <th>Progress</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Victor Hugo</td>
                                        <td><span class="label bg-green">Motorista</span></td>
                                        <td>John Doe</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Enzo Di Falco</td>
                                        <td><span class="label bg-blue">Supervisor</span></td>
                                        <td>John Doe</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Renato</td>
                                        <td><span class="label bg-light-blue">On Hold</span></td>
                                        <td>John Doe</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-light-blue" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Task D</td>
                                        <td><span class="label bg-orange">Wait Approvel</span></td>
                                        <td>John Doe</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Task E</td>
                                        <td>
                                            <span class="label bg-red">Suspended</span>
                                        </td>
                                        <td>John Doe</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-red" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
             #END# Task Info -->
           
        </div>


        <div id="like_button_container"></div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Aferições dos Motoristas no Período
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
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

                                        <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                            <th>Editar</th>
                                            <th>Excluir</th>
                                        <?php } ?>

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

                                        <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                            <th>Editar</th>
                                            <th>Excluir</th>

                                        <?php } ?>
                                    </tr>
                                </tfoot>
                                <tbody>


                                    <?php $contador = 1;
                                    foreach ($afericao as $a) {

                                        $ajudante = $a['ajudante'];

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
                                            <td><a href="<?= base_url('F_afericao/visualizar_custos/') . $a['id']; ?>">R$<?= $a['gasto'] ?></a></td>
                                            <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                                <td align="center"><a href="<?= site_url('F_afericao/lancar_afericao/') . $a['id'] ?>"><i class="material-icons"><i class="material-icons">mode_edit</i></i></a></td>
                                                <td align="center"><a data-toggle="modal" data-target="#exampleModal2" data-pegaid="<?= $a['id'] ?>"><i class="material-icons">delete</i></a></td>
                                            <?php } ?>

                                        </tr>



                                    <?php $contador++;
                                    }     ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Custos de cada aferição
                        </h2>
                       
                    </div>
                    <div class="body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Data</th>
                                        <th>Veículos</th>
                                        <th>Clientes</th>
                                        <th>Alimentação</th>
                                        <th>Combustivel</th>
                                        <th>Estacionamento</th>
                                        <th>Pedagio</th>
                                        <th>Detergente</th>
                                        <th>Óleo</th>
                                        <th>Custo</th>
                                        <th>Gasto</th>

                                        <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                            <th>Editar</th>
                                            <th>Excluir</th>
                                        <?php } ?>

                                    </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                        <th>#</th>
                                        <th>Data</th>
                                        <th>Veículos</th>
                                        <th>Clientes</th>
                                        <th>Alimentação</th>
                                        <th>Combustivel</th>
                                        <th>Estacionamento</th>
                                        <th>Pedagio</th>
                                        <th>Detergente</th>
                                        <th>Óleo</th>
                                        <th>Custo</th>
                                        <th>Gasto</th>

                                        <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                            <th>Editar</th>
                                            <th>Excluir</th>
                                        <?php } ?>

                                    </tr>
                                </tfoot>
                                <tbody>


                                    <?php $contador = 1;
                                    foreach ($afericao as $a) {

                                        $ajudante = $a['ajudante'];

                                    ?>

                                        <tr>
                                            <td><?= $contador; ?></td>
                                            <td><?= date("d/m/Y", strtotime($a['data_afericao']));  ?></td>
                                            <td><?= $a['veiculo'] ?></td>
                                            <td>R$<?= $a['clientes'] ?></td>
                                            <td>R$<?= $a['alimentacao'] ?></td>
                                            <td>R$<?= $a['combustivel'] ?></td>
                                            <td>R$<?= $a['estacionamento'] ?></td>
                                            <td>R$<?= $a['pedagio'] ?></td>
                                            <td>R$<?= $a['detergente'] ?></td>
                                            <td>R$<?= $a['oleo'] ?></td>

                                            <td>R$<?= $a['custo'] ?></td>
                                            <td><a href="<?= base_url('F_afericao/visualizar_custos/') . $a['id']; ?>">R$<?= $a['gasto'] ?></a></td>
                                            <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                                <td align="center"><a href="<?= site_url('F_afericao/lancar_afericao/') . $a['id'] ?>"><i class="material-icons"><i class="material-icons">mode_edit</i></i></a></td>
                                                <td align="center"><a data-toggle="modal" data-target="#exampleModal2" data-pegaid="<?= $a['id'] ?>"><i class="material-icons">delete</i></a></td>
                                            <?php } ?>

                                        </tr>



                                    <?php $contador++;
                                    }     ?>



                                </tbody>
                            </table>
                        </div>
                    </div>



                    

                </div>
            </div>
        </div>





    </div>
</section>