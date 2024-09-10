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
                <h2 class="caixa-alta">Nossos funcionários</h2>
            </div>

            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a style="margin-left: 5px" href="<?= base_url('F_funcionarios/formulario_funcionario') ?>"><span type="button" class="btn btn-success  waves-effect">Cadastro De Funcionário</span></a>
            </div>

        </div>
        <!-- Basic Example -->
        <div class="row clearfix">

            <?php foreach ($funcionarios as $f) { ?>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div style="height: 520px;" class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img class="profile-image" src="<?= base_url('uploads/funcionarios/foto_perfil/').$f['foto_perfil'] ?>" alt="AdminBSB - Profile Image">
                            </div>
                            <div class="content-area">
                                <h3><?= $f['nome'] ?></h3>
                                <p><?= $f['funcao'] ?></p>
                                <p><?= strtoupper($f['grupo']) ?></p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Data de Admissão:</span>
                                    <span><?= date('d/m/Y', strtotime($f['opcao'])) ?></span>
                                </li>
                                <li>
                                    <span>Data de Nascimento:</span>
                                    <span><?= date('d/m/Y', strtotime($f['data_nascimento'])) ?></span>
                                </li>
                                <li>
                                    <span>CPF:</span>
                                    <span><?= $f['cpf'] ?></span>
                                </li>
                            </ul>
                            <a href="<?= base_url('f_funcionarios/ver_funcionario/').$f['id'] ?>"><button class="btn btn-primary btn-lg waves-effect btn-block">VER FUNCIONÁRIO</button></a>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
        <!-- #END# Basic Example -->
        <!-- Colored Card - With Loading -->
</section>