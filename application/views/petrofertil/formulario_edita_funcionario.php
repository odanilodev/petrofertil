<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>CADASTRAR FUNCIONÁRIO </h2>
		</div>
		<!-- Input -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<div class="card">

					<form method="post" enctype="multipart/form-data" action="<?= site_url('P_funcionarios/atualiza_funcionario') ?>">

						<div class="header">
							<h2>
								Formulário de Cadastro
							</h2>
						</div>

						<input type="hidden" value="<?= $funcionario['id'] ?>" name="id">

						<div class="body">
							<div class="row clearfix">
								<div class="col-sm-6">
									<label>Nome do Empregado</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='nome' value="<?= $funcionario['nome'] ?>" class="form-control" placeholder="Digite o nome do funcionario">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Data de Nascimento: </label>
									<div class="form-group">
										<div class="form-line">
											<input type="date" name='data_nascimento' value="<?= $funcionario['data_nascimento'] ?>" class="form-control">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Grupo:</label>
									<select name="grupo" class="form-control show-tick">
										<option>Selecione</option>
											<option <?= $funcionario['grupo'] == 'Petrofertil' ? 'selected' : '' ?> value="Petrofertil">Escritório/Administrativo</option>
                                    </select>
								</div>

								<div class="col-sm-6">
									<label>Opção em: </label>
									<div class="form-group">
										<div class="form-line">
											<input type="date" name='opcao' value="<?= $funcionario['opcao'] ?>" class="form-control">
										</div>
									</div>
								</div>


								<div class="col-sm-6">
									<label>Sexo:</label>
									<select name="sexo" class="form-control show-tick">
										<option>Selecione</option>
											<option <?= $funcionario['sexo'] == 'masculino' ? 'selected' : '' ?> value="masculino">Masculino</option>
											<option <?= $funcionario['sexo'] == 'feminino' ? 'selected' : '' ?> value="feminino">Feminino</option>
                                    </select>
								</div>

								<div class="col-sm-6">
									<label>Tipo CNH:</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='tipo_cnh' value="<?= $funcionario['tipo_cnh'] ?>" class="form-control" placeholder="Digite o tipo de CNH">
										</div>
									</div>
								</div>

						
								<div class="col-sm-6">
									<label>Função:</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='funcao' value="<?= $funcionario['funcao'] ?>" class="form-control" placeholder="Digite a função do funcionario">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Salário Base:</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='salario' value="<?= $funcionario['salario'] ?>" class="form-control valor " placeholder="Digite o salario">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>CPF:</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='cpf' value="<?= $funcionario['cpf'] ?>" class="form-control cpf" placeholder="Digite o n° do CPF">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Residência:</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='residencia' value="<?= $funcionario['residencia'] ?>" class="form-control" placeholder="Digite o endereço da residência">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Foto de Perfil</label>
									<div class="form-group">
										<div class="form-line">
											<input type="file" name="foto_perfil" value="" class="form-control">
										</div>
									</div>
								</div>

							</div>
						</div>


						<div class="header">
							<h2>
								Documentos
							</h2>
						</div>

						<div class="body">

							<div class="row clearfix">

								<div class="col-sm-4">
									<label>CPF</label>
									<div class="form-group">
										<div class="form-line">
											<input type="file" name="doc_cpf" value="" class="form-control">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>ASO</label>
									<div class="form-group">
										<div class="form-line">
											<input type="file" name="aso" value="" class="form-control">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Ficha EPI</label>
									<div class="form-group">
										<div class="form-line">
											<input type="file" name="epi" value="" class="form-control">
										</div>
									</div>
								</div>


								<div class="col-sm-4">
									<label>Ficha Registro</label>
									<div class="form-group">
										<div class="form-line">
											<input type="file" name="ficha_registro" value="" class="form-control">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Carteira de Trabalho</label>
									<div class="form-group">
										<div class="form-line">
											<input type="file" name="carteira_trabalho" value="" class="form-control">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Carteira de Vacinação</label>
									<div class="form-group">
										<div class="form-line">
											<input type="file" name="carteira_vacinacao" value="" class="form-control">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Certificados</label>
									<div class="form-group">
										<div class="form-line">
											<input type="file" name="certificados" value="" class="form-control">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>CNH</label>
									<div class="form-group">
										<div class="form-line">
											<input type="file" name="doc_cnh" value="" class="form-control">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Ordem de Serviço</label>
									<div class="form-group">
										<div class="form-line">
											<input type="file" name="ordem_servico" value="" class="form-control">
										</div>
									</div>
								</div>


								<div class="col-sm-3">
									<div class="form-group">

										<input type="submit" class="btn bg-red btn-block waves-effect "></input>

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