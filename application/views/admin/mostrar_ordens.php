	
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
									
							
                            <h2 class="pageheader-title">Ordens de Serviço</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Exibir ordens de serviço</a></li>
                                        
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
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Tabela Ordens de Serviço</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped first" id="minhaTabela1" >
                                        <thead>
                                            <tr align="center">
												<th>#</th>
                                                <th>Data</th>
                                                <th>Placa</th>
                                                <th>Oficina</th>
                                                <th>Reclamação</th>
												<th>Ordem</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
											
										<?php  $c = 1;  foreach($ordens as $m){ ?>
											
										
											
											
                                   			<tr align="center">
												<td><?= $c ?></td>
                                                <td><?=  date("d/m/Y", strtotime($m['data_reclamacao'])); ?></td>
                                                <td><?= $m['placa'] ?></td>
                                                <td><?= $m['oficina'] ?></td>
                                                <td><?= $m['reclamacao'] ?></td>
												<td><a href="<?= site_url('Ordem_servico/rever_ordem/'.$m['codigo']) ?>"><?= $m['codigo'] ?></a></td>
                                               
                                            </tr>
                                            
                                         <?php $c++;  } ?>  
                                      
                                        </tbody>
                                       
                                    </table>
                                </div>
								</div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div>
               
               
            </div>
			
			
  
           