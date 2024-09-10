
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
								<a href="<?= site_url('destinacao_petro/inicio/').$cliente['id'] ?>"><button type="button" class="btn btn-secondary float-right">Voltar</button></div></a>
								
                                <h2 class="pageheader-title">Formulário de Destinação</h2>
									
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
                                        <form enctype="multipart/form-data" action="<?= site_url('Destinacao_petro/cadastra_destinacao/').$cliente['id'] ?>" method="post">
											
											
                                                
                                                <input type="hidden" value="<?= $cliente['id'] ?>" name="id_cliente" class="form-control" readonly>
                                           
											
                                             <div class="form-group">
                                                <label for="inputEmail">Cliente</label>
                                                <input type="text" value="<?= $cliente['nome'] ?>" name="cliente" class="form-control" readonly>
                                                
                                            </div>
											
                                            <div class="form-group">
                                                <label for="inputEmail">Quantidade (NF)</label>
                                                <input type="text" value="" name="quantidade" class="form-control">
                                                
                                            </div>
											
											 <div class="form-group">
                                                <label for="inputEmail">Quantidade (Balança)</label>
                                                <input type="text" value="" name="balanca" class="form-control">
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Quantidade de Plástico</label>
                                                <input type="text" value="" name="plastico" class="form-control">
                                                
                                            </div>
											
											
											<div class="form-group">
                                                <label for="inputEmail">Quantidade de Ráfia</label>
                                                <input type="text" value="" name="rafia" class="form-control">
                                                
                                            </div>
											
											
											<div class="form-group">
                                                <label for="inputEmail">Nota</label>
                                                <input type="text" value="" required name="nota" class="form-control">
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">N° MTR</label>
                                                <input type="text" value="" name="mtr" class="form-control">
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Data da destinação</label>
                                                <input type="date" value="" name="data" class="form-control">
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Valor do frete</label>
                                                <input type="text" value="" name="valor_frete" class="form-control valor">
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Valor Agenciador</label>
                                                <input type="text" value="" name="valor_agenciador" class="form-control valor">
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Valor do produto</label>
                                                <input type="text" value="" name="valor_produto" class="form-control valor">
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Valor Manifesto</label>
                                                <input type="text" value="" name="valor_manifesto" class="form-control valor">
                                            </div>	
											
											<div class="form-group">
                                                <label for="inputEmail">Observação</label>
                                                <input type="text" value="" name="observacao" class="form-control ">
                                            </div>
											
											
											
										
											<div class="form-group ">
                                                <label for="exampleFormControlSelect1">Gera Custo?</label>
													<select name="custo" class="form-control" id="exampleFormControlSelect1">
													  <option>Selecione</option>
													  <option value="SIM">SIM</option>
													  <option value="NÃO">NÃO</option>
													</select>
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
            