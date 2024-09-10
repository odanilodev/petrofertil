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
                <h2>Escolha a Seção de Relatórios</h2>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <a style="text-decoration: none;" href="<?= base_url('F_relatorios/relatorio_motoristas') ?>">
                    <div class="body bg-cyan">
                        <div align='center'><b> <i class="material-icons">person</i></b></div>
                        <div align='center'><b style="font-size: 17px">Motoristas/Óleo</b></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">

                <a style="text-decoration: none;" href="<?= base_url('F_relatorios/relatorio_oleo') ?>">
                    <div class="body bg-light-green">
                        <div align='center'><b> <i class="material-icons">opacity</i></b></div>
                        <div align='center'><b style="font-size: 17px">Óleo</b></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">

                <a style="text-decoration: none;" href="<?= base_url('F_relatorios/relatorio_cidade') ?>">
                    <div class="body bg-indigo">
                        <div align='center'><b> <i class="material-icons">place</i></b></div>
                        <div align='center'><b style="font-size: 17px">Cidades</b></div>
                    </div>
                </a>

            </div>
        </div>

    </div>
</section>