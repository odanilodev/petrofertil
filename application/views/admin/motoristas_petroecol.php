
 <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
							
								<div class="pb-2"> 
								
									<a href="<?= site_url('Motoristas/formulario_motoristas') ?>"><button type="button" class="btn btn-success float-right">Cadastrar Novo Motorista</button></div></a>
							
                            <h2 class="pageheader-title">Motoristas</h2>
                  
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Petrofertil</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Motoristas</li>
                                    </ol>
                                </nav>
								
						
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
				
				
				
         <div class="row">
			 <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- card influencer one -->
                            <!-- ============================================================== -->
				 
				 
				 			<?php foreach($motoristas as $m){  ?>
				 
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
										
                                        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="user-avatar float-xl-left pr-4 float-none">
                                                <img src="<?= base_url('uploads/foto_motoristas/').$m['foto_perfil'] ?>" alt="User Avatar" class="rounded-circle user-avatar-xl">
                                                    </div>
                                                <div class="pl-xl-3">
                                                    <div class="m-b-0">
                                                        <div class="user-avatar-name d-inline-block">
                                                            <h2 class="font-24 m-b-10"><?= $m['nome'] ?></h2>
                                                        </div>
                                                        <div class="rating-star d-inline-block pl-xl-2 mb-2 mb-xl-0">
                                                            <i class="fa fa-fw fa-star"></i>
                                                            <i class="fa fa-fw fa-star"></i>
                                                            <i class="fa fa-fw fa-star"></i>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="user-avatar-address">
                                                        <p class="mb-2"><i class="fa fa-car mr-2  text-primary"></i><?= $m['funcao'] ?> <span class="m-l-10">Carro Oficial: <?= $m['carro'] ?><span class="m-l-20">
                                                        </p>
                                                       
                                                    </div>
                                                </div>
                                            </div>
											
											
											
                                            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="float-xl-right float-none mt-xl-0 mt-4">
                                                    <a href="<?= site_url('Motoristas/edita_motorista/').$m['id'] ?>" class="btn-wishlist m-r-5"><i class="fa fa-id-badge" aria-hidden="true"></i></a>	 
													  <a href="<?= site_url('Motoristas/download_cnh/').$m['foto_cnh'] ?>" class="btn-wishlist m-r-5"><i class="fas fa-id-card"></i></a> 	
                                                    <a href="<?= 'https://api.whatsapp.com/send?phone=55'.$m['telefone'] ?>" target="_blank" class="btn btn-secondary">Mensagem</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
								
								<?php  }  ?>
								

                                <!-- ============================================================== -->
                                <!-- end card influencer one -->
                                <!-- ============================================================== -->
								
								<?php 
								
								$today = date("m.d.y");
								
								$data_atual = strtotime($today); 
								
								?>
								
							

                            </div>
				 
				          <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="card">
                                    
                                    <div class="card-body border-top">
                                        <h3 class="font-16">CNH Vencidas</h3>
                                       
										<?php  foreach($motoristas as $v){ 
										
										$data_aviso = strtotime($v['data_cnh']); 
										
										?>
										
											
										<?php if($data_aviso < $data_atual){echo "<p><i class='fa fa-window-close' aria-hidden='true'></i> ".$v['nome'];} ?></p>
										
										<?php } ?>
										
                                    </div>
									
									
									 <div class="card-body border-top">
                                        <h3 class="font-16">Multas Pendentes</h3>
                                       
										<p>Função em Desenvolvimento</p>
                                    </div>
                             
                             
                                    
                                </div>
                            </div>
				 
				</div>
				

            </div>
			
		
			
			
			
			
			
			
  
           