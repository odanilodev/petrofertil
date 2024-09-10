<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>CADASTRAR CLIENTE PETROFERTIL</h2>
		</div>
		<!-- Input -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<div class="card">

					<form method="post" enctype="multipart/form-data"
						action="<?= site_url('P_clientes_petrofertil/insere_cliente') ?>">
						<div class="header">
							<h2>Formulário de Cadastro</h2>
						</div>

						<div class="body">
							<div class="row clearfix">
								<div class="col-sm-4">
									<label>Nome Fantasia</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='nome_fantasia'
												value="<?= $cliente['nome_fantasia'] ?>" class="form-control"
												placeholder="Digite o nome fantasia">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Razão Social</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='razao_social'
												value="<?= $cliente['razao_social'] ?>" class="form-control"
												placeholder="Digite a razão social">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Observação do Cliente</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='razao_social' value="<?= $cliente['observacao'] ?>"
												class="form-control" placeholder="Digite a razão social">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Endereço</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='endereco' value="<?= $cliente['endereco'] ?>"
												class="form-control" placeholder="Digite o endereço">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Cidade</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='cidade' value="<?= $cliente['cidade'] ?>"
												class="form-control" placeholder="Digite o CNPJ">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Estado</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='estado' value="<?= $cliente['estado'] ?>"
												class="form-control" placeholder="Digite o CNPJ">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>CNPJ ou CPF</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='documento' value="<?= $cliente['documento'] ?>"
												class="form-control" placeholder="Digite o CNPJ">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Inscrição Estadual</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='inscricao_estadual'
												value="<?= $cliente['inscricao_estadual'] ?>"
												class="form-control inscricao" placeholder="Digite a insc. estadual">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Inscrição Produção Rural</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='inscricao_rural'
												value="<?= $cliente['inscricao_rural'] ?>" class="form-control"
												placeholder="Digite a inscrição Rural">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Nome para contato</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='contato' value="<?= $cliente['contato'] ?>"
												class="form-control" placeholder="Digite o nome do contato">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Telefone 1</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='telefone' value="<?= $cliente['telefone'] ?>"
												class="form-control telefone" placeholder="Digite um telefone">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Telefone 2</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='telefone_secundario'
												value="<?= $cliente['telefone_secundario'] ?>"
												class="form-control telefone"
												placeholder="Digite um telefone secundário">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Forma de pagamento</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='forma_pagamento'
												value="<?= $cliente['forma_pagamento'] ?>" class="form-control"
												placeholder="Digite uma forma de pagamento">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Prazo de pagamento</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='prazo_pagamento'
												value="<?= $cliente['prazo_pagamento'] ?>" class="form-control"
												placeholder="Digite um prazo de pagamento">
										</div>
									</div>
								</div>

								<div class="col-sm-2">
									<label>Valor Frete</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='comissao' value="<?= $cliente['valor_frete'] ?>"
												class="form-control valor">
										</div>
									</div>
								</div>

								<div class="col-sm-2">
									<label>Distancia</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='distancia' value="<?= $cliente['distancia'] ?>"
												class="form-control valor">
										</div>
									</div>
								</div>


								<div class="col-sm-4">
									<label>Vendedor:</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='vendedor' value="<?= $cliente['vendedor'] ?>"
												class="form-control ">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Transportador:</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='transportador'
												value="<?= $cliente['transportador'] ?>" class="form-control ">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Tipo de Frete:</label>
									<select name="tipo_frete" class="form-control show-tick">
										<option>Selecione</option>
										<option <?= $cliente['tipo_frete'] == 'Valor por KG' ? 'selected' : '' ?>
											value="KG">Valor por KG</option>
										<option <?= $cliente['tipo_frete'] == 'Valor por Km rodado' ? 'selected' : '' ?>
											value="KM">Valor por KM rodada</option>
									</select>
								</div>

								<div class="col-sm-12">

									<div class="card">
										<div class="header">
											<h2>
												PRODUTOS
											</h2>

										</div>
										<div class="body table-responsive">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>#</th>
														<th>PRODUTO</th>
														<th>VALOR PRODUTO</th>
														<th>VALOR COMISSÃO</th>
													</tr>
												</thead>
												<tbody>
													<?php for ($i = 0; $i < count($produto); $i++) { ?>
														<tr>
															<th scope="row"><?= $i + 1 ?></th>
															<td><?= $produto[$i] ?></td>
															<td>R$<?= number_format("$valor_produto[$i]", 2, ",", "."); ?>
															</td>
															<td>R$<?= $comissao[$i] ?> P/<?= $medida_produto[$i] ?></td>
														</tr>
													<? } ?>
												</tbody>
											</table>
										</div>
									</div>

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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

<script>
	function addProductEntry() {
		const productSection = document.getElementById('product-section');
		const productEntry = document.createElement('div');
		productEntry.classList.add('product-entry');
		productEntry.innerHTML = `
		<div class="row">
			<div class="col-sm-4">
				<input type="text" name="produto[]" class="form-control form-line" placeholder="Digite o nome do produto">
			</div>
			<div class="col-sm-4">
				<input type="text" name="valor_produto[]" class="form-control valor form-line" placeholder="Digite o valor do produto">
			</div>
			<div class="col-sm-2">
				<button type="button" class="btn btn-danger btn-remove" onclick="removeProductEntry(this)">Remover</button>
			</div>
			<div class="col-sm-2">
				<button type="button" class="btn btn-primary" onclick="addProductEntry()">Adicionar Produto</button>
			</div>
		</div>
		`;
		productSection.appendChild(productEntry);
	}

	function removeProductEntry(button) {
		const productEntry = button.closest('.product-entry');
		productEntry.remove();
	}
</script>