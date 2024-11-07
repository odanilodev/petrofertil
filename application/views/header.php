<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Petroecol - Soluções em Coleta de Óleo e Resíduos</title>
    <meta name="description"
        content="Petroecol - Especializada em coleta de óleo e resíduos para restaurantes e empresas, oferecendo soluções sustentáveis e eficientes.">
    <meta name="keywords"
        content="Petroecol, coleta de óleo, coleta de resíduos, sustentabilidade, serviços ambientais, reciclagem de óleo, soluções ecológicas, coleta empresarial">

    <!-- Favicons -->
    <link href="<?= base_url("assets/site/img/fav_petro.png") ?>" rel="icon" type="image/png">
    <link href="<?= base_url("assets/site/img/fav_petro.png") ?>" rel="apple-touch-icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url("assets/site/vendor/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet">
    <link href="<?= base_url("assets/site/vendor/bootstrap-icons/bootstrap-icons.css") ?>" rel="stylesheet">
    <link href="<?= base_url("assets/site/vendor/aos/aos.css") ?>" rel="stylesheet">
    <link href="<?= base_url("assets/site/vendor/fontawesome-free/css/all.min.css") ?>" rel="stylesheet">
    <link href="<?= base_url("assets/site/vendor/glightbox/css/glightbox.min.css") ?>" rel="stylesheet">
    <link href="<?= base_url("assets/site/vendor/swiper/swiper-bundle.min.css") ?>" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?= base_url("assets/site/css/main.css") ?>" rel="stylesheet">
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto"
                title="Petroecol - Soluções Sustentáveis">

                <img src="<?= base_url("assets/site/img/logo-branca.png") ?>"
                    alt="Logotipo da Petroecol - Coleta de Óleo e Resíduos">
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="<?= base_url('site') ?>" class="active">Início</a></li>
                    <li><a href="#about">Sobre Nós</a></li>
                    <li><a href="#services">Soluções</a></li>
                    <li><a href="<?= base_url('site/trabalhe') ?>">Trabalhe Conosco</a></li>
                    <li><a href="#contact">Contato</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list" aria-label="Menu Mobile"></i>
            </nav>

            <a class="btn-getstarted" href="<?= base_url('site/solicitacao') ?>">Solicitar Coleta</a>
        </div>
    </header>