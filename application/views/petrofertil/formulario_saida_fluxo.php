<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>LANÇAMENTO DE SAÍDA DO CAIXA</h2>
        </div>
        <!-- Formulário de Cadastro -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form method="post" enctype="multipart/form-data" action="<?= base_url('P_caixa/insere_saida_manual') ?>">
                        <div class="header">
                            <h2>Formulário de Lançamento</h2>
                        </div>
                        <input type="hidden" name="id" value="<?= isset($produto['id']) ? $produto['id'] : '' ?>">
                        <div class="body">
                            <div class="row">

                                <div class="col-md-4">
                                    <label>Banco</label>
                                    <select name="banco" class="form-control">
                                        <option value="">Selecione</option>
                                        <?php foreach($contas as $conta){ ?>
                                            <option value="<?= $conta['id'] ?>"><?= $conta['descricao'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label>Data da Saída</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input required type="date" name='data_saida'
                                                value=""
                                                class="form-control" placeholder="Digite a data de saida">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-4">
                                    <label>Valor</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input required type="text" name='valor'
                                                value=""
                                                class="form-control valor" placeholder="Digite o valor da saida">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Cadastro do pagador</label>
                                    <select name="cadastro" class="form-control">
                                        <option value="">Selecione</option>
                                            <option value="Cliente">Cliente</option>
                                            <option value="Vendedor">Vendedor</option>
                                            <option value="Transportador">Transportador</option>
                                            <option value="Motorista">Motorista</option>
                                            <option value="Prestador">Prestador de serviço</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label>Recebido de</label>
                                    <select name="pagador" class="form-control">
                                        <option value="">Selecione</option>
                                    </select>
                                </div>

                                 
                                <div class="col-sm-4">
                                    <label>Observação</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input required type="text" name='observacao'
                                                value=""
                                                class="form-control" placeholder="Digite uma observacao">
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </div>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
    // Detecta mudança no select de Cadastro do pagador
    $('select[name="cadastro"]').change(function(){
        var tipoPagador = $(this).val(); // Pega o valor selecionado
        var baseUrl = "<?= base_url(); ?>"; // Define a base URL
        var endpoint = ""; // Inicializa a variável do endpoint

        // Mapeia o tipo de pagador para o endpoint apropriado
        var endpoints = {
            "Cliente": "P_clientes_petrofertil/recebe_todos_clientes_nome",
            "Vendedor": "P_vendedores_petrofertil/recebe_vendedores_nome",
            "Transportador": "P_transportadores/recebe_transportadores_nome",
            "Motorista": "P_motoristas/recebe_motoristas_nome",
            "Prestador": "P_prestadores_servico/recebe_prestadores_nome"
        };

        // Define o endpoint com base no tipo de pagador selecionado
        endpoint = endpoints[tipoPagador];

        // Constrói a URL completa
        var url = baseUrl + endpoint;

        // Verifica se o endpoint foi definido (isto é, se o tipoPagador é válido)
        if(endpoint) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    var options = '<option value="">Selecione</option>';
                    // Itera sobre os dados recebidos para adicionar as opções
                    // A chave para 'nome' ou 'nome_fantasia' deve ser ajustada baseado no retorno de cada endpoint
                    $.each(data, function(key, value){
                        var nome = value.nome || value.nome_fantasia; // Ajuste conforme necessário
                        options += '<option value="'+ nome +'">'+ nome +'</option>';
                    });
                    // Atualiza o select de Pagador com as novas opções
                    $('select[name="pagador"]').html(options);
                }
            });
        }
    });
});
</script>

