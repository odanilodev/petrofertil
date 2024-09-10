<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>CADASTRAR VENDEDOR PETROFERTIL</h2>
		</div>
		<!-- Input -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<div class="card">

					<form method="post" enctype="multipart/form-data" action="<?= site_url('P_vendedores_petrofertil/insere_vendedor') ?>">
						<div class="header">
							<h2>Formulário de Cadastro</h2>
						</div>

						<input type='hidden' name='id' value='<?= isset($vendedor['id']) ? $vendedor['id'] : '' ?>'>

						<div class="body">
							<div class="row clearfix">
								<div class="col-sm-4">
									<label>Nome</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='nome' value="<?= isset($vendedor['nome']) ? $vendedor['nome'] : '' ?>" class="form-control" placeholder="Digite o nome do vendedor">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Email</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='email' value="<?= isset($vendedor['email']) ? $vendedor['email'] : '' ?>" class="form-control" placeholder="Digite um email de contato">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Telefone</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='telefone' value="<?= isset($vendedor['telefone']) ? $vendedor['telefone'] : '' ?>" class="form-control telefone" placeholder="Digite um telefone de contato">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Nome da Conta</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='nome_conta' value="<?= isset($vendedor['nome_conta']) ? $vendedor['nome_conta'] : '' ?>" class="form-control" placeholder="Digite o nome presente na conta">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Agência</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='agencia' value="<?= isset($vendedor['agencia']) ? $vendedor['agencia'] : '' ?>" class="form-control" placeholder="Digite a agência">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Conta</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='conta' value="<?= isset($vendedor['conta']) ? $vendedor['conta'] : '' ?>" class="form-control" placeholder="Digite o número da conta">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>CPF</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='cpf' value="<?= isset($vendedor['cpf']) ? $vendedor['cpf'] : '' ?>" class="form-control cpf" placeholder="Digite o CPF do vendedor">
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

