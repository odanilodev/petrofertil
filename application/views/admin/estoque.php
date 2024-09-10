
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
								
									<a href="<?= site_url('Estoque/formulario_destinacoes') ?>"><button type="button" class="btn btn-success float-right">Novo</button></div></a>
							
                            <h2 class="pageheader-title">Controle de Estoque</h2>
                  
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Petroecol</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Estoque</li>
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
					<div class="container">
						<div align="center" class="col-md-12">
							<a href="<?= site_url('funcionarios'); ?>" class="btn btn-primary btn-lg active col-md-2 mr-5" role="button" aria-pressed="true"><p><i style="font-size: 42px" class="fa fa-user-circle" aria-hidden="true"></i></p><p>FUNCIONARIOS</p></a>
							
							<a href="<?= site_url('epis'); ?>" class="btn btn-warning btn-lg active col-md-2 mr-5" role="button" aria-pressed="true"><p><i style="font-size: 42px" class="fa fa-exclamation-triangle" aria-hidden="true"></i></p><p>EPI´S</p></a>
							
							<a href="<?= site_url('produtos'); ?>" class="btn btn-info btn-lg active col-md-2 mr-5" role="button" aria-pressed="true"><p><i style="font-size: 42px" class="fa fa-cubes" aria-hidden="true"></i></p><p>PRODUTOS</p></a>
						
							<a href="https://trello.com/b/1vTNCRAN/enzo" target="_blank" class="btn btn-success btn-lg active col-md-2 mr-5" role="button" aria-pressed="true"><p><i style="font-size: 42px" class="fa fa-user-circle" aria-hidden="true"></i></p><p>PEDIDOS GERAIS</p></a>
							
							
						</div>
					</div>
				</div>
				
		
				
				</br> <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Histórico de Destinações</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped first" id="minhaTabela1" >
                                        <thead>
                                            <tr align="center">
                                                   
													<th scope="col">#</th>
													<th scope="col">Data</th>
													<th scope="col">Funcionario</th>
													<th scope="col">Quantidade</th>
                                                    <th scope="col">Produto</th>
													<th scope="col">Observação</th>
													<th scope="col">Editar</th>
													<th scope="col">Excluir</th>
                                                </tr>
                                        </thead>
                                        <tbody>
											
									
                                   			<?php $numero = 1; foreach($destinacoes as $d){ ?>
											
                                                <tr align="center">
                                                  
													<td><?= $numero ?></td>
													<td><?= date("d/m/Y", strtotime($d['data_destinacao'])); ?></td>
													<td><?= $d['funcionario'] ?></td>
													<td><?= $d['quantidade'] ?></td>
													<td><?= $d['produto'] ?></td>
													<td><?= $d['observacao'] ?></td>
													
													<td><a href="<?= site_url('estoque/edita_destinacao/').$d['id'] ?>" ><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
													</td>
													
														<td><a href="<?= site_url('estoque/deleta_destinacao/').$d['id'] ?>"><i class="fas fa-trash"></i></a>
													</td>
														
														
                                                </tr>
											
                                            <?php $numero++; } ?> 
                                      
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
			
		
			
			
			
			
			
			
  
           