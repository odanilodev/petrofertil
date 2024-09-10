<!-- Jquery Core Js -->
<script src="<?= base_url('assets/financeiro/plugins/jquery/jquery.min.js') ?>"></script>

<!-- Bootstrap Core Js -->
<script src="<?= base_url('assets/financeiro/plugins/bootstrap/js/bootstrap.js') ?>"></script>

<!-- Select Plugin Js -->
<!--<script src="<?= base_url('assets/financeiro/plugins/bootstrap-select/js/bootstrap-select.js') ?>"></script>  qualquer coisa vc volta isso .. mais acho que nao vai afetar nada fuiiiii-->

<!-- Slimscroll Plugin Js -->
<script src="<?= base_url('assets/financeiro/plugins/jquery-slimscroll/jquery.slimscroll.js') ?>"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?= base_url('assets/financeiro/plugins/node-waves/waves.js') ?>"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="<?= base_url('assets/financeiro/plugins/jquery-countto/jquery.countTo.js') ?>"></script>

<!-- Morris Plugin Js -->
<script src="<?= base_url('assets/financeiro/plugins/plugins/raphael/raphael.min.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/morrisjs/morris.js') ?>"></script>


<!-- Jquery DataTable Plugin Js -->
<script src="<?= base_url('assets/financeiro/plugins/jquery-datatable/jquery.dataTables.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/jquery-datatable/extensions/export/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/jquery-datatable/extensions/export/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/jquery-datatable/extensions/export/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/jquery-datatable/extensions/export/buttons.print.min.js') ?>"></script>

<!-- Custom Js -->
<script src="<?= base_url('assets/financeiro/js/admin.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/js/pages/tables/jquery-datatable.js') ?>"></script>

<!-- ChartJs -->
<script src="<?= base_url('assets/financeiro/plugins/chartjs/Chart.bundle.js') ?>"></script>

<!-- Flot Charts Plugin Js -->
<script src="<?= base_url('assets/financeiro/plugins/flot-charts/jquery.flot.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/flot-charts/jquery.flot.resize.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/flot-charts/jquery.flot.pie.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/flot-charts/jquery.flot.categories.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/plugins/flot-charts/jquery.flot.time.js') ?>"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="<?= base_url('assets/financeiro/plugins/jquery-sparkline/jquery.sparkline.js') ?>"></script>

<!-- Custom Js -->
<?php /*?><script src="<?= base_url('assets/financeiro/js/admin.js') ?>"></script><?php */ ?>
<script src="<?= base_url('assets/financeiro/js/pages/index.js') ?>"></script>

<script src="<?= base_url('assets/financeiro/plugins/sweetalert/sweetalert.min.js') ?>"></script>
<script src="<?= base_url('assets/financeiro/js/pages/ui/dialogs.js') ?>"></script>

<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>



