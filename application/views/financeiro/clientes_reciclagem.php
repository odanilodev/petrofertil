
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
                	<h2><C>CLIENTES RECICLAGEM</C></h2>
            	</div>
				
				<?php if($usuario == 'fernanda@petroecol.com.br' or 'reciclagem@petroecol.com.br'){ ?>
				<div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
					
					<a href="<?= base_url('F_clientes_reciclagem/cadastrar_cliente') ?>"><span type="button" class="btn bg-green waves-effect">NOVO CLIENTE</span></a>
				</div>
				 <?php  } ?>
				
			</div>

         
			
			 <div class="row">
				 <div class="container-fluid">
					 <?php if($pagina == 'erro'){ ?>
					 <div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                           Não foram encontradas <b>aferições</b> nas datas selecionadas, ou os campos nao foram preenchidos corretamente.
                     </div>
					<?php } ?>
				
					
			</div>

			
			
         <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="margin-top: 15px" class="card">
                        <div class="header">
                            <h2>
                              	Tabela de Clientes
                            </h2>
                            
                        </div>
			            <div class="body">
                            <div class="table-responsive">
								
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
									
                                    <thead>
                                        <tr>
											
											<th style="text-align: center">Nome</th>
                                            <th style="text-align: center">CNPJ</th>
                                            <th style="text-align: center">Cidade</th>
											<th style="text-align: center">Contato</th>
											<th style="text-align: center">Atendimentos</th>
                                          
                                            <th style="text-align: center">Ver Mais</th>

											<?php if($usuario == 'fernanda@petroecol.com.br' or 'reciclagem@petroecol.com.br'){ ?>
										
											<th style="text-align: center">Excluir</th>
											<?php } ?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											
											<th style="text-align: center">Nome</th>
                                            <th style="text-align: center">	CNPJ</th>
                                            <th style="text-align: center"> Cidade</th>
											<th style="text-align: center">Contato</th>
	                                        <th style="text-align: center">Atendimentos</th>
                                          
                                            <th style="text-align: center">Ver Mais</th>
                                           
											<?php if($usuario == 'fernanda@petroecol.com.br' or 'reciclagem@petroecol.com.br'){ ?>
											
											<th style="text-align: center">Excluir</th>
											<?php } ?>
                                        </tr>
                                    </tfoot>
                                    <tbody>
										
										
								
						<?php foreach($clientes as $c){ ?>
										
                                        <tr align="center">
											<td><?= $c['nome'] ?></td>
											<td><?= $c['cnpj'] ?></td>
                                            <td><?= $c['cidade'] ?></td>
                                            <td><?= $c['contato'] ?></td>
                                            <td align="center"><a href="<?= base_url('F_coletas_reciclagem/inicio/').$c['id'] ?>"><i class="material-icons"><i class="material-icons">timelapse</i></i></a></td>
											
											<?php if($usuario == 'fernanda@petroecol.com.br' or 'reciclagem@petroecol.com.br'){ ?>
											<td align="center"><a href="<?= base_url('F_clientes_reciclagem/ver_cliente/').$c['id'] ?>"><i class="material-icons"><i class="material-icons">remove_red_eye</i></i></a></td>
                                            <td align="center"><a data-toggle="modal"  data-target="#exampleModal11" data-pegaid="<?= $c['id'] ?>"><i class="material-icons">delete</i></a></td>
											<?php } ?>
											
											
                                        </tr>
										
										
						
                           <?php } ?>             
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			
	<div class="modal fade" id="exampleModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				 <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Deletar Cliente?</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
							Tem certeza que deseja deletar esse cliente permanentemente?
						</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
								<a class="deleta" href="#"><button type="button" class="btn btn-danger"> Deletar</button></a>
								
							</div>
					</div>
				</div>
			</div>
			
		

         
        </div>
    </section>

