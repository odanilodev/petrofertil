
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
									<a href="<?= site_url('Combustivel/cadastra_combustivel/').$placa ?>"><button type="button" class="btn btn-success float-right">Novo</button></div></a>
							
                            <h2 class="pageheader-title">Combustivel</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
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
				<?php
	

					$litros_abastecidos = 0;
					$contador = 0;
					$gasto = 0;
					$media_comb = 0;
									   
					$registro = false;				   
									   
					$primeira_contagem = false;				   

					foreach($combustivel as $c){
						
						$registro = true;
						
						if($c['media'] == 0){
							$primeira_contagem = true;
						}

						$litros_abastecidos = $litros_abastecidos + $c['litragem'];

						$gasto = $gasto + $c['valor'];
						
						$media_comb += $c['media'];

						$contador++;
					}

				
				?>
				
				
				
				<div class="row">

                        
                    <!-- ============================================================== -->
                    <!--  area chart  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header"><?=isset($filtrar) ? 'Média Combustivel' : 'Média Combustivel Quinzenal'?></h5>
                            <div class="card-body">
                                <div id="c3chart_area"></div>
                            </div>
                        </div>
                    </div>
                            <!-- ============================================================== -->
                            <!-- end sales  -->
                            <!-- ============================================================== -->
                            
                          <div class="row col-md-6">
                            <!-- ============================================================== -->
                            <!-- total orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Litros Abastecidos</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?= 	number_format("$litros_abastecidos",2,",","."); ?> </h1>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
					<div class="col-xl-6 col-lg-6 col-md-6  col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Abastecimentos</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?= $contador ?></h1>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Gasto total Mensal</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">R$<?= number_format("$gasto",2,",","."); ?></h1>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
							  
							  
					<div class="col-xl-6 col-lg-6 col-md-6  col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Média do Veículo</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
												<?php if($primeira_contagem && $contador > 1){
															echo round($media_comb / ($contador - 1),1) . 'KM/L';
														}else if($contador > 0){
															echo round($media_comb / $contador, 1) . 'KM/L';
														}
											?>
											</h1>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
					
							    <div class="col-md-12 row">
									<form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('Combustivel/filtra_combustivel/').$placa ?>" method="post">
										
										
										
										<button type="submit" class="btn btn-success col-md-2 mt-4 float-right">Calcular</button>
										
										
							
										  <div style="float: right" class="form-group col-md-5 ">
                                                <label>Até</label>
                                                <input type="date" value="" name="data_final" class="form-control">
                                          </div>
											
                                         
                                            <div style="float: right" class="form-group col-md-5">	
                                                <label>De</label>
                                                <input type="date" value="" name="data_inicial" class="form-control">
                                            </div> 
										
										
                                        </form>
					
							  </div>
							  
							</div>
					
					
					
                            <!-- ============================================================== -->
                            <!-- end total orders  -->
                            <!-- ============================================================== -->
                        </div>
				
				
				
				
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Abastecimentos</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped first" id="minhaTabela1">
                                        <thead>
                                            <tr align="center">
                                                <th>Quilometragem</th>
												<th>Data</th>
                                                <th>Litros</th>
                                                <th>Gastos</th>
                                                
												<th>Média</th>
                                               
												<th>Editar</th>
												<th>Deletar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											
										
											
                                   			
												<?php $c=0; foreach($combustivel as $v){ ?>
											
											
											
												<tr align="center">
                                                <td><?= $v['km'] ?></td>
												<td><?=  date("d/m/Y", strtotime($v['data_cadastro'])); ?></td>
                                                <td><?= $v['litragem'] ?></td>
                                                <td><?= $v['valor'] ?></td>
                                                
												<td><?= $v['media'] == '0' ? 'Inicio para calculos' : $v['media']  ?></td>
												<td><a href="<?= site_url('combustivel/edita_combustivel/').$v['id'] ?>"><i class=" fas fa-pencil-alt"></i></a></td>
												<td><a href="<?= site_url('combustivel/deleta_combustivel/').$v['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
												</tr>
                                
												<?php $c++; } ?>
                                            
                                      
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
			
			