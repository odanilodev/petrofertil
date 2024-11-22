<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-5">
                <h2>FORMULARIO DE PRODUÇÃO</h2>
            </div>

            <div class="col-md-7" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a
                    href="<?= site_url('P_Destinacao/formulario_destinacao/') . (isset($producao['id']) ? $producao['id'] : '') ?>">
                    <span type="button" class="btn bg-green waves-effect">VOLTAR</span>
                </a>

            </div>

        </div>

        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">

                    <form method="post" enctype="multipart/form-data"
                        action="<?= site_url('P_controle_qualidade/cadastra_controle/') ?>">

                        <div class="header">
                            <h2>
                                Cadastro de destinação
                            </h2>
                        </div>

                        <input type="hidden" value="<?= isset($producao['id']) ? $producao['id'] : '' ?>"
                            name="id_cliente" class="form-control" readonly>


                        <div class="body">
                            <div class="row clearfix">

                                <div class="col-sm-4">
                                    <label>Data</label>
                                    <div class="form-line">
                                        <input type="date" name="data"
                                            value="<?= isset($producao['data']) && $producao['data'] ? $producao['data'] : date('Y-m-d') ?>"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Responsável</label>
                                    <select name="id_funcionario" class="form-control show-tick">
                                        <option>Selecione</option>
                                        <?php foreach ($funcionarios as $f) { ?>
                                            <option value="<?= $f['id'] ?>" <?= isset($producao['id_funcionario']) && $producao['id_funcionario'] == $f['id'] ? 'selected' : '' ?>>
                                                <?= $f['nome'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label>Produto</label>
                                    <select name="id_produto" class="form-control show-tick">
                                        <option>Selecione</option>
                                        <?php foreach ($produtos as $p) { ?>
                                            <option value="<?= $p['id'] ?>" <?= isset($producao['id_produto']) && $producao['id_produto'] == $p['id'] ? 'selected' : '' ?>>
                                                <?= $p['nome'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label>N° do Lote</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="lote"
                                                value="<?= isset($producao['lote']) ? $producao['lote'] : '' ?>"
                                                class="form-control" placeholder="Digite o número do lote">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Orgânico</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="organico"
                                                value="<?= isset($producao['organico']) ? $producao['organico'] : '' ?>"
                                                class="form-control" placeholder="Digite a quantidade">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Mineral</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="mineral"
                                                value="<?= isset($producao['mineral']) ? $producao['mineral'] : '' ?>"
                                                class="form-control" placeholder="Digite a quantidade">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Palha</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="palha"
                                                value="<?= isset($producao['palha']) ? $producao['palha'] : '' ?>"
                                                class="form-control" placeholder="Digite a quantidade">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Outro</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="outro"
                                                value="<?= isset($producao['outro']) ? $producao['outro'] : '' ?>"
                                                class="form-control" placeholder="Digite a quantidade">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <label>Observação</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='obs' value="" class="form-control"
                                                placeholder="Digite uma Observação">
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