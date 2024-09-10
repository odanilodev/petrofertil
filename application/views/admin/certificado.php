<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Certificado</title>
    <meta charset="utf-8">
	 

  </head>
	
	
  <body style="margin-left: 40px; margin-right: 40px; z-index: auto">

	  <div> 
	  <div style="font-size: 18px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif';">
		  
		  <img style="max-height: 35px" src="<?= base_url('assets/img/logopetro.png') ?>">
		  
		  <span style="margin-left: 160px">CDR - CERTIFICADO DE DESTINAÇÃO DE RESÍDUOS </span> 
		  
		  <span style="margin-left: 200px">N° 0<?= $numero ?></span>
	  
	  </div>
	  
	  
	  
			<?php
	
				 
			$contador = count($destinacao);

			$contador = $contador - 1 ;

			$data_atual = date('d/m/Y'); 
												 
			?>
	 
	 <table>
		<tr><td style="border: solid 1px;">
   	<div>
		<div style="font-size: 16px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'"><b>DESTINADOR:</b></div><br>
		<div style="font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px; margin-left: 8px;">PETROFERTIL COMPOSTAGEM LTDA EPP CNPJ –Estrada Santa Cruz ao bairro jacutinga, s/n° - CEP 18900-000 – município: Santa Cruz do Rio Pardo/SP - CNPJ: 24.498.854/0001-08 – FONE: (14)3377-1097 – E-mail: elainepetrofertil@hotmail.com<br>
		LICENÇA DE OPERAÇÃO CETESB <strong>N° 59001781</strong></div>
		<div style="font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 13px">Registro de estabelecimento mapa N EP: SP 006397-5</div>
	
			
	
	 <hr style="" size="2.5px">
	 
		 
	  <div>
		<div style="font-size: 16px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; margin-left: 8px; margin-bottom: 6px"><b>GERADOR:</b></div>
		  
		<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px; margin-left: 8px;">RAZÃO SOCIAL: <?= $cliente['nome'] ?></div>
		  
		  <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px; margin-left: 8px;">ENDEREÇO: <?= $cliente['endereco']; ?> - <?= $cliente['bairro']; ?></div>
		  
		  <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px; width: 1080px; margin-left: 8px;"><span style="">CIDADE:<?= $cliente['cidade']; ?></span> </div>
		  <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px; margin-left: 8px;">ESTADO: <?= $cliente['estado']; ?></div>
		  
		  
		  <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px; margin-left: 8px;">CNPJ:<?= $cliente['cnpj']; ?></div>
		  
		   <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px; margin-left: 8px;">INSCRIÇÃO ESTADUAL: <?= $cliente['inscricao']; ?></div>
		  
		  <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px; margin-left: 8px;">CONTATO: <?= $cliente['contato']; ?>  </div>
		  

		   <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px; margin-left: 8px;">TELEFONE: <?= $cliente['telefone']; ?></div>
		  
		  
	</div>
	  <hr color="#000" size="2.5px">
	  
	 
	  <div>
		<div style="font-size: 16px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; margin-left: 8px; margin-bottom: 6px"><b>DADOS DO RESÍDUO:</b></div>
		  
		<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px; margin-left: 8px;">CÓDIGO NACIONAL: 160306/200201 </div>
		  
		<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px; margin-left: 8px;">DENOMINAÇÃO: Orgânico/Mineral </div>
		  
		  <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px; margin-left: 8px;">PROVENIENTE: Limpeza de fábrica, vencidos, úmidos, avariados, etc. </div>
		  
		  <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px; margin-left: 8px;">CLASSE: IIA</div>
	</div>

		 <hr color="#000" size="2.5px">
	  
		
	  <div>
		<div style="font-size: 16px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; margin-left: 8px; margin-bottom: 6px"><b>REFERÊNCIA:</b></div>
		  
			<?php for($count = 0; $count <= $contador; $count ++){

			$destinacao[$count]['data'] = implode('/',array_reverse(explode('-',$destinacao[$count]['data'])))

			?>


			<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px; margin-left: 8px;">Coleta do dia <?= $destinacao[$count]['data'] ?> – Quantidade: <?= $destinacao[$count]['quantidade'] ?> Kg <?php /*?><?php echo ( $destinacao[$count]['quantidade'] == "" ? "- Quantidade de plástico: ".$destinacao[$count]['quantidade']."kg" : "" ); ?><?php */?> – Nota Fiscal N° <?= $destinacao[$count]['nota'] ?> - MTR N° <?= $destinacao[$count]['mtr'] ?></div>
					
		  

		  
				 
						
			<?php } ?>
		
		  
		 
	</div>
	 <hr color="#000" size="2.5px">
	  
	
	  <div>
		<div style="font-size: 16px; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; margin-left: 8px; margin-bottom: 6px"><b>DESTINAÇÃO FINAL: </b></div>
		<div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px; margin-left: 8px;">Material triado e beneficiado: (Matéria prima orgânico/mineral - Fertilizante orgânico - Misto classe A.) </div>
		  
		  
	</div>
		
	

	
	</table>

	</div>
	  
	  <img style="max-width: 300px; margin-left: 400px; margin-top: 25px" src="<?= base_url('assets/img/certificado/certificado_crea.jpg')?>">
	  <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px; x">Santa Cruz do Rio Pardo, <?= $data_atual; ?></div>
	  
	  </br>
	  <div style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'; font-size: 14px; margin-left: 0px; margin-top: 15px">Este documento(CDF) certifica o recebimento e a respectiva destinação final dos resíduos e rejeitos acima relacionados, utilizando-se as tecnologias mencionadas e a validade desta informação está restrita aos resíduos e rejeitos aqui declarados e a suas respectivas quantidades, sob as penas da lei. </div>

	<div></div>
	  
	  
  </body>
</html>