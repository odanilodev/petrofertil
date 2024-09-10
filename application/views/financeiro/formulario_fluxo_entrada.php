<section class="content">
	
<?php
ini_set('display_errors', 0 );
error_reporting(0);
?>
	
        <div class="container-fluid">
            <div class="block-header">
                <h2>FLUXO DE CAIXA</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Formulário de lançamentos
                                <small></small>
                            </h2>

                        </div>		
			
				<form method="post" action="<?= site_url('F_fluxo/inserir_entrada') ?>">
    
					<input type="hidden" name="id" value="<?= $fluxo['id'] ?>"></input>
					
                    <input type="hidden" name="edita" value="<?= $fluxo['id'] ?>"></input>
					
					
                        <div class="body">
                     
                            <div class="row clearfix">
								
                                <div class="col-sm-6">
                                    <p>
                                        <b>Empresa</b>
                                    </p>
                                    <select name="empresa" class="form-control show-tick">
										<option>Selecione</option>

											<option <?= $fluxo['empresa'] == 'Óleo' ? 'selected' : '' ?> value="Óleo">Óleo</option>
											<option <?= $fluxo['empresa'] == 'Reciclagem' ? 'selected' : '' ?> value="Reciclagem">Reciclagem</option>
										
                                    </select>

                                </div>
                 
								
										
								<div style="padding-top: 20px" class="col-sm-6">
                                     <p>
                                        <b>Data da Entrada</b>
                                    </p>
                                    <div class="input-group " >
                                        <div class="form-line">
                                            <input type="date" name="data" value="<?= $fluxo['data'] ?>" class="form-control" placeholder="Please choose a date...">
                                        </div>

                                    </div>
                                </div>
								
								
								 <div class="col-sm-6">
									<label >Valor</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name="valor" value="<?= $fluxo['valor'] ?>" class="form-control valor" placeholder="Insira o valor de entrada">
											
                                   		 </div>
									 </div>
                                </div>

                                <div class="col-sm-6">
                                    <p>
                                        <b>Recibo de:</b>
                                    </p>
                                    <select name="pago_recebido" class="form-control show-tick">
                                        <option>Selecione</option>
                                        <?php foreach ($fornecedores as $f) { ?>
                                            <option <?= $f['nome'] == $fluxo['pago_recebido'] ? 'selected' : '' ?> value="<?= $f['nome'] ?>"><?= $f['nome'] ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
								
								<div class="col-sm-12">
									<label>Observação</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name="observacao" value="<?= $fluxo['observacao'] ?>" class="form-control" placeholder="Digite a observação">
											
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