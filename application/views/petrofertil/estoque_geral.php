<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-3">
                <h2>CONTROLE DE EPI</h2>
            </div>



        </div>

        <!-- Widgets -->
        <div style="margin-top: 20px;" class="row clearfix">
            <div class="container">

                <a href="<?= base_url('P_epi/exibir_estoque_epi') ?>">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="demo-color-box bg-purple">
                            <i class="material-icons">warning</i>
                            <div class="color-name">EPI´S</br>(Equipamentos de Proteção Individual)</div>
                        </div>
                    </div>
                </a>

                <a href="<?= base_url('P_produtos/exibir_estoque_produtos') ?>">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="demo-color-box bg-light-blue">
                            <i class="material-icons">store_mall_directory</i>
                            <div class="color-name">PRODUTOS<br>(Produtos em Geral)</div>
                        </div>
                    </div>
                </a>


                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="demo-color-box bg-green">
                        <i class="material-icons">person_pin</i>
                        <div class="color-name">PEDIDOS GERAIS<br>(Em Desenvolvimento)</div>
                    </div>
                </div>


            </div>

        </div>
        <!-- #END# Widgets -->

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Historico de Destinações
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Data destinação</th>
                                        <th>Funcionário</th>
                                        <th>Quantidade</th>
                                        <th>EPI/Produto</th>
                                        <th>Observação</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Data destinação</th>
                                        <th>Funcionário</th>
                                        <th>Quantidade</th>
                                        <th>EPI/Produto</th>
                                        <th>Observação</th>
                                        <th>Excluir</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php $contador = 1; foreach ($destinacoes as $d) { ?>
                                        <tr>
                                            <td><?= $contador; ?></td>
                                            <td><?= date("d/m/Y", strtotime($d['data_destinacao'])); ?></td>
                                            <td><?= $d['funcionario'] ?></td>
                                            <td><?= $d['quantidade'] ?></td>
                                            <td><?= $d['produto'] ?></td>
                                            <td><?= $d['observacao'] ?></td>
                                            <td align="center"><a href="<?= base_url('Petrofertil/deleta_destinacao/') . $d['id'] ?>"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                    <?php $contador++; } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->

</section>