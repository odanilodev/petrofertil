
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
								<a href="<?= site_url('motoristas') ?>"><button type="button" class="btn btn-secondary float-right">Voltar</button></div></a>
								
                                <h2 class="pageheader-title">Cadastro de Motorista</h2>
									
                                <div class="page-breadcrumb">

                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Clientes</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Formulario de Destinação</li>
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
                                        <form enctype="multipart/form-data" action="<?= site_url('motoristas/cadastra_motorista') ?>" method="post">
											
											
                                                
                                                <input type="hidden" value="" name="id" class="form-control" readonly>
                                           
											
                                             <div class="form-group">
                                                <label for="inputEmail">Nome do Motorista</label>
                                                <input type="text" value="" placeholder="Digite o nome do motorista" name="nome" class="form-control" >
                                                
                                            </div></br>
										
										  <div class="form-group">
											<label for="exampleFormControlSelect1">Carro</label>
											<select class="form-control" name="carro" id="exampleFormControlSelect1">
												
												 <option>Selecione</option>
												
												<?php foreach($veiculos as $v){ ?>
											  <option><?= $v['placa'] ?></option>
												<?php } ?>
											</select>
										  </div></br>
									
									 <div class="form-group">
                                                <label for="inputEmail">Telefone</label>
                                                <input type="text" value="" placeholder="Digite o telefone celular" name="telefone" class="form-control" >
                                                
                                            </div></br>
											
											<div class="form-group">
												<label for="exampleFormControlSelect1">Função</label>
												<select name="funcao" class="form-control" id="exampleFormControlSelect1">
												  <option value="Motorista">Motorista</option>
												  <option value="Supervisor">Supervisor</option>
												  <option value="Cordenador">Coordenador</option>
												</select>
											  </div></br>
											
														
										
											
											
											<div class="form-group ">
											  <label for="inputEmail">Data de Vencimento da CNH</label>
											  <div class="">
												<input class="form-control" name="data_cnh" type="date" value="" id="example-date-input">
											  </div>
											</div></br>
											
											<div class="form-group">
                                                <label for="inputEmail">Foto da CNH</label>
                                                <input type="file" value="" required name="foto_cnh" class="form-control p-1">
                                            </div></br>
							
							
											<div class="form-group">
                                                <label for="inputEmail">Foto do Motorista (Opcional)</label>
                                                <input type="file" value="" required name="foto_perfil" class="form-control p-1">
                                            </div></br>
											
							
											
											
                                          
											<button type="submit" class="btn btn-primary">Cadastrar</button>
                                        </form>
                                    </div>
									
									
                                   
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end basic form  -->
                        <!-- ============================================================== -->
                </div>
            </div>
            