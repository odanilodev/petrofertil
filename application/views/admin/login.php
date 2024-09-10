<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="<?= base_url('assets/css/style_admin.css') ?>" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div style="padding: 50px" class="fadeIn first">
      <img src="<?= base_url('assets/img/logo_login.jpg') ?>" id="icon" alt="User Icon" />
    </div>
	  

	<?php if(isset($erro)){ ?>	  
	  
	<div class="alert alert-danger" role="alert">
	  Usuário ou senha incorretos 
	</div>
	  
	 <?php } ?> 
	  
    <!-- Login Form -->
    <form action="<?= site_url('admin/verifica_login');?>" method="post" >
      <input type="text" required class="fadeIn second" name="login" placeholder="Login">
      <input type="password" required  class="fadeIn third" name="senha" placeholder="Senha">
      <input type="submit" class="fadeIn fourth mt-4" value="Entrar">
    </form>

    
  </div>
</div>