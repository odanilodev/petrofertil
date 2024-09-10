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
                                 <?= isset($empresa['nome']) ?  'Cadastrar Produção de '.$empresa['nome'] : 'Editar Produção N°'.$producao['id']; ?>
                            </h2>

                        </div>
						
						
				<form method="post" action="<?= site_url('F_producao/inserir_producao') ?>">
					
					<input type="hidden" name="id" value=""></input>
					
                        <div class="body">
                     
                            <div class="row clearfix">
										
								<input type="hidden" name="empresa" value="<?= isset($empresa['id']) ? $empresa['id'] : $producao['empresa'] ?>"></input>
								
								<input type="hidden" name="id" value="<?= isset($producao['id']) ?>"></input>
								
								<div class="col-sm-3">
                                     
									<label>Data da Produção</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="date" name='data' value="<?= isset($producao['data']) ? $producao['data'] : '' ?>" class="form-control " placeholder="Digite a data">
                                   		 </div>
                                	</div>
                                </div>


								<div class="col-sm-3">
                                     
									<label>Papelão</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='papelao' value="<?= isset($producao['papelao']) ? $producao['papelao'] : '' ?>" class="form-control " placeholder="Quantidade de papelao">
											
                                   		 </div>
                                	</div>
                                   
                                </div>

								<div class="col-sm-3">
                                     
									<label>Plastico</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='plastico' value="<?= isset($producao['plastico']) ? $producao['plastico'] : '' ?>" class="form-control " placeholder="Quantidade de plastico">
											
                                   		 </div>
                                	</div>
                                   
                                </div>

								<div class="col-sm-3">
                                     
									<label>Plastico PS</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='plastico_ps' value="<?= isset($producao['plastico_ps']) ? $producao['plastico_ps'] : '' ?>" class="form-control " placeholder="Quantidade de plastico PS">
											
                                   		 </div>
                                	</div>
                                   
                                </div>

								<div class="col-sm-3">
                                     
									<label>Plastico PP</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='plastico_pp' value="<?= isset($producao['plastico_pp']) ? $producao['plastico_pp'] : '' ?>" class="form-control " placeholder="Quantidade de plastico PP">
											
                                   		 </div>
                                	</div>
                                   
                                </div>

								<div class="col-sm-3">
                                     
									<label>Plastico M</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='plastico_m' value="<?= isset($producao['plastico_m']) ? $producao['plastico_m'] : '' ?>" class="form-control " placeholder="Quantidade de plastico M">
											
                                   		 </div>
                                	</div>
                                   
                                </div>
								<div class="col-sm-3">
                                     
									 <label>Plastico B</label>
									 <div class="form-group">
										 <div class="form-line">
											 <input type="text" name='plastico_b' value="<?= isset($producao['plastico_b']) ? $producao['plastico_b'] : '' ?>" class="form-control " placeholder="Quantidade de plastico B">
											 
											 </div>
									 </div>
									
								 </div>
 
								 <div class="col-sm-3">
									  
									 <label>Sacaria</label>
									 <div class="form-group">
										 <div class="form-line">
											 <input type="text" name='sacaria' value="<?= isset($producao['sacaria']) ? $producao['sacaria'] : '' ?>" class="form-control " placeholder="Quantidade de sacaria">
											 
											 </div>
									 </div>
									
								 </div>

								 <div class="col-sm-3">
                                     
									<label>Papel</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='papel' value="<?= isset($producao['papel']) ? $producao['papel'] : '' ?>" class="form-control " placeholder="Quantidade de papel">
											
                                   		 </div>
                                	</div>
                                   
                                </div>

								<div class="col-sm-3">
                                     
									<label>Pead</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='pead' value="<?= isset($producao['pead']) ? $producao['pead'] : '' ?>" class="form-control " placeholder="Quantidade de pead">
											
                                   		 </div>
                                	</div>
                                   
                                </div>

								<div class="col-sm-3">
                                     
									<label>Fita</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='fita' value="<?= isset($producao['fita']) ? $producao['fita'] : '' ?>" class="form-control " placeholder="Quantidade de fita">
											
                                   		 </div>
                                	</div>
                                   
                                </div>

								<div class="col-sm-3">
                                     
									<label>Rafia</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='rafia' value="<?= isset($producao['rafia']) ? $producao['rafia'] : '' ?>" class="form-control " placeholder="Quantidade de rafia">
											
                                   		 </div>
                                	</div>
                                   
                                </div>

								<div class="col-sm-3">
                                     
									<label>Latinha</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='latinha' value="<?= isset($producao['latinha']) ? $producao['latinha'] : '' ?>" class="form-control " placeholder="Quantidade de latinha">
											
                                   		 </div>
                                	</div>
                                   
                                </div>

								<div class="col-sm-3">
                                     
									<label>Alumínio</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='aluminio' value="<?= isset($producao['aluminio']) ? $producao['aluminio'] : '' ?>" class="form-control " placeholder="Quantidade de alumínio">
											
                                   		 </div>
                                	</div>
                                   
                                </div>

								<div class="col-sm-3">
                                     
									<label>Lixo</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='lixo' value="<?= isset($producao['lixo']) ? $producao['lixo'] : '' ?>" class="form-control " placeholder="Quantidade de lixo">
											
                                   		 </div>
                                	</div>
                                   
                                </div>

								<div class="col-sm-3">
                                     
									<label>Pet</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='pet' value="<?= isset($producao['pet']) ? $producao['pet'] : '' ?>" class="form-control " placeholder="Quantidade de pet">
											
                                   		 </div>
                                	</div>
                                   
                                </div>

								<div class="col-sm-4">
                                     
									<label>Nome</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='nome' value="<?= isset($producao['nome']) ? $producao['nome'] : '' ?>" class="form-control " placeholder="Nome Funcionario">
											
                                   		 </div>
                                	</div>
                                   
                                </div>

								<div class="col-sm-4">
                                     
									<label>Prensa</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='prensa' value="<?= isset($producao['prensa']) ? $producao['prensa'] : '' ?>" class="form-control " placeholder="Qual Prensa?">
                                   		 </div>
                                	</div>
                                   
                                </div>

								<div class="col-sm-4">
                                     
									<label>Observação</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='observacao' value="<?= isset($producao['observacao']) ? $producao['observacao'] : '' ?>" class="form-control " placeholder="Qual Prensa?">
											
                                   		 </div>
                                	</div>
                                   
                                </div>
								
									<div class="col-sm-offset-4 col-sm-3">
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