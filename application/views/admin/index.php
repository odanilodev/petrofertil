      <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->



		<?php

					$litros_abastecidos = 0;
					$contador2 = 0;
					$gasto = 0;

					foreach($combustivel as $c){

						$litros_abastecidos = $litros_abastecidos + $c['litragem'];

						$gasto = $gasto + $c['valor'];

						$contador2++;
					}

		  
					  $contador = 0;
									   
					 $valor_total = 0;			   
	
					  foreach($manutencoes as $a){
						  
						  
						  $val_array = json_decode($a['valor'], true);
						
						  
						  $tot[$contador] = array_sum($val_array);
						  
						  
						  
						  
						   if($a['desconto'] > 0){
												
									 $valor_total = $valor_total + $tot[$contador] - $a['desconto'];
												
											}else{
												
												  $valor_total = $valor_total + $tot[$contador];
											}
							
						 
						  
						  $contador ++;
						  
						  
					  }

									   
									   
					  ?>




        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Sistema Administrativo</h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Petroecol</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Sistema Administrativo</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                       
                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- sales  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div align="center" class="card-body">
                                        <h5 class="text-muted">Gasto mensal em Manutenções</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">R$<?=  number_format("$valor_total",2,",",".");?></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end sales  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- new customer  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div align="center" class="card-body">
                                        <h5 class="text-muted">Manutenções do mês realizadas</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?= $contador ?></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end new customer  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- visitor  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div align="center" class="card-body">
                                        <h5 class="text-muted">Gastos de combustivel</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">R$<?= 	number_format("$gasto",2,",","."); ?> </h1>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end visitor  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- total orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div align="center" class="card-body">
                                        <h5 class="text-muted">Total de abastecimentos</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1  class="mb-1"><?= $contador2 ?></h1>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end total orders  -->
                            <!-- ============================================================== -->
                        </div>
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                            <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Ultimas retiradas de estoque</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr align="center" class="border-0">
														<th class="border-0">#</th>
                                                        <th class="border-0">Funcionario</th>
                                                        <th class="border-0">Quantidade</th>
                                                        <th class="border-0">Produto</th>
                                                        <th class="border-0">Data</th>
                                                    </tr>
                                                </thead>
                                                <tbody align="center">
													
												<?php $a = 1; foreach($destinacoes as $d){ ?>
													
													<?php if($a <= 6){ ?>
                                                  <tr>
                                                       	<td><?= $a ?></td>
                                                        <td><?= $d['funcionario'] ?></td>
                                                        <td><?= $d['quantidade'] ?></td>
                                                        <td><?= $d['produto'] ?></td>
                                                        <td><?=  date("d/m/Y", strtotime($d['data_destinacao'])); ?></td>
                                                        
                                                    </tr>
													<?php } ?>
												<?php $a++; } ?>
                                                   
                                                    <tr>
                                                        <td colspan="9"><a href="<?= site_url('Estoque') ?>" class="btn btn-outline-light float-right">Ver Mais</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->

    
								<?php 
								
								$today = date("m.d.y");
								
								$data_atual = strtotime($today); 
								
								?>	
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- customer acquistion  -->
                            <!-- ============================================================== -->
							
							
							
							
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
								
								
								<div class="card">
                                   <div class="card-body border-top">
                                        <h3 class="font-16">Carros em manutenção</h3>
                                       
								
									   
										<?php  foreach($ordens as $e){ 
										
										$status = 1; 
										$link = base_url('Manutencoes/detalhe_veiculo/').$e['placa'];
										
										$link_status = base_url('Ordem_servico/atualiza_status/').$e['id'];
											
										?>
										
										
											
										<?php if($status == $e['status']){
											echo "<a href=".$link."><p>".$e['placa']."</a></br>".$e['oficina'].
												"<a href='".$link_status."'><i class='fas fa-window-close ml-2'></i></a></p>";} 
									   
										
										 } ?>
									
								
                                    </div>
									  
                                </div>
								
								
                                <div class="card">
                                   <div class="card-body border-top">
                                        <h3 class="font-16">CNH Vencidas</h3>
                                       
								
									   
										<?php  foreach($motoristas as $v){ 
										
										$data_aviso = strtotime($v['data_cnh']); 
										
										?>
										
										
											
										<?php if($data_aviso < $data_atual){echo "<p><i class='fa fa-window-close' aria-hidden='true'></i> ".$v['nome'];} ?></p>
										
										<?php } ?>
									
								
										
                                    </div>
									
									
									 <div class="card-body border-top">
                                        <h3 class="font-16">Multas Pendentes</h3>
                                       
										<p>Função em Desenvolvimento</p>
                                    </div>
                             
                             
                                    
                                </div>
							
							
						
						
                            </div>
						
                            <!-- ============================================================== -->
                            <!-- end customer acquistion  -->
                            <!-- ============================================================== -->
                        </div>
          
                      
                  
                    </div>
                </div>
            </div>
            