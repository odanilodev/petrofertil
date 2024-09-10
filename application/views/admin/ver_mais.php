<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

?>


<div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header mt-4">
								<a href="<?= site_url('manutencoes/detalhe_veiculo/').$manutencao['placa'] ?>"><button type="button" class="btn btn-success float-right">Voltar</button></div></a>
                                <h2 class="pageheader-title">Serviço Detalhado </h2>
                                
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manutenções</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Serviço Detalhado</li>
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
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header p-4">
									
								
									<?php
	
								    $data = explode('-', $manutencao['data'])
									
									?>
									
                                     
										<span class="pt-2 d-inline-block">Serviço: <?= $manutencao['reclamacao'] ?></br>	
										Ordem de Serviço N°: <?= $manutencao['codigo'] ?></br>
										Quilometragem do Veículo: <?php echo ($manutencao['km'] != '' ? $manutencao['km'] : 'Não cadastrado')   ?>
										</span>
                                   
                                    <div class="float-right"> <h3 class="mb-0">Serviço #<?= $manutencao['id'] ?></h3>
                                    <?= $data[2].'/'.$data[1].'/'.$data[0]; ?></div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <h5 class="mb-3">De:</h5>                                            
                                            <h3 class="text-dark mb-1"><?= $oficina['nome'] ?></h3>
                                         
                                            <div><?= $oficina['endereco'] ?></div>
                                            <div>Telefone: <?= $oficina['telefone'] ?></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h5 class="mb-3">Para:</h5>
                                            <h3 class="text-dark mb-1">Petroecol Soluções Ambientais</h3>                                            
                                            <div>R. Marçal de Arruda Campos, 7-90 - Vila Lemos</div>
                                            <div>Telefone: (14) 3208-7835</div>
                                        </div>
                                    </div>
                                    <div class="table-responsive-sm">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="center">#</th>
                                                    <th>Item</th>
                                                    <th class="right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												
												
											
												<?php  

													$serv_array = json_decode($manutencao['servico'], true);
													$val_array = json_decode($manutencao['valor'], true);

													
													if($manutencao['desconto'] > 0){
														
														$total = array_sum($val_array) - $manutencao['desconto'];
														
													}else{
														
														$total = array_sum($val_array);
														
													}
													
													
												
												
												$contador = count($serv_array)
												?>
												
                                                <?php for($c = 0; $c < $contador; $c++){ ?>
                                                <tr>
                                                    <td class="center"><?= $c+1 ?></td>
                                                    <td class="left"><?= $serv_array[$c]; ?></td>
                                                    
                                                  
                                                    <td class="right">R$<?= number_format("$val_array[$c]",2,",","."); ?></td>
                                                </tr>
												
												<?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-5">
                                        </div>
                                        <div class="col-lg-4 col-sm-5 ml-auto">
                                            <table class="table table-clear">
                                                <tbody>
                                                   <div>Desconto: 
													   
													   
													   
													   <?php 
													   
													   $desconto = $manutencao['desconto'];
													   
													   if($desconto > 0){
														   
														    echo number_format("$desconto",2,",",".");  
													   }else{
													   
													   		echo 'Não gerado desconto';
														   
													   }
													   
													   
													
													?>
													
													
													
													</div>
                                                        <td class="left">
                                                            <strong class="text-dark">Total</strong>
                                                        </td>
                                                        <td class="right">
                                                            <strong class="text-dark">R$<?=  number_format("$total",2,",","."); ?></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <p class="mb-0">Observação: <?= $manutencao['observacao'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div></br></br></br></br></br>
                