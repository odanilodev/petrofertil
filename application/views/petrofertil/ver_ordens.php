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
                <h2>ORDENS DE SERVIÇO</h2>
            </div>


            <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">

                    <a style="margin-left: 5px" href="<?= base_url('F_fornecedores/cadastrar_fornecedor') ?>"><span
                            type="button" class="btn bg-green waves-effect">CADASTRO</span></a>
                </div>
            <? } ?>

        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Ordens de serviço
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>Data Reclamação</th>
                                        <th>Placa</th>
                                        <th>Oficina</th>
                                        <th>Reclamação</th>
                                        <th>Rever</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Data Reclamação</th>
                                        <th>Placa</th>
                                        <th>Oficina</th>
                                        <th>Reclamação</th>
                                        <th>Rever</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <?php foreach ($ordens as $m) { ?>
                                            <td><?= date("d/m/Y", strtotime($m['data_reclamacao'])); ?></td>
                                            <td><?= $m['placa'] ?></td>
                                            <td><?= $m['oficina'] ?></td>
                                            <td><?= $m['reclamacao'] ?></td>
                                            <td><a
                                                    href="<?= site_url('P_ordem_servico/rever_ordem/' . $m['id']) ?>"><?= $m['codigo'] ?></a>
                                            </td>


                                        <?php } ?>

                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->

        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deletar Fornecedor?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir o cadastro deste fornecedor?
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