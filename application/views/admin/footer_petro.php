<!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                             Copyright © <?= date('Y') ?>. Todos os Direitos Reservados. Desenvolvido por<a href="https://www.linkedin.com/in/victor-hugo-prado-marquezin-82005a19a/"> Victor Hugo P</a>.
                        </div>
                        <!--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->





  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

  <script>
  $(document).ready(function(){
      $('#minhaTabela1').DataTable({
        	"language": {
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
				"sSearch" : "Pesquisar",
				"emptyTable": "Nenhum registro encontrado",
    "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "infoEmpty": "Mostrando 0 até 0 de 0 registros",
    "infoFiltered": "(Filtrados de _MAX_ registros)",
    "infoThousands": ".",
    "loadingRecords": "Carregando...",
    "processing": "Processando...",
    "zeroRecords": "Nenhum registro encontrado",
    "search": "Pesquisar",
    "paginate": {
        "next": "Próximo",
        "previous": "Anterior",
        "first": "Primeiro",
        "last": "Último"
    },
				
	"buttons": {
        "copySuccess": {
            "1": "Uma linha copiada com sucesso",
            "_": "%d linhas copiadas com sucesso"
        },
        "collection": "Coleção  <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
        "colvis": "Visibilidade da Coluna",
        "colvisRestore": "Restaurar Visibilidade",
        "copy": "Copiar",
        "copyKeys": "Pressione ctrl ou u2318 + C para copiar os dados da tabela para a área de transferência do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..",
        "copyTitle": "Copiar para a Área de Transferência",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "-1": "Mostrar todos os registros",
            "1": "Mostrar 1 registro",
            "_": "Mostrar %d registros"
        },
        "pdf": "PDF",
        "print": "Imprimir"
    },
    "autoFill": {
        "cancel": "Cancelar",
        "fill": "Preencher todas as células com",
        "fillHorizontal": "Preencher células horizontalmente",
        "fillVertical": "Preencher células verticalmente"
    },
    "lengthMenu": "Exibir _MENU_ resultados por página",
    "searchBuilder": {
        "add": "Adicionar Condição",
        "button": {
            "0": "Construtor de Pesquisa",
            "_": "Construtor de Pesquisa (%d)"
        },
        "clearAll": "Limpar Tudo",
        "condition": "Condição",
        "conditions": {
            "date": {
                "after": "Depois",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vazio",
                "equals": "Igual",
                "not": "Não",
                "notBetween": "Não Entre",
                "notEmpty": "Não Vazio"
            },
            "moment": {
                "after": "Depois",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vazio",
                "equals": "Igual",
                "not": "Não",
                "notBetween": "Não Entre",
                "notEmpty": "Não Vazio"
            },
            "number": {
                "between": "Entre",
                "empty": "Vazio",
                "equals": "Igual",
                "gt": "Maior Que",
                "gte": "Maior ou Igual a",
                "lt": "Menor Que",
                "lte": "Menor ou Igual a",
                "not": "Não",
                "notBetween": "Não Entre",
                "notEmpty": "Não Vazio"
            },
            "string": {
                "contains": "Contém",
                "empty": "Vazio",
                "endsWith": "Termina Com",
                "equals": "Igual",
                "not": "Não",
                "notEmpty": "Não Vazio",
                "startsWith": "Começa Com"
            }
        },
        "data": "Data",
        "deleteTitle": "Excluir regra de filtragem",
        "logicAnd": "E",
        "logicOr": "Ou",
        "title": {
            "0": "Construtor de Pesquisa",
            "_": "Construtor de Pesquisa (%d)"
        },
        "value": "Valor"
    },
    "searchPanes": {
        "clearMessage": "Limpar Tudo",
        "collapse": {
            "0": "Painéis de Pesquisa",
            "_": "Painéis de Pesquisa (%d)"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Nenhum Painel de Pesquisa",
        "loadMessage": "Carregando Painéis de Pesquisa...",
        "title": "Filtros Ativos"
    },
    "searchPlaceholder": "Digite aqui",
    "thousands": "."
				
				
            }
        });
  });
	  
	  

	  
  </script>  




    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
	<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"></script>

    <!-- bootstap bundle js -->
    <script src="<?= base_url('assets/admin/vendor/bootstrap/js/bootstrap.bundle.js'); ?>"></script>
    <!-- slimscroll js -->
    <script src="<?= base_url('assets/vendor/slimscroll/jquery.slimscroll.js'); ?>"></script>
    <!-- main js -->
    <script src="<?= base_url('assets/libs/js/main-js.js'); ?>"></script>
    <!-- chart chartist js -->
    <script src="<?= base_url('assets/admin/vendor/charts/chartist-bundle/chartist.min.js'); ?>"></script>
    <!-- sparkline js -->
    <script src="<?= base_url('assets/admin/vendor/charts/sparkline/jquery.sparkline.js'); ?>"></script>
    <!-- morris js -->
    <script src="<?= base_url('assets/admin/vendor/charts/morris-bundle/raphael.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/charts/morris-bundle/morris.js'); ?>"></script>
    <!-- chart c3 js -->
    <script src="<?= base_url('assets/admin/vendor/charts/c3charts/c3.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/charts/c3charts/d3-5.4.0.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/charts/c3charts/C3chartjs.js'); ?>"></script>

    <script src="<?= base_url('assets/admin/libs/js/dashboard-ecommerce.js'); ?>"></script>

	
	
 <script src="<?= base_url('assets/admin/vendor/chart.js/Chart.min.js'); ?>"></script>
    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/js/demo/chart-area-demo.js'); ?>"></script>
    <script src="<?= base_url('assets/js/demo/chart-pie-demo.js'); ?>"></script>

