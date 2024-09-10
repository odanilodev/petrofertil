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

<!DOCTYPE html>
<div class="main">

	<div class="header">

		<div class="title-header">
			<img style="max-width: 250px; padding-top: 30px;" class="img-fluid" src="<?= base_url('assets/img/petro_new_logo.png') ?>"><br> 
			<p>OSP - ORDEM DE SERVIÇO PREDIAL</p>
		</div>

	</div>
	<br>

	<div class="body-pdf">
		<div class="dados-form font">
			<div class="titulo-dados">
				<h3>Empresa Solicitante</h3>
			</div>

			<table>

				<tr>
					<td>Nome da empresa:</td>
					<td>PETROECOL</td>
				</tr>

				<tr>
					<td>Endereço:</td>
					<td>Rua Margarida Genaro 2, 189 - Loteamento LEB, Bauru - SP</td>
				</tr>

				<tr>
					<td>CNPJ:</td>
					<td>04.744.853/0001-99</td>
				</tr>

				<tr>
					<td>Fone:</td>
					<td>(14)3208-7835</td>
				</tr>

				<tr>
					<td>Email:</td>
					<td>manutencao@petroecol.com.br</td>
				</tr>

			</table>
		</div>

		<div class="dados-form font">
			<div class="titulo-dados">
				<h3>Empresa Executora</h3>
			</div>

			<table>

			<?php print_r($empresa); ?>
				<tr>
					<td>Nome da empresa:</td>
					<td><?= $empresa['nome'] ?></td>
				</tr>

				<tr>
					<td>Endereço:</td>
					<td><?= $empresa['endereco'] ?></td>
				</tr>

				<tr>
					<td>Telefone:</td>
					<td><?= $empresa['contato'] ?></td>
				</tr>

                <tr>
					<td>Responsavel pelo serviço:</td>
					<td></td>
				</tr>

			</table>
		</div>

		<div class="dados-form font">
			<div class="titulo-dados">
				<h3>Sobre o serviço</h3>
			</div>

			<table>

				<tr>
					<td>Solicitante:</td>
					<td><?= $responsavel ?></td>
				</tr>

				<tr>
					<td>Data da ordem do serviço:</td>
					<td><?= date('d/m/Y', strtotime($data_ordem)) ?></td>
				</tr>

				<tr>
					<td>Reclamação ou descrição do solicitante:</td>
					<td><?= $reclamacao ?></td>
				</tr>

			</table>
		</div>

		<div class="dados-form font">
			<div class="titulo-dados">
				<h3>Descrição do serviço realizado</h3>
			</div>

			<table>

				<tr>
					<td style="height:110px"></td>
				</tr>

			</table>

		</div>

		<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 13px; margin-top:20px;"><?= date('d/m/Y') ?> Bauru, SP. </div>

		<div><img style="max-height: 100px; margin-left: 34%" src=""></div>


	</div>

</div>
</html>