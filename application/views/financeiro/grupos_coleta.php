

    <section class="content">
        <div class="container-fluid">
			<div class="row">
            	<div class="block-header col-md-3">
                	<h2>GRUPOS DE COLETA</h2>
            	</div>
				

				<div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
					<a href="<?= base_url('F_grupos_coleta/formulario_romaneio') ?>"><span type="button" class="btn bg-primary waves-effect">GERAR ROMANEIO</span></a>
					<a href="<?= base_url('F_grupos_coleta/formulario_grupo') ?>"><span type="button" class="btn bg-green waves-effect">CRIAR GRUPO</span></a>
				</div>
			
			</div>

      
			
			<?php foreach($grupos as $g){ ?>
			
			       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="card">
                        <div  class="header">
                            <h2>
                                 <?= $g['nome'] ?><small><?= $g['observacao'] ?></small>
                            </h2>
							<div>
							</div>
                            <ul class="header-dropdown m-r--5">
								
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
									
                                    <ul class="dropdown-menu pull-right">
                                       
                                       
                                        <li><a href="">Excluir</a></li>
                                    </ul>

                                </li>
                            </ul>
                        </div>
                      
                    </div>
                </div>

			<?php } ?>
			
			
		
        </div>
    </section>