<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>       

<script>
	
					$('.valor').mask('###0.00', {reverse: true});
	
	
	
						//https://api.jquery.com/click/
						$("#add-campo").click(function () {
							//https://api.jquery.com/append/
							$("#formulario").append(' <div class="row container mt-2"><input  type="text" name="servico[]" placeholder="Digite o Servico" class="form-control col-md-3"> <input id="valor" placeholder="Digite o valor do serviço" type="text" step="0.01" value="" name="valor[]" class="form-control valor col-md-3"> </div>');
							
						});
	
	
	// aqui vhhhhhhhhhhhhhhhhhhhh
	
	$('#exampleModal2').on('shown.bs.modal', function (event) {
		
		var button = $(event.relatedTarget) // Botão que acionou o modal
		
        var id_cliente    = button.data('pegaid') // peguei o data que coloquei la 
			
		$('.inp').val(id_cliente); // mandei dentro de um imput que criei dentro do modal
		
		$('.link_id').attr('href','<?= site_url('clientes_petro/deleta_cliente/')?>'+ id_cliente);
		

		})
	
	
	$('#exampleModal3').on('shown.bs.modal', function (event) {
		
		var button = $(event.relatedTarget) // Botão que acionou o modal
		
        var id_fornecedor    = button.data('pegaid') // peguei o data que coloquei la 
			
		$('.inp').val(id_fornecedor); // mandei dentro de um imput que criei dentro do modal
		
		$('.link_id').attr('href','<?= site_url('Fornecedores/deleta_fornecedor/')?>'+ id_fornecedor);
		

		})
	

	

</script>

<script>


	$(function() {

        if ($('#c3chart_area').length) {
            var chart = c3.generate({
                bindto: "#c3chart_area",
                data: {
                    columns: [
                        ['KM/L' <?=$media_parametro?>]
                    ],
                    types: {
                        data1: 'area-spline',
                       
                    },
                    colors: {
                        data1: '#5969ff',
                        

                    }

                },
                axis: {

                    y: {
                        show: true




                    },
                    x: {
                        show: true
                    }
                }

            });
        }
		
		  });

	
</script>

</body>
 
</html>