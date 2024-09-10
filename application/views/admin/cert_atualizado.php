<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Certificado</title>
	<meta charset="utf-8">
</head>

<body style="margin-left: 40px; margin-right: 40px; ">

	<div style="font-size: 15px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif';"><img style="max-height: 23px" src=""> <span style="margin-left: 10px">CDR - CERTIFICADO DE DESTINAÇÃO DE RESIDUOS</span> <span style="margin-left: 10px"> N° <?= $numero ?></span> </div>

	<table>
	<tr><td style="border: solid 1px;">
   	<div>
		<div style="font-size: 16px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'"><b>DESTINADOR:</b></div><br>
		<div style="font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 13px">PETROFERTIL COMPOSTAGEM LTDA EPP CNPJ –Estrada Santa Cruz ao bairro jacutinga, s/n° - CEP 18900-000 – município: Santa Cruz do Rio Pardo/SP - CNPJ: 24.498.854/0001-08 – FONE: (14)3377-1097 - E-mail: elainepetrofertil@hotmail.com<br>
		LICENÇA DE OPERAÇÃO CETESB <b>N° N° 59001781</b></br></br></div>
		<div style="font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 13px">Registro de estabelecimento mapa N EP: SP 006397-5</div>
	</div>	
					<?php


					$contador = count($destinacao);

					$contador = $contador - 1;

					$data_atual = date('d/m/Y');

					?>

					<hr color="#000" size="2.5px">

					<div>
						<div style="font-size: 16px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'"><b>GERADOR:</b></div><br>

						<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">RAZÃO SOCIAL: <?= $cliente['nome'] ?></div>

						<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">ENDEREÇO: <?= $cliente['endereco']; ?></div>

						<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">CIDADE: <?= $cliente['cidade']; ?></div>

						<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">ESTADO: <?= $cliente['estado']; ?></div>

						<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">CNPJ: <?= $cliente['cnpj']; ?></div>

						<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">INSCRIÇÃO ESTADUAL: <?= $cliente['inscricao']; ?></div>

						<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">CONTATO: <?= $cliente['contato']; ?> </div>

						<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">FONE: <?= $cliente['telefone']; ?> </div>
					</div>
					<hr color="#000" size="2.5px">


					<div>
						<div style="font-size: 16px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'"><b>DADOS DO RESÍDUO:</b></div><br>

						<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">DENOMINAÇÃO: Varredura vegetal/animal/mineral </div>

						<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">PROVENIENTE: Limpeza de fábrica, vencidos, úmidos, avariados, etc. </div>

						<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">CLASSE: IIA </div>
					</div>

					<hr color="#000" size="2.5px">


					<div>
						<div style="font-size: 16px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'"><b>REFERÊNCIA:</b></div><br>


						<?php for ($count = 0; $count <= $contador; $count++) {

							$destinacao[$count]['data'] = implode('/', array_reverse(explode('-', $destinacao[$count]['data'])))

						?>


							<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">Coleta do dia <?= $destinacao[$count]['data'] ?> – Quantidade: <?= $destinacao[$count]['quantidade'] ?> Kg – Nota Fiscal N° <?= $destinacao[$count]['nota'] ?> <?= $destinacao[$count]['mtr'] > 0 ? '- MTR N°' : '' ?><?= $destinacao[$count]['mtr'] ?></div>


							<?php } ?>

					</div>

					<hr color="#000" size="2.5px">


					<div>
						<div style="font-size: 16px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'"><b>DESTINAÇÃO FINAL: </b></div><br>
						<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">Material triado e beneficiado: (Matéria prima orgânico/mineral - Fertilizante orgânico - Misto classe A.) </div>


					</div>

					<hr color="#000" size="2.5px">


					<div>
						<div style="font-size: 16px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'"><b>OBSERVAÇÃO: </b></div><br>
						<?php for ($count = 0; $count <= $contador; $count++) {

							$destinacao[$count]['data'] = implode('/', array_reverse(explode('-', $destinacao[$count]['data'])))

						?>

							<?php if ($destinacao[$count]['observacao'] != '') { ?>
								<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">Coleta do dia <?= $destinacao[$count]['data'] ?> – <?= $destinacao[$count]['observacao'] ?> </div>


						<?php }
						} ?>


					</div>



	</table>

	<br>
	<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">Santa Cruz do Rio Pardo, <?= $data_atual; ?>. </div>

	<div><img style="max-height: 100px; margin-left: 34%" src="<?= base_url('assets/img/certificado/certificado_crea.jpg'); ?>"></div>
	</td>

</body>

</html>

