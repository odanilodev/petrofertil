<?php

$status = $this->session->userdata('usuario');

if ($status != "logado") {
    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');
$nome_usuario = $this->session->userdata('nome_usuario');

?>

<style>
    .vehicle-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        grid-gap: 20px;
        margin-top: 15px;
    }

    .vehicle-card {
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        position: relative;
    }

    .vehicle-card img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .vehicle-info {
        margin-top: 10px;
        font-size: 16px;
        font-weight: bold;
    }

    .vehicle-actions {
        margin-top: 10px;
    }

    .vehicle-actions a {
        margin-right: 5px;
        text-decoration: none;
        color: #007bff;
    }

    .vehicle-actions a:hover {
        color: #0056b3;
    }

    .vehicle-actions i {
        font-size: 24px;
        vertical-align: middle;
    }

    #deletar_veiculo_empresa .modal-dialog {
        max-width: 600px;
    }

    #deletar_veiculo_empresa .modal-content {
        border-radius: 10px;
    }

    #deletar_veiculo_empresa .modal-body {
        padding: 20px;
    }

    #deletar_veiculo_empresa .modal-footer {
        justify-content: space-between;
        border-top: none;
    }

    #deletar_veiculo_empresa .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    #deletar_veiculo_empresa .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

<input type='hidden' value="<?= base_url() ?>" class="base-url">

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-3">
                <h2>Veículos Petrofertil</h2>
            </div>

            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a style="margin-left: 5px" href="<?= base_url('P_veiculos_empresa/formulario_veiculos') ?>">
                    <span type="button" class="btn btn-info waves-effect">CADASTRAR</span>
                </a>
            </div>
        </div>

        <!-- Grid of Vehicles -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="vehicle-grid">
                    <?php foreach ($veiculos as $veiculo) { ?>
                        <div class="vehicle-card">
                            <!-- Display vehicle image if exists, else show default image -->
                            <?php if ($veiculo['imagem']) { ?>
                                <img src="<?= base_url('uploads/veiculos/' . $veiculo['imagem']) ?>" alt="Imagem do Veículo">
                            <?php } else { ?>
                                <img src="<?= base_url('assets/img/petrofertil/caminhao_padrao.png') ?>"
                                    alt="Imagem Padrão de Veículo">
                            <?php } ?>

                            <div class="vehicle-info">
                                <?= $veiculo['placa'] ?><br>
                                <?= $veiculo['modelo'] ?>
                            </div>

                            <div class="vehicle-actions">
                                <a href="P_veiculos_empresa/formulario_veiculos/<?= $veiculo['id'] ?>">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a data-toggle="modal" data-target="#deletar_veiculo_empresa"
                                    data-pegaid="<?= $veiculo['id'] ?>">
                                    <i class="material-icons">delete</i>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

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
                        ser solicitadas ao administrador do sistema após deletar o veículo.
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