
<?php  
	
	
	$status = $this->session->userdata('usuario');
	
	
	if($status != "logado"){
		
		redirect('financeiro/verifica_login');
	}
	
	
	$usuario = $this->session->userdata('login');
	
	$nome_usuario = $this->session->userdata('nome_usuario');
	

	
	?>


<section class="content">
        <div class="container-fluid">
			
			<div class="row">
            <div class="block-header">
                <h2> CLIENTES PETROECOL</h2>
				
				<?php if($usuario == 'fernanda@petroecol.com.br' or 'reciclagem@petroecol.com.br'){ ?>
				<div class="col-md-12" style="margin-bottom: 12px; margin-top: -20px" align="right">
					
					
				
					
					<?php if($metodo == 'visualizacao'){ ?>
					<a href="<?= base_url('F_clientes_reciclagem/edita_cliente/').$cliente['id'] ?>"><span type="button" class="btn bg-green waves-effect">Habilitar Edição</span></a>
					<?php } ?>
					
					<a href="<?= base_url('F_clientes_reciclagem/inicio/') ?>"><span type="button" class="btn bg-red waves-effect">Voltar</span></a>
					
				</div>
				 <?php  } ?>
            </div>
				
			</div>
			
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Formulário de Aferição
                                
                            </h2>
							
							

                        </div>
						
						
						
				<form method="post" action="<?= site_url('F_clientes_reciclagem/inserir_cliente') ?>">
					
					
					<input type="hidden" name="id" value=""></input>
					
					
                        <div class="body">
                     
                            <div class="row clearfix">
								
                              
								
										
								<input type="hidden"  name="id" value="<?= $cliente['id'] ?>"></input>
								
								
								<div class="col-sm-6">
                                     
									<label>Nome do Cliente</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" <?= $metodo == 'visualizacao' ? 'readonly' : '' ?> name='nome' value="<?= $cliente['nome'] ?>" class="form-control " placeholder="Digite o nome do cliente">
											
                                   		 </div>
                                	</div>
                                   
                                </div>
								
								<div class="col-sm-6">
                                     
									<label >CNPJ</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" <?= $metodo == 'visualizacao' ? 'readonly' : '' ?> value="<?= $cliente['cnpj'] ?>" name="cnpj" class="form-control cnpj" placeholder="Digite o CNPJ do cliente">
                                   		 </div>
                                	</div>
                                   
                                </div>
								
								<div class="col-sm-6">
                                     
									<label >E-mail</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" <?= $metodo == 'visualizacao' ? 'readonly' : '' ?> value="<?= $cliente['email'] ?>" name="email" class="form-control" placeholder="Digite o email do cliente">
                                   		 </div>
                                	</div>
                                   
                                </div>
								
								<div class="col-sm-6">
                                     
									<label >Cidade</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" <?= $metodo == 'visualizacao' ? 'readonly' : '' ?> value="<?= $cliente['cidade'] ?>" name="cidade" class="form-control" placeholder="Digite a cidade do cliente">
                                   		 </div>
                                	</div>
                                   
                                </div>
								
								<div class="col-sm-6">
                                     
									<label >Bairro</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" <?= $metodo == 'visualizacao' ? 'readonly' : '' ?> value="<?= $cliente['bairro'] ?>" name="bairro" class="form-control" placeholder="Digite o bairro do cliente">
                                   		 </div>
                                	</div>
                                   
                                </div>
								
								<div class="col-sm-6">
                                     
									<label >Endereço</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" <?= $metodo == 'visualizacao' ? 'readonly' : '' ?> value="<?= $cliente['endereco'] ?>" name="endereco" class="form-control" placeholder="Digite o endereco">
                                   		 </div>
                                	</div>
                                   
                                </div>
								
								<div class="col-sm-6">
                                     
									<label >Telefone de contato</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" <?= $metodo == 'visualizacao' ? 'readonly' : '' ?> value="<?= $cliente['contato'] ?>" name="contato" class="form-control telefone" placeholder="Digite o telefone para contato">
                                   		 </div>
                                	</div>
                                   
                                </div>
								
								<div class="col-sm-6">
                                     
									<label >Inscrição estadual</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" <?= $metodo == 'visualizacao' ? 'readonly' : '' ?> value="<?= $cliente['inscricao'] ?>" name="inscricao" class="form-control inscricao" placeholder="Digite a inscrição estadual">
                                   		 </div>
                                	</div>
                                   
                                </div>
							
							<div class="col-sm-6">
                                     
									<label>Forma de Pagamento</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" <?= $metodo == 'visualizacao' ? 'readonly' : '' ?> value="<?= $cliente['pagamento'] ?>" name="pagamento" class="form-control" placeholder="Descreva a forma de pagamento">
                                   		 </div>
                                	</div>
                                   
                                </div>
								
							<div class="col-sm-6">
                                     
									<label>Grupo</label>
                                	 <select  name="veiculo"  class="form-control show-tick">
										<option>Selecione</option>
                                       
										 <?php foreach($grupos as $g){ ?>
										 
											<option <?= $cliente['grupo'] == $g['nome'] ? 'selected' : '' ?> value="<?= $g['nome'] ?>"><?= $g['nome'] ?></option>	 
										 
										<?php } ?>
                                    </select>
                                   
                                </div>	
							
							
								
									<div class="col-sm-3 ">
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