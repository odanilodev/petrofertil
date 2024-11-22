<!DOCTYPE html>
<html>

<?php
$status = $this->session->userdata('usuario');

if ($status != "logado") {

    redirect('petrofertil/verifica_login');
}

$usuario = $this->session->userdata('login');

$nome_usuario = $this->session->userdata('nome_usuario');


?>


<head>
    <meta name="theme-color" content="#f9f9f9">
    <meta charset="UTF-8">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>
        Painel Petrofertil
    </title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url('assets/img/favicon_sistema_petro.png') ?>" type="image/x-icon">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">


    <!-- Bootstrap Core Css -->

    <link href="<?= base_url('assets/financeiro/plugins/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url('assets/financeiro/plugins/node-waves/waves.css') ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url('assets/financeiro/plugins/animate-css/animate.css') ?>" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?= base_url('assets/financeiro/plugins/morrisjs/morris.css') ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url('assets/css/style-petro.css') ?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url('assets/financeiro/css/themes/all-themes.css') ?>" rel="stylesheet" />

    <!-- Alertas animados com caixa de aviso -->
    <link href="<?= base_url('assets/financeiro/plugins/sweetalert/sweetalert.css') ?>" rel="stylesheet" />


</head>

<body class="theme-red">

    <input type="hidden" class="base-url" value="<?= base_url() ?>">
    <input type="hidden" class="segment-3" value="<?= $this->uri->segment(3) ?>">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Carregando...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->

    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav style="background-color: #72c4c0;" class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">PAINEL ADMINISTRATIVO PETROFERTIL</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                    <!-- Notifications -->
                    <!-- <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-orange">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy</b> changed name</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>-->
                    <!-- #END# Notifications -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <?php if ($usuario == 'juninho@petrofertil.com.br' or $usuario == 'portaria' or $usuario == 'manutencao@petrofertil.com.br') { ?>
                        <img src="<?= base_url('uploads/funcionarios_petrofertil/foto_perfil/men_profile.png') ?>"
                            width="48" height="48" alt="User" />
                    <?php } ?>
                    <?php if ($usuario == 'heloisa.inoue@petrofertil.com.br' or $usuario == 'adrielly@petrofertil.com.br') { ?>
                        <img src="<?= base_url('uploads/funcionarios_petrofertil/foto_perfil/men_profile.png') ?>"
                            width="48" height="48" alt="User" />
                    <?php } ?>
                    <?php if ($usuario == 'alaide@petrofertil.com.br') { ?>
                        <img src="<?= base_url('uploads/funcionarios_petrofertil/foto_perfil/alaide.jpg') ?>" width="48"
                            height="48" alt="User" />
                    <?php } ?>
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $nome_usuario ?>
                    </div>
                    <div class="email"><?= $usuario ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">

                            <li><a href="<?= base_url('petrofertil/login') ?>"><i
                                        class="material-icons">input</i>Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->

            <?php

            if (isset($pagina)) {
            } else {
                $pagina = 0;
            }

            ?>

            <div class="menu">
                <ul class="list">

                    <?php if ($usuario == 'manutencao@petrofertil.com.br') { ?>
                        <li class="header">CADASTRO PETROFERTIL</li>

                        <li>
                            <a href="<?= site_url('P_motoristas') ?>">
                                <i class="material-icons">person</i>
                                <span>Motoristas</span>
                            </a>
                        </li>

                        <li class="header">SETOR DE MANUTENÇÃO</li>

                        <li>
                            <a href="<?= site_url('P_manutencao') ?>">
                                <i class="material-icons">person</i>
                                <span>Manutenções de Veículos</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('P_veiculos_empresa') ?>">
                                <i class="material-icons">directions_bus</i>
                                <span>Veículos da empresa</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('P_ordem_servico') ?>">
                                <i class="material-icons">person</i>
                                <span>Ordens de serviço</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('P_oficinas') ?>">
                                <i class="material-icons">directions_bus</i>
                                <span>Oficinas</span>
                            </a>
                        </li>

                    <? } ?>

                    <?php if ($usuario == 'portaria') { ?>
                        <li class="header">CADASTRO PETROFERTIL</li>

                        <li>
                            <a href="<?= site_url('P_motoristas') ?>">
                                <i class="material-icons">person</i>
                                <span>Motoristas</span>
                            </a>
                        </li>


                        <li>
                            <a href="<?= site_url('P_veiculos') ?>">
                                <i class="material-icons">directions_bus</i>
                                <span>Veículos</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('P_pesagem') ?>">
                                <i class="material-icons">developer_board</i>
                                <span>Tickets (Pesagem)</span>
                            </a>
                        </li>

                    <? } ?>


                    <?php if ($usuario == 'alaide@petrofertil.com.br' or $usuario == 'adrielly@petrofertil.com.br') { ?>

                        <li class="header">DESTINAÇÃO DE MATERIAL</li>

                        <li>
                            <a href="<?= site_url('P_destinacao/destinacao_geral') ?>">
                                <i class="material-icons">swap_horiz</i>
                                <span>Destinação Geral</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('P_clientes') ?>">
                                <i class="material-icons">perm_identity</i>
                                <span>Clientes e Destinações</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('P_controle_qualidade/inicio') ?>">
                                <i class="material-icons">perm_identity</i>
                                <span>Controle de Produção e Qualidade</span>
                            </a>
                        </li>

                        <li class="header">CADASTRO PETROFERTIL</li>

                        <li>
                            <a href="<?= site_url('P_motoristas') ?>">
                                <i class="material-icons">person</i>
                                <span>Motoristas</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('P_vendedores_petrofertil') ?>">
                                <i class="material-icons">record_voice_over</i>
                                <span>Vendedores</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('P_clientes_petrofertil') ?>">
                                <i class="material-icons">assignment_ind</i>
                                <span>Clientes</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('P_produtos') ?>">
                                <i class="material-icons">label</i>
                                <span>Produtos</span>
                            </a>
                        </li>

                        <li class="header">COMERCIAL</li>

                        <li>

                            <a href="<?= site_url('P_vendas') ?>">
                                <i class="material-icons">monetization_on</i>
                                <span>Vendas</span>
                            </a>
                        </li>


                    <?php } ?>


                    <?php if ($usuario == 'heloisa.inoue@petrofertil.com.br' or $usuario == 'adrielly@petrofertil.com.br') { ?>


                        <li class="header">COMERCIAL</li>

                        <li>
                            <a href="<?= site_url('P_vendas') ?>">
                                <i class="material-icons">attach_money</i>
                                <span>Vendas</span>
                            </a>
                        </li>

                        <li class="header">FINANCEIRO</li>

                        <li>
                            <a href="<?= site_url('P_faturamento') ?>">
                                <i class="material-icons">pie_chart</i>
                                <span>Livro Caixa</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('P_caixa') ?>">
                                <i class="material-icons">monetization_on</i>
                                <span>Caixa</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('P_contas_pagar/inicio') ?>">
                                <i class="material-icons">date_range</i>
                                <span>Contas a Pagar</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('P_contas_receber/inicio') ?>">
                                <i class="material-icons">payment</i>
                                <span>Contas a Receber</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('P_cheques') ?>">
                                <i class="material-icons">payment</i>
                                <span>Cheques a compensar</span>
                            </a>
                        </li>

                        <li class="header">CADASTRO PETROFERTIL</li>


                        <li>
                            <a href="<?= site_url('P_clientes_petrofertil') ?>">
                                <i class="material-icons">assignment_ind</i>
                                <span>Clientes</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('P_clientes') ?>">
                                <i class="material-icons">perm_identity</i>
                                <span>Fornecedores e Destinações</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('P_vendedores_petrofertil') ?>">
                                <i class="material-icons">record_voice_over</i>
                                <span>Vendedores</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('P_transportadores') ?>">
                                <i class="material-icons">local_shipping</i>
                                <span>Transportadores</span>
                            </a>
                        </li>


                        <li>
                            <a href="<?= site_url('P_motoristas') ?>">
                                <i class="material-icons">person</i>
                                <span>Motoristas</span>
                            </a>
                        </li>


                        <li>
                            <a href="<?= site_url('P_veiculos') ?>">
                                <i class="material-icons">directions_bus</i>
                                <span>Veículos</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('P_prestadores_servico') ?>">
                                <i class="material-icons">directions_bus</i>
                                <span>Prestadores de serviço</span>
                            </a>
                        </li>


                        <li>
                            <a href="<?= site_url('P_produtos') ?>">
                                <i class="material-icons">label</i>
                                <span>Produtos</span>
                            </a>
                        </li>


                        <?php if ($usuario == 'adrielly@petrofertil.com.br') { ?>

                            <li>
                                <a href="<?= site_url('P_pesagem') ?>">
                                    <i class="material-icons">developer_board</i>
                                    <span>Tickets (Pesagem)</span>
                                </a>
                            </li>

                        <?php } ?>


                    <?php } ?>


                    <?php if ($usuario == 'juninho@petrofertil.com.br') { ?>
                        <li>
                            <a href="<?= site_url('Petrofertil/inicio/') ?>">
                                <i class="material-icons">home</i>
                                <span>Inicio</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('Petrofertil/inicio/') ?>">
                                <i class="material-icons">warning</i>
                                <span>Estoque de EPI</span>
                            </a>
                        </li>

                        <li class="header">Interno</li>

                        <li>
                            <a href="<?= site_url('P_funcionarios/inicio/') ?>">
                                <i class="material-icons">person</i>
                                <span>Funcionários</span>
                            </a>
                        </li>

                    <?php } ?>

                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    Copyright © <a href="https://petroecol.com.br">Petrofertil</a> | Bauru, SP <?= date('Y'); ?></a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

    </section>