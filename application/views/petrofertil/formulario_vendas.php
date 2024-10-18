<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>CADASTRAR VENDA PETROFERTIL</h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form method="post" id="form-vendas" class="campos-form">
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

                                                <div class="col-sm-4">
                                                    <label>Produtos e Materia Prima *</label>

                                                    <select required name="produto[]"
                                                        class="form-control produto produto-select">
                                                        <option>Selecione o produto</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>Quantidade *</label>
                                                    <input required type="text" name="quantidade[]"
                                                        class="form-control quantidade mask-quilo input-multiplicar"
                                                        placeholder="Digite a quantidade">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>Valor *</label>
                                                    <input required type="text" name="valor_produto[]"
                                                        class="form-control input-valor  form-line input-somar"
                                                        placeholder="Digite o valor do produto">
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>Comissão *</label>
                                                    <input required type="text" name="comissao[]"
                                                        class="form-control input-comissao form-line"
                                                        placeholder="Digite a comissão">
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>Medida *</label>
                                                    <input required disable type="text" name="medida_produto[]"
                                                        class="form-control input-medida form-line"
                                                        placeholder="Medida">
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>Subtotal</label>
                                                    <input required disable type="text" name="subtotal_produto[]"
                                                        class="form-control input-subtotal valor form-line"
                                                        placeholder="Subtotal">
                                                </div>


                                                <div class="col-sm-2" style="float: right"></br>
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
                                <select name="tipo_frete" class="form-control frete frete-select" id="tipoFrete">
                                    <option value="">Selecione o tipo de frete</option>
                                    <option value="retirada">Frete retirada</option>
                                    <!-- Outras opções de frete -->
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
                                <label>Desconto</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name='adicional' value=""
                                            class="form-control valor valor-adicional"
                                            placeholder="Digite o valor adicional">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label>Motivo desconto</label>
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
                                <select required name="status_pagamento" id="status_pagamento" class="form-control">
                                    <option>Selecione</option>
                                    <option value="em aberto">Em aberto</option>
                                    <option value="pago">Pago</option>
                                </select>
                            </div>

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
                                            <input type="date" name='prazo_pagamento' value=""
                                                class="form-control data_pagamento" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Campo para valor de pagamento 
                            <div class="col-sm-4">
                                <label>Valor Pago *</label>
                                <input type="text" name="valor_pago" class="form-control"
                                    placeholder="Digite o valor pago">
                            </div>-->

                            <div class="col-sm-12">
                                <button type="button" class="btn btn-primary btn-finalizar-venda">Cadastrar</button>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="ModalReceber" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Digite as informações do recebimento
                                        do
                                        valor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="modal-danilo" action="<?= site_url('p_contas_receber/atualiza_status') ?>"
                                        method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-line col-md-12">
                                                    <label>Data de recebimento</label>
                                                    <input type="date" name='data_fluxo' value=""
                                                        class="form-control data-fluxo">
                                                </div>

                                                <div class="form-line col-md-6" style="display: none">
                                                    <label>Conta Recebida</label>
                                                    <select name="id_conta"
                                                        class="form-control id_conta select-conta-recebida">
                                                        <option value="">Selecione</option>
                                                        <?php foreach ($contas as $banco) { ?>
                                                            <option value="<?= $banco['id'] ?>"><?= $banco['descricao'] ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div style='margin-top:25px' class="form-line col-md-12">
                                                    <button type="button" id="add-forma-recebimento"
                                                        class="btn btn-success">Adicionar Forma de Pagamento</button>
                                                    <button type="button" id="add-cheque"
                                                        class="btn btn-success">Adicionar
                                                        Cheque</button>
                                                </div>
                                            </div>

                                            <div class="col-md-12 multiplas-formas-campos">
                                                <h4 class='hidden titulo-pagamento'>Formas de Pagamento
                                                    <hr>
                                                </h4>
                                                <div class="multiplas-formas-container">
                                                    <!-- Campos extras para a opção "Multiplas formas" (inicialmente vazio) -->
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <h4 class='hidden titulo-cheque'>Cheques
                                                    <hr>
                                                </h4>
                                                <div class="cheques-container"></div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-primary waves-effect "
                                                data-dismiss="modal">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                    <script>
                        document.getElementById('tipoFrete').addEventListener('change', function () {
                            var freteTipo = this.value;
                            var camposFrete = document.querySelectorAll('.valor, .km-rodado, .valor-adicional, .distancia-cliente');

                            if (freteTipo === 'retirada') {
                                // Limpar e desabilitar todos os campos relacionados a frete
                                camposFrete.forEach(function (campo) {
                                    campo.value = '';
                                    campo.disabled = true;
                                });
                            } else {
                                // Habilitar os campos novamente
                                camposFrete.forEach(function (campo) {
                                    campo.disabled = false;
                                });
                            }
                        });


                        $(document).ready(function () {

                            // Quando a opção "Pago" for selecionada, abre o modal
                            $('select[name="status_pagamento"]').change(function () {
                                if ($(this).val() === 'pago') {
                                    $('#ModalReceber').modal('show');
                                }
                            });

                            let contadorPagamento = 0;
                            let contadorCheque = 0;

                            // Adiciona nova forma de pagamento
                            $('#add-forma-recebimento').click(function () {
                                let optionsContaRecebida = $('.select-conta-recebida').html();

                                $('.titulo-pagamento').removeClass('hidden'); // Exibe o título de formas de pagamento

                                let formaPagamentoDiv = `
                                    <div class="form-line col-md-6 formas-campos">
                                        <label>Conta recebida</label>
                                        <select name="conta_bancaria_${contadorPagamento}" style="margin-bottom: 10px" required class="form-control show-tick mb-3 campos-pagamentos">
                                            ${optionsContaRecebida}
                                        </select>

                                        <label>Forma recebimento</label>
                                        <select name="forma_recebimento_${contadorPagamento}" style="margin-bottom: 10px" required class="form-control show-tick mb-3 campos-pagamentos">
                                            <option value="Dinheiro">Dinheiro</option>
                                            <option value="PIX">PIX</option>
                                            <option value="Débito">Débito</option>
                                            <option value="Crédito">Crédito</option>
                                            <option value="Transfêrencia Bancária">Transfêrencia Bancária</option>
                                            <option value="Saldo">Saldo do Vendedor</option>
                                        </select>

                                        <label>Valor recebido</label>
                                        <input type="text" name="valor_recebido_${contadorPagamento}" placeholder="Digite o valor recebido" style="margin-bottom: 10px" value="" class="form-control mb-3 mt-2 tt2 valor valor_pago campos-pagamentos">

                                        <button type="button" class="btn btn-danger remove-forma-recebimento">Remover Forma</button>
                                    </div>
                                `;

                                $('.multiplas-formas-container').append(formaPagamentoDiv);
                                contadorPagamento++;
                            });

                            // Adiciona um novo cheque
                            $('#add-cheque').click(function () {
                                $('.titulo-cheque').removeClass('hidden'); // Exibe o título de cheques

                                let chequeDiv = `
                                    <div class="form-line col-md-12 cheque-campos">
                                        <label>Banco</label>
                                        <input type="text" name="banco_${contadorCheque}" class="form-control mb-2">

                                        <label>Titular</label>
                                        <input type="text" name="titular_${contadorCheque}" class="form-control mb-2">

                                        <label>Valor</label>
                                        <input type="text" name="valor_${contadorCheque}" class="form-control mb-2">

                                        <label>Vencimento</label>
                                        <input type="date" name="vencimento_cheque_${contadorCheque}" class="form-control mb-2">

                                        <button type="button" class="btn btn-danger remove-cheque">Remover Cheque</button>
                                    </div>
                                `;

                                $('.cheques-container').append(chequeDiv);
                                contadorCheque++;
                            });

                            // Remove uma forma de pagamento
                            $(document).on('click', '.remove-forma-recebimento', function () {
                                $(this).closest('.formas-campos').remove();
                                contadorPagamento--;
                            });

                            // Remove um cheque
                            $(document).on('click', '.remove-cheque', function () {
                                $(this).closest('.cheque-campos').remove();
                                contadorCheque--;
                            });

                            // Ao clicar em enviar
                            $(document).on('click', '.btn-finalizar-venda', function () {

                                let dadosForm = $('#form-vendas').serialize();

                                let valoresCheques = [];
                                let valoresFormaPagamento = [];

                                // Captura os valores dos cheques
                                for (let i = 0; i < contadorCheque; i++) {
                                    let cheque = {
                                        banco: $('input[name="banco_' + i + '"]').val(),
                                        titular: $('input[name="titular_' + i + '"]').val(),
                                        valor: $('input[name="valor_' + i + '"]').val(),
                                        vencimento_cheque: $('input[name="vencimento_cheque_' + i + '"]').val(),
                                    };
                                    valoresCheques.push(cheque);
                                }

                                // Captura as formas de pagamento
                                for (let c = 0; c < contadorPagamento; c++) {
                                    let formaPagamento = {
                                        conta: $('select[name="conta_bancaria_' + c + '"]').val(),
                                        forma: $('select[name="forma_recebimento_' + c + '"]').val(),
                                        valor: $('input[name="valor_recebido_' + c + '"]').val(),
                                    };
                                    valoresFormaPagamento.push(formaPagamento);
                                }

                                if ($('select[name="status_pagamento"]').val() == 'pago') {

                                    valoresFormaPagamento = valoresFormaPagamento;
                                    valoresCheques = valoresCheques;
                                } else {
                                    valoresFormaPagamento = [];
                                    valoresCheques = [];
                                }

                                // Envia os valores para o backend
                                finalizarVendas(valoresFormaPagamento, valoresCheques, dadosForm);
                            });

                        });

                        function finalizarVendas(valoresFormaPagamento, valoresCheques, dadosForm) {

                            let dataRecebimento = $('.data-fluxo').val();
                            let baseUrl = '<?= base_url() ?>';

                            $.ajax({
                                type: "POST",
                                url: '<?= base_url("P_vendas/cadastra_venda") ?>',
                                data: {
                                    valoresFormaPagamento: valoresFormaPagamento,
                                    valoresCheques: valoresCheques,
                                    dadosForm: dadosForm,
                                    dataRecebimento: dataRecebimento
                                },
                                success: function (data) {

                                    window.location.href = `${baseUrl}P_vendas`;

                                }
                            });

                        }


                    </script>


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
                            // Substituindo o ponto por nada (para remover o separador de milhar) e a vírgula por ponto (separador decimal)
                            const quantidadeFormatada = quantidadeRecebida.toString().replace(/\./g, '').replace(',', '.');

                            // Convertendo a string formatada para um número flutuante
                            const toneladas = quantidadeFormatada / 1000;

                            // Calculando o frete total
                            const totalFrete = toneladas * valorPorTonelada;

                            // Retornando o valor sem arredondar (ajustar arredondamento se necessário)
                            return Math.round(totalFrete);
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
                                    beforeSend: function () {
                                        $('.label-valor-tipo-frete').html('');

                                    },
                                    success: function (data) {
                                        container.find('.produto-select').html(data.option_produto);
                                        container.find('.vendedor-select').html(data.vendedor);
                                        $('.data_pagamento').val(data.data_pagamento);

                                        let labelTonelada = "<option selected class='info-produto' value='Valor por Tonelada'>Valor por Tonelada</option><option class='info-produto' value='retirada'>Frete retirada</option>";

                                        let labelKg = "<option selected class='info-produto' value='Valor por KG'>Valor por KG</option><option class='info-produto' value='retirada'>Frete retirada</option>";

                                        if (data.option_frete == labelTonelada) {
                                            $('.label-valor-tipo-frete').html('Valor por Tonelada');

                                            $('#valor-tipo-frete').val(data.valor_por_tonelada);

                                        } else if (data.option_frete == labelKg) {
                                            $('.label-valor-tipo-frete').html('Valor por KG');

                                            $('.distancia-cliente').val(data.distancia);
                                            calcularTotal();

                                        } else {
                                            $('.label-valor-tipo-frete').html('Valor por KM');

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
                                        <div class="col-sm-4">
                                            <label>Produtos e Matéria Prima</label>
                                            <select name="produto[]" class="form-control produto produto-select">
                                                <option>Selecione o produto</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Quantidade</label>
                                            <input type="text" required name="quantidade[]"  class="form-control quantidade input-multiplicar mask-quilo" placeholder="Digite a quantidade">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Valor</label>
                                            <input type="text" required name="valor_produto[]" class="form-control input-valor form-line input-somar" placeholder="Digite o valor do produto">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Comissão</label>
                                            <input type="text" required name="comissao[]" class="form-control input-comissao form-line" placeholder="Digite a comissão">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Medida</label>
                                            <input disable required type="text" name="medida_produto[]" class="form-control input-medida form-line" placeholder="Medida">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Subtotal</label>
                                            <input disable required type="text" name="subtotal_produto[]" class="form-control valor input-subtotal form-line" placeholder="Subtotal">
                                        </div>
                                        <div class="col-sm-2" style="float: right"></br>
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

                        $(document).on('input', '.input-subtotal', function () {

                            let novoTotal = 0;

                            $('.input-subtotal').each(function () {
                                novoTotal += $(this).val() ? parseFloat($(this).val()) : 0;
                            })

                            $('.total-venda').val(novoTotal.toFixed(2));
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

                                let subtotal = valor * quantidade;
                                $(this).find('.input-subtotal').val(subtotal.toFixed(2));

                                quantidadeTotal += subtotal;

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

                                totalFrete = totalFrete - valorAdicional;

                            } else {

                                totalFrete = valorTipoFrete * $('.km-rodado').val();


                                if (quantidadeTotal > 14000) {

                                    let diferencaQuantidade = quantidadeTotal - 14000;
                                    totalFrete += calcularFretePorTonelada(diferencaQuantidade, 100);
                                }

                                totalFrete = totalFrete - valorAdicional;

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