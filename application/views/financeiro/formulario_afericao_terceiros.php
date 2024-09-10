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
                <h2>BASIC FORM ELEMENTS</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Formulário de Aferição de Terceiros
                                <small></small>
                            </h2>

                        </div>
						
					
				<form method="post" action="<?= site_url('F_afericao/inserir_afericao_terceiro') ?>">
					
					
					<input type="hidden" name="id" value="<?= $afericao['id'] ?>"></input>
					
					
                        <div class="body">
                     
                            <div class="row clearfix">
								
							 <div style="padding-top: 20px" class="col-sm-12">
                                    <p>
                                        <b>Selecionar fornecedor</b>
                                    </p>
								  		
                                    <select name="fornecedor" class="form-control show-tick">
										<option>Selecione</option>
                                       <?php foreach($fornecedores as $f){ ?>	 
                                        <option <?= ($f['nome'] == $afericao['fornecedor'] ? 'selected' : '');   ?> value="<?= $f['nome'] ?>"><?= $f['nome'] ?></option>
									<?php } ?>
                                    </select>

                                </div>
								
										
								<div style="padding-top: 20px" class="col-sm-12">
                                     <p>
                                        <b>Data da Aferição</b>
                                    </p>
                                    <div class="input-group " >
                                        <div class="form-line">
                                            <input type="date" name="data_afericao" value="<?= $afericao['data_afericao'] ?>" class="form-control" placeholder="Please choose a date...">
                                        </div>

                                    </div>
                                </div>
								
								
								<div class="col-sm-12">
                                     
									<label>Quantidade paga</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="number"  step="0.01" name='pago' value="<?= $afericao['pago'] ?>" class="form-control " placeholder="Digite a quantidade paga">
											
                                   		 </div>
                                	</div>
                                   
                                </div>
								<div class="col-sm-12">
                                     
									<label >Quantidade aferida</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="number" value="<?= $afericao['aferido'] ?>" name="aferido" class="form-control" placeholder="Digite a quantidade aferida">
                                   		 </div>
                                	</div>
                                   
                                </div>
								
								 <div class="col-sm-12">
									<label >Gasto</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name="gasto" value="<?= $afericao['gasto'] ?>" class="form-control valor" placeholder="Insira o valor gasto">
											
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