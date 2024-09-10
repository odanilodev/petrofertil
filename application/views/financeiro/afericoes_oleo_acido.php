<?php
$status = $this->session->userdata('usuario');

if ($status != "logado") {

    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');

$nome_usuario = $this->session->userdata('nome_usuario');

$quantidade = $estoque['quantidade'];

$peso = $quantidade * 0.92;

?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-5">
                <h2>AFERIÇÕES (ÓLEO ÁCIDO)</h2>
            </div>
            <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>

                <div class="col-md-7" style="margin-bottom: 12px; margin-top: -8px" align="right">

                    <a style="margin-left: 5px" href="<?= base_url('F_oleo_acido/lancar_quebra') ?>"><span type="button" class="btn btn-success waves-effect">QUEBRAS</span></a>
                    <a href="<?= base_url('F_oleo_acido/ver_afericoes/') ?>"><span type="button" class="btn bg-teal waves-effect">AFERIÇÕES</span></a>
                    <a href="<?= base_url('F_oleo_acido/formulario_entrada_oleo_acido/') ?>"><span type="button" class="btn btn-info waves-effect">ENTRADA DE ÓLEO</span></a>
                    <a style="margin-left: 5px" href="<?= base_url('F_destinacoes/lancar_destinacao_oleo_acido') ?>"><span type="button" class="btn btn-success waves-effect">DESTINAÇÕES</span></a>

                </div>
            <?php } ?>
        </div>


        <!-- Widgets -->
        <div class="row clearfix">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-lime hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">local_drink</i>
                    </div>
                    <div class="content">
                        <div class="text">QUANTIDADE EM LITROS</div>
                        <div style="font-size: 32px" class="number "><?= number_format("$quantidade", 0, '.', '.'); ?></div>
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
                        <div style="font-size: 32px" class="number "><?= number_format("$peso", 0, '.', '.'); ?></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- #END# Widgets -->


        <div class="row">
            <div class="container-fluid">
                <?php if ($pagina == 'erro') { ?>
                    <div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Não foram encontradas <b>aferições</b> nas datas selecionadas, ou os campos nao foram preenchidos corretamente.
                    </div>
                <?php } ?>
                <form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_oleo_acido/ver_afericoes_filtrado/') ?>" method="post">

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

                    <a href="<?= site_url('F_oleo_acido/ver_afericoes/') ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>


                    <?php if ($pagina == 'deletado') { ?>

                        <div class="alert bg-teal alert-dismissible col-xs-12" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            Aferição deletada com sucesso
                        </div>
                    <?php } ?>

            </div>

            </form>

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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div style="margin-top: 15px" class="card">
                <div class="header">
                    <h2>
                        Aferições Óleo Ácido
                    </h2>

                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Data</th>
                                    <th>Fornecedor</th>
                                    <th>Quantidade (LT)</th>
                                    <th>Valor (LT)</th>
                                    <th>Quantidade (KG)</th>
                                    <th>Valor (KG)</th>
                                    <th>Nota</th>
                                    <th>Valor Total</th>
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
                                    <th>Fornecedor</th>
                                    <th>Quantidade (LT)</th>
                                    <th>Valor (LT)</th>
                                    <th>Quantidade (KG)</th>
                                    <th>Valor (KG)</th>
                                    <th>Nota</th>
                                    <th>Valor Total</th>
                                    <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                        <th>Editar</th>
                                        <th>Deletar</th>
                                    <?php } ?>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php $contador = 1;
                                foreach ($afericoes as $d) { ?>

                                    <tr>
                                        <td><?= $contador ?></td>
                                        <td><?= date("d/m/Y", strtotime($d['data_entrada'])); ?></td>
                                        <td><?= $d['fornecedor'] ?></td>
                                        <td><?php $quantidade_l = $d['aferido'];
                                            echo number_format($quantidade_l, 2, ",", "."); ?></td>
                                        <td>R$<?php $valor_l = $d['valor'];
                                                echo number_format($valor_l, 2, ",", "."); ?></td>
                                        <td><?php $quantidade_kg = $d['aferido'] * 0.92;
                                            echo number_format($quantidade_kg, 2, ",", "."); ?></td>
                                        <td>R$<?php $valor_kg = $d['valor'] / 0.92;
                                                echo number_format($valor_kg, 2, ",", "."); ?></td>
                                        <td><?= $d['nota'] ?></td>
                                        <td>R$<?php $valor_total = $d['valor_total'];
                                                echo number_format($valor_total, 2, ",", "."); ?></td>
                                        <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                            <td align="center"><a href="<?= site_url('F_oleo_acido/formulario_entrada_oleo_acido/') . $d['id'] ?>"><i class="material-icons">edit</i></a></td>
                                            <td align="center"><a data-toggle="modal" data-target="#exampleModalAcido" data-pegaid="<?= $d['id'] ?>"><i class="material-icons">delete</i></a></td>
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


    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div style="margin-top: 15px" class="card">
                <div class="header">
                    <h2>
                        Quebra Óleo Ácido
                    </h2>

                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Data</th>
                                    <th>Tipo</th>
                                    <th>Quantidade</th>
                                    <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
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
                                    <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                        <th>Deletar</th>
                                    <?php } ?>

                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $contador = 1;
                                foreach ($quebra as $q) { ?>

                                    <tr>
                                        <td><?= $contador ?></td>
                                        <td><?= date("d/m/Y", strtotime($q['data_quebra'])); ?></td>
                                        <td><?= $q['tipo'] ?></td>
                                        <td><?= $q['quantidade'] ?></td>
                                        <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                            <td align="center"><a data-toggle="modal" data-target="#exampleModal6" data-pegaid="<?= $q['id'] ?>"><i class="material-icons">delete</i></a></td>
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


    <div class="modal fade" id="exampleModalAcido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deletar Aferição?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir essa aferição?
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