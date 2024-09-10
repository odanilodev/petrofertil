
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
                                        <form enctype="multipart/form-data" action="<?= site_url('motoristas_petro/cadastra_motorista') ?>" method="post">
											
											
                                                
                                                <input type="hidden" value="" name="id_cliente" class="form-control" readonly>
                                           
											
                                             <div class="form-group">
                                                <label for="inputEmail">Nome do Motorista</label>
                                                <input type="text" readonly="readonly" value="<?= $motorista['nome'] ?>" name="nome" class="form-control" >
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Nome ANTT</label>
                                                <input type="text" readonly="readonly" value="<?= $motorista['nome_antt'] ?>" name="nome_antt" class="form-control" >
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Nome Conta</label>
                                                <input type="text" readonly="readonly" value="<?= $motorista['nome_conta'] ?>" name="nome_conta" class="form-control" >
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Agência</label>
                                                <input type="text" readonly="readonly" value="<?= $motorista['agencia'] ?>" name="agencia" class="form-control" >
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Conta</label>
                                                <input type="text" readonly="readonly" value="<?= $motorista['conta'] ?>" name="conta" class="form-control" >
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">CPF</label>
                                                <input type="text" readonly="readonly" value="<?= $motorista['cpf'] ?>" name="cpf" class="form-control" >
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">ANTT</label>
                                                <input type="text" readonly="readonly" value="<?= $motorista['antt'] ?>" name="antt" class="form-control" >
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Placa</label>
                                                <input type="text" readonly="readonly" value="<?= $motorista['placa'] ?>" name="placa" class="form-control" >
                                                
                                            </div>
											
									<div class="form-group">
                                                <label for="inputEmail">Comprovante de Endereço</label>
                                                <input type="text" readonly="readonly" value="<?= $motorista['comprovante'] ?>" name="comprovante" class="form-control p-1">
                                            </div>
											
											 
										<a http-equiv="content-type" content="text/html; charset=utf-8"  href="<?= base_url('Motoristas_petro/download_documento/').$motorista['documento'] ?>">
											<div class="form-group">
												
                                             <label for="inputEmail">Documento do Veículo <i class="fas fa-cloud-download-alt"></i></label>
                                               
                                            </div>
										</a>
											
											<a http-equiv="content-type" content="text/html; charset=utf-8"  href="<?= base_url('Motoristas_petro/download_cnh/').$motorista['cnh'] ?>">
											<div class="form-group">
												
                                             <label for="inputEmail">CNH <i class="fas fa-cloud-download-alt"></i></label>
                                               
                                            </div>
										</a>
											
										
											
											
											
										
											
											
                                          
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
            