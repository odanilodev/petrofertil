<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>CADASTRAR CLIENTE </h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">

                    <form method="post" enctype="multipart/form-data"
                        action="<?= site_url('P_cheques/insere_cheque') ?>">

                        <div class="header">
                            <h2>
                                Formulário de Cadastro
                            </h2>
                        </div>

                        <div class="body">
                            <div class="row clearfix">

                                <input type="hidden" value="<?= isset($cheque['id']) ? $cheque['id'] : '' ?>" name="id">

                                <div class="col-md-4">
                                    <label>Numero</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input required type="text" name='numero'
                                                value="<?= isset($cheque['numero']) ? $cheque['numero'] : '' ?>"
                                                class="form-control" placeholder="Digite o numero do cheque">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Recebido</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input required type="text" name='recebido'
                                                value="<?= isset($cheque['recebido']) ? $cheque['recebido'] : '' ?>"
                                                class="form-control"
                                                placeholder="Digite a pessoa que forneceu o cheque">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Referente a:</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input required type="text" name='referente'
                                                value="<?= isset($cheque['referente']) ? $cheque['referente'] : '' ?>"
                                                class="form-control" placeholder="Digite a referencia do cheque">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Conta</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='conta'
                                                value="<?= isset($cheque['conta']) ? $cheque['conta'] : '' ?>"
                                                class="form-control" placeholder="Digite a conta">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <label>Observação</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='observacao'
                                                value="<?= isset($cheque['observacao']) ? $cheque['observacao'] : '' ?>"
                                                class="form-control" placeholder="Digite a conta">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Valor</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input required type="text" name='valor'
                                                value="<?= isset($cheque['valor']) ? $cheque['valor'] : '' ?>"
                                                class="form-control valor" placeholder="Digite o valor do cheque">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Data Compensasão</label>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="date" name="data_compensasao" required
                                                value="<?= isset($cheque['data_compensasao']) ? $cheque['data_compensasao'] : '' ?>"
                                                class="form-control" placeholder="Por favor escolha uma data...">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <p>
                                        <b>Conta relacionada ao recebimento</b>
                                    </p>
                                    <select name="id_conta" required class="form-control show-tick">
                                        <option>Selecione</option>
                                        <?php foreach($contas_bancarias as $b){ ?>
                                        <option <?= isset($cheque['id_conta']) && $cheque['id_conta'] == $b['id'] ? 'selected' : '' ?> value="<?= $b['id'] ?>"><?= $b['descricao'] ?></option>
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