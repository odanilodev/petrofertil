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
                	<h2>CONTAS A RECEBER</h2>
            	</div>
				
				<div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
					<a style="margin-left: 5px" href="<?= base_url('F_contas_receber/cadastrar_conta') ?>"><span type="button" class="btn btn-info  waves-effect">ENTRADA</span></a>
	
				</div>
				
			</div>

			<?php
			
			$total_caixa = $caixa['caixa'];

			$total_caixa_reciclagem = $caixa_reciclagem['caixa'];
			
			?>
			
            <!-- Widgets -->
            <div class="row clearfix">
               
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue-grey hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">monetization_on</i>
                        </div>
                        <div class="content">
                            <div class="text">Caixa Óleo</div>
                            <div class="number">R$<?=  number_format("$total_caixa",2,",",".");?></div>
                        </div>
                    </div>
                </div>
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue-grey hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">monetization_on</i>
                        </div>
                        <div class="content">
                            <div class="text">Caixa Reciclagem</div>
                            <div class="number">R$<?=  number_format("$total_caixa_reciclagem",2,",",".");?></div>
                        </div>
                    </div>
                </div>
				
				  <div class="col-md-offset-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">monetization_on</i>
                        </div>
                        <div class="content">
                            <div class="text">Contas a Receber</div>
                            <div class="number">R$<?=  number_format("$receber_total",2,",",".");?></div>
                        </div>
                    </div>
                </div>
				
				
         <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="margin-top: 15px" class="card">
                        <div class="header">
                            <h2>
                                Contas a Receber
                            </h2>
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
											<th>#</th>
                                         	<th>Vencimento</th>
											<th>Valor</th>
                                            <th>Empresa</th>
                                            <th>Nome</th>
											<th>Status conta</th>
											<th>Valor recebido</th>
											<th>Observacao</th>
											
											<th>Visualizar</th>
											<th>Editar</th>
											<th>Deletar</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>#</th>
                                         	<th>Vencimento</th>
											<th>Valor</th>
                                            <th>Empresa</th>
                                            <th>Nome</th>
											<th>Status conta</th>
											<th>Valor recebido</th>
											<th>Observacao</th>
											
											<th>Visualizar</th>
											<th>Editar</th>
											<th>Deletar</th>
											 
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                  		
								<?php $contador =1;  foreach($contas as $c){ ?>
										
										<tr>
											<td><?= $contador ?></td>
											<td><?= date("d/m/Y", strtotime($c['vencimento'])); ?></td>
											<td>R$<?= $c['valor'] ?></td>
                                            <td><?= $c['empresa'] ?></td>
                                            <td><?= $c['nome'] ?></td>
											
											<?php  if($c['status'] == 0){  ?> 
											
											<td>
											<a data-toggle="modal" data-cli-id="<?=$c['id']?>" data-cli-dat="<?=$c['vencimento']?>" data-cli-nom="<?=$c['nome']?>" data-target="#exampleModal12" style=" color: <?= $c['status'] == 1 ? 'green' : 'red' ?>"><?= $c['status'] == 0 ? "A receber" : "Pago" ?></a></td>
											
											<?php }else{ ?>
											
											
											<td><a href="<?= base_url('F_contas_receber/deleta_status/').$c['id'] ?>" style=" color: <?= $c['status'] == 1 ? 'green' : 'red' ?>"><?= $c['status'] == 0 ? "A receber" : "Pago" ?></a></td>
											
											<?php } ?>

											<td><?= $c['valor_recebido'] ?></td>

											
											<td><?= $c['observacao'] ?></td>
											
											<td align="center"><a href="<?= base_url('F_contas_receber/visualizar_conta/') . $c['id'] ?>"><i class="material-icons">visibility</i></a></td>
											<td align="center"><a href="<?= site_url('F_contas_receber/editar_conta_receber/') . $c['id'] ?>"><i class="material-icons"><i class="material-icons">mode_edit</i></i></a></td>
                                            <td align="center"><a data-toggle="modal"  data-target="#exampleModal10" data-pegaid="<?= $c['id'] ?>"><i class="material-icons">delete</i></a></td>
											
                                        </tr>
										
                                <?php $contador++; }  ?>
																			
			<div class="modal fade" id="exampleModal12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						 <div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Digite a data em que foi recebido e o valor pago</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<div class="modal-body"> 
									<form id="modal-danilo" action="#" method="post">
									<div class="row">
										<div class=" col-md-12">                                
											<div class="form-line col-md-6">
												<input type="date" name='data_fluxo' value="" class="form-control tt2">
											</div>
											<div class="form-line col-md-6">
												<input placeholder="Digite o valor pago" type="text" name='valor_recebido' value="" class="form-control tt2 valor valor_pago">
											</div>
										</div>
										
									</div>
									

								</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
										<button type="submit" class="btn btn-primary  waves-effect">Enviar</button>
									</form>
									</div>
							</div>
						</div>
					</div>
			
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
			
			
			<div class="modal fade" id="exampleModal10" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				 <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Deseja excluir essa conta?</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
							Tem certeza que deseja excluir essa conta de recebimento?
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

