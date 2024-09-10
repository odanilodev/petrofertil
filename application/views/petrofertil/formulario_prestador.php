<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>CADASTRAR PRESTADOR DE SERVIÇO PETROFERTIL</h2>
		</div>

		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<form method="post" enctype="multipart/form-data"
						action="<?= site_url('P_prestadores_servico/cadastra_prestador') ?>">
						<div class="header">
							<h2>Formulário de Cadastro</h2>
						</div>

						<input type='hidden' value='<?= $prestador['id'] ?>' name='id'>

						<div class="body">
							<div class="row clearfix">
								<div class="col-md-6">
									<label>Nome</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='nome'
												value="<?= isset($prestador['nome']) ? $prestador['nome'] : '' ?>"
												class="form-control" placeholder="Digite o nome">
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<label>Telefone</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='telefone'
												value="<?= isset($prestador['telefone']) ? $prestador['telefone'] : '' ?>"
												class="form-control telefone" placeholder="Digite o telefone">
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<label>Documento (CPF ou CNPJ)</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='documento'
												value="<?= isset($prestador['documento']) ? $prestador['documento'] : '' ?>"
												class="form-control" placeholder="Digite o documento">
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<label>Endereço</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='endereco'
												value="<?= isset($prestador['endereco']) ? $prestador['endereco'] : '' ?>"
												class="form-control" placeholder="Digite o endereço">
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<label>Cidade</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='cidade'
												value="<?= isset($prestador['cidade']) ? $prestador['cidade'] : '' ?>"
												class="form-control" placeholder="Digite a cidade">
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<label>Estado</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='estado'
												value="<?= isset($prestador['estado']) ? $prestador['estado'] : '' ?>"
												class="form-control" placeholder="Digite o estado">
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<label>Banco</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='banco'
												value="<?= isset($prestador['banco']) ? $prestador['banco'] : '' ?>"
												class="form-control" placeholder="Digite o banco">
										</div>
									</div>
								</div>

								<div class="col-md-3">
									<label>Agência</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='agencia'
												value="<?= isset($prestador['agencia']) ? $prestador['agencia'] : '' ?>"
												class="form-control" placeholder="Digite a agência">
										</div>
									</div>
								</div>

								<div class="col-md-3">
									<label>Conta</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='conta'
												value="<?= isset($prestador['conta']) ? $prestador['conta'] : '' ?>"
												class="form-control" placeholder="Digite a conta">
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<label>Pix</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='pix'
												value="<?= isset($prestador['pix']) ? $prestador['pix'] : '' ?>"
												class="form-control" placeholder="Digite o Pix para pagamento">
										</div>
									</div>
								</div>

								<div class="col-md-12 text-right">
									<button type="submit" class="btn btn-primary">Cadastrar</button>
								</div>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</section>