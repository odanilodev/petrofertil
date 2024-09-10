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
            <h2>FORMULÁRIO DE CADASTRO</h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Formulário Compra de Produtos
                            <small></small>
                        </h2>

                    </div>


                    <form method="post" action="<?= site_url('F_estoque_produtos/inserir_compra') ?>">


                        <div class="body">

                            <div class="row clearfix">

                                <div class="col-sm-12">
                                    <p>
                                        <b>Selecionar Comprador</b>
                                    </p>
                                    <select name="comprador" class="form-control show-tick">
                                        <option>Selecione</option>
                                        <?php foreach ($motoristas as $m) { ?>
                                            <option value="<?= $m['nome'] ?>"><?= $m['nome'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-12">
                                    <p>
                                        <b>Selecionar o Produto</b>
                                    </p>
                                    <select name="produto" class="form-control show-tick">
                                        <option>Selecione</option>

                                        <option value="Óleo">Óleo</option>
                                        <option value="Detergente">Detergente</option>

                                    </select>



                        </div>

                        <div style="padding-top: 20px" class="col-sm-12">

                            <label>Quantidade</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" step="0.01" name='quantidade' class="form-control " placeholder="Digite a quantidade destinada">

                                </div>
                            </div>

                        </div>

                        <div class="col-sm-12">

                            <label>Valor</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="valor" class="form-control valor" placeholder="Insira o valor da conta">

                                </div>
                            </div>

                        </div>


                        <div class="col-sm-12">
                            <label>Data da Destinação</label>
                            <div class="input-group ">
                                <div class="form-line">
                                    <input type="date" name="data_compra" class="form-control" placeholder="Please choose a date...">
                                </div>

                            </div>


                        </div>

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