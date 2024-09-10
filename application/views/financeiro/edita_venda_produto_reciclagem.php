<?php

$status = $this->session->userdata('usuario');


if ($status != "logado") {

    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');
$nome_usuario = $this->session->userdata('nome_usuario');

?>

<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>FORMULÁRIO DE CADASTRO</h2>
		</div>
		<!-- Input -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							Formulario de Venda
						</h2>
					</div>


					<form method="post" action="<?= site_url('F_venda_reciclagem/atualiza_venda_produto') ?>">

						<input type="hidden" name="id" value=""></input>

						<div class="body">

							<div class="row clearfix">


								<input type="hidden" name="id" value="<?= $venda['id'] ?>"></input>

								<input type="hidden" name="pagina_id" value="<?= $id ?>"></input>

								<div class="col-sm-12">

									<label>Data Venda</label>
									<div class="form-group">
										<div class="form-line">
											<input type="date" required name='data_venda' value="<?= $venda['data_venda'] ?>" class="form-control " placeholder="Digite a data">
										</div>
									</div>
								</div>

								<div class="col-sm-12">

									<label>Cliente/Comprador</label>
									<select required name="comprador" class="form-control show-tick">

										<option>Selecione</option>
										
										<?php foreach ($clientes as $c) { ?>
											<option <?= $c['nome'] == $venda['comprador'] ? 'selected' : '' ?> value="<?= $c['nome'] ?>"><?= $c['nome'] ?></option>
										<?php } ?>

									</select>
								</div>

								

								<div class="col-sm-3">
									<p>
										<b>Produto</b>
									</p>
									<select required name="produto" class="form-control show-tick">
										<option>Selecione</option>

										<?php foreach ($produtos as $p) { ?>

											<option <?= $p['nome'] == $venda['produto'] ? 'selected' : '' ?> value="<?= $p['nome'] ?>"><?= $p['nome'] ?></option>

										<?php } ?>

									</select>

								</div>


								<div class="col-sm-3">

									<label>KG/Quantidade</label>
									<div class="form-group">
										<div class="form-line">
											<input type="int" onblur="calcular(<?= time() ?>);" name='unidade_peso' value="<?= $venda['unidade_peso'] ?>" class="form-control num_<?= time() ?>" placeholder="Kg/Quantidade de produto">
										</div>
									</div>

								</div>


								<div class="col-sm-3">

									<label>Preço de venda</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" onblur="calcular(<?= time() ?>);" name='valor_venda' value="<?= $venda['valor_venda'] ?>" class="form-control valor num2_<?= time() ?> " placeholder="Preço de venda?">
										</div>
									</div>

								</div>


								<div class="col-sm-3">

									<label>Valor total </label>
									<div class='form-group'>
										<div class='form-line'>
											
											<input type='text' onblur='calcular(<?= time() ?>);' name='valor_total' value='<?= $venda['valor_total'] ?>' class='form-control valor resultado<?= time() ?>' Readonly>

										</div>
									</div>

								</div>

								<div class="col-sm-4">

									<div class="form-group">
										<input type="submit" class="btn bg-red btn-block waves-effect "></input>
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