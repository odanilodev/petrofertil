

    <section class="content">
        <div class="container-fluid">
			<div class="row">
            	<div class="block-header col-md-3">
                	<h2>CLIENTES PETROECOL</h2>
            	</div>
				

<?php  
	
	
	$status = $this->session->userdata('usuario');
	
	
	if($status != "logado"){
		
		redirect('financeiro/verifica_login');
	}
	
	
	$usuario = $this->session->userdata('login');
	
	$nome_usuario = $this->session->userdata('nome_usuario');
	

	
	?>
				
				<?php if($usuario == 'fernanda@petroecol.com.br'){ ?>
				<div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
					<a href="<?= base_url('F_clientes/formulario') ?>"><span type="button" class="btn bg-green waves-effect">CADASTRAR CLIENTE</span></a>
				</div>
				<?php } ?>
			</div>

      
			
		<?php foreach($clientes as $c){ ?>
			
			       <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div style="min-height: 85px; max-height: 85px;" class="header">
                            <h2>
                                <?= $c['nome'] ?> <small><?= $c['cnpj'] ?></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
								<?php if($usuario == 'fernanda@petroecol.com.br'){ ?>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
									
                                    <ul class="dropdown-menu pull-right">
                                       
                                        <li><a href="<?= base_url('F_clientes/formulario/').$c['id'] ?>">Editar</a></li>
                                        <li><a href="<?= base_url('F_clientes/deleta_cliente/').$c['id'] ?>">Excluir</a></li>
                                    </ul>
									<?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div style="min-height: 260px;" class="body">
							
							<p><b>E-mail: </b><?= $c['email'] ?></p>
							<p><b>Cidade: </b><?= $c['cidade'] ?></p>
							<p><b>Bairro: </b><?= $c['bairro'] ?></p>
							<p><b>Endereço: </b><?= $c['endereco'] ?></p>
                        	<p><b>Contato: </b><?= $c['contato'] ?></p>
							<p><b>Inscrição Estadual: </b><?= $c['inscricao'] ?></p>
							
							<p></p>
                        </div>
                    </div>
                </div>

			<?php } ?>
         
        </div>
    </section>


