
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
								<a href="<?= site_url('motoristas') ?>"><button type="button" class="btn btn-secondary float-right ">Voltar</button></a> 
								<a style="margin-left: 85%" href="<?= site_url('motoristas/deleta_motorista/').$motorista['id'] ?>"><button type="button" class="btn btn-danger">Deletar</button></div></a> 
								
								
								
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
											
											
                                                
                                                <input type="hidden" value="<?= $motorista['id'] ?>" name="id" class="form-control" readonly>
                                           
											
                                             <div class="form-group">
                                                <label for="inputEmail">Nome do Motorista</label>
                                                <input type="text" value="<?= $motorista['nome'] ?>" placeholder="Digite o nome do motorista" name="nome" class="form-control" >
                                                
                                            </div></br>
										
										  <div class="form-group">
											<label for="exampleFormControlSelect1">Carro</label>
											<select name="carro" class="form-control" id="exampleFormControlSelect1">
												
												 <option>Selecione</option>
												
												<?php echo $motorista['carro'] ?>
												
												
												<?php if(isset($motorista['carro'])){ ?>
												
												<option value='<?= $motorista['carro'] ?>' selected><?= $motorista['carro'] ?></option>
													
												
												
												<?php } foreach($veiculos as $v){ ?>
												
												
												
											  <option value="<?= $v['placa'] ?>"><?= $v['placa'] ?></option>
												<?php } ?>
											</select>
										  </div></br>
									
									 <div class="form-group">
                                                <label for="inputEmail">Telefone</label>
                                                <input type="text" value="<?= $motorista['telefone'] ?>" placeholder="Digite o telefone celular" name="telefone" class="form-control" >
                                                
                                            </div></br>
											
											<div class="form-group">
												<label for="exampleFormControlSelect1">Função</label>
												<select name="funcao" class="form-control" id="exampleFormControlSelect1">
												  <option <?= ($motorista['funcao'] == 'motorista' ? 'selected' : '') ?>  value="motorista">Motorista</option>
												  <option <?= ($motorista['funcao'] == 'supervisor' ? 'selected' : '') ?> value="supervisor">Supervisor</option>
												  <option <?= ($motorista['funcao'] == 'coordenador' ? 'selected' : '') ?> value="coordenador">Coordenador</option>
												</select>
											  </div></br>
											
														
										
											
											
											<div class="form-group ">
											  <label for="inputEmail">Data de Vencimento da CNH</label>
											  <div class="">
												<input class="form-control" name="data_cnh" type="date" value="<?= $motorista['data_cnh'] ?>" id="example-date-input">
											  </div>
											</div></br>
											
											<div class="form-group">
                                                <label for="inputEmail">Foto da CNH</label>
                                                <input type="file" value="" name="foto_cnh" class="form-control p-1">
                                            </div></br>
							
							
											<div class="form-group">
                                                <label for="inputEmail">Foto do Motorista (Opcional)</label>
                                                <input type="file" value="" name="foto_perfil" class="form-control p-1">
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
            