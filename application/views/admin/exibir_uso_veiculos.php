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

	                   
	                    <h2 class="pageheader-title">Uso de Veículos</h2>
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



	        <div class="row">

	            <div class="col-md-12 row mb-1">
	                <form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('Motoristas/filtra_uso_veiculos/') ?>" method="post">


	                    <button type="submit" class="btn btn-primary ml-2 col-md-2 mt-4 float-right">Filtrar</button>

	                    <a href="<?= site_url('Motoristas/exibir_uso_veiculos') ?>"><span class="btn btn-success col-md-2 mt-4 float-right">Geral</span></a>

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


	        </div>




	        <div class="row">
	            <!-- ============================================================== -->
	            <!-- basic table  -->
	            <!-- ============================================================== -->
	            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                <div class="card">
	                    <h5 class="card-header">Tabela de uso</h5>
	                    <div class="card-body">
	                        <div class="table-responsive">
	                            <table class="table table-bordered table-striped first" id="minhaTabela1">
	                                <thead>
	                                    <tr align="center">
	                                        <th>#</th>
	                                        <th>Data</th>
	                                        <th>Placa</th>
	                                        <th>Motorista</th>
	                                        <th>Ajudante</th>
	                                        
	                                    </tr>
	                                </thead>
	                                <tbody>

	                                    <?php $c = 1;
                                        foreach ($afericao as $a) { ?>

	                            
	                                        <tr align="center">
	                                            <td><?= $c ?></td>
	                                            <td><?= date("d/m/Y", strtotime($a['data_afericao'])); ?></td>
	                                            <td><?= $a['veiculo'] ?></td>
	                                            <td><?= $a['motorista'] ?></td>
	                                            <td><?= $a['ajudante'] ?></td>
	                                           
	                                        </tr>

	                                    <?php $c++;
                                        } ?>

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