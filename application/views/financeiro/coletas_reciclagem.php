
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
            	<div class="block-header col-md-5">
                	<h2><C><?= $cliente['nome'] ?></C></h2>
            	</div>
				
				<?php if($usuario == 'fernanda@petroecol.com.br' or 'reciclagem@petroecol.com.br'){ ?>
				<div class="col-md-7" style=" margin-top: 12px" align="right">
					
					<a href="<?= base_url('F_agendamentos/formulario_agendamento/').$cliente['id'] ?>"><span type="button" class="btn bg-primary waves-effect">AGENDAMENTO</span></a>
					<a href="<?= base_url('F_clientes_reciclagem/cadastrar_cliente') ?>"><span type="button" class="btn bg-green waves-effect">NOVA COLETA</span></a>
				</div>
				 <?php  } ?>
				
			</div></br>

         
			<?php /*?>
			 <div class="row">
				 <div class="container-fluid">
					 <?php if($pagina == 'erro'){ ?>
					 <div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                           Não foram encontradas <b>aferições</b> nas datas selecionadas, ou os campos nao foram preenchidos corretamente.
                     </div>
					<?php } ?>
				
					
			</div><?php */?>
			
			    <!-- Widgets -->
            <div class="row clearfix">
               
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue-grey hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">monetization_on</i>
                        </div>
                        <div class="content">
                            <div class="text">Numero total de coletas</div>
                            <div class="number">12</div>
                        </div>
                    </div>
                </div>
				
				  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-brown hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">monetization_on</i>
                        </div>
                        <div class="content">
                            <div class="text">Proxima coleta</div>
                            <div class="number"><?= date("d/m/Y", strtotime($cliente['data_atendimento'])); ?></div>
                        </div>
                    </div>
                </div>
				
				
				
			
            </div>

			
				 <div class="row">
				 <div class="container-fluid">
					 <?php /*?><?php if($pagina == 'erro'){ ?>
					 <div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                           Não foram encontrados <b>registros</b> nas datas selecionadas, ou os campos nao foram preenchidos corretamente.
                     </div>
					<?php } ?><?php */?>
				<form  class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_pesagem/filtra_pesagem/') ?>" method="post">
										
				<div class="col-md-3">
					
					<div  class="form-group ">
                        <label>De</label>
                           <input required type="date" value="" name="data_inicial" class="form-control">
                     </div>
											
                 </div> 
					
                 <div class="col-md-3">
					
					<div class="form-group  ">
                        <label>Até</label>
                           <input required type="date" value="" name="data_final" class="form-control">
                     </div>
											
                 </div>                        
										
				
					
						<button type="submit" style="margin-top: 27px" class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 ">Filtrar</button>
									
						<a href="<?= site_url('financeiro/afericao') ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>				
									
				
				 <?php /*?><?php if($pagina == 'erro'){ ?>
					 <div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                           Não foram encontrados <b>registros</b> nas datas selecionadas, ou os campos nao foram preenchidos corretamente.
                     </div>
					<?php } ?><?php */?>
					
				</div>	
					 
				 </form>
					
			</div>
		
		
         <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="margin-top: 15px" class="card">
                        <div class="header">
                            <h2>
                              	Historico de coletas
                            </h2>
                            
                        </div>
			            <div class="body">
                            <div class="table-responsive">
								
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
									
                                    <thead>
                                        <tr>
											
											<th style="text-align: center">Coletado</th>
                                            <th style="text-align: center">Observação</th>
                                            <th style="text-align: center">Tipo</th>
											<th style="text-align: center">Tipo pagamento</th>
											<th style="text-align: center">Forma pagamento</th>
											<th style="text-align: center">Valor quantidade</th>
                                          
                                            <th style="text-align: center">Ver Mais</th>

											<?php if($usuario == 'fernanda@petroecol.com.br' or 'reciclagem@petroecol.com.br'){ ?>
										
											<th style="text-align: center">Excluir</th>
											<?php } ?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											
											<th style="text-align: center">Coletado</th>
                                            <th style="text-align: center">Observação</th>
                                            <th style="text-align: center">Tipo</th>
											<th style="text-align: center">Tipo pagamento</th>
											<th style="text-align: center">Forma pagamento</th>
											<th style="text-align: center">Valor quantidade</th>
                                          
                                            <th style="text-align: center">Ver Mais</th>
                                           
											<?php if($usuario == 'fernanda@petroecol.com.br' or 'reciclagem@petroecol.com.br'){ ?>
											
											<th style="text-align: center">Excluir</th>
											<?php } ?>
                                        </tr>
                                    </tfoot>
                                    <tbody>
										
										
								
						
							<?php  foreach($coletas as $c){  ?>
                                        <tr align="center">
											<td><?= $c['coletado'] ?></td>
											<td><?= $c['observacao'] ?></td>
                                            <td><?= $c['tipo'] ?></td>
                                            <td><?= $c['tipo_pagamento'] ?></td>
											<td><?= $c['forma_pagamento'] ?></td>
											<td><?= $c['valor_quantidade'] ?></td>
                                            
											
											<?php if($usuario == 'fernanda@petroecol.com.br' or 'reciclagem@petroecol.com.br'){ ?>
											<td align="center"><a href="<?= base_url('F_clientes_reciclagem/ver_cliente/') ?>"><i class="material-icons"><i class="material-icons">remove_red_eye</i></i></a></td>
                                            <td align="center"><a data-toggle="modal"  data-target="#exampleModal11" data-pegaid=""><i class="material-icons">delete</i></a></td>
											<?php } ?>
											
											
                                        </tr>
										
										
				      <?php  }?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
					<hr>
                </div>
            </div>
		
		<div class="row">
			<div class="container">
				<div class="col-md-4">
					<h3 style="color: #474646">Emissões de certificado<hr ></h3>
				</div>
				<div class="col-md-8">
						<form  class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_pesagem/filtra_pesagem/') ?>" method="post">

					<div class="col-md-4">

						<div  class="form-group ">
							<label>De</label>
							   <input required type="date" value="" name="data_inicial" class="form-control">
						 </div>

					 </div> 

					 <div class="col-md-4">

						<div class="form-group  ">
							<label>Até</label>
							   <input required type="date" value="" name="data_final" class="form-control">
						 </div>

					 </div>                        

							
							<a href="<?= site_url('F_coletas_reciclagem/certificado') ?>"><span style="margin-top: 27px" class="btn btn-success col-md-4 col-sm-6 col-xs-6">Novo</span></a>				


					 <?php /*?><?php if($pagina == 'erro'){ ?>
						 <div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
							   Não foram encontrados <b>registros</b> nas datas selecionadas, ou os campos nao foram preenchidos corretamente.
						 </div>
						<?php } ?><?php */?>

					</div>	

					 </form>
				
				<div style="padding-top: 100px;" class="row">
				<div  class="col-md-4">
						<div class="card">
							<div style="" class="header">
								<h2>
								<span style="color: #525252; font-size: 16px">Certificado<span>
								</h2>
								
							</div>
							<div  class="body">

								<p style="font-size: 18px"><b>855/2021</b></p>
								<p><b>Data da Emissão: 14/09/2021</b></p>

							</div>
						</div>
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

