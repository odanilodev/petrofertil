
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
									
								<a href="<?= site_url('Clientes_petro/formulario_cliente/').$cliente['id'] ?>"><button type="button" class="btn btn-warning float-right">Editar</button></a>
								
								<a href="<?= site_url('admin_petro/inicio') ?>"><button type="button" class="btn btn-primary float-right">Voltar</button></a>
								
									
								</div>
								
								
                                <h2 class="pageheader-title">Cadastrar Cliente</h2>
									
                                <div class="page-breadcrumb">

                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Clientes</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Cadastro de Clientes</li>
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
                                        <form enctype="multipart/form-data" action="<?= site_url('clientes_petro/cadastra_cliente') ?>" method="post">
                                            <div class="form-group">
												<input id="inputText3" value="" name="id" type="hidden" class="form-control">
												
                                                <label for="inputText3" class="col-form-label">Nome do Cliente</label>
                                                <input id="inputText3" value="<?= $cliente['nome'] ?>" name="nome" type="text" class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">CNPJ</label>
                                                <input type="text" value="<?= $cliente['cnpj'] ?>" name="cnpj" class="form-control" readonly>
                                                
                                            </div>
											
											 <div class="form-group">
                                                <label for="inputEmail">Inscrição Estadual</label>
                                                <input type="text" value="<?= $cliente['inscricao'] ?>" name="inscricao" class="form-control" readonly>
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Estado</label>
                                                <input type="text" value="<?= $cliente['estado'] ?>" name="estado" class="form-control" readonly>
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Cidade</label>
                                                <input type="text" value="<?= $cliente['cidade'] ?>" name="cidade" class="form-control" readonly>
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Bairro</label>
                                                <input type="text" value="<?= $cliente['bairro'] ?>" name="bairro" class="form-control" readonly>
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Endereço</label>
                                                <input type="text" value="<?= $cliente['endereco'] ?>" name="endereco" class="form-control" readonly>
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Nome para contato</label>
                                                <input type="text" value="<?= $cliente['contato'] ?>" name="contato" class="form-control" readonly>
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Telefone</label>
                                                <input type="text" value="<?= $cliente['telefone'] ?>" name="telefone" class="form-control" readonly>
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Localização</label>
                                                <input type="text" value="<?= $cliente['localizacao'] ?>" name="telefone" class="form-control" readonly>
                                                
                                            </div>
											
											<div class="row">
											<div class="form-group col-md-6">
                                                <label for="exampleFormControlSelect1">Tipo Anexo</label>
													<select name="tipo_anexo" class="form-control" id="exampleFormControlSelect1">
													  
													  <option value=""><?= $cliente['tipo_anexo'] ?></option>
													</select>
                                            </div>
											<div style="margin-top: 3%" class="form-group col-md-6">
												<a href="<?= site_url('Clientes_petro/download_arquivo/').$cliente['id'] ?>"><label for="exampleFormControlSelect1">Baixar Anexo</label>
                                                <i class="fas fa-eye"></i></a>
                                            </div>
											
											</div>
											
                                          
											
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
            