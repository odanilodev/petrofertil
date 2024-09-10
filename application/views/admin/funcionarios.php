
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
								
									<a href="<?= site_url('funcionarios/formulario_funcionarios') ?>"><button type="button" class="btn btn-success float-right">Cadastrar Novo Funcionario</button></div></a>
							
                            <h2 class="pageheader-title">Funcionarios Petroecol</h2>
                  
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Petroecol</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Funcionarios</li>
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
                            <h5 class="card-header">Tabela de Funcionarios</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped first" id="minhaTabela1" >
                                        <thead>
                                            <tr align="center">
                                                    
													<th scope="col">Nome</th>
                                                    <th scope="col">Cargo</th>
													<th scope="col">Editar</th>
													<th scope="col">Excluir</th>
                                                </tr>
                                        </thead>
                                        <tbody>
											
                                                
                                                  
												<?php  foreach($funcionarios as $f){ ?>
											
													<tr align="center">
													
                                                    <td><?= $f['nome'] ?></td>
                                                    <td><?= $f['cargo'] ?></td>
													<td align="center"><a href="<?= site_url('funcionarios/edita_funcionario/').$f['id'] ?>"><i class=" fas fa-pencil-alt"></i></a></td>
													<td align="center"><a href="<?= site_url('funcionarios/deleta_funcionario/').$f['id'] ?>"><i class="fas fa-trash-alt"></i></td>
														
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
			
		
			
			
			
			
			
			
  
           