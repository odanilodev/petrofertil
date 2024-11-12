<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-3">
                <h2>VER VENDA DETALHADA</h2>
            </div>

            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">

                <a style="margin-left: 5px"
                    href="<?= base_url('P_clientes_petrofertil/ver_cliente/' . $cliente['id']) ?>"><span type="button"
                        class="btn btn-info  waves-effect">Ver informações de cliente/comissão</span></a>
            </div>

        </div>

        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form method="post" enctype="multipart/form-data"
                        action="<?= site_url('P_vendas/cadastra_venda') ?>" class="campos-form">
                        <div class="header">
                            <h2 class="tete">Informações sobre a venda</h2>
                        </div>

                        <input type='hidden' name='id' value='<?= isset($vendedor['id']) ? $vendedor['id'] : '' ?>'>

                        <div class="body">
                            <div class="row clearfix">

                                <div class="col-sm-3">
                                    <label>Cliente</label>
                                    <select name="cliente" required class="form-control cliente-select"
                                        id="selectCliente">
                                        <option><?= $cliente['nome_fantasia'] ?></option>
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <label>Vendedor *</label>
                                    <select name="vendedor" required class="form-control vendedor vendedor-select">
                                        <option><?= $venda['vendedor'] ?></option>
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <label>Transportador *</label>
                                    <select name="vendedor" required class="form-control vendedor vendedor-select">
                                        <option><?= $venda['transportador'] ?></option>
                                    </select>
                                </div>



                                <div class="col-sm-3">
                                    <label>Data da Venda *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input required type="date" name='data_venda'
                                                value="<?= isset($venda['data_venda']) ? $venda['data_venda'] : '' ?>"
                                                class="form-control" placeholder="Digite a data da venda">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Ticket</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='ticket'
                                                value="<?= isset($venda['ticket']) ? $venda['ticket'] : '' ?>"
                                                class="form-control" placeholder="Digite o ticket">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Placa</label>
                                    <select name="placa" required class="form-control vendedor vendedor-select">
                                        <option><?= $venda['placa'] ?></option>
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <label>Informações Adicionais</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='informacoes_pagamento'
                                                value="<?= isset($venda['informacoes_pagamento']) ? $venda['informacoes_pagamento'] : '' ?>"
                                                class="form-control" placeholder="Digite aqui uma observação">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row clearfix">

                                <div class="header">
                                    <h2>Produto</h2>
                                </div>

                                <div class="body table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>PRODUTO</th>
                                                <th>VALOR PRODUTO</th>
                                                <th>QUANTIDADE</th>
                                                <th>VALOR TOTAL</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 0; $i < count($produto); $i++) { ?>
                                                <tr>
                                                    <th scope="row"><?= $i + 1 ?></th>
                                                    <td><?= $produto[$i] ?></td>
                                                    <td>R$<?= number_format("$valor_produto[$i]", 2, ",", "."); ?></td>
                                                    <td><?= $quantidade[$i] ?></td>
                                                    <td>R$
                                                        <?php
                                                        // Substituir a vírgula por ponto no valor do produto
                                                        $valor_produto_corrigido = str_replace(',', '.', $valor_produto[$i]);

                                                        // Garantir que a quantidade seja um número sem a vírgula como separador de milhar
                                                        $quantidade_corrigida = str_replace('.', '', $quantidade[$i]); // Remove o ponto da quantidade
                                                        $quantidade_corrigida = (float) $quantidade_corrigida; // Converte para float
                                                    
                                                        // Realizar o cálculo do total do produto
                                                        $total_produto = $quantidade_corrigida * $valor_produto_corrigido;

                                                        // Exibir o valor formatado corretamente
                                                        echo number_format($total_produto, 2, ',', '.');
                                                        ?>
                                                    </td>

                                                </tr>
                                            <? } ?>
                                        </tbody>
                                    </table>


                                </div>
                            </div>

                            <div class="card">

                                <div class="header">
                                    <h2>Valores de Frete</h2>
                                </div>

                                <div class="body">
                                    <div class="row clearfix">


                                        <div class="col-sm-4">
                                            <label>Valor por KM ou KG</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name='valor_km'
                                                        value="<?= isset($venda['valor_km']) ? 'R$ ' . number_format($venda['valor_km'], 2, ',', '.') : '' ?>"
                                                        class="form-control" placeholder="Digite o valor por KM rodado">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Km total rodado</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="number" name='km_total'
                                                        value="<?= isset($venda['km_total']) ? $venda['km_total'] : '' ?>"
                                                        class="form-control" placeholder="Digite o valor por KM rodado">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Adicional</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name='adicional'
                                                        value="<?= isset($venda['adicional']) ? 'R$ ' . number_format($venda['adicional'], 2, ',', '.') : '' ?>"
                                                        class="form-control " placeholder="Digite o valor adicional">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Motivo adicional</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name='motivo_adicional'
                                                        value="<?= isset($venda['motivo_adicional']) ? $venda['motivo_adicional'] : '' ?>"
                                                        class="form-control"
                                                        placeholder="Digite o motivo do valor adicionado">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Imposto</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name='imposto'
                                                        value="<?= isset($venda['imposto']) ? 'R$ ' . number_format($venda['imposto'], 2, ',', '.') : '' ?>"
                                                        class="form-control" placeholder="Digite o imposto">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-4">
                                            <label>Valor total do frete *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input required type="text" name='valor_frete'
                                                        value="<?= isset($venda['valor_frete']) ? 'R$ ' . number_format($venda['valor_frete'], 2, ',', '.') : '' ?>"
                                                        class="form-control valor-frete"
                                                        placeholder="Digite o valor do frete">
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="card">

                                <div class="header">
                                    <h2>Pagamento</h2>
                                </div>

                                <div class="body">
                                    <div class="row clearfix">

                                        <div class="col-sm-4">
                                            <label>Status do pagamento *</label>
                                            <select required name="status_pagamento" required class="form-control">
                                                <option>
                                                    <?= isset($venda['status_pagamento']) ? $venda['status_pagamento'] : '' ?>
                                                </option>

                                            </select>
                                        </div>

                                        <!--<div class="col-sm-4">
                                        <label>Conta Relacionada *</label>
                                        <select required name="conta_relacionada" required class="form-control">
                                            <option>Selecione</option>
                                            <?php foreach ($contas as $c) { ?>
                                            <option value="<?= $c['id'] ?>"><?= $c['descricao'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div> -->

                                        <div class="col-sm-4">
                                            <label>Valor Total da Venda *</label>
                                            <div required class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name='valor_total_venda'
                                                        value="<?= isset($venda['valor_total_venda']) ? 'R$ ' . number_format($venda['valor_total_venda'], 2, ',', '.') : '' ?>"
                                                        class="form-control  total-venda"
                                                        placeholder="Digite o valor por KM rodado">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Prazo para pagamento *</label>
                                            <div required class="form-group">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="date" name='prazo_pagamento'
                                                            value="<?= isset($venda['prazo_pagamento']) ? $venda['prazo_pagamento'] : '' ?>"
                                                            class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                    </form>
                </div>


            </div>
        </div>
        <!-- #END# Input -->
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>



        $('#selectCliente').change(function () {
            var id_cliente = $(this).val();
            $.ajax({
                type: "POST",
                url: '<?= base_url("P_clientes_petrofertil/recebe_cliente") ?>',
                data: {
                    id_cliente: id_cliente
                },
                success: function (data) {
                    $('.produto-select').html(data.option_produto);
                    $('.materia-select').html(data.materia_prima);
                    $('.vendedor-select').html(data.vendedor);
                    $('.frete-select').html(data.option_frete);

                }
            });
        });

        $('#selectTransportador').change(function () {
            var nome_transportador = $(this).val();
            $.ajax({
                type: "POST",
                url: '<?= base_url("P_motoristas/recebe_motoristas_transportador_veiculos") ?>',
                data: {
                    nome_transportador: nome_transportador
                },
                success: function (data) {
                    $('.motorista-select').html(data.option_motorista);
                    $('.veiculo-select').html(data.option_veiculo);

                }
            });
        });

    </script>

    <!-- Seu HTML existente permanece inalterado -->

    <script>

        $(document).ready(function () {
            function carregarProdutosParaCampo(container) {
                var id_cliente = $('#selectCliente').val();
                $.ajax({
                    type: "POST",
                    url: '<?= base_url("P_clientes_petrofertil/recebe_cliente") ?>',
                    data: {
                        id_cliente: id_cliente
                    },
                    success: function (data) {
                        container.find('.produto-select').html(data.option_produto);
                        container.find('.vendedor-select').html(data.vendedor);
                    }
                });
            }


            $(document).on('change', '.produto-select', function () {

                var container = $(this).closest('.product-entry');
                var valor = container.find('.produto-select option:selected').attr('valorProduto');
                var comissao = container.find('.produto-select option:selected').attr('comissaoProduto');
                var medida = container.find('.produto-select option:selected').attr('medidaProduto');

                container.find('.input-valor').val(valor);
                container.find('.input-comissao').val(comissao);
                container.find('.input-medida').val(medida);
            });

            $(document).on('click', '.btn-remove', function () {
                $(this).closest('.product-entry').remove();
            });

            $('#btnAdicionarProduto').on('click', function () {
                var novoProdutoHTML = `
                <div class="product-entry">
                    <div class="row div-campos">
                        <div class="col-sm-3">
                            <label>Produtos e Matéria Prima</label>
                            <select name="produto[]" class="form-control produto produto-select">
                                <option>Selecione o produto</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label>Quantidade</label>
                            <input type="number" required name="quantidade[]" class="form-control quantidade input-multiplicar" placeholder="Digite a quantidade">
                        </div>
                        <div class="col-sm-2">
                            <label>Valor</label>
                            <input type="text" required name="valor_produto[]" class="form-control input-valor valor form-line input-somar" placeholder="Digite o valor do produto">
                        </div>
                        <div class="col-sm-2">
                            <label>Comissão</label>
                            <input type="text" required name="comissao[]" class="form-control input-comissao form-line" placeholder="Digite a comissão">
                        </div>
                        <div class="col-sm-1">
                            <label>Medida</label>
                            <input disable required type="text" name="medida_produto[]" class="form-control input-medida form-line" placeholder="Medida">
                        </div>
                        <div class="col-sm-2"></br>
                            <button type="button" class="btn btn-grey btn-remove">Remover Produto</button>
                        </div>
                    </div>
                </div>
            `;

                $('#product-section').append(novoProdutoHTML);

                var novoContainer = $('#product-section').children().last();
                carregarProdutosParaCampo(novoContainer);
            });

            $(document).on('click', '.btn-remove', function () {
                $(this).closest('.product-entry').remove();
                $(this).closest('.product-entry').find('.input-multiplicar').val('');
                $(this).closest('.product-entry').find('.input-somar').val('');

                calcularTotal();
            });



            $('#selectCliente').change(function () {
                carregarProdutosParaCampo($('#product-section'));
            });
        });


        // soma o valor total dos produtos
        $(document).on('keyup', '.input-somar, .input-multiplicar, .valor-frete', function () {
            calcularTotal();
        });

        function calcularTotal() {

            var totalMultiplicacao = 0;

            // passa pela div dos produtos pra somar entre eles
            $('.div-campos').each(function () {

                let valor_ = $(this).find('.input-somar');
                let valor = parseFloat(valor_.val()) || 0;

                let quantidade_ = $(this).find('.input-multiplicar');
                let quantidade = parseFloat(quantidade_.val()) || 0;

                totalMultiplicacao += valor * quantidade;

            })

            var totalSoma = 0;



            let total = totalMultiplicacao + totalSoma;

            $('.total-venda').val(total);
        }
    </script>