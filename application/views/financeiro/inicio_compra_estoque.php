﻿<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="block-header col-md-3">
				<h2>COMPRAS ESTOQUE</h2>
			</div>
			<div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
				<a href="<?= base_url('F_estoque_produtos/adicionar_compra') ?>"><span type="button" class="btn bg-green waves-effect">REGISTRAR COMPRA</span></a>
			</div>
		</div>
		<!-- Widgets -->
		<div class="row clearfix">



			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="info-box hover-expand-effect">
					<div class="icon bg-light-green">
						<i class="material-icons">opacity</i>
					</div>
					<div class="content">
						<div class="text">ESTOQUE DE ÓLEO</div>
						<div class="number"><?= $estoque_oleo['quantidade'] ?></div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="info-box hover-expand-effect">
					<div class="icon bg-cyan">
						<i class="material-icons">invert_colors</i>
					</div>
					<div class="content">
						<div class="text">ESTOQUE DE DETERGENTE</div>
						<div class="number"><?= $estoque_detergente['quantidade'] ?></div>
					</div>
				</div>
			</div>


			<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
				<div class="info-box bg-green hover-zoom-effect">
					<div class="icon">
						<i class="material-icons">opacity</i>
					</div>
					<div class="content">
						<div class="text">ÓLEOS COM MOTORISTAS</div>
						<div class="number">300</div>
					</div>
				</div>
			</div>


			<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
				<div class="info-box bg-cyan hover-zoom-effect">
					<div class="icon">
						<i class="material-icons">invert_colors</i>
					</div>
					<div class="content">
						<div class="text">DETERGENTES COM MOTORISTAS</div>
						<div class="number">528</div>
					</div>
				</div>
			</div>

		</div>


		<div class="row">
			<!-- 
			<div class="container-fluid">
				<?php if (isset($pagina)) { ?>
					<div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						Não foram encontradas <b>aferições</b> nas datas selecionadas, ou os campos nao foram preenchidos corretamente.
					</div>
				<?php } ?>
				<form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_estoque_motoristas/filtra_entradas_saidas/') ?>" method="post">

					<div class="col-md-3">

						<div class="form-group ">
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

					<a href="<?= site_url('F_estoque_motoristas/inicio') ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>


					<?php if (isset($pagina)) { ?>

						<div class="alert bg-teal alert-dismissible col-xs-12" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
							Aferição deletada com sucesso
						</div>
					<?php } ?>

			</div> -->

			</form>

		</div>

		<!-- Exportable Table -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div style="margin-top: 15px" class="card">
					<div class="header">
						<h2>
							Histórico de <b>Compras</b>
						</h2>
					</div>

					<div class="body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover dataTable js-exportable">
								<thead>
									<tr>
										<th>Data</th>
										<th>Comprador</th>
										<th>Quantidade</th>
										<th>Valor</th>
										<th>Excluir</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Data</th>
										<th>Comprador</th>
										<th>Quantidade</th>
										<th>Valor</th>
										<th>Excluir</th>
									</tr>
								</tfoot>
								<tbody>
									<?php foreach ($historico_compras as $h) { ?>
										<tr>
											<td style="text-align: center;"><?= date('d/m/Y', strtotime($h['data_compra'])); ?></td>
											<td style="text-align: center;"><?= mb_strimwidth($h['comprador'], 0, 10, "."); ?></td>
											<td style="text-align: center;"><?= $h['quantidade'] ?></td>
											<td style="text-align: center;">R$<?= $h['valor'] ?></td>
											<td style="text-align: center;"><a style="cursor: pointer;" href="<?= base_url('f_estoque_produtos/deleta_compra/').$h['id'] ?>" ><i class="material-icons">delete</i></a></td>
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



</section>