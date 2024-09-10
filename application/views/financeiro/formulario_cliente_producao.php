<?php
$status = $this->session->userdata('usuario');

if ($status != "logado") {

    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');

$nome_usuario = $this->session->userdata('nome_usuario');
?>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>FORMULÁRIO DE CADASTRO</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Empresa para produção
                            </h2>

                        </div>
						
						
						
				<form method="post" action="<?= site_url('F_producao/inserir_empresa_producao') ?>">
					
					
					<input type="hidden" name="id" value=""></input>
					
					
                        <div class="body">
                     
                            <div class="row clearfix">
								

								<input type="hidden" name="id" value="<?= isset($empresa['id']) ? $empresa['id'] : '' ?>"></input>
								
								
								<div class="col-sm-12">
                                     
									<label>Nome da Empresa</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='nome' value="<?= isset($empresa['nome']) ? $empresa['nome'] : '' ?>" class="form-control " placeholder="Digite o nome da empresa">
											
                                   		 </div>
                                	</div>
                                   
                                </div>

								<div class="col-sm-12">
                                     
									<label>E-mail de contato</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='email' value="<?= isset($empresa['email']) ? $empresa['email'] : '' ?>" class="form-control " placeholder="Digite um e-mail para contato">
											
                                   		 </div>
                                	</div>
                                   
                                </div>

								<div class="col-sm-12">
                                     
									<label>Cidade</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='cidade' value="<?= isset($empresa['email']) ? $empresa['email'] : '' ?>" class="form-control " placeholder="Digite a cidade da empresa">
                                   		 </div>
                                	</div>
                                </div>

								<div class="col-sm-12">
                                     
									<label>Telefone</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='telefone' value="<?= isset($empresa['telefone']) ? $empresa['telefone'] : '' ?>" class="form-control telefone" placeholder="Digite um telefone para contato">
											
                                   		 </div>
                                	</div>
                                   
                                </div>
								
								
									<div class="col-sm-3">
                                	<div class="form-group">
                                    	
                                        	<input type="submit" class="btn bg-red btn-block waves-effect col-md-3"></input>
                                   		 
									 </div>
                                </div>
								
								
								</form>
                            </div>
                            
                        </div>
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