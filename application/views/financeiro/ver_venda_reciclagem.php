<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>VER VENDA NUMERO <?= $id ?></h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <div class="col-md-3">
                            <h2>
                                Formulario de Venda
                            </h2>
                        </div>
                        <div class="col-md-9" align="right">
                            <a href="<?= base_url('F_venda_reciclagem/imprimir_venda/').$id ?>"><span type="button" class="btn bg-blue waves-effect">IMPRIMIR</span></a>
                            <a href="<?= $_SERVER['HTTP_REFERER'] ?>"><span type="button" class="btn bg-orange waves-effect">VOLTAR</span></a>
                        </div></br>
                    </div>


                    <form method="post" action="<?= site_url('F_venda_reciclagem/cadastrar_venda') ?>">

                        <input type="hidden" name="id" value=""></input>

                        <div class="body">

                            <div class="row clearfix">


                                <input type="hidden" name="id" value=""></input>

                                <div class="col-sm-12">

                                    <label>Data Venda</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" value="<?= $data_venda ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">

                                    <label>Cliente/Comprador</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="<?= $comprador ?>" class="form-control" readonly>
                                        </div>
                                    </div>

                                </div>

                                <?php

                                $produtos = json_decode($produto);
                                $unidade_peso = json_decode($unidade_peso);
                                $valor_venda = json_decode($valor_venda);
                                $valor_total = json_decode($valor_total);

                                $contador = count($produtos);

                                ?>

                                <?php for ($a = 0; $a < $contador; $a++) { ?>

                                    <div class="col-sm-3">

                                        <label>Produto</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="<?= strtoupper($produtos[$a]) ?>" class="form-control" readonly>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-sm-3">

                                        <label>KG/Quantidade</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="int" value="<?= $unidade_peso[$a] ?>" class="form-control" readonly>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-sm-3">

                                        <label>Preço de venda</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="<?= number_format("$valor_venda[$a]", 2, ",", "."); ?>" class="form-control" readonly>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-sm-3">

                                        <label>Valor Total</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="<?= number_format("$valor_total[$a]", 2, ",", "."); ?>" class="form-control ">
                                            </div>
                                        </div>

                                    </div>



                                <?php } ?>

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