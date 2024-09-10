<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>NOVA PESSOA OU EMPRESA</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Formulário de Cadastro                                <small></small>
                            </h2>

                        </div>
						
						
						
				<form method="post" action="<?= site_url('F_contas/inserir_contribuintes') ?>">
					
					
					<input type="hidden" name="id" value=""></input>
					
					
                        <div class="body">
                     
                            <div class="row clearfix">
								
                              
								
										
								<input type="hidden" name="id" value=""></input>
								
								
								<div class="col-sm-12">
                                     
									<label>Nome</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='nome' value="" class="form-control " placeholder="Digite o nome">
											
                                   		 </div>
                                	</div>
                                   
                                </div>
								
								<div class="col-sm-12">
                                     
									<label >CNPJ</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" value="" name="cnpj" class="form-control cnpj" placeholder="Digite o CNPJ do cliente">
                                   		 </div>
                                	</div>
                                   
                                </div>
								
								<div class="col-sm-12">
                                     
									<label >E-mail</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" value="" name="email" class="form-control" placeholder="Digite o email do cliente">
                                   		 </div>
                                	</div>
                                   
                                </div>
								
								<div class="col-sm-12">
                                     
									<label >Telefone de contato</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" value="" name="telefone" class="form-control telefone" placeholder="Digite o telefone para contato">
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