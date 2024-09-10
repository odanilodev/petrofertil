<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>CADASTRAR CLIENTE </h2>
            <div style="margin-top: -15px" align="right">
            <a href="<?= base_url('P_clientes/edita_cliente/').$cliente['id'] ?>"><span type="button" class="btn bg-blue waves-effect">EDITAR</span></a>
        </div>
		</div>

        
		<!-- Input -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<div class="card">

					<form method="post" enctype="multipart/form-data" action="<?= site_url('P_clientes/insere_cliente') ?>">

						<div class="header">
							<h2>
								Formulário de Cadastro
							</h2>
						</div>
                        

						<div class="body">
							<div class="row clearfix">
								<div class="col-sm-6">
									<label>Nome do Cliente</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" Disabled  name='nome' value="<?= $cliente['nome'] ?>" class="form-control" placeholder="Digite o nome do cliente">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>CNPJ</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" Disabled  name='cnpj' value="<?= $cliente['cnpj'] ?>" class="form-control" placeholder="Digite o CNPJ">
										</div>
									</div>
								</div>


								<div class="col-sm-6">
									<label>Inscrição Estadual</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" Disabled  name='inscricao' value="<?= $cliente['inscricao'] ?>" class="form-control" placeholder="Digite o CNPJ">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Estado</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" Disabled  name='estado' value="<?= $cliente['estado'] ?>" class="form-control" placeholder="Digite o CNPJ">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Cidade</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" Disabled  name='cidade' value="<?= $cliente['cidade'] ?>" class="form-control" placeholder="Digite o CNPJ">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Bairro</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" Disabled  name='bairro' value="<?= $cliente['bairro'] ?>" class="form-control" placeholder="Digite o CNPJ">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Endereço</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" Disabled  name='endereco' value="<?= $cliente['endereco'] ?>" class="form-control" placeholder="Digite o CNPJ">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Nome para contato</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" Disabled  name='contato' value="<?= $cliente['contato'] ?>" class="form-control" placeholder="Digite o CNPJ">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Telefone</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" Disabled  name='telefone' value="<?= $cliente['telefone'] ?>" class="form-control" placeholder="Digite o CNPJ">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Localização</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" Disabled  name='localizacao' value="<?= $cliente['localizacao'] ?>" class="form-control" placeholder="Digite o CNPJ">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label>Tipo Anexo:</label>
									<select name="tipo_anexo" Disabled  class="form-control show-tick">
										
                                        <?php 
                                        if($cliente['tipo_anexo'] == 'Comodato'){
                                            echo "<option value='Comodato'>Comodato</option>";
                                        }elseif($cliente['tipo_anexo'] == 'Canhoto'){
                                            echo "<option value='Canhoto'>Canhoto</option>";
                                        }else{
                                            echo "<option>Selecione</option>";
                                        }
                                        
                                        ?>
				
                                    </select>
								</div>

                                <div style="margin-top:2%" class="col-sm-6 ">
								    <a href="<?= site_url('P_clientes/download_arquivo/').$cliente['id'] ?>">
                                    <i class="material-icons">download</i>
                                    <label>Baixar Anexo</label></a>
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