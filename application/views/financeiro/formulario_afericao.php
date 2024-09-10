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
            <h2>BASIC FORM ELEMENTS</h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <form method="post" action="<?= site_url('F_afericao/inserir_afericao') ?>">

                    <div class="card">
                        <div class="header">
                            <h2>
                                Formulário de Aferição
                                <small></small>
                            </h2>

                        </div>


                        <input type="hidden" name="id" value="<?= $afericao['id'] ?>"></input>

                        <div class="body">

                            <div class="row clearfix">

                                <div class="col-sm-6">
                                    <p>
                                        <b>Selecionar Veículo</b>
                                    </p>
                                    <select name="veiculo" class="form-control show-tick">
                                        <option>Selecione</option>
                                        <?php foreach ($veiculos as $v) { ?>
                                            <option <?= ($v['placa'] == $afericao['veiculo'] ? 'selected' : '');   ?> value="<?= $v['placa'] ?>"><?= $v['placa'] ?></option>
                                        <?php } ?>
                                    </select>

                                </div>


                                <div class="col-sm-6">
                                    <p>
                                        <b>Selecionar Motorista</b>
                                    </p>

                                    <select required name="motorista" class="form-control show-tick">
                                        <option>Selecione</option>
                                        <?php foreach ($motoristas as $m) { ?>
                                            <option <?= ($m['nome'] == $afericao['motorista'] ? 'selected' : '');   ?> value="<?= $m['nome'] ?>"><?= $m['nome'] ?></option>
                                        <?php } ?>
                                    </select>

                                </div>

                                <div class="col-sm-6">
                                    <p>
                                        <b>Selecionar Ajudante</b>
                                    </p>

                                    <select name="ajudante" class="form-control show-tick">
                                        <option value="Sem Ajudante">Sem Ajudante</option>
                                        <?php foreach ($motoristas as $m) { ?>
                                            <option <?= ($m['nome'] == $afericao['ajudante'] ? 'selected' : '');   ?> value="<?= $m['nome'] ?>"><?= $m['nome'] ?></option>
                                        <?php } ?>
                                    </select>

                                </div>

                                <div class="col-sm-6">
                                    <p>
                                        <b>Selecionar Cidade</b>
                                    </p>

                                    <select name="cidade" class="form-control show-tick">
                                        <option value="Sem Ajudante">Selecione</option>
                                        <?php foreach ($cidades as $c) { ?>
                                            <option <?= ($c['nome'] == $afericao['cidade'] ? 'selected' : '');   ?> value="<?= $c['nome'] ?>"><?= $c['nome'] ?></option>
                                        <?php } ?>
                                    </select>

                                </div>


                                <div class="col-sm-6">

                                    <label>Quantidade paga</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" step="0.01" name='pago' value="<?= $afericao['pago'] ?>" class="form-control " placeholder="Digite a quantidade paga">

                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <label>Quantidade aferida</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" value="<?= $afericao['aferido'] ?>" name="aferido" class="form-control" placeholder="Digite a quantidade aferida">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <p>
                                        <b>Data da Aferição</b>
                                    </p>
                                    <div class="input-group ">
                                        <div class="form-line">
                                            <input required type="date" name="data_afericao" value="<?= $afericao['data_afericao'] ?>" class="form-control" placeholder="Please choose a date...">
                                        </div>

                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="form-group">


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="header">
                            <h2>
                                Formulario de Custos
                            </h2>

                        </div>


                        <input type="hidden" name="id" value="<?= $afericao['id'] ?>"></input>


                        <div class="body">

                            <div class="row clearfix">

                                <div class="col-sm-6">
                                    <label>Clientes</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required name="clientes" value="<?= $afericao['clientes'] ?>" class="form-control valor" placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Alimentação</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required name="alimentacao" value="<?= $afericao['alimentacao'] ?>" class="form-control valor" placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <label>Combustivel</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required name="combustivel" value="<?= $afericao['combustivel'] ?>" class="form-control valor" placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Estacionamento</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required name="estacionamento" value="<?= $afericao['estacionamento'] ?>" class="form-control valor" placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Pedagio</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required name="pedagio" value="<?= $afericao['pedagio'] ?>" class="form-control valor" placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Detergente</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required name="detergente" value="<?= $afericao['detergente'] ?>" class="form-control valor" placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <label>Óleo</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required name="oleo" value="<?= $afericao['oleo'] ?>" class="form-control valor" placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <label>Outros</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required name="outros" value="<?= $afericao['outros'] ?>" class="form-control valor" placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Oque?</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required name="oque" value="<?= $afericao['oque'] ?>" class="form-control" placeholder="Descreva...">

                                        </div>
                                    </div>
                                </div>


                                <div style="margin-top: 20px;" class="col-sm-3 col-md-offset-1">
                                    <div class="form-group">

                                        <input type="submit" class="btn bg-red btn-block waves-effect  col-md-3"></input>

                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </form>
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