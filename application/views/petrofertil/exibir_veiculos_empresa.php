<?php

$status = $this->session->userdata('usuario');

if ($status != "logado") {

    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');

$nome_usuario = $this->session->userdata('nome_usuario');

?>

<style>
    #ModalPagar .modal-dialog {
        max-width: 600px;
    }

    #ModalPagar .modal-content {
        border-radius: 10px;
    }

    #ModalPagar .modal-body {
        padding: 20px;
    }

    #ModalPagar .modal-footer {
        justify-content: space-between;
        border-top: none;
    }

    #ModalPagar .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    #ModalPagar .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

<input type='hidden' value="<?= base_url() ?>" class="base-url">


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-3">
                <h2>Veiculos Petrofertil</h2>
            </div>

            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a style="margin-left: 5px" href="<?= base_url('P_veiculos_empresa/formulario_veiculos') ?>"><span
                        type="button" class="btn btn-info  waves-effect">CADASTRAR</span></a>
            </div>

        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Veículos da empresa
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr align="center">
                                        <th>Placa</th>
                                        <th>Modelo</th>

                                        <th>Ver Manutenções</th>
                                        <th>Editar</th>

                                        <th>Deletar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($veiculos as $veiculo) { ?>
                                        <tr align="center">
                                            <td><?= $veiculo['placa'] ?></td>
                                            <td><?= $veiculo['modelo'] ?></td>
                                            <td align="center"><a data-toggle="modal" data-target="#deletar_conta"
                                                    data-pegaid="<?= $c['id'] ?>"><i class="material-icons">delete</i></a>
                                            </td>
                                            <td align="center">
                                                <a href="P_veiculos_empresa/formulario_veiculos/<?= $veiculo['id'] ?>">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            </td>

                                            <td align="center"><a data-toggle="modal" data-target="#deletar_veiculo_empresa"
                                                    data-pegaid="<?= $veiculo['id'] ?>"><i
                                                        class="material-icons">delete</i></a>
                                            </td>
                                        <?php } ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->

        <div class="modal fade" id="deletar_veiculo_empresa" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deseja excluir esse veículo?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir esse veículo? Todas as manutenções realizadas com o mesmo deverão
                        ser solicitadas ao administrador do sistema após deletar o veiculo.
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


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>