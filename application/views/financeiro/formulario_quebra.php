<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>BASIC FORM ELEMENTS</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Formulário de Destinação do Óleo
                                <small></small>
                            </h2>

                        </div>
						
						
						
				<form method="post" action="<?= site_url('F_quebra/inserir_quebra') ?>">
					
						
					
                        <div class="body">
                     
                            <div class="row clearfix">
								
                                <div class="col-sm-12">
                                    <p>
                                        <b>Tipo de Quebra</b>
                                    </p>
                                    <select name="tipo" class="form-control show-tick">
										<option>Selecione</option>
                                       
											<option value="farinha">Farinha</option>
											<option value="borra">Borra</option>
											<option value="agua">Água</option>
									
                                    </select>

                                </div>
                          
								
								<div style="padding-top: 20px" class="col-sm-12">
                                     
									<label>Quantidade</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="number"  step="0.01" name='quantidade' value="" class="form-control " placeholder="Digite a quantidade destinada">
											
                                   		 </div>
                                	</div>
                                   
                                </div>
							
										
								<div class="col-sm-12">
                                    <label>Data da Quebra</label>
                                    <div class="input-group " >
                                        <div class="form-line">
                                            <input type="date" name="data_quebra" value="" class="form-control" placeholder="Please choose a date...">
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