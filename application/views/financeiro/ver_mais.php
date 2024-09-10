<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

?>

    <section class="content">
        <div class="container-fluid">
			<div class="row">
				
            	<div class="block-header col-md-3">
                	<h2>CONTROLE DO ESTOQUE</h2>
            	</div>
				
				
				<div align="right" style="padding-right: 30px; padding-bottom: 15px" > 
								
				<a href="<?= site_url('F_veiculos/inicio/10') ?>"><button type="button" class="btn btn-success float-right">Voltar</button></div></a>
				
			</div>
	
	<?php
	
			$data = explode('-', $manutencao['data'])
									
	?>
									
          
			
	


		<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
							<div class="row">
								<h2 class="col-md-7">

									<small style="font-size: 15px"><b>Serviço:</b> <?= $manutencao['reclamacao'] ?></small>
									<small style="font-size: 15px"><b>Ordem de serviço N°:</b> <?= $manutencao['codigo'] ?></small>
									<small style="font-size: 15px"><b>Quilometragem do Veículo:</b> <?php echo ($manutencao['km'] != '' ? $manutencao['km'] : 'Não cadastrado')   ?></small>
								</h2>
								
								<h2 align="right" class="col-md-5">
									<b>Serviço #<?= $manutencao['id'] ?></b></br>
									<small><?= $data[2].'/'.$data[1].'/'.$data[0]; ?></small>
								</h2>
								
							</div>
							
                        </div>
					
					 <div class="header">
							<div class="row">
								<h2 style="padding-left: 5%" class=" col-md-6">

									<small style="font-size: 15px; color: #1E1E1E"><b>De:</b></small></br>
									<small style="font-size: 24px; color: #454545"><b><?= $oficina['nome'] ?></b></small>
									<small style="font-size: 15px; margin-top: 13px"><b><?= $oficina['endereco'] ?></small>
									<small style="font-size: 15px"><b>Telefone: <?= $oficina['telefone'] ?></small>
								</h2>
								
								<h2 style="padding-left: 5%" class="col-md-6">

									<small style="font-size: 15px; color: #1E1E1E"><b>Para:</b></small></br>
									<small style="font-size: 24px; color: #454545"><b>Petroecol Soluções Ambientais</b></small>
									<small style="font-size: 15px; margin-top: 13px"><b>R. Marçal de Arruda Campos, 7-90 - Vila Lemos</small>
									<small style="font-size: 15px"><b>Telefone: (14) 3208-7835</small>
								</h2>
								
								
								
							</div>
							
                        </div>
						

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
								
								
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th>Total</th>
                                        
                                    </tr>
                                </thead>
								
                                <tbody>
								 <?php for($c = 0; $c < $contador; $c++){ ?>
                                    <tr>
                                        <th scope="row"><?= $c+1 ?></th>
                                        <td><?= $serv_array[$c]; ?></td>
                                        <td>R$<?= number_format("$val_array[$c]",2,",","."); ?></td>
                                    </tr>
								<?php } ?>
                                   
                                </tbody>
                            </table>
                        </div>
								
							<div class="row">
                                        <div class="col-lg-7 col-sm-5">
                                        </div>
                                        <div class="col-lg-4 col-sm-5 ">
                                            <table class="table">
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
						 
                </div>
            </div>




        </div>
    </section>

