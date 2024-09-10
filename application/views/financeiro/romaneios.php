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
            	<div class="block-header col-md-4">
                	<h2>ROMANEIOS PETROECOL</h2>
            	</div>
				
				<?php if($usuario == 'reciclagem@petroecol.com.br'){ ?>
				<div class="col-md-8" style="margin-bottom: 12px; margin-top: -8px" align="right">
					<a href="<?= base_url('F_pesagem/lancar_pesagem') ?>"><span type="button" class="btn bg-pink waves-effect">LANÇAR PESAGEM</span></a>
				</div>
				 <?php  } ?>
				
			</div></br>

         
			
			 <div class="row">
				 <div class="container-fluid">
					 <?php if($pagina == 'erro'){ ?>
					 <div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                           Não foram encontrados <b>registros</b> nas datas selecionadas, ou os campos nao foram preenchidos corretamente.
                     </div>
					<?php } ?>
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
									
				
				<?php if($pagina == 'deletado'){ ?>
					
					<div class="alert bg-teal alert-dismissible col-xs-12" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Aferição deletada com sucesso
                            </div>
				<?php } ?>
					
				</div>	
					 
				 </form>
					
			</div>

			
			
         <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="margin-top: 15px" class="card">
                        <div class="header">
                            <h2>Romaneios</h2>
                          
                        </div>
			            <div class="body">
                            <div class="table-responsive">
								
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
									
                                    <thead>
                                        <tr>
											<th style="text-align: center">#</th>
											<th style="text-align: center">ID</th>
                                            <th style="text-align: center">Data</th>
                                            
                        					<th style="text-align: center">Ver Romaneio</th>
											<th style="text-align: center">Finalizar</th>
											<th style="text-align: center">Excluir</th
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											
											<th style="text-align: center">#</th>
											<th style="text-align: center">ID</th>
                                            <th style="text-align: center">Data</th>
                                            
                        					<th style="text-align: center">Ver Romaneio</th>
											<th style="text-align: center">Finalizar</th>
											<th style="text-align: center">Excluir</th
                                        </tr>
                                    </tfoot>
                                    <tbody align="center">
										
										
								<?php foreach($romaneios as $r){ ?>
                                        <tr>
											
										
											<?php $conteudo = json_decode($r['conteudo'], true); ?>
											<td><?= $r['id'] ?></td>
											<td><?= $r['id'] ?></td>
                                            <td><?= date("d/m/Y", strtotime($conteudo['data_romaneio']));  ?></td>
											
											
											<td align="center"><a href="<?= base_url('F_romaneios/rever_romaneio/').$r['id'] ?>"><i class="material-icons"><i class="material-icons">developer_board</i></i></a></td>
											<td align="center"><a href="<?= base_url('F_romaneios/finalizar_romaneio/').$r['id']  ?>"><i class="material-icons"><i class="material-icons">playlist_add_check</i></i></a></td>
                                            <td align="center"><a href=""><i class="material-icons">delete</i></a></td>
											
											
											
                                        </tr>
                                     
                                   <?php } ?>     
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			
	
        </div>
    </section>

