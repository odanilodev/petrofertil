<!doctype html>
<html lang="pt-br">
<?php
$status = $this->session->userdata('usuario');

if ($status != "logado") {

    redirect('admin');
}

?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="main.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('assets/admin/vendor/fonts/circular-std/style.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/admin/libs/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/fonts/fontawesome/css/fontawesome-all.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/charts/chartist-bundle/chartist.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/charts/morris-bundle/morris.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/charts/c3charts/c3.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/fonts/flag-icon-css/flag-icon.min.css') ?>">

    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

    <title>Administrador</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <!-- <a class="navbar-brand" href="index.html">Petroecol</a>-->
                <img class="img-fluid p-2"style='max-height: 55px;' src="<?= base_url('assets/img/petro_new_logo.png') ?>">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url('assets/admin/images/avatar-1.jpg') ?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">Leandro Cantaluppi</h5>
                                    <span class="status"></span>Disponível<span class="ml-2"></span>
                                </div>
                                <a class="dropdown-item" href="<?= site_url('admin') ?>"><i class="fas fa-power-off mr-2"></i>Sair</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link " href="<?= site_url('admin/inicio') ?>" aria-controls="submenu-1"><i class="fa fa-fw fas fa-home"></i>Início</a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link " data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fas fa-boxes"></i>Estoque<span class="badge badge-success">6</span></a>
                                <div id="submenu-4" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= site_url('estoque') ?>">Estoque Geral</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link " href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fas fa-user"></i>Motoristas<span class="badge badge-success">6</span></a>
                                <div id="submenu-2" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= site_url('motoristas') ?>">Motoristas Petroecol</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= site_url('Motoristas/exibir_uso_veiculos') ?>">Uso de Veículos</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link " href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fas fa-car"></i>Veículos<span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= site_url('combustivel') ?>">Visão geral de combustível</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= site_url('lembretes') ?>">Lembretes de manutenção</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= site_url('manutencoes') ?>">Manutenções</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= site_url('oficinas') ?>">Oficinas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= site_url('fornecedores') ?>">Fornecedores</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= site_url('veiculos') ?>">Exibir Veiculos</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link " href="<?= site_url('Ordem_servico/mostrar_ordens') ?>" aria-controls="submenu-1"><i class="fa fa-fw fas fa-file"></i>Ordens de Serviço</a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link " href="<?= site_url('Ordem_servico_predial/mostrar_ordens') ?>" aria-controls="submenu-1"><i class="fa fa-industry"></i>Ordens de Serviço Predial</a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->