<!DOCTYPE html>
<html>

<?php
$status = $this->session->userdata('usuario');

if ($status != "logado") {

    redirect('financeiro/verifica_login');
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

        <?php

        if ($usuario == 'atendimento@petroecol.com.br') {
            echo "Controle de Estoque";
        } else {
            echo "Painel Administrador";
        }

        ?>

    </title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url('assets/img/favicon_sistema.png') ?>" type="image/x-icon">


    <!-- PWA -->

    <link rel="manifest" href="/manifest.json">
    <link rel="canonical" href="https://petroecol.com.br/saulo">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">


    <!-- Bootstrap Core Css -->

    <link href="<?= base_url('assets/saulo/plugins/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url('assets/saulo/plugins/node-waves/waves.css') ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url('assets/saulo/plugins/animate-css/animate.css') ?>" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?= base_url('assets/saulo/plugins/morrisjs/morris.css') ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url('assets/saulo/css/style.css') ?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url('assets/saulo/css/themes/all-themes.css') ?>" rel="stylesheet" />

    <!-- Alertas animados com caixa de aviso -->
    <link href="<?= base_url('assets/saulo/plugins/sweetalert/sweetalert.css') ?>" rel="stylesheet" />



</head>

<body class="theme-red">

    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('sw.js')
                .then(function() {
                    console.log('service worker registered');
                })
                .catch(function() {
                    console.warn('service worker failed');
                });
        }
    </script>

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
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">PAINEL ADMINISTRATIVO PETROECOL</a>
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

                    <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                        <img src="<?= base_url('assets/financeiro/images/user.png') ?>" width="48" height="48" alt="User" />
                    <? } ?>
                    <?php if ($usuario == 'comercial@petroecol.com.br') { ?>
                        <img src="<?= base_url('assets/financeiro/images/user2.jpg') ?>" width="48" height="48" alt="User" />
                    <? } ?>
                    <?php if ($usuario == 'petroecol@petroecol.com.br') { ?>
                        <img src="<?= base_url('assets/financeiro/images/user3.jpg') ?>" width="48" height="48" alt="User" />
                    <? } ?>
                    <?php if ($usuario == 'reciclagem@petroecol.com.br') { ?>
                        <img src="<?= base_url('assets/financeiro/images/user4.jpg') ?>" width="48" height="48" alt="User" />
                    <? } ?>
                    <?php if ($usuario == 'atendimento@petroecol.com.br') { ?>
                        <img src="<?= base_url('assets/img/team/team-1.jpg') ?>" width="48" height="48" alt="User" />
                    <? } ?>

                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $nome_usuario ?></div>
                    <div class="email"><?= $usuario ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">


                            <li><a href="<?= base_url('Saulo') ?>"><i class="material-icons">input</i>Sair</a></li>
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

                 

                    <?php if ($usuario == 'fernanda@petroecol.com.br' or $usuario == 'petroecol@petroecol.com.br' or $usuario == 'reciclagem@petroecol.com.br' or $usuario == 'atendimento@petroecol.com.br') { ?>

                        <li class="header">FINANCEIRO</li>

                        <?php if($usuario == 'fernanda@petroecol.com.br' or $usuario == 'petroecol@petroecol.com.br'){  ?>
                        <li <?php if ($pagina == 4) {
                                echo "class='active'";
                            } ?>>
                            <a href="<?= site_url('S_fluxo/inicio/4') ?>">
                                <i class="material-icons">monetization_on</i>
                                <span>Fluxo de Caixa</span>
                            </a>
                        </li>
                        <?php } ?>

                    


                    <?php } ?>

          

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    Copyright © <a href="https://petroecol.com.br">Petroecol</a> | Bauru, SP <?= date('Y'); ?></a>.
                </div>

            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

    </section>