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
				<h2>VISITAS PETROECOL RECICLAGEM</h2>
			</div>

			<?php if ($usuario == 'atendimento@petroecol.com.br') { ?>
				<div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
					<a href="<?= base_url('F_visitas_reciclagem/lancar_visita') ?>"><span type="button" class="btn bg-pink waves-effect">LANÇAR VISITA</span></a>

				</div>
			<?php  } ?>

		</div>

		<div class="row">
			<div class="container-fluid">
				<?php if ($pagina == 'erro') { ?>
					<div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						Não foram encontradas <b>visitas</b> nas datas selecionadas, ou os campos nao foram preenchidos corretamente.
					</div>
				<?php } ?>
				<form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_visitas_reciclagem/filtra_visitas/') ?>" method="post">

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

					<a href="<?= site_url('F_visitas_reciclagem/inicio') ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>


					<?php if ($pagina == 'deletado') { ?>

						<div class="alert bg-teal alert-dismissible col-xs-12" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
							Visita deletada com sucesso
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
						<h2>
							Visitas Realizadas
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

										<th>Motorista</th>
										<th>Cidade</th>
										<th>Qts Visitas</th>
										<th>Produção</th>
										<?php if ($usuario == 'reciclagem@petroecol.com.br') { ?>
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

										<th>Produção</th>
										<th>Cidade</th>
										<th>Qts Visitas</th>
										<th>Producao</th>
										<?php if ($usuario == 'reciclagem@petroecol.com.br') { ?>
											<th>Editar</th>
											<th>Excluir</th>
										<?php } ?>
									</tr>
								</tfoot>
								<tbody>



									<?php $contador = 1;
									foreach ($visitas as $v) { ?>

										<tr>

											<td><?= $contador ?></td>
											<td><?= date("d/m/Y", strtotime($v['data_visita'])); ?></td>
											<td><?= $v['veiculo'] ?></td>
											<td><?= $v['motorista'] ?></td>
											<td><?= $v['cidade'] ?></td>
											<td><?= $v['visitas'] ?></td>
											<td><?= $v['producao'] ?></td>

											<?php if ($usuario == 'reciclagem@petroecol.com.br') { ?>
												<td align="center"><a href="<?= site_url('F_visitas_reciclagem/lancar_visita/') . $v['id'] ?>"><i class="material-icons"><i class="material-icons">mode_edit</i></i></a></td>
												<td align="center"><a data-toggle="modal" data-target="#exampleModal15" data-pegaid="<?= $v['id'] ?>"><i class="material-icons">delete</i></a></td>
											<?php } ?>


										</tr>


									<?php $contador++;
									} ?>



								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="modal fade" id="exampleModal15" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Deletar Visita?</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Tem certeza que deseja deletar essa visita permanentemente?
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