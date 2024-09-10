
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
								<a href="<?= site_url('veiculos') ?>"><button type="button" class="btn btn-secondary float-right">Voltar</button></div></a>
								
                                <h2 class="pageheader-title">Cadastrar Lembrete de Manutenção</h2>
									
                                <div class="page-breadcrumb">

                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Lembrete</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Cadastro de Lembrete</li>
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
                                        <form enctype="multipart/form-data" action="<?= site_url('lembretes/cadastra') ?>" method="post">
                                            <div class="form-group">
												<input id="inputText3" value="" name="id" type="hidden" class="form-control">
												
												 <label for="inputText3" class="col-form-label">Veiculo</label>
                                             <select name="veiculo" class="form-control">
												<option>Selecione</option>
												 
												<?php foreach($carros as $c){ ?> 
												 
												<option value="<?= $c['placa'] ?>"><?= $c['placa'] ?></option>
												
												 <?php } ?>
											</select></br>
												
                                                <label for="inputText3" class="col-form-label">Título</label>
                                                <input id="inputText3" value="" name="titulo" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Descrição</label>
                                                <input type="text" value="" name="descricao" class="form-control">
                                                
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
            