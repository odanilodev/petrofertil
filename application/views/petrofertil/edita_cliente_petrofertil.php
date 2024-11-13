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

							<input type="hidden" value="<?= $cliente['id'] ?>" name="id" class="form-control" readonly>

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
									<label>Observação do cliente</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='observacao' value="<?= $cliente['observacao'] ?>"
												class="form-control" placeholder="Digite uma observação">
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
									<label>Vendedor:</label>
									<div class="form-group">
										<div class="form-line">
											<select name="vendedor" class="form-control show-tick">
												<option>Selecione</option>
												<?php foreach ($vendedores as $v) { ?>
													<option <?= $cliente['vendedor'] == $v['nome'] ? 'selected' : '' ?>
														value="<?= $v['nome'] ?>">
														<?= $v['nome'] ?>
													</option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Transportador:</label>
									<div class="form-group">
										<div class="form-line">
											<select name="transportador" class="form-control show-tick">
												<option>Selecione</option>
												<option <?= $cliente['transportador'] == 'Próprio' ? 'selected' : '' ?>
													value="Próprio">Próprio</option>
												<option <?= $cliente['transportador'] == 'Terceiro' ? 'selected' : '' ?>
													value="Terceiro">Terceiro</option>
												<option <?= $cliente['transportador'] == 'Ambos' ? 'selected' : '' ?>
													value="Ambos">Ambos</option>
											</select>
										</div>
									</div>
								</div>


								<div class="col-sm-4">
									<label>Prazo de pagamento (em dias)</label>
									<div class="form-group">
										<div class="form-line">
											<select name="prazo_pagamento" class="form-control show-tick">
												<option>Selecione</option>
												<option <?= $cliente['prazo_pagamento'] == '7' ? 'selected' : '' ?>
													value="7">7
												</option>
												<option <?= $cliente['prazo_pagamento'] == '15' ? 'selected' : '' ?>
													value="15">15
												</option>
												<option <?= $cliente['prazo_pagamento'] == '30' ? 'selected' : '' ?>
													value="30">30
												</option>
												<option <?= $cliente['prazo_pagamento'] == '45' ? 'selected' : '' ?>
													value="45">45
												</option>
												<option <?= $cliente['prazo_pagamento'] == '60' ? 'selected' : '' ?>
													value="60">60
												</option>
											</select>
										</div>
									</div>
								</div>


								<div class="col-sm-4">
									<div class="form-group">
										<div class="form-line">
											<label>Forma de pagamento:</label>
											<select name="forma_pagamento" class="form-control show-tick">
												<option>Selecione</option>
												<option <?= $cliente['forma_pagamento'] == 'Pix' ? 'selected' : '' ?>
													value="Pix">
													Pix</option>
												<option <?= $cliente['forma_pagamento'] == 'Cartão' ? 'selected' : '' ?>
													value="Cartão">Cartão</option>
												<option <?= $cliente['forma_pagamento'] == 'Boleto' ? 'selected' : '' ?>
													value="Boleto">Boleto</option>
												<option <?= $cliente['forma_pagamento'] == 'Cheque' ? 'selected' : '' ?>
													value="Cheque">Cheque</option>
											</select>
										</div>
									</div>
								</div>



								<div class="col-sm-12">
									<label>Produtos e Valores</label>
									<div class="form-group" id="product-section">
										<!-- Os produtos existentes serão carregados aqui -->
										<?php foreach ($produto as $index => $prod): ?>
											<div class="product-entry">
												<div class="row">
													<div class="col-sm-2">
														<select name="produto[]" class="form-control"
															onchange="loadMateriaPrimaOptions(this)">
															<option value="" disabled>Selecione o produto</option>
															<?php foreach ($produtos as $produtoItem): ?>
																<option value="<?= $produtoItem['nome'] ?>"
																	<?= $prod == $produtoItem['nome'] ? 'selected' : '' ?>>
																	<?= $produtoItem['nome'] ?>
																</option>
															<?php endforeach; ?>
														</select>
													</div>
													<div class="col-sm-2">
														<select name="materia_prima[]"
															class="form-control materia-prima-select" required>
															<option disabled value="">Selecione a matéria-prima
															</option>
															<!-- Exibir as matérias-primas associadas ao produto, se houver -->
															<?php if (!empty($materia_prima[$index])): ?>

																<option value="<?= $materia_prima[$index] ?>" selected>
																	<?= $materia_prima[$index] ?>
																</option>

															<?php endif; ?>
														</select>
													</div>
													<div class="col-sm-2">
														<input type="text" name="valor_produto[]"
															value="<?= $valor_produto[$index] ?>"
															class="form-control valor form-line"
															placeholder="Digite o valor do produto">
													</div>
													<div class="col-sm-2">
														<input type="text" name="comissao[]"
															value="<?= $comissao[$index] ?>"
															class="form-control form-line valor"
															placeholder="Digite a comissão(Moeda)">
													</div>
													<div class="col-sm-2">
														<select name="medida_produto[]" class="form-control" required>
															<option disabled value="">Unidade de medida</option>
															<?php $medidas = ['Quilo', 'Litro', 'Tonelada', 'Sacaria', 'BAG', 'SACO/30kg']; ?>
															<?php foreach ($medidas as $medida): ?>
																<option value="<?= $medida ?>"
																	<?= $medida_produto[$index] == $medida ? 'selected' : '' ?>>
																	<?= $medida ?>
																</option>
															<?php endforeach; ?>
														</select>
													</div>
													<div class="col-sm-2">
														<button type="button" class="btn btn-danger btn-remove"
															onclick="removeProductEntry(this)">Remover</button>
													</div>
												</div>
											</div>
										<?php endforeach; ?>
										<div class="row mt-2">
											<div class="col-sm-12">
												<button type="button" class="btn btn-primary"
													onclick="addProductEntry()">Adicionar Produto</button>
											</div>
										</div>
									</div>
								</div>

								<div class="header col-md-12">
									<h2>Informações de frete</h2>
								</div>

								<div class="col-sm-4">
									<label>Tipo de Frete</label>
									<select name="tipo_frete" id="tipoFrete" class="form-control show-tick"
										onchange="toggleFreteFields()">
										<option value="">Selecione</option>
										<option value="Valor por Km rodado" <?= $cliente['tipo_frete'] == 'Valor por Km rodado' ? 'selected' : '' ?>>Valor por Km rodado</option>
										<option value="Valor por Tonelada" <?= $cliente['tipo_frete'] == 'Valor por Tonelada' ? 'selected' : '' ?>>Valor por Tonelada</option>
									</select>
								</div>

								<!-- Campo de valor frete por KM ou KG -->
								<div class="col-sm-2" id="valorFreteWrapper">
									<label>Valor Frete por KM ou Kg</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" id="valorFrete" name="valor_frete"
												value="<?= $cliente['valor_frete'] ?>" class="form-control valor"
												placeholder="Digite o valor médio de frete">
										</div>
									</div>
								</div>

								<!-- Campo de valor por Tonelada (inicialmente escondido) -->
								<div class="col-sm-2" id="valorPorToneladaWrapper" style="display: none;">
									<label>Valor por Tonelada</label>
									<div class="form-group">
										<div class="form-line">
											<select id="valorPorTonelada" name="valor_por_tonelada"
												class="form-control">
												<option value="">Selecione o valor por tonelada</option>
												<option value="70" <?= $cliente['valor_por_tonelada'] == 70 ? 'selected' : '' ?>>R$70,00 por tonelada</option>
												<option value="100" <?= $cliente['valor_por_tonelada'] == 100 ? 'selected' : '' ?>>R$100,00 por tonelada</option>
												<option value="120" <?= $cliente['valor_por_tonelada'] == 120 ? 'selected' : '' ?>>R$120,00 por tonelada</option>
												<option value="130" <?= $cliente['valor_por_tonelada'] == 130 ? 'selected' : '' ?>>R$130,00 por tonelada</option>

											</select>
										</div>
									</div>
								</div>

								<div class="col-sm-2">
									<label>Distancia do Cliente (KM)</label>
									<div class="form-group">
										<div class="form-line">
											<input type="number" name='distancia' value="<?= $cliente['distancia'] ?>"
												class="form-control" placeholder="Distancia do cliente">
										</div>
									</div>
								</div>


								<div class="col-sm-12">
									<button type="submit" class="btn btn-primary">Salvar</button>
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
	// Convertendo os dados dos produtos para JSON
	var produtosJson = <?php echo json_encode($produtos); ?>;
</script>


<script>

	// Função para exibir os campos corretos com base no tipo de frete selecionado
	function toggleFreteFields() {
		const tipoFrete = document.getElementById('tipoFrete').value;
		const valorFreteWrapper = document.getElementById('valorFreteWrapper');
		const valorFreteInput = document.getElementById('valorFrete');
		const valorPorToneladaWrapper = document.getElementById('valorPorToneladaWrapper');
		const valorPorToneladaSelect = document.getElementById('valorPorTonelada');

		// Mostrar/esconder campos baseados no tipo de frete
		if (tipoFrete === 'Valor por Tonelada') {
			valorPorToneladaWrapper.style.display = 'block';
			valorFreteWrapper.style.display = 'none'; // Esconder campo de "Valor por KM ou Kg"
			valorFreteInput.value = ''; // Zerar o valor do campo escondido
		} else {
			valorPorToneladaWrapper.style.display = 'none';
			valorPorToneladaSelect.value = ''; // Zerar o valor do campo escondido
			valorFreteWrapper.style.display = 'block'; // Mostrar campo de "Valor por KM ou Kg"
		}
	}

	// Função para preencher os campos ao carregar a página
	window.onload = function () {
		toggleFreteFields(); // Chama a função para exibir o campo correto com base no tipo de frete carregado
	};

	function addProductEntry() {
		const productSection = document.getElementById('product-section');
		const productEntry = document.createElement('div');
		productEntry.classList.add('product-entry');
		productEntry.innerHTML = `
		<div class="row">
			<div class="col-sm-2">
				<select name="produto[]" class="form-control" onchange="loadMateriaPrimaOptions(this)">
					<option value="" disabled selected>Selecione o produto</option>
					<?php foreach ($produtos as $produto): ?>
																																																																																																														<option value="<?= $produto['nome'] ?>"><?= $produto['nome'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="col-sm-2">
				<select name="materia_prima[]" class="form-control materia-prima-select" required>
					<option disabled selected value="">Selecione a matéria-prima</option>
					<!-- As opções serão carregadas dinamicamente -->
				</select>
			</div>
			<div class="col-sm-2">
				<input type="text" name="valor_produto[]" class="form-control valor form-line" placeholder="Digite o valor do produto">
			</div>
			<div class="col-sm-2">
				<input type="text" name="comissao[]" class="form-control form-line valor" placeholder="Digite a comissão(Moeda)">
			</div>
			<div class="col-sm-2">
				<select name="medida_produto[]" class="form-control" required>
					<option disabled selected value="">Unidade de medida</option>
					<option value="Quilo">Quilo</option>
					<option value="Litro">Litro</option>
					<option value="Tonelada">Tonelada</option>
					<option value="Sacaria">Sacaria</option>
					<option value="BAG">BAG</option>
					<option value="SACO/30kg">SACO/30Kg</option>

				</select>
			</div>
			<div class="col-sm-2">
				<button type="button" class="btn btn-danger btn-remove" onclick="removeProductEntry(this)">Remover</button>
			</div>
		</div>`;
		productSection.appendChild(productEntry);
	}


	function removeProductEntry(button) {
		button.closest('.product-entry').remove();
	}


	var produtosJson = <?php echo json_encode($produtos); ?>;



	function loadMateriaPrimaOptions(selectElement) {
		const materiaPrimaSelect = selectElement.parentElement.parentElement.querySelector('.materia-prima-select');
		const selectedProductName = selectElement.value;

		// Lógica para carregar as opções de matéria-prima com base no produto selecionado
		const selectedProduct = produtosJson.find(product => product.nome === selectedProductName);

		// Remover as opções atuais
		materiaPrimaSelect.innerHTML = '<option disabled selected value="">Selecione a matéria-prima</option>';

		// Adicionar as novas opções de matéria-prima
		if (selectedProduct && selectedProduct.materia_prima) {
			const materiaPrimaArray = JSON.parse(selectedProduct.materia_prima);

			materiaPrimaArray.forEach(materiaPrima => {
				const option = document.createElement('option');
				option.value = materiaPrima;
				option.text = materiaPrima;
				materiaPrimaSelect.appendChild(option);
			});
		}

		// Verificar se há uma matéria-prima associada ao produto já selecionado
		const productEntry = selectElement.closest('.product-entry');
		const selectedMateriaPrima = productEntry.querySelector('[name="materia_prima[]"]').value;

		if (selectedMateriaPrima) {
			// Selecionar a matéria-prima associada ao produto
			materiaPrimaSelect.value = selectedMateriaPrima;
		}
	}



</script>