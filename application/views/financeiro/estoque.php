<?php
$status = $this->session->userdata('usuario');

if ($status != "logado") {

    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');

$nome_usuario = $this->session->userdata('nome_usuario');

$quantidade = $estoque['quantidade_dia'];

$peso = $quantidade * 0.92;

?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-3">
                <h2>CONTROLE DO ESTOQUE</h2>
            </div>
            <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>

            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">

                <!--  <a href="<?php base_url('F_estoque/historico_oleo/') ?>"><span type="button" class="btn btn-info waves-effect">HISTÓRICO</span></a> -->

                <a href="<?= base_url('F_estoque/historico_oleo_new/') ?>"><span type="button"
                        class="btn btn-info waves-effect">VER ESTOQUE</span></a>
                <a href="<?= base_url('F_quebra/lancar_quebra') ?>"><span type="button"
                        class="btn btn-warning waves-effect">QUEBRA</span></a>
                <a style="margin-left: 5px" href="<?= base_url('F_destinacoes/lancar_destinacao') ?>"><span
                        type="button" class="btn bg-green waves-effect">DESTINAÇÕES</span></a>

            </div>
            <?php } ?>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">move_to_inbox</i>
                    </div>
                    <div class="content">
                        <div class="text">QUANTIDADE EM LITROS</div>
                        <div style="font-size: 32px" class="number "><?= number_format("$quantidade", 0, '.', '.'); ?>
                        </div>
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

            <?php if ($pagina == 'erro') { ?>
            <div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                    aria-label="Close"><span aria-hidden="true">×</span></button>
                Não foram encontradas <b>aferições</b> nas datas selecionadas, ou os campos nao foram preenchidos
                corretamente.
            </div>
            <?php } ?>
            <!-- <form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_estoque/busca_diario/') ?>" method="post">


                <div class="col-md-offset-2 col-md-4 ">

                    <div class="form-group ">
                        <label>Buscar Estoque Diário</label>
                        <input required type="date" value="" name="data_inicial" class="form-control">
                    </div>

                </div>


                <button type="submit" style="margin-top: 27px" class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 ">Filtrar</button>

                <a href="<?php site_url('f_estoque/inicio/3') ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>


                <?php if ($pagina == 'deletado') { ?>

                    <div class="alert bg-teal alert-dismissible col-xs-12" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Aferição deletada com sucesso
                    </div>
                <?php } ?>
            </form> -->
        </div>



    </div>


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
                                    <th>Quantidade (LT)</th>
                                    <th>Valor (LT)</th>
                                    <th>Quantidade (KG)</th>
                                    <th>Valor (KG)</th>
                                    <th>Valor Total</th>
                                    <th>Data Recebimento</th>
                                    <th>Total Recebido</th>

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
                                    <th>Quantidade (LT)</th>
                                    <th>Valor (LT)</th>
                                    <th>Quantidade (KG)</th>
                                    <th>Valor (KG)</th>
                                    <th>Valor Total</th>
                                    <th>Data Recebimento</th>
                                    <th>Total Recebido</th>

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
                                    <td><?php $quantidade_l = $d['quantidade'];
                                            echo number_format($quantidade_l, 2, ",", "."); ?></td>
                                    <td>R$<?php $valor_l = $d['valor'];
                                                echo number_format($valor_l, 2, ",", "."); ?></td>
                                    <td><?php $quantidade_kg = $d['quantidade'] * 0.92;
                                            echo number_format($quantidade_kg, 2, ",", "."); ?></td>
                                    <td>R$<?php $valor_kg = $d['valor'] / 0.92;
                                                echo number_format($valor_kg, 2, ",", "."); ?></td>
                                    <td>R$<?php $valor_total = $d['valor_total'];
                                                echo number_format($valor_total, 2, ",", "."); ?></td>

                                    <td><a data-toggle="modal" data-cli-id="<?= $d['id'] ?>"
                                            data-cli-dest="<?= $d['cliente'] ?>" data-target="#ModalOleoVenda"
                                            style=" color: <?= !empty($d['data_recebimento']) ? 'green' : 'red' ?>"
                                            href="<?= base_url('F_venda_reciclagem/recebe_valor/') . $d['id'] ?>"><?= !empty($d['data_recebimento']) ? date("d/m/Y", strtotime($d['data_destinacao'])) : "A receber" ?></a>
                                    </td>
                                    <td><?= !empty($d['valor_recebido']) ? 'R$'.number_format($d['valor_recebido'], 2, ",", ".") : '-------------' ?>
                                    </td>

                                    <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                    <td align="center"><a
                                            href="<?= site_url('F_destinacoes/lancar_destinacao/') . $d['id'] ?>"><i
                                                class="material-icons">edit</i></a></td>
                                    <td align="center"><a data-toggle="modal" data-target="#exampleModal5"
                                            data-pegaid="<?= $d['id'] ?>"><i class="material-icons">delete</i></a></td>
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
                        Quebra
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
                                    <td align="center"><a data-toggle="modal" data-target="#exampleModal6"
                                            data-pegaid="<?= $q['id'] ?>"><i class="material-icons">delete</i></a></td>
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



    <div class="modal fade" id="ModalOleoVenda" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div style="background-color: #fff;" class="">

                <div class="modal-header">
                    <h5 class="modal-title" id="ModalOleoVenda">Recebendo:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="ModalOleoVendaCaminho" method="post">

                        <div class="row container-fluid">

                            <div class="col-md-6">
                                <label>Data do recebimento:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name='data_recebimento' value="" class="form-control tt2">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Valor:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name='valor_recebido' value=""
                                            placeholder="Digite o valor recebido da venda"
                                            class="valor form-control tt2">
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary  waves-effect">Enviar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="deleta_destinacao" href="#"><button type="button" class="btn btn-success"> Deletar e
                            atualizar estoque</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="deleta_quebra" href="#"><button type="button" class="btn btn-success"> Deletar e atualizar
                            estoque</button></a>
                </div>
            </div>
        </div>
    </div>



    </div>
</section>