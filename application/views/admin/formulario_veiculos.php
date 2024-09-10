
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
								<a href="<?= site_url('veiculos') ?>"><button type="button" class="btn btn-secondary float-right">Voltar</button></a>
								<a href="<?= site_url('veiculos/deleta_veiculo/').$veiculo['id'] ?>"><button type="button" class="btn  btn-danger mr-4 float-right">Deletar</button></div></a>
								
                                <h2 class="pageheader-title">Cadastrar Veículo</h2>
									
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
                                        <form enctype="multipart/form-data" action="<?= site_url('veiculos/cadastra_veiculos') ?>" method="post">
                                            <div class="form-group">
												<input id="inputText3" value="<?= $veiculo['id'] ?>" name="id" type="hidden" class="form-control">
												
                                                <label for="inputText3" class="col-form-label">Nome/Modelo do Veículo</label>
                                                <input id="inputText3" value="<?= $veiculo['modelo'] ?>" name="modelo" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Placa</label>
                                                <input type="text" value="<?= $veiculo['placa'] ?>" name="placa" class="form-control">
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Litros</label>
                                                <input type="text" value="<?= $veiculo['litros'] ?>" name="litros" class="form-control">
                                                
                                            </div>
                                            
                                             <label for="inputPassword">Foto do Veículo</label>
                                            <div class="custom-file mb-3">
												
                                                 <input type="file" name="arquivo" <?php if($veiculo['arquivo'] == ""){echo "required";}?> class="form-control-file" id="exampleFormControlFile1">
                                            </div>
                                            
											
                                             <label for="inputPassword">Documento do Veículo</label>
                                            <div class="custom-file mb-3">
												
												
												
                                                 <input <?php if($veiculo['documento'] == ""){echo "required";}?> type="file" name="documento" class="form-control-file" id="exampleFormControlFile1">
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
            