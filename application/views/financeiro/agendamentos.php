
<?php  
	
	
	$status = $this->session->userdata('usuario');
	
	
	if($status != "logado"){
		
		redirect('financeiro/verifica_login');
	}
	
	
	$usuario = $this->session->userdata('login');
	
	$nome_usuario = $this->session->userdata('nome_usuario');
	

	
	?>

    <section class="content">
        <div class="container-fluid">
	
			<div class="row">
            	<div style="margin-top: 8px" class="block-header col-md-3">
                	<h2><C>AGENDAMENTOS DE COLETAS</C></h2>
            	</div>
				
			
				<form   enctype="multipart/form-data" action="<?= site_url('F_agendamentos/filtra_agendamentos/') ?>" method="post">
										
				<div class="col-md-offset-1 col-md-4">
					
					<div  class="form-group ">
                       
                           <input required type="text" value="" placeholder="Digite a cidade" name="cidade" class="form-control">
                     </div>
											
                 </div> 	
					
				
					
						
									
				<input type="submit"  class="btn btn-primary col-md-3 col-sm-6 col-xs-6"></input>				
									
				
				<?php if($pagina == 'deletado'){ ?>
					
					<div class="alert bg-teal alert-dismissible col-xs-12" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Aferição deletada com sucesso
                            </div>
				<?php } ?>
					
				</div>	
					 
				 </form>	
				
				
			</div>
			
			
