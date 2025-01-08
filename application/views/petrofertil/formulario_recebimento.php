<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-5">
                <h2>FORMULARIO DE PRODUÇÃO</h2>
            </div>

            <div class="col-md-7" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a
                    href="<?= site_url('P_controle_recebimento/cadastra_controle/') . (isset($producao['id']) ? $producao['id'] : '') ?>">
                    <span type="button" class="btn bg-green waves-effect">VOLTAR</span>
                </a>
            </div>
        </div>

        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form method="post" enctype="multipart/form-data"
                        action="<?= site_url('P_controle_recebimento/cadastra_controle/') ?>">

                        <div class="header">
                            <h2>Cadastro de destinação</h2>
                        </div>

                        <input type="hidden" value="<?= isset($producao['id']) ? $producao['id'] : '' ?>" name="id"
                            class="form-control" readonly>

                        <div class="body">
                            <div class="row clearfix">
                                <!-- Campos já existentes -->
                                <div class="col-sm-4">
                                    <label>Data</label>
                                    <div class="form-line">
                                        <input type="date" name="data_recebimento"
                                            value="<?= isset($recebimento['data_recebimento']) && $recebimento['data_recebimento'] ? $recebimento['data_recebimento'] : date('Y-m-d') ?>"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Periodo</label>
                                    <select name="periodo" class="form-control show-tick">
                                        <option>Selecione</option>
                                        <option <?= $recebimento['periodo'] == 'Manhã' ? 'selected' : '' ?> value="Manhã">
                                            Manhã</option>
                                        <option <?= $recebimento['periodo'] == 'Tarde' ? 'selected' : '' ?> value="Tarde">
                                            Tarde</option>
                                        <option <?= $recebimento['periodo'] == 'Noite' ? 'selected' : '' ?> value="Noite">
                                            Noite</option>

                                    </select>
                                </div>


                                <div class="col-sm-4">
                                    <label>Cliente/Empresa</label>
                                    <select name="empresa" class="form-control show-tick">
                                        <option>Selecione</option>
                                        <?php foreach ($clientes as $cliente) { ?>
                                            <option <?= $recebimento['empresa'] == $cliente['id'] ? 'selected' : '' ?>
                                                value="<?= $cliente['id'] ?>">
                                                <?= $cliente['nome'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label>Placa</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="placa"
                                                value="<?= isset($recebimento['placa']) ? $recebimento['placa'] : '' ?>"
                                                class="form-control" placeholder="Digite a placa">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>N° Nota</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="numero_nota"
                                                value="<?= isset($recebimento['numero_nota']) ? $recebimento['numero_nota'] : '' ?>"
                                                class="form-control" placeholder="Digite o número de nota">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Orgânico</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="organico"
                                                value="<?= isset($recebimento['organico']) ? $recebimento['organico'] : '' ?>"
                                                class="form-control" placeholder="Digite a quantidade">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Mineral</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="mineral"
                                                value="<?= isset($recebimento['mineral']) ? $recebimento['mineral'] : '' ?>"
                                                class="form-control" placeholder="Digite a quantidade">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Molhado</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="molhado"
                                                value="<?= isset($recebimento['molhado']) ? $recebimento['molhado'] : '' ?>"
                                                class="form-control" placeholder="Digite a quantidade">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Latiha</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="latinha"
                                                value="<?= isset($recebimento['latinha']) ? $recebimento['latinha'] : '' ?>"
                                                class="form-control" placeholder="Digite a quantidade">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Palha</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="palha"
                                                value="<?= isset($recebimento['palha']) ? $recebimento['palha'] : '' ?>"
                                                class="form-control" placeholder="Digite a quantidade">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Area descarregamento</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="area_descarregamento"
                                                value="<?= isset($recebimento['area_descarregamento']) ? $recebimento['area_descarregamento'] : '' ?>"
                                                class="form-control" placeholder="Digite o codigo de area">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Outro</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="outro"
                                                value="<?= isset($recebimento['outro']) ? $recebimento['outro'] : '' ?>"
                                                class="form-control" placeholder="Digite a quantidade">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Observação</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='obs'
                                                value="<?= isset($recebimento['obs']) ? $recebimento['obs'] : '' ?>"
                                                class="form-control" placeholder="Digite uma Observação">
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
</section>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>