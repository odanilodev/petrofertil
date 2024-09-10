<?php
$status = $this->session->userdata('usuario');

if ($status != "logado") {

    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');

$nome_usuario = $this->session->userdata('nome_usuario');
?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Cidades</h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <p class="display-4">Selecione um periodo, e as cidades que deseja receber as informações</p>
                        </h2>

                    </div>

                    <form method="post" action="<?= base_url('F_relatorios/gerar_relatorio_cidade/') ?>">



                        <div class="body">

                            <h2 class="card-inside-title ml-4">Data:</h2>

                            <div class="row clearfix">


                                <div class="col-sm-3">

                                    <label>De</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input required type="date" require value="" name="data_inicial" class="form-control">

                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-3">

                                    <label>Até</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input required type="date" require value="" name="data_final" class="form-control">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row clearfix">
                                <?php foreach ($cidades as $a) { ?>

                                    <div class="col-sm-3">

                                        <input name="cidades[]" value="<?= $a['nome'] ?>" type="checkbox" id="<?= $a['id'] ?>" class="chk-col-green">
                                        <label for="<?= $a['id'] ?>"><?= $a['nome'] ?></label>

                                    </div>
                                <? } ?>

                            </div>

                            <div class="row clearfix">

                                <div class="col-sm-3">
                                    <div class="form-group">

                                        <input type="submit" class="btn bg-red btn-block waves-effect col-md-3"></input>

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