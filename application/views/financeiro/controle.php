<!DOCTYPE html>
<html>

<head>
	<style>
		#customers {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		#customers td,
		#customers th {
			border: 1px solid #ddd;
			padding: 2px;
		}

		#customers tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		#customers tr:hover {
			background-color: #ddd;
		}

		#customers th {
			padding-top: 3px;
			padding-bottom: 3px;
			text-align: left;
			background-color: #04AA6D;
			color: white;
		}
	</style>
</head>

<body>



	<?php

	$total_oleo = 0;
	$total_detergente = 0;







	foreach ($voltas as $a) {

		$total_oleo = $a['volta_oleo'] + $total_oleo;
		$total_detergente = $a['volta_detergente'] + $total_detergente;
	}
	?>



	<?php


	$total_oleo_dia = 0;
	$total_detergente_dia = 0;

	foreach ($saidas_dia as $sa) {

		$total_oleo_dia = $sa['oleo'] + $total_oleo_dia;
		$total_detergente_dia = $sa['detergente'] + $total_detergente_dia;
	}

	$total_oleo_saida = 0;
	$total_detergente_saida = 0;

	foreach ($saidas as $sa) {

		$total_oleo_saida = $sa['oleo'] + $total_oleo_saida;
		$total_detergente_saida = $sa['detergente'] + $total_detergente_saida;
	}


	$anterior_oleo =  $estoque_oleo['quantidade'] - $total_oleo;
	$anterior_detergente =  $estoque_detergente['quantidade'] - $total_detergente;


	?>


	<div style="text-align: center;">
		<h4>SAÍDA DIA ANTERIOR</h4>
	</div>

	<table id="customers">

		<tr>
			<th>Data/Hora</th>
			<th>Motorista</th>
			<th>Óleo</th>
			<th>Detergente</th>
			<th>Observação</th>
		</tr>


		<?php foreach ($saidas as $s) { ?>

			<tr style="text-align: center;">
				<td><?= date('d/m/y  H:i', strtotime($s['data_saida'])); ?></td>
				<td><?= strtoupper(mb_strimwidth($s['nome'], 0, 12, ".")); ?></td>
				<td><?= $s['oleo'] ?></td>
				<td><?= $s['detergente'] ?></td>
				<td style="font-size: 16px;"><?= $s['observacao'] ?></td>
			</tr>

		<?php } ?>

		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>

		<tr style="text-align: center;">
			<td>TOTAL SAÍDA</td>
			<td></td>
			<td><?= $total_oleo_saida ?></td>
			<td><?= $total_detergente_saida ?></td>
			<td></td>
		</tr>




	</table></br>

	<div style="text-align: center;">
		<h4>VOLTA DIA ANTERIOR</h4>
	</div>

	<table id="customers">

		<tr>
			<th>Data/Hora</th>
			<th>Motorista</th>
			<th>Óleo</th>
			<th>Detergente</th>
			<th>Observação</th>
		</tr>


		<?php foreach ($voltas as $v) { ?>

			<tr style="text-align: center;">
				<td><?= date('d/m/y  H:i', strtotime($v['data_volta'])); ?></td>
				<td><?= strtoupper(mb_strimwidth($v['nome'], 0, 12, ".")); ?></td>
				<td><?= $v['volta_oleo'] ?></td>
				<td><?= $v['volta_detergente'] ?></td>
				<td style="font-size: 16px;"><?= $v['observacao'] ?></td>
			</tr>

		<?php } ?>

		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>

		<tr style="text-align: center;">
			<td>TOTAL DA VOLTA</td>
			<td></td>
			<td><?= $total_oleo ?></td>
			<td><?= $total_detergente ?></td>
			<td></td>
		</tr>




	</table></br>

	<div style="text-align: center;">
		<h4>SAÍDA DO DIA</h4>
	</div>

	<table id="customers">

		<tr>
			<th>Data/Hora</th>
			<th>Motorista</th>
			<th>Óleo</th>
			<th>Detergente</th>
			<th>Observação</th>
		</tr>


		<?php foreach ($saidas_dia as $sa) { ?>

			<tr style="text-align: center;">
				<td><?= date('d/m/y  H:i', strtotime($sa['data_saida'])); ?></td>
				<td><?= strtoupper(mb_strimwidth($sa['nome'], 0, 12, ".")); ?></td>
				<td><?= $sa['oleo'] ?></td>
				<td><?= $sa['detergente'] ?></td>
				<td style="font-size: 16px;"><?= $sa['observacao'] ?></td>
			</tr>

		<?php } ?>

		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>

		<tr style="text-align: center;">
			<td>TOTAL SAÍDA</td>
			<td></td>
			<td><?= $total_oleo ?></td>
			<td><?= $total_detergente ?></td>
			<td></td>
		</tr>






	</table></br></br>


	<table style="margin-top: 30px;" id="customers">
		<tr style="text-align: center;">
			<td>ESTOQUE ATUAL</td>
			<td><?= $anterior_oleo ?></td>
			<td><?= $anterior_detergente ?></td>
		</tr>

		<tr style="text-align: center;">
			<td>ESTOQUE MAIS VOLTA</td>
			<td><?= $estoque_oleo['quantidade'] ?></td>
			<td><?= $estoque_detergente['quantidade'] ?></td>
		</tr>
	</table>


</body>

</html>