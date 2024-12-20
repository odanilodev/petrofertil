﻿<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	
    <!-- Bootstrap Core Css -->
    <link href="<?= base_url('assets/financeiro/plugins/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url('assets/financeiro/plugins/node-waves/waves.css') ?>
	" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url('assets/financeiro/plugins/animate-css/animate.css') ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url('assets/financeiro/css/style.css') ?>" rel="stylesheet">
</head>

<body class="login-page">
    <div style="padding-top: 50px" class="fadeInDown login-box">
        <div align="center" class="logo">
           <img class="img-responsive" src="<?= base_url('assets/img/logo_branca.png') ?>">
        </div>
        <div class="card">
            <div class="body">
                <form action="<?= site_url('financeiro/verifica_login'); ?>" method="POST">
                    <div class="msg">Digite seu login e senha</div>
					
					<?php if(isset($erro)){ ?>
					 <div class="alert alert-warning">
                            Login ou senha incorretos
                     </div>
					<?php } ?>
                    <div class="input-group">
						
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="login" placeholder="Login" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                        </div>
                    </div>
                    <div class="row">
                       
                        <div class="col-md-12">
                            <button class="btn btn-block bg-green waves-effect" type="submit">ENTRAR</button>
                        </div>
                    </div>
                   
					
                </form>
            </div>
        </div>
    </div>
	

    <!-- Jquery Core Js -->
    <script src="<?= base_url('assets/financeiro/plugins/jquery/jquery.min.js') ?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url('assets/financeiro/plugins/bootstrap/js/bootstrap.js') ?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url('assets/financeiro/plugins/node-waves/waves.js') ?>"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= base_url('assets/financeiro/plugins/jquery-validation/jquery.validate.js') ?>"></script>

    <!-- Custom Js -->
    <script src="<?= base_url('assets/financeiro/js/admin.js') ?>"></script>
    <script src="<?= base_url('assets/financeiro/js/pages/examples/sign-in.js') ?>"></script>
</body>

</html>