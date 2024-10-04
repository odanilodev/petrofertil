<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>CADASTRAR CLIENTE PETROFERTIL</h2>
		</div>

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
									<label>Observação do cliente</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='observacao' value="<?= $cliente['observacao'] ?>"
												class="form-control" placeholder="Digite uma observação">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Endereço</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='endereco' value="<?= $cliente['cnpj'] ?>"
												class="form-control" placeholder="Digite o endereço">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Cidade</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='cidade' value="<?= $cliente['cidade'] ?>"
												class="form-control" placeholder="Digite a cidade">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Estado</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='estado' value="<?= $cliente['estado'] ?>"
												class="form-control" placeholder="Digite o estado">
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
									<label>Forma de pagamento:</label>
									<select name="forma_pagamento" class="form-control show-tick">
										<option>Selecione</option>
										<option value="Pix">Pix</option>
										<option value="Cartão">Cartão</option>
										<option value="Boleto">Boleto</option>
										<option value="Cheque">Cheque</option>
									</select>
								</div>

								<div class="col-sm-4">
									<label>Prazo de pagamento (em dias)</label>
									<select name="prazo_pagamento" class="form-control show-tick">
										<option>Selecione</option>
										<option value="7">7</option>
										<option value="15">15</option>
										<option value="30">30</option>
										<option value="45">45</option>
										<option value="60">60</option>
									</select>
								</div>



								<div class="col-sm-4">
									<label>Vendedor:</label>
									<select name="vendedor" class="form-control show-tick">
										<option>Selecione</option>
										<?php foreach ($vendedores as $v) { ?>
											<option value="<?= $v['nome'] ?>">
												<?= $v['nome'] ?>
											</option>
										<?php } ?>

									</select>
								</div>

								<div class="col-sm-4">
									<label>Transportador:</label>
									<select name="transportador" class="form-control show-tick">
										<option>Selecione</option>
										<option value="Próprio">Próprio</option>
										<option value="Terceiro">Terceiro</option>
										<option value="Ambos">Ambos</option>
									</select>
								</div>


								<div class="col-sm-12">
									<label>Produtos e Valores</label>
									<div class="form-group" id="product-section">
										<div class="product-entry">
											<div class="row">
												<div class="col-sm-2">
													<select name="produto[]" class="form-control"
														onchange="loadMateriaPrimaOptions(this)">
														<option value="" disabled selected>Selecione o produto</option>
														<?php foreach ($produtos as $produto): ?>
															<option value="<?= $produto['nome'] ?>">
																<?= $produto['nome'] ?>
															</option>
														<?php endforeach; ?>
													</select>
												</div>
												<div class="col-sm-2">
													<select name="materia_prima[]"
														class="form-control materia-prima-select" required>
														<option disabled selected value="">Selecione a matéria-prima
														</option>
														<!-- As opções serão carregadas dinamicamente com JavaScript -->
													</select>
												</div>
												<div class="col-sm-2">
													<input type="text" name="valor_produto[]"
														class="form-control valor form-line"
														placeholder="Digite o valor do produto">
												</div>
												<div class="col-sm-2">
													<input type="text" name="comissao[]"
														class="form-control form-line valor"
														placeholder="Digite a comissão(Moeda)">
												</div>
												<div class="col-sm-2">
													<select name="medida_produto[]" class="form-control" required>
														<option disabled selected value="">Unidade de medida (Comissão)
														</option>
														<option value="Quilo">Quilo</option>
														<option value="Litro">Litro</option>
														<option value="Tonelada">Tonelada</option>
														<option value="Sacaria">Sacaria</option>
														<option value="BAG">BAG</option>
														<option value="SACO/30kg">SACO/30Kg</option>
													</select>
												</div>
												<div class="col-sm-2">
													<button type="button" class="btn btn-primary"
														onclick="addProductEntry()">Adicionar Produto</button>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="header col-md-12">
									<h2>Informações de frete</h2>
								</div>

								<div class="col-sm-4">
									<label>Tipo de Frete</label>
									<select name="tipo_frete" id="tipoFrete" class="form-control show-tick">
										<option>Selecione</option>
										<!-- <option value="Valor por KG">Valor por KG</option> -->
										<option value="Valor por Km rodado">Valor por Km rodado</option>
										<option value="Valor por Tonelada">Valor por Tonelada</option>
									</select>
								</div>

								<div class="col-sm-2 ">
									<label>Valor Frete por KM ou Kg</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" id="valorFrete" name='valor_frete'
												value="<?= $cliente['valor_frete'] ?>" class="form-control valor"
												placeholder="Digite o valor médio de frete">
										</div>
									</div>
								</div>

								<!-- Campo para selecionar o valor por tonelada (inicialmente escondido) -->
								<div class="col-sm-2" id="valorPorToneladaWrapper" style="display: none;">
									<label>Valor por Tonelada</label>
									<div class="form-group">
										<div class="form-line">
											<select id="valorPorTonelada" name="valor_por_tonelada"
												class="form-control">
												<option value="">Selecione o valor por tonelada</option>
												<option value="70">R$70,00 por tonelada</option>
												<option value="100">R$100,00 por tonelada</option>
												<option value="120">R$120,00 por tonelada</option>
											</select>
										</div>
									</div>
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


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php
// Mova a conversão de $produtos para JSON para fora da tag script
$produtosJson = json_encode($produtos);
?>


<script>
	$('#tipoFrete').on('change', function () {
		var selectedFrete = $(this).val();

		if (selectedFrete === 'Valor por Tonelada') {
			// Exibe o campo de seleção para valor por tonelada e oculta o valor por km/kg
			$('#valorPorToneladaWrapper').show();
			$('#valorFrete').closest('.col-sm-2').hide(); // Oculta todo o bloco do label e input
			$('#valorFrete').val(''); // Limpa o valor de frete anterior
		} else {
			// Exibe o campo valor por kg/km e oculta o valor por tonelada
			$('#valorPorToneladaWrapper').hide();
			$('#valorFrete').closest('.col-sm-2').show(); // Mostra novamente o bloco do label e input
			$('#valorFrete').attr('type', 'text'); // Altera o tipo de volta para 'text'
			$('#valorPorTonelada').val(''); // Limpa a seleção de tonelada anterior
		}
	});


</script>

<script>
	// Coloque a variável $produtosJson no início do script
	const produtosJson = <?= $produtosJson ?>;

	function addProductEntry() {
		const productSection = document.getElementById('product-section');
		const productEntry = document.createElement('div');
		productEntry.classList.add('product-entry');
		productEntry.innerHTML = `
			<div class="row">
				<div class="col-sm-2">
					<select name="produto[]" class="form-control" onchange="loadMateriaPrimaOptions(this)">
						<option value="" disabled selected>Selecione o produto</option>
						${produtosJson.map(produto => `<option value="${produto.nome}">${produto.nome}</option>`).join('')}
					</select>
				</div>
				<div class="col-sm-2">
					<select name="materia_prima[]" class="form-control materia-prima-select" required>
						<option disabled selected value="">Selecione a matéria-prima</option>
						<!-- As opções serão carregadas dinamicamente com JavaScript -->
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
						<option disabled selected value="">Unidade de medida (Comissão)</option>
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
			</div>
		`;
		productSection.appendChild(productEntry);
	}

	function removeProductEntry(button) {
		const productEntry = button.closest('.product-entry');
		productEntry.remove();
	}

	function loadMateriaPrimaOptions(selectElement) {
		const materiaPrimaSelect = selectElement.closest('.row').querySelector('.materia-prima-select');
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
	}

</script>