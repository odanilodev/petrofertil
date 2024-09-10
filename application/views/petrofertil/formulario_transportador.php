<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>CADASTRAR MOTORISTA PETROFERTIL</h2>
		</div>

		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<div class="card">

					<form method="post" enctype="multipart/form-data"
						action="<?= site_url('P_transportadores/cadastra_transportador') ?>">
						<div class="header">
							<h2>Formulário de Cadastro</h2>
						</div>

						<input type='hidden' value='<?= $transportador['id'] ?>' name='id'>

						<div class="body">
							<div class="row clearfix">
								<div class="col-sm-3">
									<label>Nome da transportadora</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='nome'
												value="<?= isset($transportador['nome']) ? $transportador['nome'] : '' ?>"
												class="form-control" placeholder="Digite o nome">
										</div>
									</div>
								</div>

								<div class="col-sm-3">
									<label>Nome do responsavel</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='nome_responsavel'
												value="<?= isset($transportador['nome_responsavel']) ? $transportador['nome_responsavel'] : '' ?>"
												class="form-control" placeholder="Digite o nome">
										</div>
									</div>
								</div>

								<div class="col-sm-3">
									<label>Telefone</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='telefone'
												value="<?= isset($transportador['telefone']) ? $transportador['telefone'] : '' ?>"
												class="form-control telefone" placeholder="Digite o telefone">
										</div>
									</div>
								</div>

								<div class="col-sm-3">
									<label>Prazo de pagamento (em dias)</label>
									<select name="prazo_pagamento" class="form-control show-tick">
										<option>Selecione</option>
										<option <?= $transportador['prazo_pagamento'] == '7' ? 'selected' : '' ?>
											value="7">7</option>
										<option <?= $transportador['prazo_pagamento'] == '15' ? 'selected' : '' ?>
											value="15">15</option>
										<option <?= $transportador['prazo_pagamento'] == '30' ? 'selected' : '' ?>
											value="30">30</option>
										<option <?= $transportador['prazo_pagamento'] == '45' ? 'selected' : '' ?>
											value="45">45</option>
										<option <?= $transportador['prazo_pagamento'] == '60' ? 'selected' : '' ?>
											value="60">60</option>
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