
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
								<a href="<?= site_url('Fornecedores') ?>"><button type="button" class="btn btn-secondary float-right">Voltar</button></div></a>
								
                                <h2 class="pageheader-title">Cadastrar Fornecedor</h2>
									
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
                                        <form enctype="multipart/form-data" action="<?= site_url('Fornecedores/cadastra_fornecedor') ?>" method="post">
                                            <div class="form-group">
												<input id="inputText3" value="<?= $fornecedor['id'] ?>" name="id" type="hidden" class="form-control">
												
                                                <label for="inputText3" class="col-form-label">Nome do fornecedor</label>
                                                <input id="inputText3" value="<?= $fornecedor['nome'] ?>" name="nome" type="text" class="form-control">
                                            </div>
											
											 <div class="form-group">
                                                <label for="inputEmail">Nome do contato</label>
                                                <input type="text" value="<?= $fornecedor['contato'] ?>" name="contato" class="form-control">
                                                
                                            </div>
											
											 <div class="form-group">
                                                <label for="inputEmail">Categoria</label>
                                                <input type="text" value="<?= $fornecedor['categoria'] ?>" name="categoria" class="form-control">
                                                
                                            </div>
											
											 <div class="form-group">
                                                <label for="inputEmail">CNPJ</label>
                                                <input type="text" value="<?= $fornecedor['cnpj'] ?>" name="cnpj" class="form-control">
                                                
                                            </div>
											
                                            <div class="form-group">
                                                <label for="inputEmail">Endereço</label>
                                                <input type="text" value="<?= $fornecedor['endereco'] ?>" name="endereco" class="form-control">
                                                
                                            </div>
											
											 <div class="form-group">
                                                <label for="inputEmail">Telefone</label>
                                                <input type="text" value="<?= $fornecedor['telefone'] ?>" name="telefone" class="form-control">
                                                
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
            