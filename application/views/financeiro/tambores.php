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
                <h2>CONTROLE DO ESTOQUE</h2>
            </div>
            <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>

                <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">

                    <a href="<?= base_url('F_estoque/formulario_fechamento/') . $quantidade ?>"><span type="button" class="btn btn-danger waves-effect">FECHAMENTO</span></a>
                    <a href="<?= base_url('F_quebra/lancar_quebra') ?>"><span type="button" class="btn btn-warning waves-effect">QUEBRA</span></a>
                    <a style="margin-left: 5px" href="<?= base_url('F_destinacoes/lancar_destinacao') ?>"><span type="button" class="btn bg-green waves-effect">DESTINAÇÕES</span></a>
                </div>
            <?php } ?>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                <div class="info-box-2 bg-cyan hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">local_drink</i>
                    </div>
                    <div class="content">
                        <div class="text">TAMBORES EM ESTOQUE</div>
                        <div style="font-size: 32px" class="number "><?= $estoque['quantidade'] ?></div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-brown hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">move_to_inbox</i>
                    </div>
                    <div class="content">
                        <div class="text">ESTOQUE DIA ANTERIOR</div>
                        <div style="font-size: 32px" class="number ">652</div>
                    </div>
                </div>
            </div>

        </div>
        <!-- #END# Widgets -->


        <div class="container-fluid">
            <?php if ($pagina == 'erro') { ?>
                <div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Não foram encontradas <b>aferições</b> nas datas selecionadas, ou os campos nao foram preenchidos corretamente.
                </div>
            <?php } ?>
            <form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_estoque/busca_diario/') ?>" method="post">




                <div class="col-md-offset-2 col-md-4 ">

                    <div class="form-group ">
                        <label>Buscar Estoque Diário</label>
                        <input required type="date" value="" name="data_inicial" class="form-control">
                    </div>

                </div>



                <button type="submit" style="margin-top: 27px" class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 ">Filtrar</button>

                <a href="<?= site_url('f_estoque/inicio/3') ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>


                <?php if ($pagina == 'deletado') { ?>

                    <div class="alert bg-teal alert-dismissible col-xs-12" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Aferição deletada com sucesso
                    </div>
                <?php } ?>

        </div>

        </form>

    </div>


    <?php if ($pagina == 'fechado') { ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <b>Fechamento</b> realizado com sucesso
        </div>
    <?php } ?>

    <!-- Exportable Table -->
    <div class="row clearfix">

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div style="margin-top: 15px" class="card">
                <div class="header">
                    <h2>
                        Retiradas do Estoque
                    </h2>

                </div>
                <div class="body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>

                                    <th>Data</th>
                                    <th>Motorista</th>
                                    <th>Quantidade</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Data</th>
                                    <th>Motorista</th>
                                    <th>Quantidade</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $contador = 1;
                                foreach ($destinacoes as $d) { ?>

                                    <tr>

                                        <td><?= date("d/m/Y", strtotime($d['data_destinacao'])); ?></td>
                                        <td><?= $d['cliente'] ?></td>
                                        <td><?= $d['quantidade'] ?></td>



                                    </tr>

                                <?php $contador++;
                                } ?>


                            </tbody>
                        </table>
                    </div>



                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div style="margin-top: 15px" class="card">
                <div class="header">
                    <h2>
                        Entradas do Estoque
                    </h2>

                </div>
                <div class="body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>

                                    <th>Data</th>
                                    <th>Motorista</th>
                                    <th>Quantidade</th>


                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Data</th>
                                    <th>Motorista</th>
                                    <th>Quantidade</th>


                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $contador = 1;
                                foreach ($destinacoes as $d) { ?>

                                    <tr>

                                        <td><?= date("d/m/Y", strtotime($d['data_destinacao'])); ?></td>
                                        <td><?= $d['cliente'] ?></td>
                                        <td><?= $d['quantidade'] ?></td>


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




    <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deletar Destinação?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir essa destinação?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <a class="deleta" href="#"><button type="button" class="btn btn-danger"> Deletar</button></a>
                    <a class="deleta_destinacao" href="#"><button type="button" class="btn btn-success"> Deletar e atualizar estoque</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deletar quebra?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir essa quebra?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <a class="deleta" href="#"><button type="button" class="btn btn-danger"> Deletar</button></a>
                    <a class="deleta_quebra" href="#"><button type="button" class="btn btn-success"> Deletar e atualizar estoque</button></a>
                </div>
            </div>
        </div>
    </div>



    </div>
</section>