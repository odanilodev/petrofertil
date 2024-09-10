
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
								
                                <h2 class="pageheader-title">Cadastro de EPI</h2>
									
                                <div class="page-breadcrumb">

                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Estoque</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">EPIS´S</li>
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
                                        <form enctype="multipart/form-data" action="<?= site_url('epis/cadastra_epi') ?>" method="post">
											
											
                                                
                                                <input type="hidden" value="<?= $epi['id'] ?>" name="id" class="form-control" readonly>
                                           
											
                                             <div class="form-group">
                                                <label for="inputEmail">EPI</label>
                                                <input type="text" value="<?= $epi['nome'] ?>" name="nome" class="form-control" >
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">CA</label>
                                                <input type="text" value="<?= $epi['ca'] ?>" name="ca" class="form-control" >
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Quantidade</label>
                                                <input type="text" value="<?= $epi['quantidade'] ?>" name="quantidade"  class="form-control" >
                                                
                                            </div>
											
											
												<div class="form-group">
                                                <label for="inputEmail">Observação</label>
                                                <input type="text" value="<?= $epi['observacao'] ?>" name="observacao"  class="form-control" >
                                                
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
            