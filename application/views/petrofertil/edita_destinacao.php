<section class="content">
	<div class="container-fluid">
	<div class="row">
            <div class="block-header col-md-5">
                <h2>FORMULARIO DE DESTINAÇÃO</h2>
            </div>

            
            <div class="col-md-7" style="margin-bottom: 12px; margin-top: -8px" align="right"> 
                <a href="<?= site_url('P_Destinacao/inicio/').$destinacao['id_cliente'] ?>"><span type="button" class="btn bg-green waves-effect">VOLTAR</span></a>
            </div>

         


        </div>

	
		<!-- Input -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<div class="card">

					<form method="post" enctype="multipart/form-data" action="<?= site_url('P_destinacao/atualiza_destinacao/').$cliente['id'] ?>">

						<div class="header">
							<h2>
								Cadastro de destinação
							</h2>
						</div>

						<input type="hidden" value="<?= $destinacao['id'] ?>" name="id" class="form-control" readonly>

						<input type="hidden" value="<?= $destinacao['id_cliente'] ?>" name="id_cliente" class="form-control" readonly>


						<div class="body">
							<div class="row clearfix">
								<div class="col-sm-6">
									<label>Cliente</label>
									<div class="form-group">	
										<div class="form-line">
											<input type="text" value="<?= $destinacao['cliente'] ?>" name="cliente" class="form-control" readonly>
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Quantidade (NF)</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='quantidade' value="<?= $destinacao['quantidade'] ?>" class="form-control" placeholder="Digite o CNPJ">
										</div>
									</div>
								</div>


								<div class="col-sm-6">
									<label>Quantidade (Balança)</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='balanca' value="<?= $destinacao['balanca'] ?>" class="form-control" placeholder="Digite a quantidade de balança">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Quantidade de Plástico</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='plastico' value="<?= $destinacao['plastico'] ?>" class="form-control" placeholder="Digite de plástico">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Quantidade de Ráfia</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='rafia' value="<?= $destinacao['rafia'] ?>" class="form-control" placeholder="Digite a quantidade de ráfia">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Nota</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='nota' value="<?= $destinacao['nota'] ?>" class="form-control" placeholder="Numero Nota">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>N° MTR</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='mtr' value="<?= $destinacao['mtr'] ?>" class="form-control" placeholder="Numero MTR">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Data da destinação</label>
									<div class="form-group">
										<div class="form-line">
											<input type="date" name='data' value="<?= $destinacao['data'] ?>" class="form-control">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Valor do frete</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='valor_frete' value="<?= $destinacao['valor_frete'] ?>" class="form-control" placeholder="Digite o valor do frete">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Valor Agenciador</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='valor_agenciador' value="<?= $destinacao['valor_agenciador'] ?>" class="form-control" placeholder="Digite o valor do agenciador">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Valor do produto</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='valor_produto' value="<?= $destinacao['valor_produto'] ?>" class="form-control" placeholder="Digite o valor do produto">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Valor Manifesto</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='valor_manifesto' value="<?= $destinacao['valor_manifesto'] ?>" class="form-control" placeholder="Digite o valor de manifesto">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Observação</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" name='observacao' value="<?= $destinacao['observacao'] ?>" class="form-control" placeholder="Digite uma observação">
										</div>
									</div>
								</div>


								<div class="col-sm-6">
									<label>Gera Custo?</label>
									<select name="custo" class="form-control show-tick">
										<option>Selecione</option>
										<option <?php $destinacao['custo'] == "SIM" ? 'selected' : '' ?> value="SIM">SIM</option>
									  <option <?php $destinacao['custo'] == "NÃO" ? 'selected' : '' ?> value="NÃO">NÃO</option>
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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>