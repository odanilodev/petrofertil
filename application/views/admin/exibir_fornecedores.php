
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
									<a href="<?= site_url('Fornecedores/formulario_fornecedores') ?>"><button type="button" class="btn btn-success float-right">Novo</button></div></a>
								
                                <h2 class="pageheader-title">Exibir Fornecedores</h2>
									
                                <div class="page-breadcrumb">

                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Veículos</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Exibir Fornecedores</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                 
					     <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Basic Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped first" id="minhaTabela1" >
                                        <thead>
                                            <tr align="center">
                                                    <th scope="col">#</th>
                                                    <th scope="col">Fornecedor</th>
													<th scope="col">Contato</th>
													<th scope="col">Categoria</th>
                                                    <th scope="col">Endereço</th>
                                                    <th scope="col">Telefone</th>
													<th scope="col">CNPJ</th>
													<th scope="col">Editar</th>
													<th scope="col">Excluir</th>
                                                </tr>
                                        </thead>
                                        <tbody>
											
										
											
										
											
											
                                   			<?php $contador = 1; foreach($fornecedores as $f){ ?>	
                                                <tr align="center">
                                                    <th scope="row"><?= $contador ?></th>
                                                    <td><?= $f['nome'] ?></td>
													<td><?= $f['contato'] ?></td>
													<td><?= $f['categoria'] ?></td>
                                                    <td><?= $f['endereco'] ?></td>
                                                    <td><?= $f['telefone'] ?></td>
													 <td><?= $f['cnpj'] ?></td>
													<td><a href="<?= site_url('Fornecedores/formulario_fornecedores/').$f['id'] ?>"><i class=" fas fa-pencil-alt"></i></a></td>
													
														
												<td><a data-toggle="modal"  data-target="#exampleModal3" data-pegaid="<?= $f['id'] ?>"><i class="fas fa-trash"></i></a>
												</td>
														
														
                                                </tr>
                                              <?php $contador++; } ?> 
                                      
                                      
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
               
					
					
			<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				 <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Deletar Fornecedor?</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
							Tem certeza que deseja excluir este fornecedor permanentemente?
						</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
								<a class="link_id" href="#"><button type="button" class="btn btn-danger"> Deletar</button></a>
							</div>
					</div>
				</div>
			</div>
			
		
					
					
					
                </div>
            </div>
            