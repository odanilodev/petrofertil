
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
								<a href="<?= site_url('estoque') ?>"><button type="button" class="btn btn-secondary float-right">Voltar</button></div></a>
								
                                <h2 class="pageheader-title">Destinar <?= $produtos['nome'] ?></h2>
									
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
                                        <form enctype="multipart/form-data" action="<?= site_url('estoque/baixa_estoquep') ?>" method="post">
											
                                                
                                                <input type="hidden" value="<?= $produtos['id'] ?>" name="id" class="form-control" readonly>
                                           
											
                                                <input type="hidden" value="<?= $produtos['nome'] ?>" name="nome_produto" class="form-control" readonly>
                                           
											
                                             <div class="form-group">
												<label for="exampleFormControlSelect1">Funcionario</label>
												<select name="funcionario" class="form-control" id="exampleFormControlSelect1">
													
												<?php foreach($funcionarios as $f){ ?>	
												  
													<option value="<?= $f['nome'] ?>"><?= $f['nome'] ?></option>
												  
												<?php } ?>
													
												</select>
											  </div>
											
											
                                             <div class="form-group">
                                                <label for="inputEmail">Quantidade</label>
                                                <input type="number" value="" name="quantidade" class="form-control">
                                                
                                            </div>
											
											 <div class="form-group">
                                                <label for="inputEmail">Observação</label>
                                                <input type="text" value="" name="observacao" class="form-control">
                                                
                                            </div>
											
										
											
											
                                          
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
            