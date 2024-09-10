<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>CADASTRAR VEÍCULO TRANSPORTADOR</h2>
		</div>

		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<div class="card">

					<form method="post" enctype="multipart/form-data"
						action="<?= site_url('P_veiculos/cadastra_veiculo') ?>">
						<div class="header">
							<h2>Formulário de Cadastro</h2>
						</div>

						<input type='hidden' value='<?= $veiculo['id'] ?>' name='id'>

						<div class="body">
							<div class="row clearfix">
								<div class="col-sm-4">
									<label>Modelo</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='modelo'
												value="<?= isset($veiculo['modelo']) ? $veiculo['modelo'] : '' ?>"
												class="form-control" placeholder="Digite o modelo">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Marca</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='marca'
												value="<?= isset($veiculo['marca']) ? $veiculo['marca'] : '' ?>"
												class="form-control" placeholder="Digite a marca">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Placa</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='placa'
												value="<?= isset($veiculo['placa']) ? $veiculo['placa'] : '' ?>"
												class="form-control" placeholder="Digite a placa do veiculo">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Tipo do veículo</label>
									<select name="tipo_veiculo" class="form-control show-tick">
										<option>Selecione</option>
										<option value="Utilitário">Utilitário</option>
										<option value="Toco (2 eixos)">Toco (2 eixos)</option>
										<option value="Truck (3 eixos)">Truck (3 eixos)</option>
										<option value="Bitruck (4 eixos)">Bitruck (4 eixos)</option>
										<option value="Carreta 2 eixos">Carreta 2 eixos</option>
										<option value="Carreta 3 eixos">Carreta 3 eixos</option>
										<option value="Romeu e Julieta">Romeu e Julieta</option>
										<option value="Julieta">Julieta</option>
										<option value="Caçamba">Caçamba</option>
										<option value="Carroceria basculante">Carroceria basculante</option>
										<option value="Carroceria Sider">Carroceria Sider</option>
										<option value="Baú">Baú</option>
										<option value="Baú Refrigerado">Baú Refrigerado</option>
										<option value="Baú Lonado">Baú Lonado</option>
										<option value="Prancha">Prancha</option>
										<option value="Caminhão Graneleiro">Caminhão Graneleiro</option>
										<option value="Caminhão Cegonha">Caminhão Cegonha</option>
										<option value="Caminhão Guincho">Caminhão Guincho</option>
										<option value="Caminhão Baú Frigorífico">Caminhão Baú Frigorífico</option>
									</select>
								</div>

								<div class="col-sm-4">
									<label>Transportador Responsável</label>
									<select name="id_transportador" class="form-control show-tick">
										<option>Selecione</option>
										<?php foreach ($transportadores as $t) { ?>
											<option value="<?= $t['id'] ?>">
												<?= $t['nome'] ?>
											</option>
										<?php } ?>
									</select>
								</div>

								<div class="col-sm-12">
									<button type="submit" class="btn btn-primary">Cadastrar</button>
								</div>

							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
		<!-- #END# Input -->
	</div>

</section>