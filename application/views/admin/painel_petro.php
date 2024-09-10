
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
								
									<a href="<?= site_url('Clientes_petro/formulario_cliente') ?>"><button type="button" class="btn btn-success float-right">Novo</button></div></a>
							
                            <h2 class="pageheader-title">Clientes</h2>
                  
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Destinação de Resíduos</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Clientes</li>
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
                            <h5 class="card-header">Tabela de Clientes</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped first" id="minhaTabela1" >
                                        <thead>
                                            <tr align="center">
                                                <th>Nome</th>
                                                <th>CNPJ</th>
                                                <th>Cidade</th>
                                                <th>Contato</th>
												<th>Destinações</th>
												<th>Ver Mais</th>
												<th>Excluir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
									
											
											<?php foreach($clientes as $c){ ?>
											
                                   			<tr align="center">
                                                <td><?= $c['nome'] ?></td>
                                                <td><?= $c['cnpj'] ?></td>
                                                <td><?= $c['cidade'] ?></td>
                                                <td><?= $c['contato'] ?></td>
												
												<td><a href="<?= site_url('destinacao_petro/inicio/').$c['id'] ?>"><i class="fas fa-file"></i></a></td>
												
												<td><a href="<?= site_url('clientes_petro/ver_cliente/').$c['id'] ?>"><i class="fas fa-eye"></i></a></td>
												
												<td><a data-toggle="modal"  data-target="#exampleModal2" data-pegaid="<?= $c['id'] ?>"><i class="fas fa-trash"></i></a>
												</td>
												
					
                                            </tr>
                                            
											
											
											
                                           <? } ?>
                                      
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
			
		<?php /*?><div class="container-fluid">
			
			<div class="row">
				
				
			<?php foreach($clientes as $a){ ?>	
				
				<div style="margin: 40px !important; " class="card col-md-3 pb-4 ">
				  <div class="card-header">
					<a class="float-right" href="<?= site_url('clientes_petro/ver_cliente/').$a['id'] ?>"><i class="fas ml-4 fa-eye"></i></a>
					  <a class="float-right" href="<?= site_url('destinacao_petro/inicio/').$a['id'] ?>"><i class="fas fa-file"></i></a>
				  </div>
				  <div class="card-body">
					<blockquote class="blockquote mb-0">
					  <p style="font-size: 17px;color: #000;"><?= $a['nome'] ?></p>
						<p style="font-size: 14px;"><?= $a['endereco'] ?></br><?= $a['cidade'] ?></br>CNPJ:  <?= $a['cnpj'] ?></br>Contato:  <?= $a['contato'] ?></p>
					   
						
					</blockquote>
				  </div>
				</div>

			<?php } ?>	
			
			</div>
		
		</div><?php */?>
			
		
			
		
			<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				 <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Deletar Cliente?</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
							Tem certeza que deseja excluir esse cliente permanentemente?
						</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
								<a class="link_id" href="#"><button type="button" class="btn btn-danger"> Deletar</button></a>
							</div>
					</div>
				</div>
			</div>
			
		
       