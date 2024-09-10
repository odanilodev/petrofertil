<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="block-header col-md-3">
				<h2>ENTRADAS E SAIDAS DO ESTOQUE</h2>
			</div>
		</div>
		<!-- Widgets -->
		
		<?php if ($alerta == 'saida_deletada') { ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<b>Saída</b> deletada com sucesso!
			</div>
		<? } ?>

		<?php if ($alerta == 'volta_deletada') { ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<b>Volta</b> deletada com sucesso!
			</div>
		<? } ?>

		<?php if ($alerta == 'editado') { ?>
			<div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<b>Editado </b>com sucesso!
			</div>
		<? } ?>


		<div class="row">
				 <div class="container-fluid">
					 <?php if(isset($pagina)){ ?>
					 <div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                           Não foram encontradas <b>aferições</b> nas datas selecionadas, ou os campos nao foram preenchidos corretamente.
                     </div>
					<?php } ?>
				<form  class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_estoque_motoristas/gerar_controle/') ?>" method="post">
										
				<div class="offset-md-8 col-md-3">
					
					<div  class="form-group ">
                        <label>Data para gerar relatorio de controle diário</label>
                           <input required type="date" value="" name="data_inicial" class="form-control">
                     </div>
											
                 </div> 
								
						<button type="submit" style="margin-top: 27px" class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 ">Filtrar</button>
									
									
				
				<?php if(isset($pagina)){ ?>
					
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
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div style="margin-top: 15px" class="card">
					<div class="header">
						<h2>
							<b>Saídas</b> Motoristas
						</h2>
					</div>
					<div class="body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover dataTable js-exportable">
								<thead>
									<tr>
										<th>Data</th>
										<th>Motorista</th>
										<th>Tambor</th>
										<th>Óleo</th>
										<th>Detergente</th>
										
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Data</th>
										<th>Motorista</th>
										<th>Tambor</th>
										<th>Óleo</th>
										<th>Detergente</th>
										
									</tr>
								</tfoot>
								<tbody>
									<?php foreach ($saidas as $s) { ?>
										<tr>
											<td style="text-align: center;"><?= date('d/m  H:i', strtotime($s['data_saida'])); ?></td>
											<td style="text-align: center;"><?= mb_strimwidth($s['nome'], 0, 10, "."); ?></td>
											<td style="text-align: center;"><?= $s['tambor'] ?></td>
											<td style="text-align: center;"><?= $s['oleo'] ?></td>
											<td style="text-align: center;"><?= $s['detergente'] ?></td>
										</tr>
									<?php } ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div style="margin-top: 15px" class="card">
					<div class="header">
						<h2>
							<b>Voltas</b> Motoristas
						</h2>
					</div>
					<div class="body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover dataTable js-exportable">
								<thead>
									<tr>
										<th>Data</th>
										<th>Motorista</th>
										<th>Tambor</th>
										<th>Óleo</th>
										<th>Detergente</th>
										
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Data</th>
										<th>Motorista</th>
										<th>Tambor</th>
										<th>Óleo</th>
										<th>Detergente</th>
										
										
									</tr>
								</tfoot>
								<tbody>

									<?php foreach ($voltas as $v) { ?>
										<tr>
											<td style="text-align: center;"><?= date('d/m  H:i', strtotime($v['data_volta'])); ?></td>
											<td style="text-align: center;"><?= mb_strimwidth($v['nome'], 0, 10, "."); ?></td>
											<td style="text-align: center;"><?= $v['volta_tambor'] ?></td>
											<td style="text-align: center;"><?= $v['volta_oleo'] ?></td>
											<td style="text-align: center;"><?= $v['volta_detergente'] ?></td>
											
										</tr>
									<?php } ?>


								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<!-- #END# Exportable Table -->
	</div>

	<div class="modal fade" id="exampleModal17" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Deletar Saída?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Tem certeza que deseja excluir essa retirada do estoque? (Os valores do estoque não serão alterados)
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
					<a class="deleta" href="#"><button type="button" class="btn btn-danger">Deletar</button></a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="exampleModal18" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Deletar Volta?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Tem certeza que deseja excluir essa volta do estoque? (Os valores do estoque não serão alterados)
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
					<a class="deleta" href="#"><button type="button" class="btn btn-danger">Deletar</button></a>
				</div>
			</div>
		</div>
	</div>


</section>