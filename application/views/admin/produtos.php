
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
								
									<a href="<?= site_url('Produtos/formulario_produto') ?>"><button type="button" class="btn btn-success float-right">Cadastrar Novo Produto</button></div></a>
							
                            <h2 class="pageheader-title">Estoque de Produtos</h2>
                  
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Estoque</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Produtos</li>
                                    </ol>
                                </nav>
								
						
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
				
				<?php if(isset($aviso)){ ?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Atenção!</strong> A quantidade solicitada não está disponível no estoque
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>
				<?php }?>
				
					     <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Tabela de Produtos</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped first" id="minhaTabela1">
                                        <thead>
											
                                            <tr align="center">
                                                    <th scope="col">#</th>
                                                    <th scope="col">Data cadastro</th>
													<th scope="col">Produto</th>
                                                    <th scope="col">Fornecedor</th>
													<th scope="col">Observação</th>
													<th scope="col">Quantidade</th>
													<th scope="col">Destinação</th>
													<!-- <th scope="col">Editar</th> -->
													<th scope="col">Excluir</th>
                                             </tr>
											
                                        </thead>
                                        <tbody>
											
                                                
                                        <?php $count = 1; foreach($produtos as $e){ ?>  												
											
													<tr align="center">
                                                    <td><?= $count ?></td>
                                                    <td><?= date("d/m/Y", strtotime($e['data_cadastro'])); ?></td>
                                                    <td><?= $e['nome'] ?></td>
                                                    <td><?= $e['comprado'] ?></td>
													<td><?= $e['observacao'] ?></td>
                                                    <td><?= $e['quantidade'] ?></td>
													<td align="center"><a href="<?= site_url('estoque/formulario_destinacoesp/').$e['id'] ?>"><i class="fa fa-arrow-circle-up"></i></a></td>
													<!-- <td align="center"><a href="<?php site_url('produtos/edita_produto/').$e['id'] ?>"><i class=" fas fa-pencil-alt"></i></a></td> -->
													<td align="center"><a href="<?= site_url('produtos/deleta_produto/').$e['id'] ?>"><i class="fas fa-trash-alt"></i></td>
														
													</tr>
											
                                           
										<?php $count++; } ?>	
                                               
                                      
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
			
		
			
			
			
			
			
			
  
           