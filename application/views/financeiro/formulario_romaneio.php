<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>GERAR ROMANEIO</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Informações Romaneio
                                <small></small>
                            </h2>

                        </div>
						
						
						
				<form method="post" action="<?= site_url('F_grupos_coleta/gerar_romaneio') ?>">
					
					
					<input type="hidden" name="id" value=""></input>
					
					
                        <div class="body">
                     
                            <div class="row clearfix">
								
								
                              <div style="padding-top: 20px" class="col-sm-6">
                                     
									<label>Motorista</label>
                                	 <select name="motorista1" required class="form-control show-tick">
										<option>Selecione</option>
                                       
										 <?php foreach($motoristas as $m){ ?>
										 
											<option value="<?= $m['nome'] ?>"><?= $m['nome'] ?></option>	 
										 
										<?php } ?>
                                    </select>
                                   
                               </div>
								
								<div style="padding-top: 20px" class="col-sm-6">
                                     
									<label>Motorista</label>
                                	 <select name="motorista2" class="form-control show-tick">
										<option selected value="">Somente 1 motorista</option>
                                       
										 <?php foreach($motoristas as $m){ ?>
										 
											<option value="<?= $m['nome'] ?>"><?= $m['nome'] ?></option>	 
										 
										<?php } ?>
                                    </select>
                                   
                               </div>
								
								
								<div style="padding-top: 20px" class="col-sm-6">
                                     
									<label>Veículos</label>
                                	 <select name="placa" required class="form-control show-tick">
										<option>Selecione</option>
                                       
										 <?php foreach($veiculos as $v){ ?>
										 
											<option value="<?= $v['placa'] ?>"><?= $v['placa'] ?></option>	 
										 
										<?php } ?>
                                    </select>
                                   
                               </div>
								
								<div style="padding-top: 20px" class="col-sm-6">
									<label>Data do Romaneio</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="date" name="data_romaneio" value="" class="form-control">
											
                                   		 </div>
									 </div>
                                </div>
										
							<div  class="col-sm-12">
                                    
								<label>Selecione os Grupos de Coleta</label>		
                            	<div class="demo-checkbox">
                               
									   
									<?php $c = 1; foreach($grupos as $g){ ?>
									   
									<input name="grupos[]" value="<?= $g['nome'] ?>" type="checkbox" id="<?= $c ?>" class="chk-col-green" >
									<label for="<?= $c ?>"><?= $g['nome'] ?></label>

									<?php $c++; } ?>
                                
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