</br>
		
		
		<div class="row">
			<div class="container-fluid">
					
					 
				<?php if($pagina == 'error'){ ?>
		
					<div class="alert bg-teal alert-dismissible container"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                           Não foram encontradas cidades com este nome, por favor digite corretamente uma cidade cadastrada
               		</div>
				<?php } ?>
				
					 
			
					
			</div>

		
			
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                AGENDAMENTOS
                                
                            </h2>
                           
                        </div>
                        <div class="body">
                            <ul  class="list-group">
								
                                <a style="color: inherit; text-decoration: none" href="<?= site_url('F_agendamentos/dia_agendado/').$d13 ?>"><li class="list-group-item" style="font-size: 15px"><b style="font-size: 17px"><?= $semana[$semana13] ?> - </b> <?= $d13 ?>
								
								
									<?php  if($atrasado13 > 0){ ?>
									<span class="badge bg-red"><?= $atrasado13 ?></span>
									<?php } ?>
									<?php  if($agendado13 > 0){ ?>
									<span class="badge bg-cyan"><?= $agendado13 ?></span>
									<?php } ?>
									<?php  if($concluido13 > 0){ ?>
									<span class="badge bg-green"><?= $concluido13 ?></span>
									<?php } ?>
									
									
									
									</li></a>
								
								
                                <a style="color: inherit; text-decoration: none" href="<?= site_url('F_agendamentos/dia_agendado/').$d12 ?>"><li class="list-group-item" style="font-size: 15px"><b style="font-size: 17px"><?= $semana[$semana12] ?> - </b> <?= $d12 ?>
								
								
									<?php  if($atrasado12 > 0){ ?>
									<span class="badge bg-red"><?= $atrasado12 ?></span>
									<?php } ?>
									<?php  if($agendado12 > 0){ ?>
									<span class="badge bg-cyan"><?= $agendado12 ?></span>
									<?php } ?>
									<?php  if($concluido12 > 0){ ?>
									<span class="badge bg-green"><?= $concluido12 ?></span>
									<?php } ?>
									
									
									
									</li></a>
								
								
                                <a style="color: inherit; text-decoration: none" href="<?= site_url('F_agendamentos/dia_agendado/').$d11 ?>"><li class="list-group-item" style="font-size: 15px"><b style="font-size: 17px"><?= $semana[$semana11] ?> - </b> <?= $d11 ?>
								
								
									<?php  if($atrasado11 > 0){ ?>
									<span class="badge bg-red"><?= $atrasado11 ?></span>
									<?php } ?>
									<?php  if($agendado11 > 0){ ?>
									<span class="badge bg-cyan"><?= $agendado11 ?></span>
									<?php } ?>
									<?php  if($concluido11 > 0){ ?>
									<span class="badge bg-green"><?= $concluido11 ?></span>
									<?php } ?>
									
									
									
									</li></a>
								
                               	
                                <a style="color: inherit; text-decoration: none" href="<?= site_url('F_agendamentos/dia_agendado/').$d10 ?>"><li class="list-group-item" style="font-size: 15px"><b style="font-size: 17px"><?= $semana[$semana10] ?> - </b> <?= $d10 ?>
								
								
									<?php  if($atrasado10 > 0){ ?>
									<span class="badge bg-red"><?= $atrasado10 ?></span>
									<?php } ?>
									<?php  if($agendado10 > 0){ ?>
									<span class="badge bg-cyan"><?= $agendado10 ?></span>
									<?php } ?>
									<?php  if($concluido10 > 0){ ?>
									<span class="badge bg-green"><?= $concluido10 ?></span>
									<?php } ?>
									
									
									
									</li></a>
								
                              	
                                <a style="color: inherit; text-decoration: none" href="<?= site_url('F_agendamentos/dia_agendado/').$d9 ?>"><li class="list-group-item" style="font-size: 15px"><b style="font-size: 17px"><?= $semana[$semana9] ?> - </b> <?= $d9 ?>
								
								
									<?php  if($atrasado9 > 0){ ?>
									<span class="badge bg-red"><?= $atrasado9 ?></span>
									<?php } ?>
									<?php  if($agendado9 > 0){ ?>
									<span class="badge bg-cyan"><?= $agendado9 ?></span>
									<?php } ?>
									<?php  if($concluido9 > 0){ ?>
									<span class="badge bg-green"><?= $concluido9 ?></span>
									<?php } ?>
									
									
									
									</li></a>
								
                               <a style="color: inherit; text-decoration: none" href="<?= site_url('F_agendamentos/dia_agendado/').$d8 ?>"><li class="list-group-item" style="font-size: 15px"><b style="font-size: 17px"><?= $semana[$semana8] ?> - </b> <?= $d8 ?>
								
								
									<?php  if($atrasado8 > 0){ ?>
									<span class="badge bg-red"><?= $atrasado8 ?></span>
									<?php } ?>
									<?php  if($agendado8 > 0){ ?>
									<span class="badge bg-cyan"><?= $agendado8 ?></span>
									<?php } ?>
									<?php  if($concluido8 > 0){ ?>
									<span class="badge bg-green"><?= $concluido8 ?></span>
									<?php } ?>
									
									
									
									</li></a>
								
                               <a style="color: inherit; text-decoration: none" href="<?= site_url('F_agendamentos/dia_agendado/').$d7 ?>"><li class="list-group-item" style="font-size: 15px"><b style="font-size: 18px">Hoje - </b> <?= $d7 ?>
								
								
									<?php  if($atrasado7 > 0){ ?>
									<span class="badge bg-red"><?= $atrasado7 ?></span>
									<?php } ?>
									<?php  if($agendado7 > 0){ ?>
									<span class="badge bg-cyan"><?= $agendado7 ?></span>
									<?php } ?>
									<?php  if($concluido7 > 0){ ?>
									<span class="badge bg-green"><?= $concluido7 ?></span>
									<?php } ?>
									
									
									
									</li></a>
								
								 <a style="color: inherit; text-decoration: none" href="<?= site_url('F_agendamentos/dia_agendado/').$d6 ?>"><li class="list-group-item" style="font-size: 15px"><b style="font-size: 17px"><?= $semana[$semana6] ?> - </b> <?= $d6 ?>
								
								
									<?php  if($atrasado6 > 0){ ?>
									<span class="badge bg-red"><?= $atrasado6 ?></span>
									<?php } ?>
									<?php  if($agendado6 > 0){ ?>
									<span class="badge bg-cyan"><?= $agendado6 ?></span>
									<?php } ?>
									<?php  if($concluido6 > 0){ ?>
									<span class="badge bg-green"><?= $concluido6 ?></span>
									<?php } ?>
									
									
									
									</li></a>
								
								  <a style="color: inherit; text-decoration: none" href="<?= site_url('F_agendamentos/dia_agendado/').$d5 ?>"><li class="list-group-item" style="font-size: 15px"><b style="font-size: 17px"><?= $semana[$semana5] ?> - </b> <?= $d5 ?>
								
								
									<?php  if($atrasado5 > 0){ ?>
									<span class="badge bg-red"><?= $atrasado5 ?></span>
									<?php } ?>
									<?php  if($agendado5 > 0){ ?>
									<span class="badge bg-cyan"><?= $agendado5 ?></span>
									<?php } ?>
									<?php  if($concluido5 > 0){ ?>
									<span class="badge bg-green"><?= $concluido5 ?></span>
									<?php } ?>
									
									
									
									</li></a>
								
								  <a style="color: inherit; text-decoration: none" href="<?= site_url('F_agendamentos/dia_agendado/').$d4 ?>"><li class="list-group-item" style="font-size: 15px"><b style="font-size: 17px"><?= $semana[$semana4] ?> - </b> <?= $d4 ?>
								
								
									<?php  if($atrasado4 > 0){ ?>
									<span class="badge bg-red"><?= $atrasado4 ?></span>
									<?php } ?>
									<?php  if($agendado4 > 0){ ?>
									<span class="badge bg-cyan"><?= $agendado4 ?></span>
									<?php } ?>
									<?php  if($concluido4 > 0){ ?>
									<span class="badge bg-green"><?= $concluido4 ?></span>
									<?php } ?>
									
									
									
									</li></a>
								
								 <a style="color: inherit; text-decoration: none" href="<?= site_url('F_agendamentos/dia_agendado/').$d3 ?>"><li class="list-group-item" style="font-size: 15px"><b style="font-size: 17px"><?= $semana[$semana3] ?> - </b> <?= $d3 ?>
								
								
									<?php  if($atrasado3 > 0){ ?>
									<span class="badge bg-red"><?= $atrasado3 ?></span>
									<?php } ?>
									<?php  if($agendado3 > 0){ ?>
									<span class="badge bg-cyan"><?= $agendado3 ?></span>
									<?php } ?>
									<?php  if($concluido3 > 0){ ?>
									<span class="badge bg-green"><?= $concluido3 ?></span>
									<?php } ?>
									
									
									
									</li></a>
								
								  <a style="color: inherit; text-decoration: none" href="<?= site_url('F_agendamentos/dia_agendado/').$d2 ?>"><li class="list-group-item" style="font-size: 15px"><b style="font-size: 17px"><?= $semana[$semana2] ?> - </b> <?= $d2 ?>
								
								
									<?php  if($atrasado2 > 0){ ?>
									<span class="badge bg-red"><?= $atrasado2 ?></span>
									<?php } ?>
									<?php  if($agendado2> 0){ ?>
									<span class="badge bg-cyan"><?= $agendado2 ?></span>
									<?php } ?>
									<?php  if($concluido2 > 0){ ?>
									<span class="badge bg-green"><?= $concluido2 ?></span>
									<?php } ?>
									
									
									
									</li></a>
								
								  <a style="color: inherit; text-decoration: none" href="<?= site_url('F_agendamentos/dia_agendado/').$d1 ?>"><li class="list-group-item" style="font-size: 15px"><b style="font-size: 17px"><?= $semana[$semana1] ?> - </b> <?= $d1 ?>
								
								
									<?php  if($atrasado1 > 0){ ?>
									<span class="badge bg-red"><?= $atrasado1 ?></span>
									<?php } ?>
									<?php  if($agendado1 > 0){ ?>
									<span class="badge bg-cyan"><?= $agendado1 ?></span>
									<?php } ?>
									<?php  if($concluido1 > 0){ ?>
									<span class="badge bg-green"><?= $concluido1 ?></span>
									<?php } ?>
									
									
									
									</li></a>
								
                            </ul>
                        </div>
                    </div>
                </div>
				 
				 
			
	
		

         
        </div>
    </section>

