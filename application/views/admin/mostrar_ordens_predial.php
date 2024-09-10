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
								<a href = '<?= base_url('ordem_servico_predial/formulario_servico') ?>'><button type="button" class="btn btn-dark float-right mr-4">Gerar ordem de serviço</button></a>
							</div>
						
                            <h2 class="pageheader-title">Ordens de Serviço Predial</h2>
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
				<?php if($aviso == 'deletado'){ ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Ordem <strong>deletada</strong> com sucesso!
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
                            <h5 class="card-header">Tabela Ordens de Serviço</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped first" id="minhaTabela1" >
                                        <thead>
                                            <tr align="center">
												<th>#</th>
                                                <th>Data ordem</th>
                                                <th>Empresa</th>
                                                <th>Responsavel</th>
                                                <th>Codigo</th>
												<th>Reclamação</th>
                                                <th>Deletar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											
										<?php  $c = 1;  foreach($ordens as $m){ ?>
                                   			<tr align="center">
												<td><?= $c ?></td>
                                                <td><?=  date("d/m/Y", strtotime($m['data_ordem'])); ?></td>
                                                <td><?= $m['empresa'] ?></td>
                                                <td><?= $m['responsavel'] ?></td>
                                                <td><a href="<?= site_url('Ordem_servico_predial/rever_ordem/'.$m['codigo']) ?>"><?= $m['codigo'] ?></a></td>
                                                <td><?= $m['reclamacao'] ?></td>
                                                <td><a href="<?= base_url('Ordem_servico_predial/deleta_ordem_predial').'/'.$m['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
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
			