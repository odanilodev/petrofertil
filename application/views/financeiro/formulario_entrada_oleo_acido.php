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
                                Formulário de Aferição de Óleo Ácido
                                <small></small>
                            </h2>
                        </div>
						
								
				<form method="post" action="<?= site_url('F_oleo_acido/inserir_oleo_acido/') ?>">						
                        <input type="hidden" name="usuario" value="<?= $usuario ?>">

                        <input type="hidden" name="id" value="<?= $afericao['id'] ?>">

                        <div class="body">
                     
                            <div class="row clearfix">

                                <div  class="col-sm-6">
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
								
								<div  class="col-sm-6">
                                     <p>
                                        <b>Data da entrada</b>
                                    </p>
                                    <div class="input-group " >
                                        <div class="form-line">
                                            <input type="date" name="data_entrada" value="<?= $afericao['data_entrada'] ?>" class="form-control" placeholder="Please choose a date...">
                                        </div>
                                    </div>
                                </div>

                                <div  class="col-sm-6">
                                    <p>
                                        <b>Tipo/Unidade de cálculo do lançamento</b>
                                    </p>
								  		
                                    <select require name="tipo" class="form-control show-tick">
										<option>Selecione</option> 
                                        <option <?= isset($afericao) ? 'selected' : '' ?> value="Litro">Litro</option>
                                        <option value="Kg">Kg</option>
                                    </select>
                                </div>
							
								
								<div class="col-sm-6">
                                     
									<label>Quantidade paga</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="int" name='pago' value="<?php $pago = $afericao['pago']; echo number_format($pago, 2, '.', '' ); ?>" class="form-control " placeholder="Digite a quantidade paga">
                                   		 </div>
                                	</div>
                                   
                                </div>

								<div class="col-sm-6">   

									<label >Quantidade aferida</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="int" name="aferido" value="<?php $aferidod = $afericao['aferido']; echo number_format($aferidod, 2, '.', '' );?>"  class="form-control" placeholder="Digite a quantidade aferida">
                                   		 </div>
                                	</div>
                                   
                                </div>

                                <div class="col-sm-6">   

									<label>Valor (L/Kg)</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name="valor" value="<?= $afericao['valor'] ?>"  class="form-control valor" placeholder="Digite o valor pago por L/Kg">
                                   		 </div>
                                	</div>
                                   
                                </div>
								
								 <div class="col-sm-6">
									<label >Numero da Nota Fiscal</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name="nota" value="<?= $afericao['nota'] ?>" class="form-control" placeholder="Digite o numero da nota fiscal">
                                   		 </div>
									 </div>
                                </div>
                                

                                <?php if($afericao['valor_total'] != ''){ ?>
								 <div class="col-sm-6">
									<label>Valor total</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name="valor_total" value="<?= $afericao['valor_total'] ?>" class="form-control" placeholder="Digite o numero da nota fiscal">
                                   		 </div>
									 </div>
                                </div>
                                <?php } ?>
								
								 	
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