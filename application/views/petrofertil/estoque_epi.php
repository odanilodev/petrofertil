<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-3">
                <h2>ESTOQUE DE EPI´S</h2>
            </div>

            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a style="margin-left: 5px" href="<?= base_url('P_epi/formulario_cadastro_epi') ?>"><span type="button" class="btn btn-success  waves-effect">Cadastrar EPI</span></a>
            </div>



        </div>

        <?php if ($alerta == 'nao_disponivel') { ?>

            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Não foi possivel realizar a destinação, pois a quantidade solicitada é maior que a quantidade em estoque
            </div>

        <?php } ?>

        <!-- Exportable Table -->
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            TABELA DE CONTROLE
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>EPI</th>
                                        <th>CA</th>
                                        <th>Observação</th>
                                        <th>Quantidade</th>
                                        <th>Destinação</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>EPI</th>
                                        <th>CA</th>
                                        <th>Observação</th>
                                        <th>Quantidade</th>
                                        <th>Destinação</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php $contador = 1;
                                    foreach ($epis as $e) { ?>
                                        <tr>

                                            <td align="center"><?= $contador ?></td>
                                            <td align="center"><?= $e['nome'] ?></td>
                                            <td align="center"><?= $e['ca'] ?></td>
                                            <td align="center"><?= $e['observacao'] ?></td>
                                            <td align="center"><?= $e['quantidade'] ?></td>
                                            <td align="center"><a href="<?= base_url('p_epi/formulario_destinacao_epi/') . $e['id'] ?>"><i class="material-icons">near_me</i></a></td>
                                            <td align="center"><a href="<?= base_url('p_epi/formulario_edita_epi/') . $e['id'] ?>"><i class="material-icons">mode_edit</i></a></td>
                                            <td align="center"><a href="<?= base_url('p_epi/deleta_epi/') . $e['id'] ?>"><i class="material-icons">delete</i></a></td>

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

</section>