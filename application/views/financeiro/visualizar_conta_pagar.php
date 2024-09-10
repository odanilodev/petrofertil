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
        <div class="row">
            <div class="block-header col-md-3">
                <h2>Cadastrar Conta</h2>

            </div>
            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">

                <a href="<?= $_SERVER['HTTP_REFERER'] ?>"><span type="button" class="btn bg-orange waves-effect">VOLTAR</span></a>
            </div>
        </div>



        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Detalhes da conta
                        </h2>
                    </div>


                    <form method="post" action="<?= site_url('F_contas/inserir_conta') ?>">

                        <div class="body">

                            <div class="row clearfix">

                        

                                <div class="col-md-6">
                                    <p>
                                        <b>Grupos Macro</b>
                                    </p>
                                    <select disabled id="macros" name="id_macro" class="form-control macros show-tick">
                                        <option>Selecione</option>

                                        <?php foreach ($macros as $m) { ?>
                                            <option <?= $m['id'] == $conta['id_macro'] ? 'selected' : '' ?> data-url="<?= base_url("F_micro/recebe_micro") ?>" data-id="<?= $m['id'] ?>" value="<?= $m['id'] ?>"><?= $m['nome'] ?></option>
                                        <?php } ?>

                                    </select>

                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <b>Grupos Micro</b>
                                    </p>
                                    <select disabled id="macros" name="id_macro" class="form-control macros show-tick">
                                        <option>Selecione</option>

                                        <?php foreach ($micros as $mi) { ?>
                                            <option <?= $mi['id'] == $conta['id_micro'] ? 'selected' : '' ?> value="<?= $mi['id'] ?>"><?= $mi['nome'] ?></option>
                                        <?php } ?>

                                    </select>

                                </div>

                                <div class="col-md-6">
                                    <p>
                                        <b>Empresa</b>
                                    </p>
                                    <select disabled name="despesa" class="form-control show-tick">
                                        <option>Selecione</option>

                                        <option <?= $conta['despesa'] == 'Óleo' ? 'selected' : '' ?> value="Óleo">Óleo</option>
                                        <option <?= $conta['despesa'] == 'Reciclagem' ? 'selected' : '' ?> value="Reciclagem">Reciclagem</option>
                                    </select>

                                </div>

                                <div class="col-md-6">
                                    <label>Recebido</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" disabled name="recebido" value="<?= $conta['recebido'] ?>" class="form-control" placeholder="">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <p>
                                        <b>Vencimento</b>
                                    </p>
                                    <div class="input-group ">
                                        <div class="form-line">
                                            <input type="date" name="vencimento" disabled value="<?= $conta['vencimento'] ?>" class="form-control" placeholder="Please choose a date...">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <p>
                                        <b>Data Emissão</b>
                                    </p>
                                    <div class="input-group ">
                                        <div class="form-line">
                                            <input type="date" name="vencimento" disabled value="<?= $conta['data_emissao'] ?>" class="form-control" placeholder="Please choose a date...">
                                        </div>

                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <label>Valor</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="valor" disabled value="<?= $conta['valor'] ?>" class="form-control" placeholder="Insira o valor da conta">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <label>Observação</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" disabled name="observacao" value="<?= $conta['observacao'] ?>" class="form-control">

                                        </div>
                                    </div>
                                </div>


                    </form>
                </div>

            </div>
        </div>

        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Detalhamento custo operacional
                        </h2>
                    </div>


                    <form method="post" action="<?= site_url('F_contas/inserir_conta') ?>">

                        <div class="body">

                            <div class="row clearfix">


                                <div class="col-md-6">
                                    <label>Clientes</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="clientes" disabled value="<?= $conta['clientes'] ?>" class="form-control valor" placeholder="Não cadastrado">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <label>Alimentação</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="clientes" disabled value="<?= $conta['alimentacao'] ?>" class="form-control valor" placeholder="Não cadastrado">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Combustivel</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="combustivel" disabled value="<?= $conta['combustivel'] ?>" class="form-control valor" placeholder="Não cadastrado">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <label>Estacionamento</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="estacionamento" disabled value="<?= $conta['estacionamento'] ?>" class="form-control valor" placeholder="Não cadastrado">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Pedagio</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="Pedagio" disabled value="<?= $conta['Pedagio'] ?>" class="form-control valor" placeholder="Não cadastrado">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Detergente</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="detergente" disabled value="<?= $conta['detergente'] ?>" class="form-control valor" placeholder="Não cadastrado">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Óleo</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="oleo" disabled value="<?= $conta['oleo'] ?>" class="form-control valor" placeholder="Não cadastrado">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Outros</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="outros" disabled value="<?= $conta['outros'] ?>" class="form-control valor" placeholder="Não cadastrado">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Oque?</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="oque" disabled value="<?= $conta['oque'] ?>" class="form-control " placeholder="Não cadastrado">

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