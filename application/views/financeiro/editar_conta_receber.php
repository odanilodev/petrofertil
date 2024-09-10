<?php  
	
	$status = $this->session->userdata('usuario');
	
	if($status != "logado"){
		
		redirect('financeiro/verifica_login');
	}
	
	$usuario = $this->session->userdata('login');
	
	$nome_usuario = $this->session->userdata('nome_usuario');
	
?>

<section class="content">
        <div class="container-fluid">
        <div class="row">
            	<div class="block-header col-md-3">
                	<h2>VISUALIZAR CONTA A RECEBER (CONTA N°<?= $conta['id'] ?>)</h2>
            	</div>
				
				
				<div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
					<a style="margin-left: 5px" href="<?= $_SERVER['HTTP_REFERER'] ?>"><span type="button" class="btn btn-info  waves-effect">VOLTAR</span></a>
	
				</div>
				
			</div>
            
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Formulário de Cadastro
                            </h2>

                        </div>						
						
				<form method="post" action="<?= site_url('F_contas_receber/inserir_conta') ?>">
					
					<input type="hidden" name="id" value=""></input>
					
                        <div class="body">
                     
                            <div class="row clearfix">
										
								<input type="hidden" name="id" value="<?= $conta['id'] ?>"></input>

                            
									
                                <div class="col-sm-4">
									<label >Valor</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name="valor" value="<?= $conta['valor'] ?>" class="form-control valor">
											
                                   		 </div>
									 </div>
                                </div>

                                	
                                <div class="col-sm-4">
                                        <label>Empresa</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="empresa" value="<?= $conta['empresa'] ?>" class="form-control">
                                                
                                            </div>
                                        </div>
                                </div>

                                <div class="col-sm-4">
                                     <p>
                                        <b>Vencimento</b>
                                    </p>
                                    <div class="input-group " >
                                        <div class="form-line">
                                            <input type="date" name="vencimento" value="<?= $conta['vencimento'] ?>" class="form-control">
                                        </div>

                                    </div>
                                </div>

                                	
                                <div class="col-sm-6">
									<label>Nome</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name="nome" value="<?= $conta['nome'] ?>" class="form-control">
											
                                   		 </div>
									 </div>
                                </div>
							
                                <div class="col-sm-6">
									<label>Observação</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                            <input type="text" name="observacao" value="<?= $conta['observacao'] ?>" class="form-control">
											
                                   		 </div>
									 </div>
                                </div>
								
								<div class='col-md-3'>
                                    <div style='text-align:center;'>
                                        <div class="form-group">
                                            
                                            <input type="submit" class="btn bg-red btn-block waves-effect"></input>
                                            
                                        </div>
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