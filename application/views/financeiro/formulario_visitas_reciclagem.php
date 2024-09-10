<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>FORMULÁRIO DE LANÇAMENTO DE VISITAS</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Visitas Reciclagem
                                <small></small>
                            </h2>

                        </div>
						
						
						
				<form method="post" action="<?= site_url('F_visitas_reciclagem/inserir_visita') ?>">
					
					
					<input type="hidden" name="id" value="<?= $visita['id'] ?>"></input>
					
					
                        <div class="body">
                     
                            <div class="row clearfix">
								
								<div class="col-sm-12">
                                     <p>
                                        <b>Data da Visita</b>
                                    </p>
                                    <div class="input-group " >
                                        <div class="form-line">
                                            <input required type="date" name="data_visita" value="<?= $visita['data_visita'] ?>" class="form-control" placeholder="Please choose a date...">
                                        </div>

                                    </div>
                                </div>
								
							
                                <div class="col-sm-12">
                                    <p>
                                        <b>Selecionar Veículo</b>
                                    </p>
                                    <select name="veiculo" class="form-control show-tick">
										<option>Selecione</option>
                                        <?php foreach($veiculos as $v){ ?>
											<option <?= ($v['placa'] == $visita['veiculo'] ? 'selected' : '');   ?> value="<?= $v['placa'] ?>"><?= $v['placa'] ?></option>	 
										<?php } ?>
                                    </select>

                                </div>
                              
                              
							 <div style="padding-top: 20px" class="col-sm-12">
                                    <p>
                                        <b>Selecionar Motorista</b>
                                    </p>
								  		
                                    <select required name="motorista" class="form-control show-tick">
										<option>Selecione</option>
                                       <?php foreach($motoristas as $m){ ?>	 
                                        <option <?= ($m['nome'] == $visita['motorista'] ? 'selected' : '');   ?> value="<?= $m['nome'] ?>"><?= $m['nome'] ?></option>
									<?php } ?>
                                    </select>

                                </div>
								
							
								<div style="padding-top: 20px"  class="col-sm-12">
                                     
									<label>Cidade</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text"  step="0.01" name='cidade' value="<?= $visita['cidade'] ?>" class="form-control " placeholder="Digite a cidade que foi realizada a coleta">
											
                                   		 </div>
                                	</div>
                                   
                                </div>
								
								<div class="col-sm-12">
                                     
									<label>Quantidade de Visitas</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="number"  step="0.01" name='visitas' value="<?= $visita['visitas'] ?>" class="form-control " placeholder="Digite a quantidade paga">
											
                                   		 </div>
                                	</div>
                                   
                                </div>	
								
									
							<div class="col-sm-12">
                                     
									<label>Produção</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='producao' value="<?= $visita['producao'] ?>" class="form-control " placeholder="Digite a producao">
											
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