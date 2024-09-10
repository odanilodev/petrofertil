<?php  
	
	$status = $this->session->userdata('usuario');
	
	
	if($status != "logado"){
		
		redirect('financeiro/verifica_login');
	}
	
	$usuario = $this->session->userdata('login');
	
	$nome_usuario = $this->session->userdata('nome_usuario');
	
	?>
 
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>NOSSOS MOTORISTAS</h2>
            </div>
            <!-- Basic Example -->
            <div class="row clearfix">
              
				<?php foreach($motoristas as $m){ ?>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header ">
							<div class="row">
								 <div class="col-md-3">
									<img class="img-thumbnail img-fluid" style=" height: 60px" src="<?= base_url('uploads/foto_motoristas/').$m['foto_perfil'] ?>" />
								</div>
								
								<div class="col-md-9">
									<h3 style="margin-top: 20px; font-size: 18px"><?= $m['nome'] ?></h3>
								</div>

                                <?php if($usuario == 'atendimento@petroecol.com.br') { ?>

                                    <div class="col-md-9">
								    	<p style="font-size: 14px">Usuario: <?= $m['usuario'] ?></p>
                                        <p style="font-size: 14px; margin-top: -10px;">Senha: <?= $m['senha'] ?></p>
								    </div>

                                <?php } ?>

							</div>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <?php if($usuario == 'fernanda@petroecol.com.br' or $usuario == 'comercial@petroecol.com.br' or $usuario == 'petroecol@petroecol.com.br') { ?>
                                        <li><a href="<?= site_url("f_motoristas/afericao_motorista/").$m['id'] ?>">Aferições</a></li>
                                        <li><a href="<?= site_url("f_visitas/visita_motorista/").$m['id'] ?>">Visitas</a></li>
                                        <li><a href="<?= site_url("F_motoristas/ver_documentos/").$m['id'] ?>">Documentos</a></li>
                                       <?php } ?>
                                       <?php if($usuario == 'atendimento@petroecol.com.br') { ?>
                                        <li><a href="<?= site_url("f_motoristas/formulario_usuario/").$m['id'] ?>">Sistema</a></li>
                                        <li><a href="<?= site_url("F_motoristas/ver_documentos/").$m['id'] ?>">Documentos</a></li>
                                       <?php } ?>
                                       <?php if($usuario == 'reciclagem@petroecol.com.br') { ?>
                                        <li><a href="<?= site_url("F_motoristas/ver_documentos/").$m['id'] ?>">Documentos</a></li>
                                       <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
				<?php } ?>
             
            </div>
            <!-- #END# Basic Example -->
            <!-- Colored Card - With Loading -->
	</section>