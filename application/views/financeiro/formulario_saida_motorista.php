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
							Retirada do Estoque de Produtos
						</h2>
					</div>

					<form method="post" enctype="multipart/form-data" action="<?= site_url('Eco/cadastra_saida_motorista') ?>">
						<input type="hidden" name="id" value="<?= $saida['id'] ?>"></input>

						<div class="body">

							<div class="row clearfix">


								<?php if ($saida['id'] > 0) { ?>

									<input type="hidden" name='id_motorista' value="<?= $saida['id_motorista'] ?>" class="form-control " placeholder="Digite o nome">

								<?php } else { ?>

									<input type="hidden" name='id_motorista' value="<?= $id_usuario ?>" class="form-control " placeholder="Digite o nome">

								<?php } ?>

								<div class="col-sm-6">
                                    <p>
                                        <b>Selecionar Veículo</b>
                                    </p>
                                    <select required name="veiculo" require class="form-control show-tick">
                                        <option>Selecione</option>
                                        <?php foreach ($veiculos as $v) { ?>
											<?php if($v['placa'] == 'EMPILHADEIRA'){ }else{ ?>
                                            <option  value="<?= $v['placa'] ?>"><?= $v['placa'] ?></option>
                                        <?php } } ?>
                                    </select>

                                </div>

								<div class="col-sm-6">

									<label>Quilometragem</label>

									<div class="form-group">
										<div class="form-line">
											<input type="number" autocomplete="off" value="<?= $saida['tambor'] ?>" required name="quilometragem" class="form-control" placeholder="Digite a Quilometragem do veículo">
										</div>
									</div>
									
								</div>

								<div class="col-sm-12">

									<label>Tambores</label>

									<div class="form-group">
										<div class="form-line">
											<input type="number" autocomplete="off" value="<?= $saida['tambor'] ?>" required name="tambor" class="form-control" placeholder="Digite a quantidade de tambores">
										</div>
									</div>
									
								</div>

								<div class="col-sm-12">

									<label>Óleos</label>
									<div class="form-group">
										<div class="form-line">
											<input type="number" autocomplete="off" value="<?= $saida['oleo'] ?>" required name="oleo" class="form-control" placeholder="Digite a quantidade de Óleo">
										</div>
									</div>

								</div>

								<div class="col-sm-12">

									<label>Detergentes</label>
									<div class="form-group">
										<div class="form-line">
											<input type="number" autocomplete="off" value="<?= $saida['detergente'] ?>" required name="detergente" class="form-control" placeholder="Digite a quantidade de Detergentes">
										</div>
									</div>

								</div>


								<!-- <div class="col-sm-12">

									<label>Foto</label>
									<div class="form-group">
										<div class="form-line">
											<input type="file" value="" required name="foto_saida" class="form-control" placeholder="Digite o email do cliente">
										</div>
									</div>

								</div> -->

								
								<div class="col-sm-12">

									<label>Observação</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" value="" name="observacao" class="form-control" placeholder="Digite alguma mensagem (Não obrigatório)">
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