<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>FORMULÁRIO DE CADASTRO</h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Formulario de Venda
                        </h2>
                    </div>


                    <form method="post" action="<?= site_url('F_venda_reciclagem/atualizar_venda') ?>">

                        <input type="hidden" name="id" value=""></input>

                        <div class="body">

                            <div class="row clearfix">


                                <input type="hidden" name="id" value="<?= $venda['id']; ?>"></input>

                                <div class="col-sm-6">

                                    <label>Data Venda</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" required name='data_venda' value="<?= $venda['data_venda'] ?>" class="form-control " placeholder="Digite a data">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <label>Data Recebimento</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date"  name='data_recebimento' value="<?= $venda['data_recebimento'] ?>" class="form-control " placeholder="Digite a data">
                                        </div>
                                    </div>

                                </div>


                                <div class="col-sm-12">

                                    <label>Cliente/Comprador</label>
                                    <select required name="comprador" class="form-control show-tick">

                                        <option>Selecione</option>
                                        <?php foreach ($clientes as $c) { ?>
                                            <option <?= $venda['comprador'] == $c['nome'] ? 'selected' : '' ?> value="<?= $c['nome'] ?>"><?= $c['nome'] ?></option>
                                        <?php } ?>

                                    </select>
                                </div>


                                <?php

                                $produto = json_decode($venda['produto']);
                                $unidade_peso = json_decode($venda['unidade_peso']);
                                $valor_venda = json_decode($venda['valor_venda']);
                                $valor_total = json_decode($venda['valor_total']);


                                $contador = count($produto);

                                ?>


                                <?php for ($a = 0; $a < $contador; $a++) { ?>



                                    <div class="col-sm-3">
                                        <p>
                                            <b>Produto</b>
                                        </p>
                                        <select required name="produto[]" class="form-control show-tick">
                                            <option>Selecione</option>

                                            <?php foreach ($produtos as $p) { ?>

                                                <option <?= $produto[$a] == $p['nome'] ? 'selected' : '' ?> value="<?= $p['nome'] ?>"><?= $p['nome'] ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>




                                    <div class="col-sm-3">

                                        <label>KG/Quantidade</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="int" name='unidade_peso[]' value="<?= $unidade_peso[$a] ?>" class="form-control ">
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-sm-3">

                                        <label>Preço de venda</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name='valor_venda[]' value="<?= number_format("$valor_venda[$a]", 2, ",", "."); ?>" class="form-control valor ">
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-sm-3">

                                        <label>Valor Total</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name='valor_total[]' value="<?= number_format("$valor_total[$a]", 2, ",", "."); ?>" class="form-control valor ">
                                            </div>
                                        </div>

                                    </div>



                                <?php } ?>


                                <div id="formulario"></div>

                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <input type="submit" class="btn bg-red btn-block waves-effect "></input>
                                    </div>

                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group col-sm-3">
                                        <button id="add-campo" type="button" class="btn bg-blue waves-effect">
                                            <i class="material-icons">control_point</i>
                                        </button>
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