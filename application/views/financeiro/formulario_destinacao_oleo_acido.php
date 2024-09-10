<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>FORMULÁRIO DE DESTINAÇÃO</h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            VENDA E DESTINAÇÃO DE ÓLEO
                        </h2>
                    </div>


                    <form method="post" action="<?= site_url('F_destinacoes/inserir_destinacao_oleo_acido') ?>">

                        <input type="hidden" name="id" value="<?= $destinacao['id'] ?>"></input>


                        <div class="body">
                            <div class="row clearfix">

                                <div class="col-sm-12">
                                    <p>
                                        <b>Selecionar Cliente</b>
                                    </p>
                                    <select name="cliente" class="form-control show-tick">
                                        <option>Selecione</option>
                                        <?php foreach ($clientes as $f) { ?>
                                            <option <?= ($f['nome'] == $destinacao['cliente'] ? 'selected' : '');   ?> value="<?= $f['nome'] ?>"><?= $f['nome'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <p>
                                        <b>Tipo de lançamento (Litro/Kg)</b>
                                    </p>
                                    <select require name="tipo" class="form-control show-tick">
                                        <option>Selecione</option>

                                        <option value="litro">LITRO</option>
                                        <option value="kg">KG</option>

                                    </select>
                                </div>


                                <div class="col-sm-6">

                                    <label>Quantidade</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name='quantidade' value="<?= $destinacao['quantidade'] ?>" class="form-control " placeholder="Digite a quantidade destinada">

                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <label>Valor</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="valor" value="<?= $destinacao['valor'] ?>" class="form-control valor" placeholder="Insira o valor">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <label>Valor da Venda</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="valor_total" value="<?= $destinacao['valor_total'] ?>" class="form-control valor" placeholder="Insira o valor total da destinação">
                                        </div>
                                    </div>

                                </div>


                                <div class="col-sm-6">
                                    <label>Data da Destinação</label>
                                    <div class="input-group ">
                                        <div class="form-line">
                                            <input type="date" name="data_destinacao" value="<?= $destinacao['data_destinacao'] ?>" class="form-control" placeholder="Please choose a date...">
                                        </div>

                                    </div>




                                    <?php if ($destinacao['id'] > 0) { ?>

                                        <div class="demo-radio-button">

                                            <input required value="radio_3" type="radio" name="alterar" class="with-gap" id="radio_3">
                                            <label for="radio_3">Alterar estoque</label>
                                            <input value="radio_4" type="radio" name="alterar" class="with-gap" id="radio_4">
                                            <label for="radio_4">Não alterar estoque</label>

                                        </div>

                                    <?php } ?>

                                </div>



                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <input type="submit" class="btn bg-red btn-block waves-effect "></input>
                                    </div>
                                </div>



                    </form>
                </div>

            </div>
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