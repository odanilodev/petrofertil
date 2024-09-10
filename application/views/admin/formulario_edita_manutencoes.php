
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
								
								<div class="pb-2">
								<a href="<?= site_url('veiculos') ?>"><button type="button" class="btn btn-secondary float-right">Voltar</button></div></a>
								
                                <h2 class="pageheader-title">Editar Manutenção</h2>
									
                                <div class="page-breadcrumb">

                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Veículos</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Cadastro de Veículo</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<pre>
					<?php 
					
					
					//print_r($manutencao);
					
								   
					$servico = json_decode($manutencao['servico'], true);
								   
					$valor = json_decode($manutencao['valor'], true);	   
				
					?>
					
					</pre>
					
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
					
						<!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                              
                                <div class="card">
                                   
                                    <div class="card-body">
                                        <form enctype="multipart/form-data" action="<?= site_url('manutencoes/atualiza_manutencao') ?>" method="post">
                                            <div class="form-group">
												<input value="<?= $manutencao['id'] ?>" name="id" type="hidden" class="form-control">
                                                <input value="<?= $manutencao['id_conta'] ?>" name="id_conta" type="hidden" class="form-control">
												
                                                <label for="inputText3" class="col-form-label">Placa</label>
                                             <select name="placa" class="form-control">
												<option ><?= $manutencao['placa'] ?></option>
												 
												
												 
												

											</select></br>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Oficina</label>
                                                 <select name="oficina" class="form-control">
												<option>Selecione</option>
												<?php foreach($oficinas as $o){ ?> 
												 
												<option <?= $o['nome'] == $manutencao['oficina'] ? 'selected' : '' ?> value="<?= $o['nome'] ?>"><?= $o['nome'] ?></option>
												
												 <?php } ?>
											</select></br>
										
										<div class="form-group">
                                                <label for="inputEmail">Numero da ordem de serviço</label>
                                                <input type="text" value='<?= $manutencao['codigo'] ?>' name="codigo" class="form-control">
                                                
                                            </div>
                                                
										 <div class="form-group">
                                                <label for="inputEmail">Reclamação</label>
                                                <input type="text" required value='<?= $manutencao['reclamacao'] ?>' name="reclamacao" class="form-control">
                                                
                                            </div>
										
										
                                            </div>	
											<div id="formulario">
											 <div class="form-group">
                                               <label for="inputEmail">Serviço e Valor <button type="button" class="btn btn-primary btn-sm" id="add-campo"> + </button> </label>
												 <?php $contador = 0; foreach($servico as $s){ ?>
										
												 <div class="row container">	 
												
												<input  type="text" name="servico[]" placeholder="Digite o Servico" value="<?= $s ?>" class="form-control col-md-3">
												
													 
												
												  <input id="valor" placeholder="Digite o valor do serviço" type="text" step="0.01" value="<?= $valor[$contador] ?>" name="valor[]" class="form-control valor col-md-3">
												
												
											   </div>
											
												 <?php $contador ++; } ?>
												 
                                             </div>    
                                            </div></br>
											
									
											<div class="form-group">
                                                <label for="inputEmail">Desconto</label>
                                               <input id="valor" placeholder="Digite o valor do desconto caso contenha" require type="text" step="0.01" value="<?= $manutencao['desconto'] ?>" name="desconto" class="form-control valor ">
                                            </div></br>
										
							
											 <div class="form-group">
                                                <label for="inputEmail">Observacao</label>
                                                <input  type="text" value="<?= $manutencao['observacao'] ?>" name="observacao" class="form-control">
                                            </div></br>
											
											
											<div class="form-group">
                                                <label for="inputEmail">Quilometragem</label>
                                                <input type="number" value="<?= $manutencao['km'] ?>" require  name="km" class="form-control">
                                            </div></br>
									
											
											<div class="form-group">
                                                <label for="inputEmail">Data de entrada</label>
                                                <input required type="date" value="<?= $manutencao['data'] ?>" name="data" class="form-control">
                                                
                                            </div></br>
				
				
											<div class="form-group">
                                                <label for="inputEmail">Data de saida</label>
                                                <input required type="date" value="<?= $manutencao['data_saida'] ?>" name="data_saida" class="form-control">
                                                
                                            </div></br>
											<button type="submit" class="btn btn-primary">Cadastrar</button>
                                        </form>
                                    </div>
									
									
                                   
                                </div>
                            </div>
                        </div>

       
					
						<script>
							$('.dinheiro').mask('#.##0,00', {reverse: true});   
							</script>


					
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
					
                        <!-- ============================================================== -->
                        <!-- end basic form  -->
                        <!-- ============================================================== -->
                </div>
            </div>
            