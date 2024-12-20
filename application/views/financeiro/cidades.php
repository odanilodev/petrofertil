﻿<?php

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
				<h2>CIDADES</h2>
			</div>


			
				<div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
					<a style="margin-left: 5px" href="<?= base_url('F_cidades/cadastrar_cidade') ?>"><span type="button" class="btn bg-green waves-effect">CADASTRO</span></a>
				</div>
		

		</div>


		<!-- Exportable Table -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div style="margin-top: 15px" class="card">
					<div class="header">
						<h2>
							TABELA DE CIDADES
						</h2>

					</div>
					<div class="body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover dataTable js-exportable">
								<thead>
									<tr>
										<th>Nome</th>
										
											<th>Editar</th>
											<th>Excluir</th>
									
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Nome</th>
										
											<th>Editar</th>
											<th>Excluir</th>
									
									</tr>
								</tfoot>
								<tbody>
									<?php foreach ($cidades as $f) { ?>
										<tr>
											<td><?= $f['nome'] ?></td>

											

												<td align="center"><a href="<?= site_url('F_cidades/cadastrar_cidade/') . $f['id'] ?>"><i class="material-icons"><i class="material-icons">mode_edit</i></i></a></td>


												<td align="center"><a data-toggle="modal" data-target="#exampleModalCidade" data-pegaid="<?= $f['id'] ?>"><i class="material-icons">delete</i></a></td>
										

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


		<div class="modal fade" id="exampleModalCidade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Deletar Cidade?</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Podem conter registros interligados com o ID desta cidade. Oque pode prejudicar a busca de informações, tem certeza que deseja deletar esta cidade?
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