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
                <h2>AGENDAMENTO</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Formulário de Agendamento
                                <small></small>
                            </h2>

                        </div>
						
						
						
				<form method="post" action="<?= site_url('F_agendamentos/inserir_agendamento') ?>">
					
					
					<input type="hidden" name="id" value="<?= $id ?>"></input>
					
					
                        <div class="body">
                     
                            <div class="row clearfix">
								
                                <div class="col-sm-12">
                                    <p>
                                        <b>Frequencia</b>
                                    </p>
                                    <select name="frequencia" class="form-control show-tick">
										<option>Selecione</option>

											<option value="1">1 dia</option>
											<option value="7">7 dias</option>
											<option value="15">15 dias</option>
											<option value="30">30 dias</option>
										
                                    </select>

                                </div>
                 
								
										
								<div style="padding-top: 20px" class="col-sm-12">
                                     <p>
                                        <b>Data de inicio</b>
                                    </p>
                                    <div class="input-group " >
                                        <div class="form-line">
                                            <input type="date" name="data_atendimento" value="" class="form-control" placeholder="Please choose a date...">
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