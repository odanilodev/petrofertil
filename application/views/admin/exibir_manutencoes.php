	
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
									<a href="<?= site_url('Manutencoes/formulario_manutencao') ?>"><button type="button" class="btn btn-success float-right">Novo</button></div></a>
							
                            <h2 class="pageheader-title">Manutenções</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Veiculos</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Manutenções</li>
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
                            <!-- sales  -->
                            <!-- ============================================================== -->
					  
					  
					  
					  <?php
					  
					  $contador = 0;
									   
					 $valor_total = 0;			   
	
					  foreach($manutencoes as $a){
						  
						  
						  $val_array = json_decode($a['valor'], true);
						
						  
						  $tot[$contador] = array_sum($val_array);
						  
						  
						  $valor_total = $valor_total + $tot[$contador];
						  
						  $contador ++;
						  
						  
					  }

									   
									   
					  ?>
					  
					  
                             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Gasto total em manutenções</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">R$<?=  number_format("$valor_total",2,",",".");?></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                          <!--  <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end sales  -->
                            <!-- ============================================================== -->
                            
                          
                            <!-- ============================================================== -->
                            <!-- total orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total de manutenções realizadas</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?= $contador ?></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                           <!-- <span class="icon-circle-small icon-box-xs text-danger bg-danger-light bg-danger-light "><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1">4%</span>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end total orders  -->
                            <!-- ============================================================== -->
					
					 <div class="col-md-12 row mb-1">
									<form  class="col-md-12" enctype="multipart/form-data" action="<?= site_url('Manutencoes/filtra_manutencao_geral/') ?>" method="post">
										
										
										
										<button type="submit" class="btn btn-primary ml-2 col-md-2 mt-4 float-right">Filtrar</button>
										
										<a href="<?= site_url('manutencoes') ?>"><span class="btn btn-success col-md-2 mt-4 float-right">Geral</span></a>
							
										  <div style="float: right" class="form-group col-md-3 ">
                                                <label>Até</label>
                                                <input type="date" value="" name="data_final" class="form-control">
                                          </div>
											
                                         
                                            <div style="float: right" class="form-group col-md-3">	
                                                <label>De</label>
                                                <input type="date" value="" name="data_inicial" class="form-control">
                                            </div> 
										
										
                                        </form>
					
							  </div>
					
					
                        </div>
				
				
				
				
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Tabela de manutenções</h5>
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
                                                <th>Valor</th>
												<th>Ver Mais</th>
												<th>Deletar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											
										<?php  $c = 1;  foreach($manutencoes as $m){ ?>
											
										<?php  
											
											$serv_array = json_decode($m['servico'], true);
											$val_array = json_decode($m['valor'], true);


											if($m['desconto'] == '' ){
												$total = array_sum($val_array);
											}else{
												$total = array_sum($val_array);
												$total = $total - $m['desconto'];
											}
									
										?>
											
											
                                   			<tr align="center">
												<td><?= $c ?></td>
                                                <td><?=  date("d/m/Y", strtotime($m['data'])); ?></td>
                                                <td><?= $m['placa'] ?></td>
                                                <td><?= $m['oficina'] ?></td>
                                                <td><?= $m['reclamacao'] ?></td>
												<td><a href="<?= site_url('Ordem_servico/rever_ordem/'.$m['codigo']) ?>"><?= $m['codigo'] ?></a></td>
                                                <td>R$<?= $total ?></td>
												<td><a href="<?= base_url('manutencoes/ver_manutencao').'/'.$m['id'] ?>"><i class="fas fa-eye"></i></a></td>
												<td><a href="<?= base_url('manutencoes/deleta_manutencao').'/'.$m['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
												
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
			
			
  
           