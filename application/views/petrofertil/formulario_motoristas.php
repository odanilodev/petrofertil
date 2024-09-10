<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>CADASTRAR MOTORISTA PETROFERTIL</h2>
		</div>

		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<div class="card">

					<form method="post" enctype="multipart/form-data"
						action="<?= site_url('P_motoristas/cadastra_motorista') ?>">
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
											<input type="text" name='nome'
												value="<?= isset($motorista['nome']) ? $motorista['nome'] : '' ?>"
												class="form-control" placeholder="Digite o nome do motorista">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Nome ANTT</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='nome_antt'
												value="<?= isset($motorista['nome_antt']) ? $motorista['nome_antt'] : '' ?>"
												class="form-control" placeholder="Digite o nome ANTT">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Transportador responsável</label>
									<div class="form-group">
										<div class="form-line">
											<select name='transportador' class="form-control">
												<option value="" <?= (!isset($motorista['transportador']) || empty($motorista['transportador'])) ? 'selected' : '' ?>>Selecione
												</option>
												<?php foreach ($transportadores as $t) { ?>
													<option value="<?= $t['nome'] ?>" <?= (isset($motorista['transportador']) && $motorista['transportador'] == $t['nome']) ? 'selected' : '' ?>>
														<?= $t['nome'] ?>
													</option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>


								<div class="col-sm-4">
									<label>CPF</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='cpf'
												value="<?= isset($motorista['cpf']) ? $motorista['cpf'] : '' ?>"
												class="form-control" placeholder="Digite o CPF">
										</div>
									</div>
								</div>

								<!-- <div class="col-sm-4">
									<label>ANTT</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='antt'
												value="<?= isset($motorista['antt']) ? $motorista['antt'] : '' ?>"
												class="form-control inscricao" placeholder="Digite a ANTT">
										</div>
									</div>
								</div> -->


								<div class="col-sm-4">
									<label>Anexar CNH</label>
									<div class="form-group">
										<div class="form-line">
											<input type="file" name="cnh"
												value="<?= isset($motorista['cnh']) ? $motorista['cnh'] : '' ?>"
												class="form-control">
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