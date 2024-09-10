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
    <link rel="canonical" href="https://petroecol.com.br/financeiro">

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
    <link href="<?= base_url('assets/financeiro/css/style.css') ?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url('assets/financeiro/css/themes/all-themes.css') ?>" rel="stylesheet" />

    <!-- Alertas animados com caixa de aviso -->
    <link href="<?= base_url('assets/financeiro/plugins/sweetalert/sweetalert.css') ?>" rel="stylesheet" />



</head>

<input type="hidden" value="<?=base_url()?>" class="base_url">

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
                <div class="spinner-layer pl-green">
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
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand">PAINEL ADMINISTRATIVO PETROECOL</a>
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
                    <img src="<?= base_url('assets/financeiro/images/user2.jpg') ?>" width="48" height="48"
                        alt="User" />
                    <? } ?>
                    <?php if ($usuario == 'petroecol@petroecol.com.br') { ?>
                    <img src="<?= base_url('assets/financeiro/images/user3.jpg') ?>" width="48" height="48"
                        alt="User" />
                    <? } ?>
                    <?php if ($usuario == 'reciclagem@petroecol.com.br') { ?>
                    <img src="<?= base_url('assets/financeiro/images/user4.jpg') ?>" width="48" height="48"
                        alt="User" />
                    <? } ?>
                    <?php if ($usuario == 'atendimento@petroecol.com.br') { ?>
                    <img src="<?= base_url('assets/img/team/team-1.jpg') ?>" width="48" height="48" alt="User" />
                    <? } ?>
                    <?php if ($usuario == 'producao@petroecol.com.br') { ?>
                    <img src="<?= base_url('assets/img/team/producao.png') ?>" width="48" height="48" alt="User" />
                    <? } ?>

                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $nome_usuario ?></div>
                    <div class="email"><?= $usuario ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">


                            <li><a href="<?= base_url('financeiro') ?>"><i class="material-icons">input</i>Sair</a></li>
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

                    <?php if ($usuario == 'fernanda@petroecol.com.br' or $usuario == 'petroecol@petroecol.com.br' or $usuario == 'comercial@petroecol.com.br') { ?>
                    <li class="header">PETROECOL/GERAL</li>
                    <?php if ($usuario == 'fernanda@petroecol.com.br' or $usuario == 'petroecol@petroecol.com.br') { ?>

                    <li <?php if ($pagina === 0) {
                                    echo "class='active'";
                                } ?>>
                        <a href="<?= base_url('financeiro/inicio') ?>">
                            <i class="material-icons">view_list</i>
                            <span>Informações Gerais</span>
                        </a>
                    </li>

                    <li <?php if ($pagina == 1) {
                                    echo "class='active'";
                                } ?>>
                        <a href="<?= site_url('F_clientes/inicio/1') ?>">
                            <i class="material-icons">account_circle</i>
                            <span>Clientes</span>
                        </a>
                    </li>

                    <li <?php if ($pagina == 2) {
                                    echo "class='active'";
                                } ?>>
                        <a href="<?= site_url('F_fornecedores/inicio/2') ?>">
                            <i class="material-icons">perm_identity</i>
                            <span>Fornecedores</span>
                        </a>
                    </li>



                    <?php } ?>

                    <li <?php if ($pagina ===  '3') {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_cidades/inicio/3') ?>">
                            <i class="material-icons">public</i>
                            <span>Cidades</span>
                        </a>
                    </li>

                    <li <?php if ($pagina ===  'servicos') {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_solicitacoes_servico/pagina_solicitacao/servicos') ?>">
                            <i class="material-icons">pan_tool</i>
                            <span>Solicitação de Serviços</span>
                        </a>
                    </li>


                    <li <?php if ($pagina === 'documentos') {
                                    echo "class='active'";
                                } ?>>
                        <a href="<?= base_url('F_documentos/inicio/1') ?>">
                            <i class="material-icons">library_books</i>
                            <span>Cadastro Petroecol</span>
                        </a>
                    </li>


                    <?php } ?>

                    <?php if ($usuario == 'fernanda@petroecol.com.br' or $usuario == 'petroecol@petroecol.com.br' or $usuario == 'reciclagem@petroecol.com.br' or $usuario == 'atendimento@petroecol.com.br') { ?>

                    <li class="header">FINANCEIRO</li>

                    <?php if($usuario == 'fernanda@petroecol.com.br' or $usuario == 'petroecol@petroecol.com.br'){  ?>
                    <li <?php if ($pagina == 4) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= site_url('F_fluxo/inicio/4') ?>">
                            <i class="material-icons">monetization_on</i>
                            <span>Fluxo de Caixa</span>
                        </a>
                    </li>
                    <?php } ?>

                    <li <?php if ($pagina == 5) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= site_url('F_contas/inicio/5') ?>">
                            <i class="material-icons">date_range</i>
                            <span>Contas a Pagar</span>
                        </a>
                    </li>

                    <li <?php if ($pagina == 6) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= site_url('F_contas_receber/inicio/6') ?>">
                            <i class="material-icons">payment</i>
                            <span>Contas a Receber</span>
                        </a>
                    </li>

                    <li <?php if ($pagina === 'documentos') {
                                    echo "class='active'";
                                } ?>>
                        <a href="<?= base_url('F_documentos/inicio/1') ?>">
                            <i class="material-icons">library_books</i>
                            <span>Cadastro Petroecol</span>
                        </a>
                    </li>

                    <?php if($usuario == 'fernanda@petroecol.com.br' or $usuario == 'petroecol@petroecol.com.br'){  ?>
                    <li <?php if ($pagina == 7) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= site_url('F_macro/inicio/7') ?>">
                            <i class="material-icons">group_work</i>
                            <span>Grupos Macro</span>
                        </a>
                    </li>
                    <?php } ?>


                    <?php } ?>


                    <?php if ($usuario == 'fernanda@petroecol.com.br' or $usuario == 'petroecol@petroecol.com.br' or $usuario == 'comercial@petroecol.com.br') { ?>
                    <li class="header">ÓLEO</li>

                    <li <?php if ($pagina == 7) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= site_url('F_estoque/inicio/7') ?>">
                            <i class="material-icons">move_to_inbox</i>
                            <span>Estoque Óleo Comum</span>
                        </a>
                    </li>

                    <li <?php if ($pagina == "8") {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_oleo_acido/inicio/8') ?>">
                            <i class="material-icons">local_drink</i>
                            <span>Óleo Ácido</span>
                        </a>
                    </li>

                    <li <?php if ($pagina == 9) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('Financeiro/afericao/9') ?>">
                            <i class="material-icons">poll</i>
                            <span>Aferição de Óleo</span>
                        </a>
                    </li>

                    <li <?php if ($pagina == 10) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_custos_coleta/geral_custos/10') ?>">
                            <i class="material-icons">timeline</i>
                            <span>Custos de Coleta</span>
                        </a>
                    </li>

                    <li <?php if ($pagina == 11) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_custos_coleta/geral_custos_visita/11') ?>">
                            <i class="material-icons">directions_run</i>
                            <span>Custos de Visita</span>
                        </a>
                    </li>


                    <?php if ($usuario == 'fernanda@petroecol.com.br' or $usuario == 'petroecol@petroecol.com.br') { ?>
                    <li <?php if ($pagina === '12') {
                                    echo "class='active'";
                                } ?>>
                        <a href="<?= base_url('F_estoque/exibir_vendas/12') ?>">
                            <i class="material-icons">monetization_on</i>
                            <span>Vendas Óleo</span>
                        </a>
                    </li>

                    <li <?php if ($pagina === 'venda_borra') {
                                    echo "class='active'";
                                } ?>>
                        <a href="<?= base_url('F_borra/exibir_vendas/venda_borra') ?>">
                            <i class="material-icons">opacity</i>
                            <span>Vendas Borra</span>
                        </a>
                    </li>
                    <?php } ?>

                    <li <?php if ($pagina == 13) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_visitas/inicio/13') ?>">
                            <i class="material-icons">streetview</i>
                            <span>Visitas</span>
                        </a>
                    </li>


                    <li <?php if ($pagina == 14) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= site_url('F_motoristas/inicio/14') ?>">
                            <i class="material-icons">assignment_ind</i>
                            <span>Motoristas</span>
                        </a>
                    </li>
                    <?php } ?>


                    <?php if ($usuario == 'fernanda@petroecol.com.br' or $usuario == 'petroecol@petroecol.com.br' or $usuario == 'comercial@petroecol.com.br') { ?>



                    <li <?php if ($pagina == '15') {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= site_url('F_relatorios/inicio/15') ?>">
                            <i class="material-icons">multiline_chart</i>
                            <span>Relatório Geral</span>
                        </a>
                    </li>


                    <?php } ?>

                    <?php if ($usuario == 'producao@petroecol.com.br') { ?>

                    <li class="header">RECICLAGEM</li>

                    <li <?php if ($pagina == 16) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_producao/inicio/16') ?>">
                            <i class="material-icons">line_style</i>
                            <span>Produção Reciclagem</span>
                        </a>
                    </li>

                    <li <?php if ($pagina == 18) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_pesagem/inicio/18') ?>">
                            <i class="material-icons">move_to_inbox</i>
                            <span>Pesagem de Recicláveis</span>
                        </a>
                    </li>
                    <?php } ?>


                    <?php if ($usuario == 'reciclagem@petroecol.com.br' or $usuario == 'fernanda@petroecol.com.br' or $usuario == 'petroecol@petroecol.com.br') { ?>

                    <li class="header">RECICLAGEM</li>

                    <li <?php if ($pagina == 16) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_producao/inicio/16') ?>">
                            <i class="material-icons">line_style</i>
                            <span>Produção Reciclagem</span>
                        </a>
                    </li>

                    <?php if ($usuario == 'fernanda@petroecol.com.br' or $usuario == 'petroecol@petroecol.com.br') { ?>
                    <li <?php if ($pagina == 17) {
                                    echo "class='active'";
                                } ?>>
                        <a href="<?= base_url('F_produtos_reciclagem/inicio/17') ?>">
                            <i class="material-icons">power_input</i>
                            <span>Produtos Reciclagem</span>
                        </a>
                    </li>
                    <?php } ?>

                    <li <?php if ($pagina == 18) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_pesagem/inicio/18') ?>">
                            <i class="material-icons">move_to_inbox</i>
                            <span>Pesagem de Recicláveis</span>
                        </a>
                    </li>

                    <?php if ($usuario == 'fernanda@petroecol.com.br' or $usuario == 'petroecol@petroecol.com.br') { ?>
                    <li <?php if ($pagina == 19) {
                                    echo "class='active'";
                                } ?>>
                        <a href="<?= base_url('F_venda_reciclagem/inicio/19') ?>">
                            <i class="material-icons">attach_money</i>
                            <span>Venda Reciclagem</span>
                        </a>
                    </li>
                    <?php } ?>

                    <li <?php if ($pagina == 20) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_visitas/inicio/20') ?>">
                            <i class="material-icons">streetview</i>
                            <span>Visitas</span>
                        </a>
                    </li>

                    <?php if ($usuario == 'reciclagem@petroecol.com.br') { ?>
                    <li <?php if ($pagina == 21) {
                                    echo "class='active'";
                                } ?>>
                        <a href="<?= site_url('F_clientes/inicio/21') ?>">
                            <i class="material-icons">account_circle</i>
                            <span>Clientes</span>
                        </a>
                    </li>
                    <?php } ?>


                    <?php if ($usuario == 'fernanda@petroecol.com.br' or $usuario == 'petroecol@petroecol.com.br' or $usuario == 'reciclagem@petroecol.com.br') { ?>

                    <li class="header">INTERNO</li>

                    <li <?php if ($pagina == 22) {
                                    echo "class='active'";
                                } ?>>
                        <a href="<?= base_url('F_funcionarios/inicio/22') ?>">
                            <i class="material-icons">person_outline</i>
                            <span>Funcionários</span>
                        </a>
                        <a href="<?= base_url('F_estoque_motoristas/inicio/22') ?>">
                            <i class="material-icons">move_to_inbox</i>
                            <span>Estoque Produtos</span>
                        </a>

                    </li>

                    <?php } ?>

                    <li class="header">MOTORISTAS</li>

                    <li <?php if ($pagina == 23) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_motoristas/inicio/23') ?>">
                            <i class="material-icons">person_pin</i>
                            <span>Documento Motoristas</span>
                        </a>
                    </li>


                    <?php } ?>

                    <?php if ($usuario == 'comercial@petroecol.com.br') { ?>

                    <li class="header">INTERNO</li>

                    <li <?php if ($pagina == 24) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_funcionarios/inicio/24') ?>">
                            <i class="material-icons">person_outline</i>
                            <span>Funcionários</span>
                        </a>
                        <a href="<?= base_url('F_estoque_motoristas/inicio/24') ?>">
                            <i class="material-icons">move_to_inbox</i>
                            <span>Estoque Produtos</span>
                        </a>

                    </li>

                    <?php } ?>


                    <?php if ($usuario == 'fernanda@petroecol.com.br' or $usuario == 'petroecol@petroecol.com.br' or $usuario == 'comercial@petroecol.com.br') { ?>
                    <li class="header">MANUTENÇÃO</li>
                    <li <?php if ($pagina == 25) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= site_url('F_veiculos/inicio/25') ?>">
                            <i class="material-icons">directions_car</i>
                            <span>Veiculos</span>
                        </a>
                    </li>
                    <?php } ?>


                    <?php if ($usuario == 'atendimento@petroecol.com.br') { ?>

                    <li class="header">MOTORISTAS</li>

                    <li <?php if ($pagina == 26) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_estoque_motoristas/inicio/26') ?>">
                            <i class="material-icons">move_to_inbox</i>
                            <span>Painel Principal</span>
                        </a>
                        <a href="<?= base_url('F_estoque_motoristas/entradas_saidas/26') ?>">
                            <i class="material-icons">transfer_within_a_station</i>
                            <span>Saídas e Voltas</span>
                        </a>
                        <!-- <a href="<?= base_url('F_recibo_ambiental/inicio/') ?>">
                                <i class="material-icons">note</i>
                                <span>Recibo Ambiental</span>
                            </a> -->
                    </li>



                    <li class="header">ESTOQUE</li>

                    <li <?php if ($pagina == 27) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_tambores/inicio/27') ?>">
                            <i class="material-icons">local_drink</i>
                            <span>Tambor</span>
                        </a>
                    </li>

                    <li <?php if ($pagina == 28) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_oleos/inicio/28') ?>">
                            <i class="material-icons">opacity</i>
                            <span>Óleo</span>
                        </a>
                    </li>

                    <li <?php if ($pagina == 29) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_detergentes/inicio/29') ?>">
                            <i class="material-icons">invert_colors</i>
                            <span>Detergente</span>
                        </a>
                    </li>

                    <!-- <li <?php if ($pagina == 30) {
                                        echo "class='active'";
                                    } ?>>
                            <a href="<?= base_url('F_detergentes/inicio/30') ?>">
                                <i class="material-icons">swap_horiz</i>
                                <span>Movimentações do Estoque</span>
                            </a>
                        </li> -->

                    <li <?php if ($pagina == 30) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_estoque_produtos/compra_inicio/30') ?>">
                            <i class="material-icons">attach_money</i>
                            <span>Compra</span>
                        </a>
                    </li>

                    <li <?php if ($pagina == 31) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_estoque_produtos/descarte_inicio/31') ?>">
                            <i class="material-icons">delete</i>
                            <span>Descarte</span>
                        </a>
                    </li>



                    <li class="header">SISTEMA</li>

                    <li <?php if ($pagina == 32) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_motoristas/inicio/32') ?>">
                            <i class="material-icons">people</i>
                            <span>Usuarios</span>
                        </a>
                    </li>


                    <?php } ?>

                    <?php if ($usuario == 'victor@petroecol.com.br') { ?>

                    <li class="header">Inicio</li>

                    <li <?php if ($pagina == 33) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_romaneios/pagina_principal/33') ?>">
                            <i class="material-icons">home</i>
                            <span>Pagina Inicial</span>
                        </a>
                    </li>

                    <li <?php if ($pagina == 34) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_visitas_reciclagem/inicio/34') ?>">
                            <i class="material-icons">chrome_reader_mode</i>
                            <span>Visitas Reciclagem</span>
                        </a>
                    </li>

                    <li <?php if ($pagina == 35) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_clientes_reciclagem/inicio/35') ?>">
                            <i class="material-icons">assignment_ind</i>
                            <span>Clientes Petroecol</span>
                        </a>
                    </li>

                    <li <?php if ($pagina == 36) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_agendamentos/inicio/36') ?>">
                            <i class="material-icons">chrome_reader_mode</i>
                            <span>Agendamentos</span>
                        </a>
                    </li>

                    <li <?php if ($pagina == 38) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_romaneios/inicio/38') ?>">
                            <i class="material-icons">assignment</i>
                            <span>Romaneios</span>
                        </a>
                    </li>

                    <li class="header">Empresa</li>


                    <li <?php if ($pagina == 37) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_grupos_coleta/inicio/37') ?>">
                            <i class="material-icons">map</i>
                            <span>Grupos de Coleta</span>
                        </a>
                    </li>

                    <li <?php if ($pagina == 38) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_romaneios/inicio/38') ?>">
                            <i class="material-icons">camera</i>
                            <span>Resíduos</span>
                        </a>
                    </li>

                    <li <?php if ($pagina == 38) {
                                echo "class='active'";
                            } ?>>
                        <a href="<?= base_url('F_romaneios/inicio/38') ?>">
                            <i class="material-icons">delete</i>
                            <span>Recipientes</span>
                        </a>
                    </li>

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