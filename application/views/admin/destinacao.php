<?php

		$des = count($destinacoes);

		$certs = count($certificados);

?>
<?php
ini_set('display_errors', 0 );
error_reporting(0);
?>
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
							
							<?php if($status == 'erro'){ ?>
							
							<div class="alert alert-success alert-dismissible fade show" role="alert">
							  <strong>Atenção!</strong> Selecione uma data onde foram registradas destinações
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
							
							<?php } ?>
							
								<div class="pb-2"> 
								
									<a href="<?= site_url('Destinacao_petro/formulario_destinacao/').$cliente['id'] ?>"><button type="button" class="btn btn-success float-right">Novo</button></div></a>
							
                            <h2 class="pageheader-title">Destinações de <?= $cliente['nome'] ?></h2>
                  
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
					
					
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Numero total de Destinações</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?= $des ?></h1>
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
                                        <h5 class="text-muted">Numero total de certificados gerados</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?= $certs ?><?= $certs >= 6 ? '+' : '' ?></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                           <!-- <span class="icon-circle-small icon-box-xs text-danger bg-danger-light bg-danger-light "><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1">4%</span>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
				
					
				<div class="col-md-12 row mb-1">
									<form  class="col-md-12" enctype="multipart/form-data" action="<?= site_url('Destinacao_petro/filtra_destinacao/').$id ?>" method="post">
										
										
										
										<button type="submit" class="btn btn-primary ml-2 col-md-2 mt-4 float-right">Filtrar</button>
										
										<a href="<?= site_url('Destinacao_petro/inicio/').$id ?>"><span class="btn btn-success col-md-2 mt-4 float-right">Geral</span></a>
							
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
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Tabela de Destinações</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped first" id="minhaTabela1" >
                                        <thead>
											
											
											
                                            <tr align="center">
												<th>#</th>
                                                <th>Data</th>
                                                <th>Quantidade (NF)</th>
												<th>Quantidade (Balança)</th>
                                                <th>Nota Fiscal</th>
												<th>Observação</th>
												<th>Gera custo?</th>
												<th>Custo</th>
												<th>Editar</th>
												<th>Excluir</th>
                                            </tr>
											
											
											
                                        </thead>
                                        <tbody>
									
											
											<?php $contador = 1; foreach($destinacoes as $v){ 
										
											
	
											$v['data'] = implode("/",array_reverse(explode("-",$v['data'])));
											
	
											$valor_frete = (double) $v['valor_frete'];
	
											$valor_agenciador = (double)$v['valor_agenciador'];

											$valor_manifesto = (double) $v['valor_manifesto'];
	
											$quantidade  =  $v['quantidade'];
	
											$quantidade = str_replace('.', '', $quantidade);

	
	
											$valor_produto = (float) $v['valor_produto'];
	

	
											$valor_total_nota = $valor_produto * $quantidade;
	
											
											
											$demais_custos = $valor_manifesto + $valor_agenciador + $valor_frete;
	
	;
											$custao_total = $demais_custos + $valor_total_nota;
	
											
										
	
											$custo_total = $custao_total / $quantidade;
	
												
											?>
											
                                   			<tr align="center">
												<td><?= $contador ?></td>
                                                <td><?= $v['data'] ?></td>
                                                <td><?= $v['quantidade'] ?>Kg</td>
												
												
												<td><?php
												
												if($v['balanca'] == ""){
													echo "Não Cadastrado";
												}else{ echo $v['balanca'].'Kg'; }
													
													
													?></td>
												
												
												
                                                <td><?= $v['nota'] ?></td>
												<td><?= $v['observacao'] ?></td>
												<td><?= $v['custo'] ?></td>
												<td><?=  mb_strimwidth("$custo_total", 0, 5, "") ?></td>
												
												<td><a href="<?= site_url('destinacao_petro/edita_destinacao/').$v['id']?>"><i class="fas fa-pencil-alt"></i></a></td>
													
												<td><a href="<?= site_url('destinacao_petro/deleta_destinacao/').$v['id'].'/'.$id ?>"><i class="fas fa-trash"></i></a></td>
												
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
				
				<div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
							
								<div class="pb-2"> 
								
								
									
									
									<form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('Destinacao_petro/gera_destinacao') ?>" method="post">
										
										
										
										<button type="submit" class="btn btn-success mt-4 float-right">Novo</button>
										
										
										<input type="hidden" value="<?= $cliente['id'] ?>" name="id" class="form-control">
										
                                            
                                            <div class="form-group col-md-2 float-right">
                                                <label>Até</label>
                                                <input type="date" value="" name="data_final" class="form-control">
                                                
                                            </div>
										
										 <div class="form-group col-md-2 float-right">
                                                <label>De</label>
                                                <input type="date" value="" name="data_inicial" class="form-control">
                                                
                                            </div>
											
										
                                        </form>
					
										
						
										</div></a>
							
                            <h2 class="pageheader-title">Emissões de certificado </h2>
                  
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <p></p>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
		
			
		<div class="container-fluid">

			<div class="row">
				
				<?php foreach($certificados as $a){ ?>
								
			
				<div style="margin: 40px !important; margin-top: 0px !important; " class="card col-md-3 pb-4 ">
				  <div class="card-header">
					<a class="float-right" href="<?= site_url('Destinacao_petro/deleta_certificado/').$a['id'].'/'.$id ?>"><i class="fas ml-4 fa-trash"></i></a>
					  <a class="float-right" href="<?= site_url('Destinacao_petro/ver_certificado').'/'.$a['id'] ?>"><i class="fas fa-file"></i></a>
					  Certificado
				  </div>
				  <div class="card-body">
					<blockquote class="blockquote mb-0">
					 <p style="font-size: 17px;color: #000;"><?= $a['numero'] ?></p>
						
						<?php $data = implode("/",array_reverse(explode("-",$a['data_cadastro']))) ?>
						
						<p style="font-size: 17px;color: #000;">Data de Emissão: <?= $data ?></p>
					
				 
						
					</blockquote>
				  </div>
				</div>
<?php } ?>	  
			
			</div>
		
		</div>
			

			
			
			

			
			
  
           