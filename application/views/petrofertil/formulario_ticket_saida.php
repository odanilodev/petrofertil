<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>CADASTRAR SAÍDA TICKET PETROFERTIL</h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form method="post" enctype="multipart/form-data" action="<?= site_url('p_pesagem/saida_ticket') ?>"
                        class="campos-form">
                        <div class="header">
                            <h2 class="tete">Pesagem Final</h2>
                        </div>

                        <input type='hidden' name='id' value='<?= isset($ticket['id']) ? $ticket['id'] : '' ?>'>

                        <div class="body">

                            <div class="row clearfix">

                                <div class="col-sm-12">
                                    <div class="form-group" id="product-section">
                                        <div class="product-entry">
                                            <div class="row div-campos">
                                                <div class="col-sm-2">
                                                    <label for="peso-bruto">Peso Bruto</label>
                                                    <input type="text" name="peso-bruto" id="peso-bruto"
                                                        class="form-control" value="<?= $ticket['peso_bruto'] ?>"
                                                        placeholder="Digite o peso bruto">
                                                </div>

                                                <div class="col-sm-2">
                                                    <label for="tara">Tara</label>
                                                    <input type="text" name="tara" value="<?= $ticket['tara'] ?>"
                                                        id="tara" class="form-control" placeholder="Digite a tara">
                                                </div>

                                                <div class="col-sm-2">
                                                    <label for="peso-liquido">Peso Líquido</label>
                                                    <input type="text" value="<?= $ticket['peso_liquido'] ?>"
                                                        name="peso-liquido" id="peso-liquido" class="form-control"
                                                        placeholder="Digite o peso líquido" readonly>
                                                </div>

                                            </div>
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
            <!-- #END# Input -->
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>

            $(document).ready(function () {
                function parseNumber(value) {
                    return parseFloat(value.replace(/\./g, '').replace(',', '.')) || 0;
                }

                function formatNumber(value) {
                    return value.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                }

                function calculatePesoLiquido() {
                    let pesoBruto = parseNumber($('#peso-bruto').val());
                    let tara = parseNumber($('#tara').val());
                    let pesoLiquido = pesoBruto - tara;
                    $('#peso-liquido').val(formatNumber(pesoLiquido));
                }

                $('#peso-bruto, #tara').on('input', function () {
                    calculatePesoLiquido();
                });
            });

            $(document).ready(function () {
                function applyWeightMask(element) {
                    $(element).on('input', function () {
                        let value = $(this).val().replace(/\D/g, '');
                        if (value.length > 3) {
                            value = value.replace(/(\d{1,3})(\d{3})$/, '$1.$2');
                        }
                        $(this).val(value);
                    });
                }

                applyWeightMask('#peso-bruto');
                applyWeightMask('#tara');
                applyWeightMask('#peso-liquido');
                applyWeightMask('#descontos');
                applyWeightMask('#liquido-final');
            });

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

                // passa pela div dos produtos pra somar entre eles
                $('.div-campos').each(function () {

                    let valor_ = $(this).find('.input-somar');
                    let valor = parseFloat(valor_.val()) || 0;

                    let quantidade_ = $(this).find('.input-multiplicar');
                    let quantidade = parseFloat(quantidade_.val()) || 0;

                    if (selectTipoFrete != 'Valor por Km rodado') {

                        totalFrete += valorTipoFrete * quantidade;
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

                $('.total-venda').val(total);
                $('.valor-frete').val(totalFrete);
            }
        </script>