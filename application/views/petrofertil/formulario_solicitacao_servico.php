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
            <div class="block-header">
                <h2>FORMULÁRIO DE SOLICITAÇÃO</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Formulario Solicitação de Serviço
                                <small></small>
                            </h2>
                        </div>
						
						
				<form method="post" action="<?= site_url('P_solicitacoes_servico/criar_solicitacao') ?>">
					
					
                        <div class="body">
                     
                            <div class="row clearfix">
								
								<input type="hidden" name="id_funcionario" value="<?= $funcionario['id'] ?>"></input>
								
								
								
								<div class="col-sm-6">
                                     
									<label>Solicitante: </label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='solicitante' value="<?= $nome_usuario ?>" readonly class="form-control">
                                   		 </div>
                                	</div>
                                   
                                </div>

                                <div class="col-sm-6">
                                     
									<label>Para: </label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" name='para' value="<?= $funcionario['nome'] ?>" readonly class="form-control">
											
                                   		 </div>
                                	</div>
                                   
                                </div>
								
							
								<div class="col-sm-6">
                                     
									<label>Titulo/Resumo</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" value="" name="titulo" class="form-control " placeholder="Digite o titulo/resumo">
                                   		 </div>
                                	</div>
                                   
								</div>

                                <div class="col-sm-6">
                                     
									<label>Prazo para conclusão</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="date" value="" name="data_conclusao" class="form-control ">
                                   		 </div>
                                	</div>
                                   
								</div>


                                <div class="col-sm-12">
                                     
									<label>Descrição</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="text" value="" name="descricao" class="form-control " placeholder="Digite a descrição">
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