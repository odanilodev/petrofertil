
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
								
                                <h2 class="pageheader-title">Cadastrar Manutenção de Equipamento</h2>
									
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
					
					
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
					
						<!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                              
                                <div class="card">
                                   
                                    <div class="card-body">
                                        <form enctype="multipart/form-data" action="<?= site_url('manutencoes/cadastra_manutencao') ?>" method="post">
                                            <div class="form-group">
												<input id="inputText3" value="" name="id" type="hidden" class="form-control">
												
                                                <label for="inputText3" class="col-form-label">Placa</label>
                                             <select name="placa" class="form-control">
												<option>Selecione</option>
												 
												
												 
												 <?php  if($placa != ''){ ?>
												
												 <option required selected value="<?= $placa ?>"><?= $placa ?></option>
												 
												 <?php }else{ ?>
												
												 <?php foreach($carros as $c){ ?> 
												 <option value="<?= $c['placa'] ?>"><?= $c['placa'] ?></option>
													
												 <?php }  } ?>

											</select></br>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Oficina</label>
                                                 <select required name="oficina" class="form-control">
												<option>Selecione</option>
												<?php foreach($oficinas as $o){ ?> 
												 
												<option value="<?= $o['nome'] ?>"><?= $o['nome'] ?></option>
												
												 <?php } ?>
											</select></br>
										
										<div class="form-group">
                                                <label for="inputEmail">Numero da ordem de serviço</label>
                                                <input type="text" value="" name="codigo" class="form-control">
                                                
                                            </div>
                                                
										 <div class="form-group">
                                                <label for="inputEmail">Reclamação</label>
                                                <input type="text" required value="" name="reclamacao" class="form-control">
                                                
                                            </div>
										
										
                                            </div>	
											<div id="formulario">
											 <div class="form-group">
                                               <label for="inputEmail">Serviço e Valor <button type="button" class="btn btn-primary btn-sm" id="add-campo"> + </button> </label>
												 <div class="row container">
												<input  type="text" name="servico[]" placeholder="Digite o Servico" class="form-control col-md-3">
												  <input id="valor" placeholder="Digite o valor do serviço" type="text" step="0.01" value="" name="valor[]" class="form-control valor col-md-3">
													 </div>
                                             </div>    
                                            </div></br>
											
									
											<div class="form-group">
                                                <label for="inputEmail">Desconto</label>
                                               <input id="valor" placeholder="Digite o valor do desconto caso contenha" type="text" step="0.01" value="" name="desconto" class="form-control valor ">
                                            </div></br>
										
							
											 <div class="form-group">
                                                <label for="inputEmail">Observacao</label>
                                                <input  type="text" value="" name="observacao" class="form-control">
                                            </div></br>
											
											
											<div class="form-group">
                                                <label for="inputEmail">Quilometragem</label>
                                                <input type="number" value="" name="km" class="form-control">
                                            </div></br>
									
											
											<div class="form-group">
                                                <label for="inputEmail">Data de entrada</label>
                                                <input required type="date" value="" name="data" class="form-control">
                                                
                                            </div></br>
				
				
											<div class="form-group">
                                                <label for="inputEmail">Data de saida</label>
                                                <input required type="date" value="" name="data_saida" class="form-control">
                                                
                                            </div></br>
											<button type="submit" class="btn btn-primary">Cadastrar </button>
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
            