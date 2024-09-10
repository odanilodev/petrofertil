<!DOCTYPE html>
<html>

<head>
    <meta name="theme-color" content="#f9f9f9">
    <meta charset="UTF-8">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Controle de Estoque</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">


    <!-- PWA -->

    <link rel="manifest" href="/manifest.json">
    <link rel="canonical" href="https://petroecol.com.br/financeiro">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">


    <!-- Bootstrap Core Css -->

    <?php

    $status = $this->session->userdata('usuario');

    if ($status != "logado") {

        redirect('financeiro/verifica_login');
    }

    $usuario = $this->session->userdata('login');

    $nome_usuario = $this->session->userdata('nome_usuario');

    $id_usuario = $this->session->userdata('id_usuario');

    $foto_perfil = $this->session->userdata('foto_perfil');

    $funcao = $this->session->userdata('funcao');

    ?>



    <link href="<?= base_url('assets/financeiro/plugins/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url('assets/financeiro/plugins/node-waves/waves.css') ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url('assets/financeiro/plugins/animate-css/animate.css') ?>" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?= base_url('assets/financeiro/plugins/morrisjs/morris.css') ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url('assets/financeiro/css/style.css') ?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url('assets/financeiro/css/themes/all-themes.css') ?>" rel="stylesheet" />

    <!-- Alertas animados com caixa de aviso -->
    <link href="<?= base_url('assets/financeiro/plugins/sweetalert/sweetalert.css') ?>" rel="stylesheet" />


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
                <div class="spinner-layer pl-red">
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
                <a class="navbar-brand" href="<?= base_url('eco/inicio') ?>">CONTROLE DE ESTOQUE</a>
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

                    <img src="<?= base_url('uploads/foto_motoristas/') . $foto_perfil ?>" width="48" height="48" alt="User" />

                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $nome_usuario ?></div>
                    <div class="email"><?= $funcao ?></div>

                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">


                            <li><a href="<?= base_url('eco') ?>"><i class="material-icons">input</i>Sair</a></li>
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

                    <li class="header">ESTOQUE</li>

                    <li>
                        <a href="<?= base_url('eco/inicio') ?>">
                            <i class="material-icons">home</i>
                            <span>Início</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('Eco/historico_saida_motorista/').$id_usuario ?>">
                            <i class="material-icons">av_timer</i>
                            <span>Minhas Ultimas Saídas</span>
                        </a>
                    </li>


                    <li class="header">DUVIDAS E PROBLEMAS</li>

                    <li>
                        <a target="_blank" href="https://wa.me/5514997144385">
                            <i class="material-icons">phone</i>
                            <span>Contato</span>
                        </a>
                    </li>


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