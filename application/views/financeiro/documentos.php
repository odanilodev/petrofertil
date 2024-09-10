<?php  
	
	$status = $this->session->userdata('usuario');
	
	if($status != "logado"){
		
		redirect('financeiro/verifica_login');
	}
	
	$usuario = $this->session->userdata('login');
	
	$nome_usuario = $this->session->userdata('nome_usuario');
	
	?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>TABELA DE DOCUMENTOS</h2>
        </div>

        <?php if($usuario == 'fernanda@petroecol.com.br' or $usuario == 'reciclagem@petroecol.com.br'){ ?>
        <div class="col-md-12" style="margin-bottom: 12px; margin-top: -8px" align="right"></div>
        <?php } ?>

        <!-- Basic Example -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>DOCUMENTOS DA PETROECOL</h2>
                    </div>
                    <div class="body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome do Documento</th>
                                    <th>Vencimento</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                function formatData($date) {
                                    return ($date && $date !== '0000-00-00') ? date("d/m/Y", strtotime($date)) : 'Não Cadastrado';
                                }

                                function createTableRow($documentoName, $documentoDate) {
                                    echo "<tr>";
                                    echo "<td>" . strtoupper(str_replace('_', ' ', $documentoName)) . "</td>";
                                    echo "<td>" . formatData($documentoDate) . "</td>";
                                    echo "<td>";
                                    echo "<span data-toggle='modal' data-cli-end='$documentoName' data-target='#exampleModalfile' class='badge bg-blue abrir_modal_documento_empresa cad'>Cadastrar</span>";
                                    if ($documentoDate && $documentoDate !== '0000-00-00') {
                                        echo "<a href='" . base_url("F_documentos/download_documento/$documentoName") . "'><span class='badge bg-green'>Download</span></a>";
                                    }
                                    echo "</td>";
                                    echo "</tr>";
                                }

                                createTableRow('contrato_social', $documento['contrato_social']);
                                createTableRow('cartao_cnpj', $documento['cartao_cnpj']);
                                createTableRow('alvara', $documento['alvara']);
                                createTableRow('licenca_operacao', $documento['licenca_operacao']);
                                createTableRow('ibama', $documento['ibama']);
                                createTableRow('avcb', $documento['avcb']);
                                createTableRow('certidao_negativa_federal', $documento['certidao_negativa_federal']);
                                createTableRow('certidao_negativa_estadual', $documento['certidao_negativa_estadual']);
                                createTableRow('certidao_negativa_municipal', $documento['certidao_negativa_municipal']);
                                createTableRow('certificado_regularidade_fgts', $documento['certificado_regularidade_fgts']);
                                createTableRow('certidao_negativa_trabalhista', $documento['certidao_negativa_trabalhista']);
                                createTableRow('art', $documento['art']);
                                createTableRow('pcmso', $documento['pcmso']);
                                createTableRow('pgr', $documento['pgr']);
                                createTableRow('pgrs', $documento['pgrs']);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Example -->
        <!-- Colored Card - With Loading -->
</section>

<div class="modal fade" id="exampleModalfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div style="background-color: #fff;" class="">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anexe aqui o documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="caminho_file" enctype="multipart/form-data" method="post">
                    <div class="row">

                        <div class="form-line col-md-5">
                            <input type="date" name='data_vencimento' value="" class="form-control">
                        </div>
                        <div class="form-line col-md-7">
                            <input type="file" name='file' value="" class="form-control">
                        </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary  waves-effect envia_data">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    
$('.abrir_modal_documento_empresa').on('click', function(event) {

var button = $(this); // Botão que acionou o modal

var endereco = button.data('cli-end') // peguei o data que coloquei la 

$('#caminho_file').attr('action', '<?= site_url('F_documentos/insere_documento/') ?>' + endereco);

})
</script>