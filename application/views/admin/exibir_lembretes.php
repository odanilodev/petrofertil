 <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
									<div class="pb-2">
									<a href="<?= site_url('lembretes/cadastra_lembrete') ?>"><button type="button" class="btn btn-success float-right">Novo</button></div></a>
                            <h2 class="pageheader-title">Lembretes de manutenção</h2>
                           
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Veículos</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Lembretes de manutenção</a></li>

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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <!--<div class="section-block">
                            <h3 class="section-title">Bootstrap Media</h3>
                            <p>The <a href="http://www.stubbornella.org/content/2010/06/25/the-media-object-saves-hundreds-of-lines-of-code/" target="_blank">media object</a> helps build complex and repetitive components where some media is positioned alongside content that doesn’t wrap around said media. Plus, it does this with only two required classes thanks to flexbox.</p>
                        </div>-->
                    </div>
                </div>
                
                <!-- ============================================================== -->
                <!-- nesting media -->
                <!-- ============================================================== -->
                <div class="row">
					
					<?php foreach($lembretes as $c){ ?>
					
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
							
							
							<div>
							
							<a href="<?= site_url('lembretes/deleta_lembrete').'/'.$c['id']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
							
							</div>
                            <h5 align="center" class="card-header"><?= $c['veiculo'] ?>: <?= $c['titulo'] ?></h5>
							
							
                            <div class="card-body">
                                <div class="media">
                                    
                                    <div class="media-body">
                                       
										<?= $c['descricao'] ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					
                  <?php } ?>
					
                </div>
				</div>
                <!-- ============================================================== -->
                <!-- end nesting media -->
                <!-- ============================================================== -->
                