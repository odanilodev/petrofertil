<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>GERADOR DE ORDEM DE SERVIÇO</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form method="post" enctype="multipart/form-data"
                        action="<?= site_url('P_ordem_servico/gerador') ?>">
                        <div class="header">
                            <h2>Formulário gerador</h2>
                        </div>

                        <input type='hidden' value='<?= $veiculo['id'] ?>' name='id'>
                        <input type='hidden' value='<?= isset($placa) ? $placa : '' ?>' name='placa'
                            class="form-control" readonly>

                        <!-- Campo oculto para armazenar o modelo do veículo -->
                        <input type='hidden' name='modelo' id='modelo'>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <label>Veículo</label>
                                    <select name="placa" id="placa" class="form-control show-tick"
                                        onchange="atualizarModelo()">
                                        <option>Selecione</option>
                                        <?php foreach ($carros as $v) { ?>
                                            <option value="<?= $v['placa'] ?>" data-modelo="<?= $v['modelo'] ?>">
                                                <?= $v['modelo'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label>Motorista</label>
                                    <div class="form-group">
                                        <select name="motorista" class="form-control">
                                            <option value="0">Nenhum Motorista</option>
                                            <?php foreach ($motoristas as $m) { ?>
                                                <option value="<?= $m['nome'] ?>"><?= $m['nome'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Oficina</label>
                                    <div class="form-group">
                                        <select name="oficina" class="form-control">
                                            <option>Selecione</option>
                                            <?php foreach ($oficinas as $o) { ?>
                                                <option value="<?= $o['nome'] ?>"><?= $o['nome'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Data Reclamação</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" name="data_reclamacao" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Data da Ordem de Serviço</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" id="data_ordem" name="data_ordem" class="form-control"
                                                readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Reclamação Suspeita</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="reclamacao" class="form-control"
                                                placeholder="Digite a reclamação suspeita">
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
        <!-- #END# Input -->
    </div>

    <script>
        // Definir a data atual no campo "Data da Ordem de Serviço"
        var dataOrdemInput = document.getElementById("data_ordem");
        var dataAtual = new Date().toISOString().slice(0, 10);
        dataOrdemInput.value = dataAtual;

        // Atualizar o campo oculto 'modelo' ao selecionar uma placa
        function atualizarModelo() {
            var placaSelect = document.getElementById('placa');
            var modeloInput = document.getElementById('modelo');
            var selectedOption = placaSelect.options[placaSelect.selectedIndex];

            // Pegar o valor do atributo 'data-modelo' da opção selecionada
            modeloInput.value = selectedOption.getAttribute('data-modelo');
        }
    </script>
</section>