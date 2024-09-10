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
                <h2>Nossos Funcionarios</h2>
            </div>

            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a style="margin-left: 5px" href="<?= base_url('P_funcionarios/formulario_funcionario') ?>"><span type="button" class="btn btn-success  waves-effect">Cadastro De Funcionário</span></a>
            </div>

        </div>
        <!-- Basic Example -->
        <div class="row clearfix">

            <?php foreach ($funcionarios as $f) { ?>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div style="height: 640px;" class="card profile-card">
                        <div style="background-color: #348fa9;" class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img class="" style="max-width: 180px;" src="<?= base_url('uploads/funcionarios_petrofertil/foto_perfil/').$f['foto_perfil'] ?>" alt="AdminBSB - Profile Image">
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
                            <a href="<?= base_url('p_funcionarios/ver_funcionario/').$f['id'] ?>"><button class="btn btn-primary btn-lg waves-effect btn-block">VER FUNCIONÁRIO</button></a>
                        </div>
                    </div>
                </div>

            <?php } ?>


        </div>
        <!-- #END# Basic Example -->
        <!-- Colored Card - With Loading -->
</section>