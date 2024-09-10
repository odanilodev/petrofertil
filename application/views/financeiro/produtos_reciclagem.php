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
            	<div class="block-header col-md-3">
                	<h2>PRODUTOS DE VENDA RECICLAGEM</h2>
            	</div>
				
			
				<?php if($usuario == 'fernanda@petroecol.com.br'){ ?>
				<div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
					<a style="margin-left: 5px" href="<?= base_url('F_produtos_reciclagem/ver_vendas_geral_produto') ?>"><span type="button" class="btn bg-orange waves-effect">VER VENDAS DETALHADA</span></a>
					<a style="margin-left: 5px" href="<?= base_url('F_produtos_reciclagem/formulario_cadastro') ?>"><span type="button" class="btn bg-green waves-effect">CADASTRO</span></a>
				</div>
				<? }  ?>
				
			</div>

          
         <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="margin-top: 15px" class="card">
                        <div class="header">
                            <h2>
								Tabela de Produtos
                            </h2>
                           
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Nome do produto</th>
											<th style="text-align: center;">Vendas</th>
                                
											<?php if($usuario == 'fernanda@petroecol.com.br'){ ?>
											<!-- <th style="text-align: center;">Editar</th> -->
                                          	<th style="text-align: center;">Excluir</th>
                                            <?php } ?>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
									<tr>
                                            <th style="text-align: center;">Nome do produto</th>
											<th style="text-align: center;">Vendas</th>

											<?php if($usuario == 'fernanda@petroecol.com.br'){ ?>
											<!-- <th style="text-align: center;">Editar</th> -->
                                          	<th style="text-align: center;">Excluir</th>
                                            <?php } ?>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php foreach($produtos as $f){ ?>
										<tr style="text-align: center;">
                                            <td><?= strtoupper($f['nome']); ?></td>
											<td align="center"><a href="<?= site_url('F_venda_reciclagem/ver_vendas_produto/').$f['id'] ?>"><i class="material-icons"><i class="material-icons">attach_money</i></i></a></td>
											
											
											<?php if($usuario == 'fernanda@petroecol.com.br'){ ?>
											
											<!-- <td align="center"><a href="<?= site_url('F_produtos_reciclagem/formulario_cadastro/').$f['id'] ?>"><i class="material-icons"><i class="material-icons">mode_edit</i></i></a></td> -->
											
                                            <td align="center"><a data-toggle="modal"  style="cursor: pointer;" data-target="#exampleModalProduto" data-pegaid="<?= $f['id'] ?>"><i class="material-icons">delete</i></a></td>
											<?php } ?>
                                            
                                        </tr>
										
                                       <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
			

			<div class="modal fade" id="exampleModalProduto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				 <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Deletar Produto?</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
							Tem certeza que deseja excluir o cadastro deste produto?
						</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
								<a class="link_id" href="#"><button type="button" class="btn btn-danger"> Deletar</button></a>
							</div>
					</div>
				</div>
			</div>

         
        </div>
    </section>