<script>
	//https://api.jquery.com/click/
	$("#add-campo").click(function() {
		//https://api.jquery.com/append/

		var dateNow = Date.now();

		$("#formulario").append(
			"<div class='col-sm-3'><p><b>Produto</b></p><select required='' id='macros' name='produto[]' class='form-control macros show-tick'><option>Selecione</option><?php foreach ($produtos as $p) { ?><option value='<?= $p['nome'] ?>'><?= $p['nome'] ?></option><?php } ?></select></div><div class='col-sm-3'><label>KG/Quantidade</label><div class='form-group'><div class='form-line'><input type='text' onblur='calcular(" + dateNow + ");' name='unidade_peso[]' value='' class='form-control num_" + dateNow + "' placeholder='Quantidade'></div></div></div><div class='col-sm-3'><label>Preço de venda</label><div class='form-group'><div class='form-line'><input type='text' onblur='calcular(" + dateNow + ");' name='valor_venda[]' value='' class='form-control valor num2_" + dateNow + "' placeholder='Valor venda?'></div></div></div><div class='col-sm-3'><label>Valor total </label><div class='form-group'><div class='form-line'><input type='text' onblur='calcular(" + dateNow + ");' name='valor_total[]' value='' class='form-control resultado" + dateNow + " valor resultado' Readonly></div></div></div>"
		);
	});


	//calcular soma de 2 input
	function calcular(codigo) {

		var num1 = Number($('.num_' + codigo).val());
		var num2 = Number($('.num2_' + codigo).val());
		var elemResult = $('.resultado' + codigo).val();


		if (elemResult.textContent === undefined) {

			$('.resultado' + codigo).val(num1 * num2);

			elemResult.textContent = "R$" + String(num1 * num2) + "";
		} else {

			$('.resultado' + codigo).val(num1 * num2);

			elemResult.innerText = "R$" + String(num1 * num2) + "";
		}
	}


	$('#macros').change(function() {

		var pega_id = $('#macros option:selected').data('id');

		var pega_url = $('#macros option:selected').data('url');

		$.ajax({
			type: "POST",
			url: pega_url, // aqui vc coloca o controler  // 
			data: {
				id_macro: pega_id
			}, // aqui vai ser a variavel que vc vai chama la .. 
			success: function(data) // esse data que ta aqui dentro é o que ta retornando la no controler ... no caso o echo que vc deu la 
			{
				$('.micros').html(data);
			}
		});


	});


	var formCustos = " <div style='margin-left: 18px;'><h4>Formulario de Custos</h4></div></br><div class='col-sm-4'><label>Clientes</label><div class='form-group'><div class='form-line'><input type='text' name='clientes' value='' class='form-control' placeholder='Insira o valor gasto'></div></div></div><div class='col-sm-4'><label>Alimentação</label><div class='form-group'><div class='form-line'><input type='text' name='alimentacao' value='' class='form-control' placeholder='Insira o valor gasto'></div></div></div><div class='col-sm-4'><label>Combustivel</label><div class='form-group'><div class='form-line'><input type='text' name='combustivel' value='' class='form-control' placeholder='Insira o valor gasto'></div></div></div><div class='col-sm-4'><label>Estacionamento</label><div class='form-group'><div class='form-line'><input type='text' name='estacionamento' value='' class='form-control' placeholder='Insira o valor gasto'></div></div></div><div class='col-sm-4'><label>Pedágio</label><div class='form-group'><div class='form-line'><input type='text' name='pedagio' value='' class='form-control' placeholder='Insira o valor gasto'></div></div></div><div class='col-sm-4'><label>Detergente</label><div class='form-group'><div class='form-line'><input type='text' name='detergente' value='' class='form-control' placeholder='Insira o valor gasto'></div></div></div><div class='col-sm-4'><label>Óleo</label><div class='form-group'><div class='form-line'><input type='text' name='oleo' value='' class='form-control' placeholder='Insira o valor gasto'></div></div></div><div class='col-sm-4'><label>Outros</label><div class='form-group'><div class='form-line'><input type='text' name='outros' value='' class='form-control' placeholder='Insira o valor gasto'></div></div></div><div class='col-sm-4'><label>Oque?</label><div class='form-group'><div class='form-line'><input type='text' name='oque' value='' class='form-control' placeholder='Insira o valor gasto'></div></div></div";

	$('.micros').change(function() {

		var pega_id = $(this).find('option:selected').val();
		if (pega_id == 10) {
			$('.form_custos').html(formCustos);
		} else {
			$('.form_custos').html("");
		}
	});
</script>


<script>
	$('.valor').mask('###0.00', {
		reverse: true
	});
	$('.cnpj').mask('00.000.000/0000-00', {
		reverse: true
	});
	$('.cpf').mask('000.000.000-00', {
		reverse: true
	});
	$('.telefone').mask('00 00000-0000', {
		reverse: true
	});
	$('.inscricao').mask('000.000.000.000', {
		reverse: true
	});
</script>

<script>


	$('#exampleModalSdeleta').on('shown.bs.modal', function(event) {

		var button = $(event.relatedTarget) // Botão que acionou o modal

		var id_cliente = button.data('pegaid') // peguei o data que coloquei la 

		$('.inp').val(id_cliente); // mandei dentro de um imput que criei dentro do modal

		$('.deleta_fluxo').attr('href', '<?= site_url('S_fluxo/deleta_movimentacao_estoque/') ?>' + id_cliente);

		$('.deleta').attr('href', '<?= site_url('S_fluxo/deleta_movimentacao/') ?>' + id_cliente);

	})



</script>

<!-- Load React. -->
<!-- Note: when deploying, replace "development.js" with "production.min.js". -->
<script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>

<!-- Load our React component. -->
<script src="<?= base_url('assets/react/like_button.js') ?>"></script>

<script src="<?= base_url('assets/financeiro/js/demo.js') ?>"></script>
</body>

</html>