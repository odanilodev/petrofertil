<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Manutenção de Veículos</title>
    <style>
        /* Estilo para o contêiner de cada grupo de campos */
        .novo-campo-group {
            border: 1px solid #c6c6c6;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        /* Ajusta a largura e a organização dos inputs */
        .novo-campo {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        /* Ajusta o input "Digite o Serviço" para ter mais largura */
        .novo-campo input[name="servico[]"] {
            flex: 3;
        }

        /* Ajusta o input "Digite o valor do serviço" para ter menos largura */
        .novo-campo input[name="valor[]"] {
            flex: 1;
        }

        /* Adiciona margens para separar os grupos */
        #formulario .form-group {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>CADASTRAR MANUTENÇÃO DE VEÍCULOS</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <form method="post" enctype="multipart/form-data"
                            action="<?= site_url('P_manutencao/cadastrar_manutencao') ?>">
                            <div class="header">
                                <h2>Formulário de Cadastro</h2>
                            </div>

                            <input type='hidden' value='<?= $veiculo['id'] ?>' name='id'>

                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <label>Numero da ordem de serviço</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name='codigo' class="form-control"
                                                    placeholder="Digite o codigo">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Veículo</label>
                                        <select name="placa" class="form-control show-tick">
                                            <option>Selecione</option>
                                            <?php foreach ($veiculos as $v) { ?>
                                                <option value="<?= $v['placa'] ?>"><?= $v['modelo'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Oficina</label>
                                        <select name="oficina" class="form-control show-tick">
                                            <option>Selecione</option>
                                            <?php foreach ($oficinas as $o) { ?>
                                                <option value="<?= $o['nome'] ?>"><?= $o['nome'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <label>Reclamação</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name='reclamacao' class="form-control"
                                                    placeholder="Digite o problema aqui!">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Novos campos adicionados aqui -->
                                    <div class="col-sm-12" id="formulario">
                                        <label>Serviço e Valor
                                            <button type="button" class="btn btn-primary btn-sm"
                                                id="add-novo-campo">+</button>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                id="remove-ultimo-campo">-</button>
                                        </label>
                                        <div class="form-group">
                                            <div class="novo-campo-group">
                                                <div class="row novo-campo">
                                                    <input type="text" name="servico[]" placeholder="Digite o Serviço"
                                                        class="form-control col-md-6">
                                                    <input placeholder="Digite o valor do serviço" type="text" value=""
                                                        name="valor[]" class="form-control col-md-4 valor">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Desconto</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input id="valor" placeholder="Digite o valor do desconto caso contenha"
                                                    type="text" step="0.01" value="" name="desconto"
                                                    class="form-control valor">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Observação</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="" name="observacao" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Quilometragem</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" value="" name="km" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Data de entrada</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input required type="date" value="" name="data" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Data de saída</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input required type="date" value="" name="data_saida"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fim dos novos campos -->

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

    <script>
        // Função de validação de valores monetários
        function validarValorMonetario(input) {
            input.addEventListener('input', function (e) {
                // Remove todos os caracteres, exceto números, vírgulas e pontos
                let valor = e.target.value.replace(/[^0-9,.]/g, '');

                // Atualiza o valor do campo
                e.target.value = valor;
            });
        }

        // Adiciona a validação aos campos existentes
        document.querySelectorAll('input[name="valor[]"]').forEach(input => {
            validarValorMonetario(input);
        });

        document.getElementById('add-novo-campo').addEventListener('click', function () {
            // Seleciona o primeiro grupo de campos
            const originalFieldGroup = document.querySelector('.novo-campo-group');

            // Clona o grupo de campos
            const newFieldGroup = originalFieldGroup.cloneNode(true);

            // Limpa os valores dos inputs no novo grupo
            newFieldGroup.querySelectorAll('input').forEach(input => input.value = '');

            // Adiciona o novo grupo de campos ao formulário
            originalFieldGroup.parentNode.appendChild(newFieldGroup);

            // Adiciona o evento de validação ao novo campo "valor"
            validarValorMonetario(newFieldGroup.querySelector('input[name="valor[]"]'));
        });

        document.getElementById('remove-ultimo-campo').addEventListener('click', function () {
            // Seleciona todos os grupos de campos
            const allFieldGroups = document.querySelectorAll('.novo-campo-group');

            // Remove o último grupo de campos se houver mais de um
            if (allFieldGroups.length > 1) {
                allFieldGroups[allFieldGroups.length - 1].remove();
            }
        });
    </script>
</body>

</html>