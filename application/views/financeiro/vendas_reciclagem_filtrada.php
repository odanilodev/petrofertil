<?php

$status = $this->session->userdata('usuario');

if ($status != "logado") {

	redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');


$nome_usuario = $this->session->userdata('nome_usuario');

?>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="block-header col-md-3">
				<h2>VENDAS DA RECICLAGEM</h2>
			</div>

			<?php

			$valor_total_venda = 0;

			foreach ($vendas as $a) {
				$valor_total_venda = $valor_total_venda + $a['soma_total'];
			};

			?>


			<?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
				<div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">

					<a style="margin-left: 5px" href="<?= base_url('F_venda_reciclagem/formulario_cadastro') ?>"><span type="button" class="btn bg-green waves-effect">CADASTRO</span></a>

				</div>
			<? }  ?>

		</div>


		<!-- Widgets -->
		<div class="row clearfix">
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="info-box bg-pink hover-expand-effect">
					<div class="icon">
						<i class="material-icons">attach_money</i>
					</div>
					<div class="content">
						<div class="text">VENDIDO</div>
						<div class="number">R$<?= number_format("$valor_total_venda", 2, ",", ".");  ?></div>
					</div>
				</div>
			</div>

			<!-- #END# Widgets -->


			<div class="row">
				<div class="container-fluid">
					<form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_venda_reciclagem/filtra_vendas_reciclagem/') ?>"method="post">

						<div class="col-md-2 col-sm-12">

							<div class="form-group ">
								<label>De</label>
								<input type="date" value="" name="data_inicial" class="form-control">
							</div>

						</div>

						<div class="col-md-2 col-sm-12">

							<div class="form-group  ">
								<label>Até</label> 
								<input type="date" value="" name="data_final" class="form-control">
							</div>

						</div>

						<div class="col-md-2" style="margin-top: -4px">
							<p>
							<b>Status</b>
							</p>
								<select required name="status" class="form-control ">
									
										<option value="ambas">Ambas</option>
										<option value="pagas">Pago</option>
										<option value="naopagas">Em Aberto</option>
										
								</select>
						</div>

						<button type="submit" style="margin-top: 27px" class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 ">Filtrar</button>

						<a href="<?= base_url('F_fluxo/inicio/7') ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>
					</form>
				</div>
			</div>


			<!-- Exportable Table -->
			<div class="row clearfix">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div style="margin-top: 15px" class="card">

						<div class="header">
							<h2>
								Tabela de Vendas
							</h2>
						</div>

						<div class="body">
							<div class="table-responsive">
								<table class="table table-bordered table-striped table-hover dataTable js-exportable">
									<thead>
										<tr>
											<th>#</th>
											<th>Data Venda</th>
											<th>Comprador</th>
											<th>Valor total da Venda</th>
											<th>Data Recebimento</th>
											<th>Ver</th>

											<?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
												<th>Editar</th>
												<th>Excluir</th>
											<?php } ?>

										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>#</th>
											<th>Data Venda</th>
											<th>Comprador</th>
											<th>Valor total da Venda</th>
											<th>Data Recebimento</th>
											<th>Ver</th>

											<?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
												<th>Editar</th>
												<th>Excluir</th>
											<?php } ?>

										</tr>
									</tfoot>
									<tbody>
										<?php $contador = 1;
										foreach ($vendas as $v) {
											$soma_total = $v['soma_total'] ?>

											<tr>
												<td><?= $contador ?></td>
												<td><?= date('d/m/Y', strtotime($v['data_venda'])); ?></td>
												<td><?= $v['comprador'] ?></td>
												<td>R$<?= number_format("$soma_total", 2, ",", "."); ?></td>


												<?php if ($v['data_recebimento'] != '') {  ?>


													<td><?= date('d/m/Y', strtotime($v['data_recebimento'])); ?></td>
												<?php } else { ?>

													<td><a data-toggle="modal" data-cli-id="<?= $v['id'] ?>" data-target="#ModalReciclagemVenda" style=" color: <?= $b['status'] == 1 ? 'green' : 'red' ?>" href="<?= base_url('F_venda_reciclagem/recebe_valor/') . $b['id'] ?>"><?= $b['status'] == 0 ? "A Receber" : "Pago" ?></a></td>

												<?php } ?>

												<td align="center"><a href="<?= base_url('F_venda_reciclagem/visualizar_venda/') . $v['id'] ?>"><i class="material-icons">remove_red_eye</i></a></td>

												<?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
													<td align="center"><a data-toggle="modal" href="<?= base_url('F_venda_reciclagem/editar_venda/') . $v['id'] ?>" style="cursor: pointer;"><i class="material-icons">edit</i></a></td>
													<td align="center"><a data-toggle="modal" style="cursor: pointer;" data-target="#exampleModalVenda" data-pegaid="<?= $v['id'] ?>"><i class="material-icons">delete</i></a></td>
												<?php $contador++;
												} ?>

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

			<div class="modal fade" id="ModalReciclagemVenda" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div style="background-color: #fff;" class="">

						<div class="modal-header">
							<h5 class="modal-title" id="ModalReciclagemVenda">Recebendo:</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<div class="modal-body">
							<form id="ModalReciclagemVendaCaminho" method="post">

								<div class="row container-fluid">

									<div class="col-md-6">
										<label>Data do recebimento:</label>
										<div class="form-group">
											<div class="form-line">
												<input type="date" name='data_recebimento' value="" class="form-control tt2">
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<label>Valor:</label>
										<div class="form-group">
											<div class="form-line">
												<input type="text" name='valor_recebido' value="" placeholder="Digite o valor recebido da venda" class="valor form-control tt2">
											</div>
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

			<div class="modal fade" id="exampleModalVenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Deletar registro de Venda?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							Tem certeza que deseja excluir essa venda?
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