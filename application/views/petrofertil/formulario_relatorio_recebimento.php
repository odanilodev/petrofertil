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
                        action="<?= site_url('P_controle_recebimento/gera_relatorio/') ?>">

                        <div class="header">
                            <h2>Selecione um período e um cliente para emitir um relatorio de recebimento</h2>
                        </div>

                        <input type="hidden" value="<?= isset($producao['id']) ? $producao['id'] : '' ?>" name="id"
                            class="form-control" readonly>

                        <div class="body">
                            <div class="row clearfix">
                                <!-- Campos já existentes -->
                                <div class="col-sm-4">
                                    <label>Data do Início</label>
                                    <div class="form-line">
                                        <input type="date" name="data_inicio"
                                            value="<?= isset($producao['data']) && $producao['data'] ? $producao['data'] : date('Y-m-d') ?>"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Data Fim</label>
                                    <div class="form-line">
                                        <input type="date" name="data_fim"
                                            value="<?= isset($producao['data']) && $producao['data'] ? $producao['data'] : date('Y-m-d') ?>"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Cliente/Empresa</label>
                                    <select name="empresa" class="form-control show-tick">
                                        <option>Selecione</option>
                                        <?php foreach ($clientes as $cliente) { ?>
                                            <option value="<?= $cliente['id'] ?>">
                                                <?= $cliente['nome'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
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