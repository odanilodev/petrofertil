
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
                	<h2>AFERIÇÃO DO ÓLEO</h2>
            	</div>
				
				<?php if($usuario == 'fernanda@petroecol.com.br' or $usuario == 'comercial@petroecol.com.br'){ ?>
				
				<div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
					<a href="<?= base_url('F_afericao/lancar_afericao') ?>"><span type="button" class="btn bg-green waves-effect">LANÇAR</span></a>
				</div>
				
				<?php } ?>
				
			</div>
			
			<?php 
			
			$paga = 0;
			$aferido = 0;
			$gasto = 0;
			
            $contador = 0;
			foreach($afericoes as $c){
				
				$paga = $paga + $c['pago'];
				$aferido = $aferido + $c['aferido'];
				$gasto = $gasto + $c['gasto'];
				$contador++;
			}
           
			
			foreach($afericoes_ajudante as $d){
				
				$paga = $paga + $d['pago'];
				$aferido = $aferido + $d['aferido'];
				$gasto = $gasto + $d['gasto'];
				$contador++;
			}
   
            $custo =  round($gasto / $aferido, 2);
            $media =  round($aferido / $contador, 2);
		
					 
			?>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">attach_money</i>
                        </div>
                        <div class="content">
                            <div class="text">PAGO</div>
                            <div class="number" ><?= $paga  ?>L</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text">AFERIDA</div>
                            <div class="number" ><?= $aferido  ?>L</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">money_off</i>
                        </div>
                        <div class="content">
                            <div class="text">GASTO</div>
                            <div class="number" >R$<?=  number_format("$gasto",2,",",".");?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">insert_chart</i>
                        </div>
                        <div class="content">
                            <div class="text">MÉDIA</div>
                            <div class="number"><?=  number_format("$media",2,",",".");?> L</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">CUSTO</div>
                            <div class="number">R$<?=  number_format("$custo",2,",",".");?></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
			
			 <div class="row">
				 <div class="container-fluid">
				<form  class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_afericao/filtra_afericao_motorista/') ?>" method="post">
										
				<div class="col-md-3">
					
					<div  class="form-group ">
                        <label>De</label>
                           <input type="date" value="" name="data_inicial" class="form-control">
                     </div>
											
                 </div> 
					
                 <div class="col-md-3">
					
					<div class="form-group  ">
                        <label>Até</label>
                           <input type="date" value="" name="data_final" class="form-control">
                     </div>
											
                 </div>                        
		
						<input type="hidden" value="<?= $motorista ?>" name="nome_motorista" class="form-control">	
						<button type="submit" style="margin-top: 27px" class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 ">Filtrar</button>
									
						<a href="<?= site_url('financeiro/afericao') ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>				
					
				</div>	
					 
				 </form>
					
			</div>

         <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="margin-top: 15px" class="card">
                        <div class="header">
                            <h2>
                                Aferição
                            </h2>
                           
                        </div>
						
                        <div class="body">
                            <div class="table-responsive">
								
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
									
                                    <thead>
                                        <tr>
											<th>#</th>
											<th>Data</th>
                                            <th>Veículo</th>
                                            <th>Coletor</th>
											<th>Cidade</th>
                                            <th>Qts Paga</th>
                                            <th>Qts aferida</th>
                                            <th>Custo</th>
                                            <th>Gasto</th>
											
											<?php if($usuario == 'fernanda@petroecol.com.br'){ ?>
											<th>Editar</th>
											<th>Excluir</th>
											<?php } ?>
											
											
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>#</th>
											<th>Data</th>
                                           	<th>Veículo</th>
                                            <th>Coletor</th>
											<th>Cidade</th>
                                            <th>Qts Paga</th>
                                            <th>Qts aferida</th>
                                            <th>Custo</th>
                                            <th>Gasto</th>
											
											
											<?php if($usuario == 'fernanda@petroecol.com.br'){ ?>
											<th>Editar</th>
											<th>Excluir</th>
											<?php } ?>
											
                                        </tr>
                                    </tfoot>
                                    <tbody>	
								
							<?php $contador = 1; foreach($afericoes as $a){   ?>
										
                                        <tr>
											<td><?= $contador ?></td>
											<td><?= date("d/m/Y", strtotime($a['data_afericao']));  ?></td>
                                            <td><?= $a['veiculo'] ?></td>
                                            <td><?= $a['motorista'] ?></td>
											<td><?= $a['cidade'] ?></td>
                                            <td style="color: <?= $a['pago'] > $a['aferido'] ? 'red' : 'green' ?>"><?= $a['pago'] ?>L</td>
                                            <td><?= $a['aferido'] ?>L</td>
                                            <td>R$<?= $a['custo'] ?></td>
                                            <td><a href="<?= base_url('F_afericao/visualizar_custos/').$a['id']; ?>">R$<?= $a['gasto'] ?></a></td>
											
											<?php if($usuario == 'fernanda@petroecol.com.br' or $usuario == 'comercial@petroecol.com.br'){ ?>
											
											
											<td align="center"><a href="<?= site_url('F_afericao/lancar_afericao/').$a['id'] ?>"><i class="material-icons"><i class="material-icons">mode_edit</i></i></a></td>
                                            <td align="center"><a data-toggle="modal"  data-target="#exampleModal2" data-pegaid="<?= $a['id'] ?>"><i class="material-icons">delete</i></a></td>
											
											<?php } ?>
											
											
                                        </tr>
										
										
									
                            <?php   $contador++;   }     ?>     
                                       
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			
			
			<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="margin-top: 15px" class="card">
                        <div class="header">
                            <h2>
                                Aferições como Ajudante
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
						
                        <div class="body">
                            <div class="table-responsive">
								
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
									
                                    <thead>
                                        <tr>
											<th>#</th>
											<th>Data</th>
                                            <th>Veículo</th>
											<th>Ajudante</th>
                                            <th>Coletor</th>
                                            <th>Qts Paga</th>
                                            <th>Qts aferida</th>
                                            <th>Gasto</th>
                                            <th>Custo</th>
										
											<?php if($usuario == 'fernanda@petroecol.com.br'){ ?>
											<th>Editar</th>
											<th>Excluir</th>
											<?php } ?>
											
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>#</th>
											<th>Data</th>
                                           	<th>Veículo</th>
											<th>Ajudante</th>
                                            <th>Coletor</th>
                                            <th>Qts Paga</th>
                                            <th>Qts aferida</th>
                                            <th>Gasto</th>
                                            <th>Custo</th>
											
											<?php if($usuario == 'fernanda@petroecol.com.br' or $usuario == 'comercial@petroecol.com.br'){ ?>
											<th>Editar</th>
											<th>Excluir</th>
											<?php } ?>
											
                                        </tr>
                                    </tfoot>
                                    <tbody>
										
										
								
							<?php $contador = 1; foreach($afericoes_ajudante as $b){   ?>
										
                                        <tr>
											<td><?= $contador; ?></td>
											<td><?= date("d/m/Y", strtotime($b['data_afericao']));  ?></td>
                                            <td><?= $b['veiculo'] ?></td>
											<td><?= $b['ajudante'] ?></td>
                                            <td><?= $b['motorista'] ?></td>
                                            <td style="color: <?= $b['pago'] > $b['aferido'] ? 'red' : 'green' ?>"><?= $b['pago'] ?>L</td>
                                            <td><?= $b['aferido'] ?>L</td>
                                            <td>R$<?= $b['gasto'] ?></td>
                                            <td>R$<?= $b['custo'] ?></td>
											
											<?php if($usuario == 'fernanda@petroecol.com.br' or $usuario == 'comercial@petroecol.com.br'){ ?>
											
											<td align="center"><a href="<?= site_url('F_afericao/lancar_afericao/').$b['id'] ?>"><i class="material-icons"><i class="material-icons">mode_edit</i></i></a></td>
                                            <td align="center"><a data-toggle="modal"  data-target="#exampleModal2" data-pegaid="<?= $b['id'] ?>"><i class="material-icons">delete</i></a></td>
											
											<?php } ?>
											
                                        </tr>
										
										
									
                            <?php  $contador++;   }     ?>     
                                       
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			
	<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				 <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Deletar Aferição?</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
							Tem certeza que deseja excluir essa aferição permanentemente?
						</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
								<a class="link_id" href="#"><button type="button" class="btn btn-danger"> Deletar</button></a>
							</div>
					</div>
				</div>
			</div>

         
        </div>
    </section>

