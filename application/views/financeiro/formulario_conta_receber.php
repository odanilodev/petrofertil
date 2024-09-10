<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>NOVA CONTA</h2>
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
						
						
						
				<form method="post" action="<?= site_url('F_contas_receber/inserir_conta') ?>">
					
					
					<input type="hidden" name="id" value=""></input>
					
					
                        <div class="body">
                     
                            <div class="row clearfix">
								
                              
								
										
								<input type="hidden" name="id" value=""></input>
								
						 <div class="col-sm-12">
                                    <p>
                                        <b>Nome do cliente</b>
                                    </p>
                                    <select name="nome" class="form-control show-tick">
										<option>Selecione</option>
										
									<?php foreach($clientes as $c){ ?>
											<option value="<?= $c['nome'] ?>"><?= $c['nome'] ?></option>
									<?php } ?>		

                                    </select>

                                </div>
							
						 <div class="col-sm-12">
                                    <p>
                                        <b>Empresa</b>
                                    </p>
                                    <select name="empresa" class="form-control show-tick">
										<option>Selecione</option>
										
											<option value="Óleo">Óleo</option>
											<option value="Reciclagem">Reciclagem</option>

                                    </select>

                                </div>
							
							
							<div style="margin-top: 20px" class="col-sm-12">
                                     <p>
                                        <b>Vencimento</b>
                                    </p>
                                    <div class="input-group " >
                                        <div class="form-line">
                                            <input type="date" name="vencimento" value="" class="form-control" placeholder="Por favor selecione uma data">
                                        </div>

                                    </div>
                                </div>
							
							
							
							
							
								
							 <div class="col-sm-12">
									<label >Valor</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name="valor" value="" class="form-control valor" placeholder="Insira o valor da conta">
											
                                   		 </div>
									 </div>
                                </div>
							
						
								
						
							<div class="col-sm-12">
									<label >Observação</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name="observacao" value="" class="form-control" placeholder="Digite um observação">
											
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