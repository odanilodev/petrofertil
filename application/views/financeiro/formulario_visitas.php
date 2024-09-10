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
            <h2>LANÇAR VISITAS REALIZADAS</h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <form method="post" action="<?= site_url('F_visitas/inserir_visita') ?>">

                    <div class="card">
                        <div class="header">
                            <h2>
                                Formulário de Visitas
                                <small></small>
                            </h2>

                        </div>

                        <input type="hidden" name="id" value="<?= $visita['id'] ?>"></input>


                        <div class="body">

                            <div class="row clearfix">

                                <div class="col-sm-6">
                                    <p>
                                        <b>Selecionar Veículo</b>
                                    </p>
                                    <select name="veiculo" class="form-control show-tick">
                                        <option>Selecione</option>
                                        <?php foreach ($veiculos as $v) { ?>
                                            <option <?= ($v['placa'] == $visita['veiculo'] ? 'selected' : '');   ?> value="<?= $v['placa'] ?>"><?= $v['placa'] ?></option>
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
                                            <option <?= ($m['nome'] == $visita['motorista'] ? 'selected' : '');   ?> value="<?= $m['nome'] ?>"><?= $m['nome'] ?></option>
                                        <?php } ?>
                                    </select>

                                </div>


                                <div class="col-sm-6">

                                    <label>Cidade</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" step="0.01" name='cidade' value="<?= $visita['cidade'] ?>" class="form-control " placeholder="Digite a cidade que foi realizada a coleta">

                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <label>Quantidade de Visitas</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" step="0.01" name='visitas' value="<?= $visita['visitas'] ?>" class="form-control " placeholder="Digite a quantidade paga">

                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <label>Litragem</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" step="0.01" name='litragem' value="<?= $visita['litragem'] ?>" class="form-control " placeholder="Digite a quantidade paga">

                                        </div>
                                    </div>

                                </div>


                                <div class="col-sm-6">
                                    <p>
                                        <b>Data da Visita</b>
                                    </p>
                                    <div class="input-group ">
                                        <div class="form-line">
                                            <input required type="date" name="data_visita" value="<?= $visita['data_visita'] ?>" class="form-control" placeholder="Please choose a date...">
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="header">
                            <h2> Gastos da Visita
                            </h2>

                        </div>

                        <div class="body">

                            <div class="row clearfix">

                                <div class="col-sm-6">
                                    <label>Clientes</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required name="clientes" value="<?= $visita['clientes'] ?>" class="form-control valor" placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <label>Alimentação</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required name="alimentacao" value="<?= $visita['alimentacao'] ?>" class="form-control valor" placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-sm-6">
                                    <label>Combustível</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required name="combustivel" value="<?= $visita['combustivel'] ?>" class="form-control valor" placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Estacionamento</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required name="estacionamento" value="<?= $visita['estacionamento'] ?>" class="form-control valor" placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Pedagio</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required name="pedagio" value="<?= $visita['pedagio'] ?>" class="form-control valor" placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Detergente</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required name="detergente" value="<?= $visita['detergente'] ?>" class="form-control valor" placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Óleo</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required name="oleo" value="<?= $visita['oleo'] ?>" class="form-control valor" placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Outros</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required name="outros" value="<?= $visita['outros'] ?>" class="form-control valor" placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Oque?</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text"  name="oque" value="<?= $visita['oque'] ?>" class="form-control" placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>

                              

                                <div class="col-sm-3">
                                    <div class="form-group">

                                        <input type="submit" class="btn bg-red btn-block waves-effect col-md-3"></input>

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
    </div>
    <!-- #END# Input -->

    </div>
</section>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>