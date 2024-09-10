<section class="content">
	<div class="container-fluid">

		<div class="row">

			<div class="block-header col-md-4">
				<h2>VEÍCULOS PETROECOL</h2>
			</div>

			<div class="col-md-8" style="margin-bottom: 12px; margin-top: -8px" align="right">
				<a href="<?= base_url('F_veiculos/ver_geral_veiculos/'); ?>"><span type="button" class="btn bg-green waves-effect">EXIBIR GASTOS GERAIS COM VEÍCULOS</span></a>
			</div>


			<?php foreach ($carros as $c) { ?>

				<div style="margin-left: 7%" class="card col-md-3 col-xs-6">
					<div class="header">
						<img class="card-img-top img-responsive" style="" src="<?= base_url('uploads') . "/" . $c['arquivo'] ?>" alt="Imagem de capa do card">
					</div>
					<div style="text-align: center" class="body">
						<h5>Modelo: <?= $c['modelo'] ?></h5>
						<h6>Placa: <?= $c['placa'] ?></h9>


							<div style="margin-top: 20px; margin-bottom: -20px" class="row">

								<div class="col-md-4">
									<a href="<?= site_url('Veiculos/download_documento/') . $c['id'] ?>" class="btn bg-black waves-effect waves-light">
										<i class="material-icons">file_download</i>
									</a>
								</div>

								<div class="col-md-4">
									<a href="<?= site_url('F_veiculos/exibir_combustivel/') . $c['placa'] ?>" class="btn bg-amber waves-effect waves-light">
										<i class="material-icons">local_gas_station</i>
									</a>
								</div>

								<div class="col-md-4">
									<a href="<?= site_url('F_veiculos/ver_veiculo/') . $c['placa'] ?>" class="btn btn-info waves-effect waves-light">
										<i class="material-icons">remove_red_eye</i>
									</a>
								</div>


							</div>


					</div>
				</div>

			<?php } ?>




		</div>
	</div>
</section>