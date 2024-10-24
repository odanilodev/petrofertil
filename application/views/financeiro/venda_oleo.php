﻿<?php

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

               <!-- <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">

                    <a href="<?= base_url('F_quebra/lancar_quebra') ?>"><span type="button" class="btn btn-warning waves-effect">QUEBRA</span></a>
                    <a style="margin-left: 5px" href="<?= base_url('F_destinacoes/lancar_destinacao') ?>"><span type="button" class="btn bg-green waves-effect">DESTINAÇÕES</span></a>

                </div> -->
            <?php } ?>
        </div>

     
        <div class="row">
            <div class="container-fluid">
                <form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_estoque/exibir_vendas_filtrado/') ?>" method="post">

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

                    <a href="<?= base_url('F_estoque/exibir_vendas/') ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>
                </form>
            </div>
        </div>


    <?php if ($pagina == 'fechado') { ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <b>Fechamento</b> realizado com sucesso
        </div>
    <?php } ?>

    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div style="margin-top: 15px" class="card">
                <div class="header">
                    <h2>
                        Destinações do óleo
                    </h2>
                  
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Data</th>
                                    <th>Cliente</th>
                                    <th>Quantidade</th>
                                    <th>Valor</th>
                                    <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                        <th>Editar</th>
                                        <th>Deletar</th>
                                    <?php } ?>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Data</th>
                                    <th>Cliente</th>
                                    <th>Quantidade</th>
                                    <th>Valor</th>
                                    <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                        <th>Editar</th>
                                        <th>Deletar</th>
                                    <?php } ?>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $contador = 1;
                                foreach ($destinacoes as $d) { ?>

                                    <tr>
                                        <td><?= $contador ?></td>
                                        <td><?= date("d/m/Y", strtotime($d['data_destinacao'])); ?></td>
                                        <td><?= $d['cliente'] ?></td>
                                        <td><?= $d['quantidade'] ?></td>
                                        <td><?= $d['valor'] ?></td>
                                        <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                            <td align="center"><a href="<?= site_url('F_destinacoes/lancar_destinacao/') . $d['id'] ?>"><i class="material-icons">edit</i></a></td>
                                            <td align="center"><a data-toggle="modal" data-target="#exampleModal5" data-pegaid="<?= $d['id'] ?>"><i class="material-icons">delete</i></a></td>
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



    </div>
</section>