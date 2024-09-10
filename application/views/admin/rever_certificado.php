<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Certificado</title>
    <meta charset="utf-8">
  </head>
  <body style="margin-left: 40px; margin-right: 40px; ">
	  
	  <div style="font-size: 15px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif';"><img style="max-height: 23px" src="<?= base_url('assets/img/logopetro.png') ?>"> <span style="margin-left: 10px">CDR - CERTIFICADO DE DESTINAÇÃO DE RESIDUOS</span> <span style="margin-left: 10px"> N° 0<?= $certificado['numero'] ?></span> </div>
	  
	  <?php
			
			$data_gerado = str_replace("/", "-", $certificado["data_cadastro"]);
    
		?>
	  
	  
  <table>
		<tr><td style="border: solid 1px;">
   	<div>
		<div style="font-size: 16px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'"><b>DESTINADOR:</b></div><br>
		<div style="font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 13px">PETROFERTIL COMPOSTAGEM LTDA EPP CNPJ –Estrada Santa Cruz ao bairro jacutinga, s/n° - CEP 18900-000 – município: Santa Cruz do Rio Pardo/SP - CNPJ: 24.498.854/0001-08 – FONE: (14)3377-1097 - E-mail: adriellycampos@petrofertil.com.br<br>
		LICENÇA DE OPERAÇÃO CETESB <b>N° N° 59001781</b></br></br></div>
		<div style="font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 13px">Registro de estabelecimento mapa N EP: SP 006397-5</div>
	</div>	
		
			
	 <hr color="#000" size="2.5px">
	  
		 
	  <div>
		<div style="font-size: 16px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'"><b>GERADOR:</b></div><br>
		  
		<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">RAZÃO SOCIAL: <?= $cliente['nome'] ?></div>
		  
		  <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">ENDEREÇO: <?= $cliente['endereco']; ?></div>
		  
		  <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">CIDADE: <?= $cliente['cidade']; ?></div>
		  
		   <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">ESTADO: <?= $cliente['estado']; ?></div>
		  
		  <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">CNPJ: <?= $cliente['cnpj']; ?></div>
		  
		  <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">INSCRIÇÃO ESTADUAL: <?= $cliente['inscricao']; ?></div>
		  
		  <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">CONTATO: <?= $cliente['contato']; ?>  </div>
		  
		   <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">FONE: <?= $cliente['telefone']; ?> </div>
	</div>
	 <hr color="#000" size="2.5px">
	  
	 
	  <div>
		<div style="font-size: 16px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'"><b>DADOS DO RESÍDUO:</b></div><br>
		  
	
		  
		<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">DENOMINAÇÃO: Orgânico/Mineral </div>
		  
		  <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">PROVENIENTE: Limpeza de fábrica, vencidos, úmidos, avariados, etc. </div>
		  
		  <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">CLASSE: IIA </div>
	</div>

		 <hr color="#000" size="2.5px">
	  
		
	  <div>
		<div style="font-size: 16px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'"><b>REFERÊNCIA:</b></div><br>
		  
		  	<?php
	
					$dados = json_decode($certificado['conteudo'], true);

					$tot = count($dados);
					
					$tot = $tot - 1;
						
						
					?>
		  
			<?php for($count = 0; $count <= $tot; $count ++){ 
						
						$data_registro = str_replace("/", "-", $dados[$count]['data'] );
						?>

		  <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">Coleta do dia <?= date('d/m/Y', strtotime($data_registro))  ?>  – Quantidade: <?= $dados[$count]['quantidade'] ?> Kg – Nota Fiscal N° <?= $dados[$count]['nota'] ?><?= $dados[$count]['mtr'] > 0 ? '- MTR N°' : '' ?><?= $dados[$count]['mtr'] ?></div>
		  
		  
		  
			
		  
		  	<?php } ?>
		  
	</div>
	 
		<hr color="#000" size="2.5px">
	  
	
	  <div>
		<div style="font-size: 16px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'"><b>DESTINAÇÃO FINAL: </b></div><br>
		<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">Material triado e beneficiado: (Matéria prima orgânico/mineral - Fertilizante Orgânico - Misto classe A.) </div>
		  
		  
	</div>
			
			
			
			 <hr color="#000" size="2.5px">
	  
	
	  <div>
		<div style="font-size: 16px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'"><b>OBSERVAÇÃO: </b></div><br>
		<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px;">
		  
			<?php for($count = 0; $count <= $tot; $count ++){ 
						
						$data_registro = str_replace("/", "-", $dados[$count]['data'] );
						?>

			<?php if($dados[$count]['observacao'] != ''){ ?>
		 <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">Coleta do dia <?= date('d/m/Y', strtotime($data_registro))  ?>  – Observação: <?= $dados[$count]['observacao'] ?> </div>
		  
		  
		  
			
		  
		  	<?php } } ?>
		  
		  
		  
		 </br> </div>
		  
		  
	</div>
	

	
	</table>

	  <br><div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px">Santa Cruz do Rio Pardo, <?= date('d/m/Y', strtotime($data_gerado)); ?>. </div>

		<div><img style="max-height: 100px; margin-left: 34%" src="<?= base_url('assets/img/certificado/certificado_crea.jpg'); ?>"></div>	
	  </td>
	  
  </body>
</html>

