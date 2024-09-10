
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
								<a href=""><button type="button" class="btn btn-secondary float-right">Voltar</button></div></a>
								
                                <h2 class="pageheader-title">Lançamento de Combustivel</h2>
									
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
                                        <form enctype="multipart/form-data" action="<?= site_url('combustivel/inserir_combustivel') ?>" method="post">
											
                                                
                                                <input type="hidden" value="" name="" class="form-control" readonly>
                                           
											
                                             <div class="form-group">
                                                <label for="inputEmail">Veículo Abastecido</label>
                                                <input readonly type="text" value="<?= $placa ?>" name="carro" class="form-control">
                                                
                                            </div>
											
										
											
											<div class="form-group">
                                                <label for="inputEmail">Valor</label>
                                                <input id="valor" placeholder="" type="text" step="0.01" value="" name="valor" class="form-control valor">	 
                                                
                                            </div>
											
											 <div class="form-group">
                                                <label for="inputEmail">Quantidade Abastecida em Litros</label>
                                                <input type="text" value="" name="litragem" class="form-control">
                                                
                                            </div>
											
											
											<div class="form-group">
                                                <label for="inputEmail">Quilometragem do abastecimento</label>
                                                <input type="text" value="" name="km" class="form-control">
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Data do abastecimento</label>
                                                <input type="date" value="" name="data" class="form-control">
                                                
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
            