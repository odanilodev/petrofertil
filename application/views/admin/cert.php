<style>
	.img-produto {
		height: 180px;
	}

	.font {
		font-size: 12px;
	}

	.main {
		font-family: arial, sans-serif;
		border: 2px solid lightgray;
		position: relative;
		margin: 0;
		padding: 10px;
	}

	.header {
		text-align: center;
		color: gray;
		border: 1px solid lightgray;
		padding-bottom: 15px;
	}

	.header img {
		text-align: center;
	}

	.n-orcamento p {
		/* padding: 100px; */
		position: absolute;
		bottom: 0;
		left: 0;
		font-size: 12px;
		color: gray;
	}

	.n-orcamento span {
		color: grey;
		font-weight: bold;
	}

	.dados-form h3 {
		color: gray;
		text-align: center;
		background-color: #eaeaea;
		padding: 5px;
		border-radius: 5px;
	}

	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}

	td,
	th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
		width: 50%;
		color: #404040;
	}

	tr:nth-child(even) {
		background-color: #eaeaea;
	}

	tr .produto-name {
		width: 160px;
		text-align: center;
		font-weight: bold;
	}

	.footer-pdf h3 {
		color: gray;
		text-align: center;
		background-color: #eaeaea;
		padding: 5px;
		border-radius: 5px;
	}
</style>


<div class="main">

	<div class="header">

		<div class="title-header">
			<img style="max-width: 250px; padding-top: 30px;" class="img-fluid" src="<?= base_url('assets/img/logopetro.png') ?>"><br> 
			<p>CDR - CERTIFICADO DE DESTINAÇÃO DE RESIDUOS N° <?= $numero ?></p>
		</div>

	</div>
	<?php


	$contador = count($destinacao);

	$contador = $contador - 1;

	$data_atual = date('d/m/Y');

	?>

	<br>

	<div class="body-pdf">
		<div class="dados-form font">
			<div class="titulo-dados">
				<h3>Destinador</h3>
			</div>

			<table>

				<tr>
					<td>Razão Social:</td>
					<td>PETROFERTIL COMPOSTAGEM LTDA</td>
				</tr>

				<tr>
					<td>Endereço:</td>
					<td>Estrada Santa Cruz ao bairro jacutinga, s/n° - CEP 18900-000 – Santa Cruz do Rio Pardo/SP</td>
				</tr>

				<tr>
					<td>CNPJ:</td>
					<td>24.498.854/0001-08</td>
				</tr>

				<tr>
					<td>Fone:</td>
					<td>(14)3377-1097</td>
				</tr>

				<tr>
					<td>Email:</td>
					<td>adriellycampos@petrofertil.com.br</td>
				</tr>

				<tr>
					<td>Licença de operação CETESB</td>
					<td>N° 59001781</td>
				</tr>

				<tr>
					<td>Registro de Estabelecimento Mapa</td>
					<td>N EP: SP 006397-5</td>
				</tr>


			</table>
		</div>

		<div class="dados-form font">
			<div class="titulo-dados">
				<h3>Gerador</h3>
			</div>

			<table>

				<tr>
					<td>Razão Social:</td>
					<td><?= $cliente['nome'] ?></td>
				</tr>

				<tr>
					<td>Endereço:</td>
					<td><?= $cliente['endereco']; ?></td>
				</tr>

				<tr>
					<td>Cidade:</td>
					<td><?= $cliente['cidade']; ?></td>
				</tr>

				<tr>
					<td>Estado:</td>
					<td><?= $cliente['estado']; ?></td>
				</tr>

				<tr>
					<td>CNPJ:</td>
					<td><?= $cliente['cnpj']; ?></td>
				</tr>

				<tr>
					<td>Inscrição Estadual</td>
					<td><?= $cliente['inscricao']; ?></td>
				</tr>

				<tr>
					<td>Contato</td>
					<td><?=$cliente['contato']; ?></td>
				</tr>

				<tr>
					<td>Fone</td>
					<td><?= $cliente['telefone']; ?></td>
				</tr>


			</table>
		</div>

		<div class="dados-form font">
			<div class="titulo-dados">
				<h3>DADOS DO RESÍDUO</h3>
			</div>

			<table>

				<tr>
					<td>Denominação:</td>
					<td>Varredura vegetal/animal/mineral</td>
				</tr>

				<tr>
					<td>Proveniente:</td>
					<td>Limpeza de fábrica, vencidos, úmidos, avariados, etc.</td>
				</tr>

				<tr>
					<td>Classe:</td>
					<td>IIA</td>
				</tr>




			</table>
		</div>

		<div class="dados-form font">
			<div class="titulo-dados">
				<h3>Referência</h3>
			</div>
			<table>
					<?php for ($count = 0; $count <= $contador; $count++) {

						$destinacao[$count]['data'] = implode('/', array_reverse(explode('-', $destinacao[$count]['data'])))

					?>

						<tr><td>Coleta do dia <?= $destinacao[$count]['data'] ?> – Quantidade: <?= $destinacao[$count]['quantidade'] ?> Kg – Nota Fiscal N° <?= $destinacao[$count]['nota'] ?> <?= $destinacao[$count]['mtr'] > 0 ? '- MTR N°' : '' ?><?= $destinacao[$count]['mtr'] ?></td></tr>

					<?php } ?>
			</table>
		</div>


		<div class="dados-form font">
			<div class="titulo-dados">
				<h3>Destinação Final</h3>
			</div>

			<table>

				<tr>
					<td>Material triado e beneficiado: (Matéria prima orgânico/mineral - Fertilizante orgânico - Misto classe A.)</td>
				</tr>

			</table>

		</div>

		<div class="dados-form font">
			<div class="titulo-dados">
				<h3>Observação</h3>
			</div>

			<table>

				<?php for ($count = 0; $count <= $contador; $count++) {

					$destinacao[$count]['data'] = implode('/', array_reverse(explode('-', $destinacao[$count]['data'])))

				?>

					<?php if ($destinacao[$count]['observacao'] != '') { ?>
						<tr><td>Coleta do dia <?= $destinacao[$count]['data'] ?> – <?= $destinacao[$count]['observacao'] ?></td></tr>


				<?php }
				} ?>

			</table>

		</div></br></br>
		<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 13px; margin-top:20px;">Santa Cruz do Rio Pardo, <?= $data_atual; ?>. </div>

		<div><img style="max-height: 100px; margin-left: 34%" src="<?= base_url('assets/img/certificado/certificado_crea.jpg'); ?>"></div>


	</div>

</div>