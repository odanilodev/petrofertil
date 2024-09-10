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


		<form method="post" action="<?= site_url('F_romaneios/inserir_romaneio') ?>">


			<?php foreach ($cidades as $v) { // loop nas cidades 
			?>

				<div class="row">
					<div class="block-header col-md-5">
						<h2 style="font-size: 17px"><b><?= $v ?></b></h2>
					</div>



				</div>

				<div class="container-fluid">
					<div class="row">


						<?php foreach ($clientes[$v] as $c) { // lopp nos clientes  ($v está a cidade do foreach acima das cidades) 
						?>

							<div class="col-lg-12 col-md-12">
								<div class="card">
									<div class="header bg-green">
										<h2>
											<?= $c['nome'] ?>
										</h2>
										<ul class="header-dropdown">

											<li class="dropdown">
												<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
													<i class="material-icons">more_vert</i>
												</a>
												<ul class="dropdown-menu pull-right">
													<li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
													<li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
													<li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
												</ul>
											</li>
										</ul>
									</div>


									<div class="body ">
										<div class="row clearfix">

											<input type="hidden" name="id_cliente[]" value="<?= $c['id'] ?>" class="form-control">

											<input type="hidden" name="data_romaneio" value="<?= $data_romaneio ?>" class="form-control">


											<div style="margin-top: 20px" class="col-sm-3">
												<label>Coletado</label>
												<div class="form-group">
													<div class="form-line">
														<input type="number" name="coletado[]" value="" class="form-control" placeholder="Litros coletados">

													</div>
												</div>
											</div>



											<div style="margin-top: 20px" class="col-sm-3">
												<label>Observação</label>
												<div class="form-group">
													<div class="form-line">
														<input type="text" name="observacao[]" value="" class="form-control" placeholder="Digite um observação">

													</div>
												</div>
											</div>


											<div style="padding-top: 20px" class="col-sm-4">
												<div class="form-group">
													<label>Tipo Residuo</label>
													<select name="tipo[]" required class="form-control show-tick">
														<option>Selecione o tipo de residuo</option>

														<option value="">Óleo</option>
														<option value="">Papel</option>
														<option value="">Plastico</option>
														<option value="">Papelao</option>
														<option value="">Vidro</option>

													</select>
												</div>
											</div>

											<div style="background-color: #60785E" class="col-md-12">
												<h4 style="color: white">Forma de Pagamento<h4>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label>Tipo de pagamento</label>
													<select name="tipo_pagamento[]" required class="form-control show-tick">
														<option>Selecione o tipo de pagamento</option>

														<option value="A prazo">A prazo</option>
														<option value="A vista">A vista</option>



													</select>
												</div>
											</div>

											<div class="col-sm-4">
												<div class="form-group">
													<label>Forma de pagamento</label>
													<select name="forma_pagamento[]" required class="form-control show-tick">
														<option>Selecione a forma de pagamento</option>

														<option value="Detergente">teste</option>



													</select>
												</div>
											</div>


											<div class="col-sm-3">
												<label>Valor/Quantidade</label>
												<div class="form-group">
													<div class="form-line">
														<input type="number" name="valor_quantidade[]" value="" class="form-control" placeholder="Litros coletados">

													</div>
												</div>
											</div>

										</div>

									</div>
								</div>
							</div>

						<?php }; ?>

					<?php }  // fim loop cidades 
					?>

					<div align="center" style="margin-bottom: 50px;" class="col-sm-4 col-md-offset-4">
						<div class="form-group">
							<input type="submit" class="btn bg-red btn-block waves-effect col-md-3"></input>
						</div>
					</div>

					</div>


				</div>


		</form>

	</div>

	</div>

</section>