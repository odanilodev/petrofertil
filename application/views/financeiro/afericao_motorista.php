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
                <h2>AFERIÇÃO DO ÓLEO</h2>
            </div>


            <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                    <a href="<?= base_url('F_afericao/lancar_afericao') ?>"><span type="button" class="btn bg-green waves-effect">LANÇAR</span></a>
                </div>
            <? } ?>


        </div>



        <div class="row">
            <div class="container-fluid">
                <?php if ($pagina == 'erro') { ?>
                    <div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Não foram encontradas <b>aferições</b> nas datas selecionadas, ou os campos nao foram preenchidos corretamente.
                    </div>
                <?php } ?>
                <form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_afericao/filtra_afericao_motorista/') ?>" method="post">

                    <input type="hidden" value="<?= $motorista ?>" name="nome_motorista" class="form-control">



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

                    <a href="<?= site_url('financeiro/afericao') ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>


                    <?php if ($pagina == 'deletado') { ?>

                        <div class="alert bg-teal alert-dismissible col-xs-12" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            Aferição deletada com sucesso
                        </div>
                    <?php } ?>

            </div>

            </form>

        </div>



        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Aferições como Motoristas
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
                                        <th>Qts Paga</th>
                                        <th>Qts aferida</th>
                                        <th>Gasto</th>
                                        <th>Custo</th>

                                        <?php if ($usuario == 'fernanda@petroecol.com.br' or $usuario == 'comercial@petroecol.com.br') { ?>
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
                                        <th>Qts Paga</th>
                                        <th>Qts aferida</th>
                                        <th>Gasto</th>
                                        <th>Custo</th>

                                        <?php if ($usuario == 'fernanda@petroecol.com.br' or $usuario == 'comercial@petroecol.com.br') { ?>
                                            <th>Editar</th>
                                            <th>Excluir</th>
                                        <?php } ?>

                                    </tr>
                                </tfoot>
                                <tbody>



                                    <?php $contador = 1;
                                    foreach ($afericoes as $a) {   ?>

                                        <tr>
                                            <td><?= $contador; ?></td>
                                            <td><?= date("d/m/Y", strtotime($a['data_afericao']));  ?></td>
                                            <td><?= $a['veiculo'] ?></td>
                                            <td><?= $a['motorista'] ?></td>
                                            <td style="color: <?= $a['pago'] > $a['aferido'] ? 'red' : 'green' ?>"><?= $a['pago'] ?>L</td>
                                            <td><?= $a['aferido'] ?>L</td>
                                            <td>R$<?= $a['gasto'] ?></td>
                                            <td><a href="<?= base_url('F_afericao/visualizar_custos/').$a['id']; ?>">R$<?= $a['custo'] ?><a href="<?= base_url('F_afericao/visualizar_custos/').$a['id']; ?>"></a></td>

                                            <?php if ($usuario == 'fernanda@petroecol.com.br' or $usuario == 'comercial@petroecol.com.br') { ?>

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



        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Aferições como Ajudante
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
                                        <th>Ajudante</th>
                                        <th>Coletor</th>
                                        <th>Qts Paga</th>
                                        <th>Qts aferida</th>
                                        <th>Gasto</th>
                                        <th>Custo</th>

                                        <?php if ($usuario == 'fernanda@petroecol.com.br' or $usuario == 'comercial@petroecol.com.br') { ?>
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
                                        <th>Ajudante</th>
                                        <th>Coletor</th>
                                        <th>Qts Paga</th>
                                        <th>Qts aferida</th>
                                        <th>Gasto</th>
                                        <th>Custo</th>

                                        <?php if ($usuario == 'fernanda@petroecol.com.br' or $usuario == 'comercial@petroecol.com.br') { ?>
                                            <th>Editar</th>
                                            <th>Excluir</th>
                                        <?php } ?>

                                    </tr>
                                </tfoot>
                                <tbody>



                                    <?php $contador = 1;
                                    foreach ($afericoes_ajudante as $b) {   ?>

                                        <tr>
                                            <td><?= $contador; ?></td>
                                            <td><?= date("d/m/Y", strtotime($b['data_afericao']));  ?></td>
                                            <td><?= $b['veiculo'] ?></td>
                                            <td><?= $b['ajudante'] ?></td>
                                            <td><?= $b['motorista'] ?></td>
                                            <td style="color: <?= $b['pago'] > $b['aferido'] ? 'red' : 'green' ?>"><?= $b['pago'] ?>L</td>
                                            <td><?= $b['aferido'] ?>L</td>
                                            <td>R$<?= $b['gasto'] ?></td>
                                            <td><a href="<?= base_url('F_afericao/visualizar_custos/').$b['id']; ?>">R$<?= $b['custo'] ?></a></td>

                                            <?php if ($usuario == 'fernanda@petroecol.com.br' or $usuario == 'comercial@petroecol.com.br') { ?>

                                                <td align="center"><a href="<?= site_url('F_afericao/lancar_afericao/') . $b['id'] ?>"><i class="material-icons"><i class="material-icons">mode_edit</i></i></a></td>
                                                <td align="center"><a data-toggle="modal" data-target="#exampleModal2" data-pegaid="<?= $b['id'] ?>"><i class="material-icons">delete</i></a></td>

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

        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a class="link_id" href="#"><button type="button" class="btn btn-danger"> Deletar</button></a>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>