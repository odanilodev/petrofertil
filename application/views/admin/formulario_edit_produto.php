
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
								<a href="<?= site_url('produtos') ?>"><button type="button" class="btn btn-secondary float-right">Voltar</button></div></a>
								
                                <h2 class="pageheader-title">Cadastro de Produto</h2>
									
                                <div class="page-breadcrumb">

                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Estoque</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">PRODUTOS</li>
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
                                          
                                    
                                        <form enctype="multipart/form-data" action="<?= site_url('produtos/cadastra_produto') ?>" method="post">
                                                <input type="hidden" value="<?= $produto['id'] ?>" name="id" class="form-control" readonly>

                                            <div class="form-group">
                                                <label for="inputEmail">Data Pagamento</label>
                                                <input type="date" value="<?= $produto['data_pago'] ?>" name="data_pago" class="form-control" >
                                            </div>

                                            <div class="form-group">
                                                <label for="inputEmail">Setor responsavel</label> 
                                                <select name="setor" class="form-control">
                                                    <option selected>Selecione</option>
                                                    <option required value="Reciclagem">Reciclagem</option>
                                                    <option required value="Óleo">Óleo</option>
											    </select>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="inputEmail">Produto</label>
                                                <input type="text" value="<?= $produto['nome'] ?>" name="nome" class="form-control" >
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Quantidade</label>
                                                <input type="number" value="<?= $produto['quantidade'] ?>" name="quantidade"  class="form-control" >
                                                
                                            </div>

                                            <div class="form-group">
                                                <label for="inputEmail">Comprado de</label>
                                                <input type="number" value="<?= $produto['comprado'] ?>" name="comprado"  class="form-control" >
                                            </div>

                                            
                                            <div class="form-group">
                                                <label for="inputEmail">Valor total pago</label>
                                                <input type="text" value="<?= $produto['valor'] ?>" name="valor"  class="form-control valor" >
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Observacao</label>
                                                <input type="text" value="<?= $produto['observacao'] ?>" name="observacao"  class="form-control" >
                                                
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
            
            <script>

            $('.valor').mask('###0.00', {
                    reverse: true
            });

            </script>