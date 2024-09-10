<?php

$status = $this->session->userdata('usuario');

if ($status != "logado") {

	redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');

$nome_usuario = $this->session->userdata('nome_usuario');

$id_usuario = $this->session->userdata('id_usuario');

$foto_perfil = $this->session->userdata('foto_perfil');

$funcao = $this->session->userdata('funcao');

?>

<section class="content">
	<div class="container-fluid">

		<!-- Input -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							Retirada do Estoque de Tambores
						</h2>

					</div>


					<form method="post" action="<?= site_url('F_contas/inserir_contribuintes') ?>">

						<input type="hidden" name="id" value=""></input>

						<div class="body">

							<div class="row clearfix">


								<input type="hidden" name="id" value=""></input>

								<input type="hidden" name='nome' value="<?= $id_usuario ?>" class="form-control " placeholder="Digite o nome">

								<div class="col-sm-12">

									<label>Quantidade da Saída</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" autocomplete="off" value="" require name="quantidade" class="form-control cnpj" placeholder="Digite a quantidade a ser retirada do estoque">
										</div>
									</div>

								</div>

								<div class="col-sm-12">

									<label>Foto</label>
									<div class="form-group">
										<div class="form-line">
											<input type="file" value="" require name="foto" class="form-control" placeholder="Digite o email do cliente">
										</div>
									</div>

								</div>



								<div style="padding-top: 40px;" class="col-sm-3">
									<div class="form-group">

										<input type="submit" class="btn bg-red btn-block waves-effect col-md-3"></input>

									</div>
								</div>


					</form>
				</div>

			</div>
		</div>
	</div>
	</div>
	<!-- #END# Input -->

	</div>
</section>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>