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
            <h2>FORMULÁRIO DE VENDA</h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            VENDA E DESTINAÇÃO DE BORRA
                        </h2>
                    </div>


                    <form method="post" action="<?= site_url('F_borra/inserir_venda_borra') ?>">

                        <input type="hidden" name="id" value="<?= $venda['id'] ?>"></input>


                        <div class="body">
                            <div class="row clearfix">

                                <div class="col-sm-6">
                                    <p>
                                        <b>Selecionar Cliente</b>
                                    </p>
                                    <select name="cliente" class="form-control show-tick">
                                        <option>Selecione</option>
                                        <?php foreach ($clientes as $f) { ?>
                                            <option <?= ($f['nome'] == $venda['cliente'] ? 'selected' : '');   ?> value="<?= $f['nome'] ?>"><?= $f['nome'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <p>
                                        <b>Enviar ao contas a receber?</b>
                                    </p>
                                    <select name="contas" class="form-control show-tick">
                                        <option>Selecione</option>
                                            <option value="sim">Sim</option>
                                            <option value="nao">Não</option>
                                    </select>
                                </div>
                             
                                <div class="col-sm-4">
                                    <label>Quantidade em KG</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name='quantidade' value="<?= $venda['quantidade'] ?>" class="form-control " placeholder="Digite a quantidade destinada">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Valor por KG</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="valor" value="<?= $venda['valor'] ?>" class="form-control valor" placeholder="Insira o valor">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-4"><?= $data_venda ?>
                                    <label>Data da Destinação</label>
                                    <div class="input-group ">
                                        <div class="form-line">
                                            <input type="date" name="data_destinacao" value="<?= $venda['data_destinacao'] ?>" class="form-control" placeholder="Please choose a date...">
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group col-md-12">
                                    <div class="col-md-3">
                                        <input type="submit" class="btn bg-red btn-block waves-effect "></input>
                                    </div>
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