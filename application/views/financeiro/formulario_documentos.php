<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>CADASTRAR DOCUMENTOS </h2>
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
						
						
						
				<form method="post" enctype="multipart/form-data" action="<?= site_url('F_motoristas/atualizar_documentos') ?>">
					
					
					<input type="hidden" name="id" value=""></input>
					
					
                        <div class="body">
                     
                            <div class="row clearfix">
										
								<input type="hidden" name="id" value="<?= $motorista['id'] ?>"></input>
						
							<div class="col-sm-12">
									<label >CPF</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="file" name="cpf" value="" class="form-control">
											
                                   		 </div>
									 </div>
                                </div>

                                <div class="col-sm-12">
									<label >ASO</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="file" name="aso" value="" class="form-control" >
											
                                   		 </div>
									 </div>
                                </div>
								
                                <div class="col-sm-12">
									<label>Ficha EPI</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="file" name="epi" value="" class="form-control" >
											
                                   		 </div>
									 </div>
                                </div>
								

                                <div class="col-sm-12">
									<label>Ficha Registro</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="file" name="registro" value="" class="form-control">
											
                                   		 </div>
									 </div>
                                </div>

                                <div class="col-sm-12">
									<label>Carteira de Trabalho</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="file" name="carteira_trabalho" value="" class="form-control" >
											
                                   		 </div>
									 </div>
                                </div>

                                <div class="col-sm-12">
									<label>Carteira de Vacinação</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="file" name="carteira_vacinacao" value="" class="form-control" >
											
                                   		 </div>
									 </div>
                                </div>

                                <div class="col-sm-12">
									<label>Certificados</label>
                                	<div class="form-group">
                                    	<div class="form-line">
                                        	<input type="file" name="certificados" value="" class="form-control">
											
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