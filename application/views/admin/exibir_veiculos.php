
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
									<a href="<?= site_url('veiculos/formulario_veiculos') ?>"><button type="button" class="btn btn-success float-right">Novo</button></div></a>
								
                                <h2 class="pageheader-title">Exibir Veículos</h2>
									
                                <div class="page-breadcrumb">

                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Veículos</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Exibir Veículos</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                        <div class="row">							
						
						<?php foreach($carros as $c){ ?>
	
							 <div class="col-xl-3 col-lg-6 col-md-4 col-sm-12 col-12">
                              <div class="card" align="center" style="width: 16rem;">
								  <img class="card-img-top img-fluid" style="" src="<?= base_url('uploads')."/".$c['arquivo'] ?>" alt="Imagem de capa do card">
								  <div class="card-body">
									<h5 class="card-title">Modelo: <?= $c['modelo'] ?></h5>
									<p class="card-text">PLaca: <?= $c['placa'] ?></p>
									  <a href="<?= site_url('Veiculos/download_documento/').$c['id'] ?>" class="btn btn-dark"><i class="fas fa-file-alt"></i></a>
									<a href="<?= site_url('manutencoes/detalhe_veiculo').'/'.$c['placa']?>" class="btn btn-info"><i class=" fas fa-eye"></i></a>
									<a href="<?= site_url('combustivel/exibir_combustivel/').$c['placa']?>" class="btn btn-warning"><i class="fas fa-car"></i></a>
									<a href="<?= site_url('veiculos/formulario_veiculos').'/'.$c['id']?>" class="btn btn-primary"><i class=" fas fa-pencil-alt"></i></a>
									  
								  </div>
								</div>	
                            </div>
                          <?php } ?> 

                        </div>
						
                       
                    </div>
                </div>
            </div>
            