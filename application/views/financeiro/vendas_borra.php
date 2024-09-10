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

                    <a href="<?= base_url('F_borra/lancar_venda') ?>"><span type="button" class="btn btn-success waves-effect">LANÇAMENTO</span></a>

                </div>
            <?php } ?>
        </div></br>

       
        <div class="row">
            <div class="container-fluid">
                <?php if ($pagina == 'erro') { ?>
                    <div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Não foram encontradas <b>aferições</b> nas datas selecionadas, ou os campos nao foram preenchidos corretamente.
                    </div>
                <?php } ?>
                <form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_borra/exibir_vendas_filtrada/') ?>" method="post">

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

                    <a href="<?= site_url('F_borra/exibir_vendas/venda_borra') ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>


                    <?php if ($pagina == 'deletado') { ?>

                        <div class="alert bg-teal alert-dismissible col-xs-12" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            Aferição deletada com sucesso
                        </div>
                    <?php } ?>

            </div>

            </form>

        </div>

        <div class="row">

            <?php if ($pagina == 'erro') { ?>
                <div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Não foram encontradas <b>aferições</b> nas datas selecionadas, ou os campos nao foram preenchidos corretamente.
                </div>
            <?php } ?>

        </div>

    </div>

    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div style="margin-top: 15px" class="card">
                <div class="header">
                    <h2>
                        Destinações de borra
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
                                    <th>Valor Kg</th>
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
                                    <th>Cliente</th>
                                    <th>Quantidade</th>
                                    <th>Valor Kg</th>
                                    <th>Valor Total</th>
                                    <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                    <th>Editar</th>
                                    <th>Deletar</th>
                                    <?php } ?>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php $contador = 1;
                                foreach ($vendas as $v) { ?>

                                    <tr>
                                        <td><?= $contador ?></td>
                                        <td><?= date("d/m/Y", strtotime($v['data_destinacao'])); ?></td>
                                        <td><?= $v['cliente'] ?></td>
                                        <td><?= $v['quantidade'] ?></td>
                                        <td>R$<?= $v['valor'] ?></td>
                                        <td>R$<?= $v['valor_total'] ?></td>
                                        <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                            <td align="center"><a href="<?= base_url('F_borra/edita_venda/').$v['id'] ?>"><i class="material-icons">edit</i></a></td>
                                            <td align="center"><a href="<?= base_url('F_borra/deleta_venda/').$v['id'] ?>"><i class="material-icons">delete</i></a></td>
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


    </div>
</section>