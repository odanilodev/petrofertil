<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>CADASTRAR MOTORISTA PETROFERTIL</h2>
		</div>

		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<div class="card">

					<form method="post" enctype="multipart/form-data" action="<?= site_url('P_motoristas/cadastra_motorista') ?>">
						<div class="header">
							<h2>Formulário de Cadastro</h2>
						</div>

						<input type='hidden' value='<?= $motorista['id'] ?>' name='id'>

						<div class="body">
							<div class="row clearfix">
								<div class="col-sm-6">
									<label>Nome do motorista</label>
									<div class="form-group">
										<div class="form-line">
											<input readonly type="text" name='nome' value="<?= isset($motorista['nome']) ? $motorista['nome'] : '' ?>" class="form-control" placeholder="Digite o nome do motorista" >
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Nome ANTT</label>
									<div class="form-group">
										<div class="form-line">
											<input readonly type="text" name='nome_antt' value="<?= isset($motorista['nome_antt']) ? $motorista['nome_antt'] : '' ?>" class="form-control" placeholder="Digite a ANTT">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Transportador responsável</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='transportador' value="<?= isset($motorista['transportador']) ? $motorista['transportador'] : '' ?>" class="form-control" placeholder="">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Fornecedor</label>
									<div class="form-group">
										<div class="form-line">
											<input readonly type="text" name='fornecedor' value="<?= isset($motorista['fornecedor']) ? $motorista['fornecedor'] : '' ?>" class="form-control">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Agência</label>
									<div class="form-group">
										<div class="form-line">
											<input readonly type="text" name='agencia' value="<?= isset($motorista['agencia']) ? $motorista['agencia'] : '' ?>" class="form-control" placeholder="Digite o CNPJ">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Conta</label>
									<div class="form-group">
										<div class="form-line">
											<input readonly type="text" name='conta' value="<?= isset($motorista['conta']) ? $motorista['conta'] : '' ?>" class="form-control" placeholder="Digite o CNPJ">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>CPF</label>
									<div class="form-group">
										<div class="form-line">
											<input readonly type="text" name='cpf' value="<?= isset($motorista['cpf']) ? $motorista['cpf'] : '' ?>" class="form-control" placeholder="Digite o CNPJ">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>ANTT</label>
									<div class="form-group">
										<div class="form-line">
											<input readonly type="text" name='antt' value="<?= isset($motorista['antt']) ? $motorista['antt'] : '' ?>" class="form-control inscricao" placeholder="Digite a insc. estadual">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Placa</label>
									<div class="form-group">
										<div class="form-line">
											<input readonly type="text" name='placa' value="<?= isset($motorista['placa']) ? $motorista['placa'] : '' ?>" class="form-control" placeholder="Digite a inscrição Rural">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Documento do Veículo</label>
									<div class="form-group">
										<?php if (isset($motorista['documento'])): ?>
											<a href="<?= site_url('P_motoristas/download_documento/' . $motorista['documento']) ?>" target="_blank">Baixar Documento</a>
										<?php else: ?>
											<span>Nenhum documento anexado</span>
										<?php endif; ?>
									</div>
								</div>

								<div class="col-sm-4">
									<label>CNH</label>
									<div class="form-group">
										<?php if (isset($motorista['cnh'])): ?>
											<a href="<?= site_url('P_motoristas/download_cnh/' . $motorista['cnh']) ?>" target="_blank">Baixar CNH</a>
										<?php else: ?>
											<span>Nenhuma CNH anexada</span>
										<?php endif; ?>
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
