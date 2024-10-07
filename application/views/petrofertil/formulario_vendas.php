<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>CADASTRAR VENDA PETROFERTIL</h2>
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
                                    <label>Cliente *</label>
                                    <select name="cliente" required class="form-control cliente-select"
                                        id="selectCliente">
                                        <option>Selecione</option>
                                        <?php foreach ($clientes as $index => $c) { ?>
                                            <option value="<?= $c['id'] ?>"
                                                data-produto="<?= isset($c['produto']) ? htmlspecialchars(json_encode($c['produto'])) : '' ?>">
                                                <?= $c['nome_fantasia'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <label>Vendedor *</label>
                                    <select name="vendedor" required class="form-control vendedor vendedor-select">
                                        <option>Selecione o vendedor</option>
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <label>Transportador *</label>
                                    <select name="transportador" required class="form-control transportador-select"
                                        id="selectTransportador">
                                        <option>Selecione</option>
                                        <?php foreach ($transportadores as $transportador) { ?>
                                            <option value="<?= $transportador['nome'] ?>"><?= $transportador['nome'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <label>Motorista (Selecione o transportador) *</label>
                                    <select required name="motorista" class="form-control motorista-select">
                                        <option>Selecione o motorista</option>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label>Data da Venda *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input required type="date" name='data_venda' value="" class="form-control"
                                                placeholder="Digite a data da venda">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Ticket</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='ticket'
                                                value="<?= isset($vendedor['ticket']) ? $vendedor['ticket'] : '' ?>"
                                                class="form-control" placeholder="Digite o ticket">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Placa</label>
                                    <select name="placa" required class="form-control vendedor veiculo-select">
                                        <option>Selecione a placa</option>
                                    </select>
                                </div>


                            </div>

                            <div class="row clearfix">

                                <div class="header">
                                    <h2>Produto</h2>
                                </div>

                                <div class="col-sm-12" style="margin-top: 30px">
                                    <div class="form-group" id="product-section">
                                        <div class="product-entry">
                                            <div class="row div-campos">

                                                <div class="col-sm-3">
                                                    <label>Produtos e Materia Prima *</label>

                                                    <select required name="produto[]"
                                                        class="form-control produto produto-select">
                                                        <option>Selecione o produto</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label>Quantidade *</label>
                                                    <input required type="text" name="quantidade[]"
                                                        class="form-control quantidade mask-quilo input-multiplicar"
                                                        placeholder="Digite a quantidade">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label>Valor *</label>
                                                    <input required type="text" name="valor_produto[]"
                                                        class="form-control input-valor  form-line input-somar"
                                                        placeholder="Digite o valor do produto">
                                                </div>

                                                <div class="col-sm-2">
                                                    <label>Comissão *</label>
                                                    <input required type="text" name="comissao[]"
                                                        class="form-control input-comissao form-line"
                                                        placeholder="Digite a comissão">
                                                </div>

                                                <div class="col-sm-1">
                                                    <label>Medida *</label>
                                                    <input required disable type="text" name="medida_produto[]"
                                                        class="form-control input-medida form-line"
                                                        placeholder="Medida">
                                                </div>

                                                <div class="col-sm-2"></br>
                                                    <button type="button" class="btn btn-primary"
                                                        id="btnAdicionarProduto">Adicionar Produto</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Observação</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name='informacoes_pagamento' class="form-control"
                                                placeholder="Digite aqui uma observação"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                </div>

                <div class="card">

                    <div class="header">
                        <h2>Valores de Frete</h2>
                    </div>

                    <div class="body">
                        <div class="row clearfix">

                            <div class="col-sm-4">
                                <label>Tipo de cobrança de frete (Cadastrada no cliente)</label>
                                <select name="tipo_frete" class="form-control frete frete-select">
                                    <option>Selecione o tipo de frete</option>
                                </select>
                            </div>


                            <div class="col-sm-4">
                                <label class="label-valor-tipo-frete">Valor por KM</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input id="valor-tipo-frete" type="text" name='valor_km' value=""
                                            class="form-control valor" placeholder="Digite o valor por KM rodado">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label>Km total rodado</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name='valor_km' value=""
                                            class="form-control km-rodado distancia-cliente"
                                            placeholder="Digite o valor por KM rodado">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label>Adicional</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name='adicional' value=""
                                            class="form-control valor valor-adicional"
                                            placeholder="Digite o valor adicional">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label>Motivo adicional</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name='motivo_adicional' value="" class="form-control"
                                            placeholder="Digite o motivo do valor adicionado">
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-sm-4">
                                        <label>Imposto</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name='imposto'
                                                    value="#"
                                                    class="form-control valor" placeholder="Digite o imposto">
                                            </div>
                                        </div>
                                    </div> -->


                            <div class="col-sm-4">
                                <label>Valor total do frete *</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input required type="text" name='valor_frete' value=""
                                            class="form-control valor valor-frete"
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
                                    <option>Selecione</option>
                                    <option selected value="em aberto">Em aberto</option>
                                    <!-- <option value="pago">Pago</option> -->
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
                                        <input type="text" name='valor_total_venda' value=""
                                            class="form-control total-venda" placeholder="Digite o valor por KM rodado">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label>Prazo para pagamento *</label>
                                <div required class="form-group">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" name='prazo_pagamento'
                                                value="<?= isset($vendedor['prazo_pagamento']) ? $vendedor['prazo_pagamento'] : '' ?>"
                                                class="form-control data_pagamento" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                                <div class='lala'><!-- js --></div>
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
                    $('#valor-tipo-frete').val(data.valor_tipo_frete);

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

        function calcularFretePorTonelada(quantidadeRecebida, valorPorTonelada) {

            const toneladas = quantidadeRecebida / 1000;
            const totalFrete = toneladas * valorPorTonelada;
            return totalFrete;
        }

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
                        $('.data_pagamento').val(data.data_pagamento);

                        if ($('.frete-select').val() == 'Valor por Tonelada') {
                            $('.label-valor-tipo-frete').html('Valor por Tonelada');

                            $('#valor-tipo-frete').val(data.valor_por_tonelada);
                        } else {
                            $('.label-valor-tipo-frete').html('Valor por KM');

                            $('.distancia-cliente').val(data.distancia);
                            calcularTotal();

                        }

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
                            <input type="text" required name="quantidade[]"  class="form-control quantidade input-multiplicar mask-quilo" placeholder="Digite a quantidade">
                        </div>
                        <div class="col-sm-2">
                            <label>Valor</label>
                            <input type="text" required name="valor_produto[]" class="form-control input-valor form-line input-somar" placeholder="Digite o valor do produto">
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
        $(document).on('keyup', '.input-somar, .input-multiplicar, .valor-frete, .valor-adicional, #valor-tipo-frete, .km-rodado', function () {
            calcularTotal();
        });

        function calcularTotal() {

            let valorAdicional = parseFloat($('.valor-adicional').val()) || 0;
            let valorTipoFrete = $('#valor-tipo-frete').val();

            let selectTipoFrete = $('.frete-select').val();

            var totalMultiplicacao = 0;
            var totalFrete = 0;

            let quantidadeTotal = 0;
            // passa pela div dos produtos pra somar entre eles
            $('.div-campos').each(function () {

                let valor_ = $(this).find('.input-somar');
                let valor = parseFloat(valor_.val()) || 0;

                let quantidade_ = $(this).find('.input-multiplicar');
                let quantidade = parseFloat(quantidade_.val().replace('.', '')) || 0;

                quantidadeTotal += quantidade;

                if (selectTipoFrete != 'Valor por Km rodado') {

                    if ($('.frete-select').val() == "Valor por Tonelada") {
                        totalFrete += calcularFretePorTonelada(quantidade, valorTipoFrete);
                    } else {

                        totalFrete += valorTipoFrete * quantidade;
                    }

                }

                totalMultiplicacao += valor * quantidade;

            })

            var totalSoma = 0;

            let total = totalMultiplicacao + totalSoma;

            if (selectTipoFrete != 'Valor por Km rodado') {

                totalFrete = totalFrete + valorAdicional;

            } else {

                totalFrete = valorTipoFrete * $('.km-rodado').val();

                totalFrete = totalFrete + valorAdicional;

            }

            if (quantidadeTotal > 14000) {

                let diferencaQuantidade = quantidadeTotal - 14000;
                totalFrete += calcularFretePorTonelada(diferencaQuantidade, 100);
            }

            function setValueAndMask(value, totalFrete) {
                $('.total-venda').val(value.toFixed(2));
                $('.total-venda').trigger('input');
                $('.valor-frete').val(totalFrete * 100);
                $('.valor-frete').trigger('input');
            }

            setValueAndMask(total, totalFrete);

        }
    </script>