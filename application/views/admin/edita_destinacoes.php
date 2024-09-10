
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
								
                                <h2 class="pageheader-title">Editar Destinação</h2>
									
                                <div class="page-breadcrumb">

                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Estoque</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Destinações</li>
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
                                        <form enctype="multipart/form-data" action="<?= site_url('estoque/altera_destinacao') ?>" method="post">
											
											
                                                
                                                <input type="hidden" value="<?= $destinacao['id'] ?>" name="id" class="form-control" readonly>
                                           
											
                                            <div class="form-group">
                                                <label for="inputEmail">Nome do Funcionario</label>
                                                <input type="text" readonly value="<?= $destinacao['funcionario'] ?>" name="funcionario" class="form-control" >
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Quantidade</label>
                                                <input type="number" readonly value="<?= $destinacao['quantidade'] ?>" name="quantidade" class="form-control" >
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Produto</label>
                                                <input type="text" readonly value="<?= $destinacao['produto'] ?>" name="produto" class="form-control" >
                                                
                                            </div>
											
											
											
											
											<div class="form-group">
                                                <label for="inputEmail">Data de destinação</label>
                                                <input type="date" value="<?= $destinacao['data_destinacao'] ?>" name="data_destinacao" name="nome_antt" class="form-control" >
                                                
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
            