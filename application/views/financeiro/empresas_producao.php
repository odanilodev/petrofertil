
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
			<div class="row">
            	<div class="block-header col-md-3">
                	<h2>EMPRESAS COM PRODUÇÃO </h2>
            	</div>
			
				
				<?php if($usuario == 'reciclagem@petroecol.com.br' ){ ?>
				<div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
					<a href="<?= base_url('F_producao/formulario_cliente_producao') ?>"><span type="button" class="btn bg-green waves-effect">CADASTRAR CLIENTE</span></a>
				</div>
				<?php } ?>
			</div>


			<?php if($usuario == 'producao@petroecol.com.br'){ //Exibicao da Petroecol fixo para o patio ?> 

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div style="min-height: 70px; max-height: 70px;" class="header">
                            <h2>
								PETROECOL
                            </h2>
							
                            <ul class="header-dropdown m-r--5">
							<a href="<?= site_url('F_producao/ver_producao/11') ?>"><i class="material-icons">remove_red_eye</i></a>
                            </ul>
                        </div>
                        <div style="min-height: 160px;" class="body">
							
							<p><b>Cidade: Bauru</p>
                        	<p><b>Telefone de Contato: 14 3208-7835</p>

							<p></p>
                        </div>
                    </div>
                </div>


				<div class="modal fade" id="exampleModal16" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				 <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Deseja deletar essa empresa/cliente?</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
							Se escolher deletar, todos os registros podem ser perdidos, consulte o administrador do sistema.
						</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
								<a class="deleta" href=""><button type="button" class="btn btn-danger"> Deletar</button></a>
							</div>
					</div>
				</div>
			</div>


			<?php } else{ ?>


			<?php foreach($empresas as $e){ ?>

			       <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div style="min-height: 70px; max-height: 70px;" class="header">
                            <h2>
                                <?= $e['nome'] ?> 
                            </h2>
							
                            <ul class="header-dropdown m-r--5">
							<a href="<?= site_url('F_producao/ver_producao/').$e['id']; ?>"><i class="material-icons">remove_red_eye</i></a>
								<?php if($usuario == 'reciclagem@petroecol.com.br'){ ?>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
									
                                    <ul class="dropdown-menu pull-right">
                                       
                                        <li><a href="<?= base_url('F_producao/formulario_cliente_producao/'.$e['id']) ?>">Editar</a></li>
                                        <li><a class="deleta" data-toggle="modal"  data-target="#exampleModal16" data-pegaid="<?= $e['id'] ?>">Excluir</a></li>
                                    </ul>
									<?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div style="min-height: 160px;" class="body">
							
							<p><b>E-mail: </b><?= $e['email'] ?></p>
							<p><b>Cidade: </b><?= $e['cidade'] ?></p>
                        	<p><b>Telefone de Contato: </b><?= $e['telefone'] ?></p>
							
							<p></p>
                        </div>
                    </div>
                </div>


				<div class="modal fade" id="exampleModal16" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				 <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Deseja deletar essa empresa/cliente?</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
							Se escolher deletar, todos os registros podem ser perdidos, consulte o administrador do sistema.
						</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
								<a class="deleta" href=""><button type="button" class="btn btn-danger"> Deletar</button></a>
							</div>
					</div>
				</div>
			</div>


			<?php } } ?>
         
			
         
        </div>



        </div>
    </section>


