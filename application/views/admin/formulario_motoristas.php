
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
                                                <input type="text" value="" name="nome" class="form-control" >
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Nome ANTT</label>
                                                <input type="text" value="" name="nome_antt" class="form-control" >
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Nome Conta</label>
                                                <input type="text" value="" name="nome_conta" class="form-control" >
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Agência</label>
                                                <input type="text" value="" name="agencia" class="form-control" >
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Conta</label>
                                                <input type="text" value="" name="conta" class="form-control" >
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">CPF</label>
                                                <input type="text" value="" name="cpf" class="form-control" >
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">ANTT</label>
                                                <input type="text" value="" name="antt" class="form-control" >
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Placa</label>
                                                <input type="text" value="" name="placa" class="form-control" >
                                                
                                            </div>
											
									<div class="form-group">
                                                <label for="inputEmail">Comprovante de Endereço</label>
                                                <input type="text" value="" name="comprovante" class="form-control p-1">
                                            </div>
											
											 <div class="form-group">
                                                <label for="inputEmail">Documento do Veículo</label>
                                                <input type="file" value="" required name="documento" class="form-control p-1">
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">CNH</label>
                                                <input type="file" value="" required name="cnh" class="form-control p-1">
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
            