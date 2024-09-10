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
		<div class="row">
			<div class="block-header col-md-3">
				<h2>PRODUTOS DE VENDA RECICLAGEM</h2>
			</div>

		</div>

		<?php

		$contador = 0;

		foreach ($produtos as $a) {

			foreach ($vendas as $b) {

				if (empty($info[$contador][$a['nome']])) {

					$info[$contador]['quantidade'] = 0;
					$info[$contador]['valor_total'] = 0;
				}

				if ($b['produto'] == $a['nome']) {
					$info[$contador]['nome'] = $a['nome'];

					$info[$contador]['quantidade'] = $info[$contador]['quantidade'] + $b['unidade_peso'];
					$info[$contador]['valor_total'] = $info[$contador]['valor_total'] + $b['valor_total'];
					$contador++;
				}
			}
		};

		foreach ($info as $i) {

			$produto[$i['nome']]['quantidade'] =  $produto[$i['nome']]['quantidade'] + $i['quantidade'];
			$produto[$i['nome']]['valor_total'] =  $produto[$i['nome']]['valor_total'] + $i['valor_total'];
		}


		$nome_produto = array_keys($produto);

		?>



		<?php
		
		$venda_total = 0;
		$contador = 0;

		foreach($vendas as $u){

			$venda_total = $venda_total + $u['valor_total'];
			$contador ++;
		}
		
		?>


		<!-- Widgets -->
		<div class="row clearfix">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="info-box bg-pink hover-expand-effect">
					<div class="icon">
						<i class="material-icons">attach_money</i>
					</div>
					<div class="content">
						<div class="text">VALOR TOTAL DE VENDAS</div>
						<div class="number">R$<?= number_format("$venda_total", 2, ",", "."); ?></div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="info-box bg-cyan hover-expand-effect">
					<div class="icon">
						<i class="material-icons">done</i>
					</div>
					<div class="content">
						<div class="text">QUANTIDADE DE PRODUTOS</div>
						<div class="number"><?= $contador  ?> Produtos</div>
					</div>
				</div>
			</div>


		</div>
		<!-- #END# Widgets -->

		<div class="row">
			<div class="container-fluid">
				<?php if ($pagina == 'erro') { ?>
					<div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						Não foram encontradas <b>aferições</b> nas datas selecionadas, ou os campos nao foram preenchidos corretamente.
					</div>
				<?php } ?>
				<form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_produtos_reciclagem/ver_vendas_filtrada_produto/') ?>" method="post">

					<div class="col-md-3">

						<div class="form-group ">
							<label>De</label>
							<input required type="date" value="" name="data_inicial" class="form-control">
						</div>

					</div>

					<div class="col-md-3">

						<div class="form-group  ">
							<label>Até</label>
							<input required type="date" value="" name="data_final" class="form-control">
						</div>

					</div>



					<button type="submit" style="margin-top: 27px" class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 ">Filtrar</button>

					<a href="<?= site_url('F_produtos_reciclagem/ver_vendas_geral_produto') ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Mês Atual</span></a>


					<?php if ($pagina == 'deletado') { ?>

						<div class="alert bg-teal alert-dismissible col-xs-12" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
							Aferição deletada com sucesso
						</div>
					<?php } ?>

			</div>

			</form>

		</div>

		<!-- Exportable Table -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div style="margin-top: 15px" class="card">
					<div class="header">
						<h2>
							Vendas de produtos
						</h2>

					</div>


					<div class="body">
						<div class="table-responsive">

							<table class="table table-bordered table-striped table-hover dataTable js-exportable">

								<thead>
									<tr>
										<th>#</th>
										<th>Material</th>
										<th>Quantidade Vendida</th>
										<th>Valor Total</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>#</th>
										<th>Material</th>
										<th>Quantidade Vendida</th>
										<th>Valor Total</th>

									</tr>
								</tfoot>
								<tbody>


									<?php $contador = 1;
									foreach ($nome_produto as $p) { ?>

										<tr>
											<td><?= $contador ?></td>
											<td><?= $p ?></td>
											<td><?= $produto[$p]['quantidade'] ?> Kg</td>
											<td>R$<?= $produto[$p]['valor_total'] ?></td>
										</tr>


									<?php $contador++;
									}  ?>



								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>



	</div>
</section>