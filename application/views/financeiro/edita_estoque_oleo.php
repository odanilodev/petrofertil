

<section class="content">
	<div class="container-fluid">

		<!-- Input -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							Estoque de Óleo
						</h2>

					</div>

					

					<form method="post" enctype="multipart/form-data" action="<?= site_url('F_oleos/atualiza_estoque') ?>">


				

						<div class="body">

							<div class="row clearfix">

							

								<div class="col-sm-12">

									<label>Quantidade</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" autocomplete="off" value="<?= $estoque_oleo['quantidade'] ?>" require name="quantidade" class="form-control" placeholder="Digite a quantidade de tambores">
										</div>
									</div>

								</div></br></br>

								

							


								<div style="padding-top: 40px;" class="col-sm-3">
									<div class="form-group">

										<input type="submit" class="btn bg-red btn-block waves-effect col-md-3"></input>

									</div>
								</div>


					</form>
				</div>

			</div>
		</div>
	</div>
	</div>
	<!-- #END# Input -->

	</div>
</section>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>