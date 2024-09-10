
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
            	<div class="block-header col-md-5">
                	<h2 style="font-size: 17px"><C>ATENDIMENTOS DIA <b>20/09/2021</b></C></h2>
            	</div>
				
				<?php if($usuario == 'fernanda@petroecol.com.br' or 'reciclagem@petroecol.com.br'){ ?>
				<div class="col-md-7" style="margin-bottom: 12px; margin-top: -8px" align="right">
					
					<a href="<?= base_url('F_clientes_reciclagem/cadastrar_cliente') ?>"><span type="button" class="btn bg-green waves-effect">NOVO CLIENTE</span></a>
				</div>
				 <?php  } ?>
				
			</div>

         
			
			 <div class="row">
				 
				 
			<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-cyan">
                            <h2>
                               BELLA CAPRI PIZZARIA PRAÇA DO AVIÃO (RECICLAGEM)
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">mic</i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
						
						
                        <div class="body">
						  <div class="row container">
							  
							  
							<div class="card col-md-3 ">
								<div class="header">
									<h2>
										Pendente
									</h2>
									<ul class="header-dropdown m-r--5">
										<li class="dropdown">
											<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
												<i class="material-icons">more_vert</i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
											</ul>
										</li>
									</ul>
								</div>
								<div class="body">
									Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, 
								</div>
							</div>
							  
							  <div style="margin-left: 20px" class="card col-md-3 p-3">
								<div class="header">
									<h2>
										Coletado
									</h2>
									<ul class="header-dropdown m-r--5">
										<li class="dropdown">
											<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
												<i class="material-icons">more_vert</i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
											</ul>
										</li>
									</ul>
								</div>
								<div class="body">
									Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, 
								</div>
							</div>
							  
							  
							  
							
						  </div>
							
                        </div>
                    </div>
                </div>
			
				 
				 <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-cyan">
                            <h2>
                               BELLA CAPRI PIZZARIA PRAÇA DO AVIÃO (RECICLAGEM)
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">mic</i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
						
						
                        <div class="body">
						  <div class="row container">
							  
							  
							<div class="card col-md-3 ">
								<div class="header">
									<h2>
										Pendente
									</h2>
									<ul class="header-dropdown m-r--5">
										<li class="dropdown">
											<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
												<i class="material-icons">more_vert</i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
											</ul>
										</li>
									</ul>
								</div>
								<div class="body">
									Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, 
								</div>
							</div>
							  
							  <div style="margin-left: 20px" class="card col-md-3 p-3">
								<div class="header">
									<h2>
										Coletado
									</h2>
									<ul class="header-dropdown m-r--5">
										<li class="dropdown">
											<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
												<i class="material-icons">more_vert</i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
											</ul>
										</li>
									</ul>
								</div>
								<div class="body">
									Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, 
								</div>
							</div>
							  
							  
							  
							
						  </div>
							
                        </div>
                    </div>
                </div>
			
				 
				 	<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-cyan">
                            <h2>
                               BELLA CAPRI PIZZARIA PRAÇA DO AVIÃO (RECICLAGEM)
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">mic</i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
						
						
                        <div class="body">
						  <div class="row container">
							  
							  
							<div class="card col-md-3 ">
								<div class="header">
									<h2>
										Pendente
									</h2>
									<ul class="header-dropdown m-r--5">
										<li class="dropdown">
											<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
												<i class="material-icons">more_vert</i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
											</ul>
										</li>
									</ul>
								</div>
								<div class="body">
									Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, 
								</div>
							</div>
							  
							  <div style="margin-left: 20px" class="card col-md-3 p-3">
								<div class="header">
									<h2>
										Coletado
									</h2>
									<ul class="header-dropdown m-r--5">
										<li class="dropdown">
											<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
												<i class="material-icons">more_vert</i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
											</ul>
										</li>
									</ul>
								</div>
								<div class="body">
									Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, 
								</div>
							</div>
							  
							  
							  
							
						  </div>
							
                        </div>
                    </div>
                </div>
			
				
			<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-cyan">
                            <h2>
                               BELLA CAPRI PIZZARIA PRAÇA DO AVIÃO (RECICLAGEM)
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">mic</i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
						
						
                        <div class="body">
						  <div class="row container">
							  
							  
							<div class="card col-md-3 ">
								<div class="header">
									<h2>
										Pendente
									</h2>
									<ul class="header-dropdown m-r--5">
										<li class="dropdown">
											<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
												<i class="material-icons">more_vert</i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
											</ul>
										</li>
									</ul>
								</div>
								<div class="body">
									Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, 
								</div>
							</div>
							  
							  <div style="margin-left: 20px" class="card col-md-3 p-3">
								<div class="header">
									<h2>
										Coletado
									</h2>
									<ul class="header-dropdown m-r--5">
										<li class="dropdown">
											<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
												<i class="material-icons">more_vert</i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
												<li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
											</ul>
										</li>
									</ul>
								</div>
								<div class="body">
									Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, 
								</div>
							</div>
							  
							  
							  
							
						  </div>
							
                        </div>
                    </div>
                </div>
			
				 
				 
				 

		

         
        </div>
			
			
    </section>

