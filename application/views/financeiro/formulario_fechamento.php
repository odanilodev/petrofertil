
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
                <h2>NOVA DESPESA</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Formulário de Fechamento 
                            </h2>

                        </div>
						
						
						
				<form method="post" action="<?= site_url('F_estoque/inserir_fechamento') ?>">
					
					
					
					
                        <div class="body">
                     
                            <div class="row clearfix">
								
                              
								
														
				 <div style="margin-top: 20px" class="col-sm-12">
									<label >Quantidade no Estoque</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="" name="estoque" value="<?= $quantidade ?>" class="form-control" placeholder="Digite um observação">
											
                                   		 </div>
									 </div>
                                </div>
							
							
							<div style="margin-top: 10px" class="col-sm-12">
                                     <p>
                                        <b>Data Fechamento</b>
                                    </p>
                                    <div class="input-group " >
                                        <div class="form-line">
                                            <input type="date" name="data_fechamento" value="" class="form-control">
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