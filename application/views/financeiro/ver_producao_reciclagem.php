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
			<div class="block-header col-md-4">
				<h2>CONTROLE DE PRODUÇÃO <?= strtoupper($empresa['nome']) ?></h2>
			</div>

			<?php if ($usuario == 'reciclagem@petroecol.com.br' or $usuario == 'producao@petroecol.com.br') { ?>
				<div class="col-md-8" style="margin-bottom: 12px; margin-top: -8px" align="right">
					<a href="<?= base_url('F_producao/formulario_producao_reciclagem/' . $empresa['id']) ?>"><span type="button" class="btn bg-pink waves-effect">LANÇAR PRODUÇÃO</span></a>
				</div>
			<?php  } ?>

		</div></br>

		<?php if ($status_busca == 'filtrado') { ?>

			<!-- Widgets -->
			<div class="row clearfix">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="info-box bg-pink hover-expand-effect">
						<div class="icon">
							<i class="material-icons">check</i>
						</div>
						<div class="content">
							<div class="text">FARDOS PRODUZIDOS</div>
							<div class="number"><?= $total_fardo ?></div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="info-box bg-cyan hover-expand-effect">
						<div class="icon">
							<i class="material-icons">confirmation_number</i>
						</div>
						<div class="content">
							<div class="text">MÉDIA DIARIA DE FARDOS</div>
							<div class="number"><?= $media_diaria  ?></div>
						</div>
					</div>
				</div>

			</div>
			<!-- #END# Widgets -->

		<?php } ?>


		<div class="row">
			<div class="container-fluid">
				<?php  if($alerta == 'erro_busca'){ ?>
					 <div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                           Não foram encontrados <b>registros</b> nas datas selecionadas, ou os campos nao foram preenchidos corretamente.
                     </div>
					<?php }; ?>
				<form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_producao/filtra_producao/' . $empresa['id']) ?>" method="post">

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

					<a href="<?= site_url('F_producao/ver_producao/' . $empresa['id']) ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>


			</div>

			</form>

		</div>



		<!-- Exportable Table -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div style="margin-top: 15px" class="card">
					<div class="header">
						<h2> Tabela de Produção </h2>

					</div>
					<div class="body">
						<div class="table-responsive">

							<table class="table table-bordered table-striped table-hover dataTable js-exportable">

								<thead>
									<tr>
										<th>#</th>
										<th>Nome</th>
										<th>Prensa</th>
										<th>Data</th>
										<th>Fardo</th>
										<th>Papelão</th>
										<th>Plastico</th>
										<th>Plastico PS</th>
										<th>Plastico PP</th>
										<th>Plastico M</th>
										<th>Plastico B</th>
										<th>Sacaria</th>
										<th>Papel</th>
										<th>Pead</th>
										<th>Fita</th>
										<th>Rafia</th>
										<th>Latinha</th>
										<th>Aluminio</th>
										<th>Lixo</th>
										<th>Pet</th>

										<th>Editar</th>

										<?php if($usuario == 'reciclagem@petroecol.com.br'){ ?>
										<th>Excluir</th>
										<?php } ?>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>#</th>
										<th>Nome</th>
										<th>Prensa</th>
										<th>Data</th>
										<th>Fardo</th>
										<th>Papelão</th>
										<th>Plastico</th>
										<th>Plastico PS</th>
										<th>Plastico PP</th>
										<th>Plastico M</th>
										<th>Plastico B</th>
										<th>Sacaria</th>
										<th>Papel</th>
										<th>Pead</th>
										<th>Fita</th>
										<th>Rafia</th>
										<th>Latinha</th>
										<th>Aluminio</th>
										<th>Lixo</th>
										<th>Pet</th>

										<th>Editar</th>
										<?php if($usuario == 'reciclagem@petroecol.com.br'){ ?>
										<th>Excluir</th>
										<?php } ?>
									</tr>
								</tfoot>
								<tbody align="center">

									<?php $contador = 1;
									foreach ($producoes as $p) { ?>
										<tr>
											<td><?= $contador ?></td>
											<td style="background-color: #fde9d9;"><?= $p['nome'] ?></td>
											<td style="background-color: #fde9d9;"><?= $p['prensa'] ?></td>
											<td style="background-color: #fde9d9;"><?= date('d/m/Y', strtotime($p['data'])); ?></td>
											<td style="background-color: #00ffcc;"><?= $p['fardo'] ?></td>
											<td style="background-color: #fde9d9;"><?= $p['papelao'] ?></td>
											<td style="background-color: #fde9d9;"><?= $p['plastico'] ?></td>
											<td style="background-color: #fde9d9;"><?= $p['plastico_ps'] ?></td>
											<td style="background-color: #fde9d9;"><?= $p['plastico_pp'] ?></td>
											<td style="background-color: #fde9d9;"><?= $p['plastico_m'] ?></td>
											<td style="background-color: #fde9d9;"><?= $p['plastico_b'] ?></td>
											<td style="background-color: #fde9d9;"><?= $p['sacaria'] ?></td>
											<td style="background-color: #fde9d9;"><?= $p['papel'] ?></td>
											<td style="background-color: #fde9d9;"><?= $p['pead'] ?></td>
											<td style="background-color: #fde9d9;"><?= $p['fita'] ?></td>
											<td style="background-color: #fde9d9;"><?= $p['rafia'] ?></td>
											<td style="background-color: #fde9d9;"><?= $p['latinha'] ?></td>
											<td style="background-color: #fde9d9;"><?= $p['aluminio'] ?></td>
											<td style="background-color: #fde9d9;"><?= $p['lixo'] ?></td>
											<td style="background-color: #fde9d9;"><?= $p['pet'] ?></td>
											<td align="center"><a href="<?= site_url('F_producao/edita_producao/' . $p['id']) ?>"><i class="material-icons"><i class="material-icons">mode_edit</i></i></a></td>
											<?php if($usuario == 'reciclagem@petroecol.com.br'){ ?>
												<td align="center"><a href="<?= base_url('F_producao/deleta_producao/' . $p['id']) ?>"><i class="material-icons">delete</i></a></td>
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



	</div>
</section>