<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="block-header col-md-3">
				<h2>RETIRADAS DO ESTOQUE</h2>
			</div>
			<div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
					<a href="<?= base_url('f_tambores/editar_estoque') ?>"><span type="button" class="btn bg-green waves-effect">EDITAR ESTOQUE</span></a>
				</div>
		</div>
		<!-- Widgets -->


		<?php $tambores = 0;
		foreach ($motoristas as $a) { ?>
		<?php if ($a['usuario'] != '') {

				$tambores = $tambores + $a['tambor'];
			}
		} ?>



		<div class="row clearfix">

			<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
				<div class="info-box hover-expand-effect">
					<div class="icon bg-indigo">
						<i class="material-icons">local_drink</i>
					</div>
					<div class="content">
						<div class="text">ESTOQUE DE TAMBORES</div>
						<div class="number"><?= $estoque_tambor['quantidade'] ?></div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
				<div class="info-box bg-blue hover-zoom-effect">
					<div class="icon">
						<i class="material-icons">local_drink</i>
					</div>
					<div class="content">
						<div class="text">TAMBORES COM MOTORISTAS</div>
						<div class="number"><?= $tambores ?></div>
					</div>
				</div>
			</div>


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


									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Data</th>
										<th>Motorista</th>
										<th>Tambor</th>

									</tr>
								</tfoot>
								<tbody>
									<?php foreach ($saidas as $s) { ?>
										<tr>
											<td style="text-align: center;"><?= date('d/m  H:i', strtotime($s['data_saida'])); ?></td>
											<td style="text-align: center;"><?= mb_strimwidth($s['nome'], 0, 10, "."); ?></td>
											<td style="text-align: center;"><?= $s['tambor'] ?></td>

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

									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Data</th>
										<th>Motorista</th>
										<th>Tambor</th>

									</tr>
								</tfoot>
								<tbody>

									<?php foreach ($voltas as $v) { ?>
										<tr>
											<td style="text-align: center;"><?= date('d/m  H:i', strtotime($v['data_volta'])); ?></td>
											<td style="text-align: center;"><?= mb_strimwidth($v['nome'], 0, 10, "."); ?></td>
											<td style="text-align: center;"><?= $v['volta_tambor'] ?></td>

										</tr>
									<?php } ?>


								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div style="margin-top: 15px" class="card">
					<div class="header">
						<h2>
							Produtos com Motoristas
						</h2>
					</div>
					<div class="body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover dataTable js-exportable">
								<thead>
									<tr>
										<th>Motorista</th>
										<th>Tambor</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Motorista</th>
										<th>Tambor</th>
									</tr>
								</tfoot>
								<tbody>
									<?php foreach ($motoristas as $m) { ?>
										<?php if ($m['usuario'] != '') { ?>
											<tr>
												<td style="text-align: center;"><?= $m['nome'] ?></td>
												<td style="text-align: center;"><?= $m['tambor'] ?></td>
											</tr>
									<?php }
									} ?>

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