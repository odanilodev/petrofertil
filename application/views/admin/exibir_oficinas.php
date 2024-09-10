
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
									<a href="<?= site_url('oficinas/formulario_oficinas') ?>"><button type="button" class="btn btn-success float-right">Novo</button></div></a>
								
                                <h2 class="pageheader-title">Exibir Oficinas</h2>
									
                                <div class="page-breadcrumb">

                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Veículos</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Exibir Oficinas</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
         
					
					     <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Tabela de oficinas</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped first" id="minhaTabela1" >
                                        <thead>
                                            <tr align="center">
                                                     <th scope="col">#</th>
                                                    <th scope="col">Oficinas</th>
													<th scope="col">Nome</th>
                                                    <th scope="col">Endereço</th>
                                                    <th scope="col">Telefone</th>
													<th scope="col">Editar</th>
													<th scope="col">Excluir</th>
                                                </tr>
                                        </thead>
                                        <tbody>
											
										
											
										
											
										<?php $contador = 1; foreach($oficinas as $o){ ?>	
                                                <tr>
                                                    <th scope="row"><?= $contador ?></th>
                                                    <td><?= $o['nome'] ?></td>
													<td><?= $o['contato'] ?></td>
                                                    <td><?= $o['endereco'] ?></td>
                                                    <td><?= $o['telefone'] ?></td>
													<td align="center"><a href="<?= site_url('Oficinas/formulario_oficinas/').$o['id'] ?>"><i class=" fas fa-pencil-alt"></i></a></td>
													<td align="center"><a href="<?= site_url('Oficinas/deleta_oficina/').$o['id'] ?>"><i class="fas fa-trash-alt"></i></td>
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
               
					
					
					
                </div>
            </div>
            