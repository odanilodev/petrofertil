
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
								<a href="<?= site_url('Equipamentos/exibir_equipamentos') ?>"><button type="button" class="btn btn-secondary float-right">Voltar</button></div></a>
								
                                <h2 class="pageheader-title">Cadastrar Equipamento</h2>
									
                                <div class="page-breadcrumb">

                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Equipamentos</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Cadastro de Equipamentos</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
					
					

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          
                            <div class="card">
                               
                                 <div class="card-body">
                                    <form enctype="multipart/form-data" action="<?=  site_url('Equipamentos/cadastrar_equipamento') ?>" method="post">
                                        <div class="form-group">
											<input id="inputText3" value="" name="id" type="hidden" class="form-control">
												
                                        </div>

										 <div class="form-group">
                                            <label for="inputEmail">Nome do Equipamento</label>
                                            <input type="text" value="" name="nome" class="form-control">
                                                
                                        </div>
                                                
										<button type="submit" class="btn btn-primary">Cadastrar </button>
                                    </form>
                                </div>
								 
                            </div>

                         </div>
                    </div>


					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
					
                      
                </div>
            </div>
         