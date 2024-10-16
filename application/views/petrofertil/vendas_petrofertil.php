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
                <h2>VENDAS PETROFERTIL</h2>
            </div>

            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a href="<?= base_url('P_vendas/formulario_vendas') ?>"><span type="button"
                        class="btn bg-green waves-effect">Gerar nova Venda</span></a>
            </div>

        </div>

        <div class="row clearfix">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-blue-grey hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Total Vendido</div>
                        <div class="number">R$<?= number_format("$total_vendido", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>


            <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-brown hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Numero de Vendas</div>
                        <div class="number"><?= $numero_vendas; ?></div>
                    </div>
                </div>
            </div>
            <div class=" col-lg-12 col-md-12 col-sm-7 col-xs-12">
                <form class="" enctype="multipart/form-data" action="<?= site_url('P_vendas/filtra_vendas/') ?>"
                    method="post">

                    <div class="col-md-3">
                        <div class="form-group ">
                            <label>De:</label>
                            <input required type="date" value="" name="data_inicial" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group  ">
                            <label>Até:</label>
                            <input required type="date" value="" name="data_final" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <button type="submit" style="margin-top: 27px"
                            class="btn btn-primary ml-2 col-sm-12 col-md-12 col-xs-6 ">Filtrar</button>
                    </div>

                    <div class="col-md-3">
                        <a href="<?= base_url('P_vendas/index') ?>"><span style="margin-top: 27px"
                                class="btn btn-success col-md-12 col-sm-12 col-xs-6">Geral</span></a>
                    </div>

                </form>

            </div>

        </div>

        <div id="like_button_container"></div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Vendas
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Data Venda</th>
                                        <th>N° do Ticket</th>
                                        <th>Valor Total da Venda</th>
                                        <th>Vendedor</th>
                                        <th>Nome Fantasia</th>

                                        <th>Ver</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Data Venda</th>
                                        <th>N° do Ticket</th>
                                        <th>Valor Total da Venda</th>
                                        <th>Vendedor</th>
                                        <th>Nome Fantasia</th>

                                        <th>Ver</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php $contador = 1;
                                    foreach ($vendas as $v) { ?>

                                        <tr>
                                            <td><?= $contador; ?></td>
                                            <td><?= date('d/m/Y', strtotime($v['data_venda'])) ?></td>
                                            <td><?= $v['ticket'] ?></td>
                                            <td>R$
                                                <?php $total_venda = $v['valor_total_venda'];
                                                echo number_format("$total_venda", 2, ",", "."); ?>
                                            </td>
                                            <td><?= $v['vendedor'] ?></td>
                                            <td><?= $v['nome_fantasia'] ?></td>


                                            <td align="center"><a
                                                    href="<?= site_url('P_vendas/ver_venda/') . $v['id'] ?>"><i
                                                        class="material-icons"><i
                                                            class="material-icons">assignment_returned</i></i></a>
                                            </td>
                                            <td align="center"><a
                                                    href="<?= site_url('P_vendedores_petrofertil/edita_vendedor/') . $v['id'] ?>"><i
                                                        class="material-icons"><i class="material-icons">edit</i></i></a>
                                            </td>

                                            <td align="center"><a data-toggle="modal" data-target="#deletar_venda"
                                                    data-pegaid="<?= $v['id'] ?>"
                                                    data-pegacod="<? -$v['codigo_venda'] ?>"><i
                                                        class="material-icons">delete</i></a>
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

        <div class="modal fade" id="deletar_venda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deseja excluir essa venda?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir essa venda?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <a class="deleta" href="#"><button type="button" class="btn btn-danger">
                                Deletar</button></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>