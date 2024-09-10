
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
								
									<a href="<?= site_url('Motoristas_petro/formulario_motoristas') ?>"><button type="button" class="btn btn-success float-right">Novo</button></div></a>
							
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
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Tabela de Motoristas</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped first" id="minhaTabela1" >
                                        <thead>
                                            <tr align="center">
                                                <th>Nome</th>
                                                <th>Placa</th>
												<th>Ver Mais</th>
												<th>Excluir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
									
											
											
										<?php foreach($motoristas as $m){ ?>
                                   			<tr align="center">
                                                <td><?= $m['nome']; ?></td>
                                                <td><?= $m['placa']; ?></td>
                                                
												<td><a href="<?= site_url('Motoristas_petro/ver_motorista/').$m['id'] ?>"><i class="fas fa-eye"></i></a></td>
												<td><a href="<?= site_url('Motoristas_petro/deleta_motorista/').$m['id'] ?>"><i class="fas fa-trash"></i></a></td>
												
                                            </tr>
                                         <?php } ?>  
                                      
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
			
		
			
			
			
			
			
			
  
           