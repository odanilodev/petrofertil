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
                            Formulário de Cadastro
                        </h2>
                    </div>


                    <?php if(empty($conta)){ ?>
                    <form method="post" action="<?= site_url('F_contas/inserir_conta') ?>">
                    <?php }else{ ?>
                        <form method="post" action="<?= site_url('F_contas/inserir_conta/').$conta['id'] ?>">
                    <?php } ?>
                        <input type="hidden" name="id" value=""></input>

                        <div class="body">

                            <div class="row clearfix">

                                <input type="hidden" name="id" value=""></input>

                         
                                <div class="col-md-6">
                                    <p>
                                        <b>Grupos Macro</b>
                                    </p>
                                    <select    required id="macros" name="id_macro" class="form-control macros show-tick">
                                        <option>Selecione</option>

                                        <?php foreach ($macros as $m) { ?>
                                            <option data-url="<?= base_url("F_micro/recebe_micro") ?>" <?= $m['id'] == $conta['id_macro'] ? 'selected' : '' ?> data-id="<?= $m['id'] ?>" value="<?= $m['id'] ?>"><?= $m['nome'] ?></option>
                                        <?php } ?>
                                    </select>

                                </div>

                              
                                <div class="col-md-6">
                                    <p>
                                        <b>Grupos Micro</b>
                                    </p>
                                    <select required name="id_micro" class="form-control show-tick micros">
                                        <option>Selecione</option>
                                    </select>

                                </div>
                               

                                <!-- <div style="margin-top: 20px" class="col-md-6">
                                    <p>
                                        <b>Despesa</b>
                                    </p>
                                    <select name="categoria" class="form-control show-tick">
                                        <option>Selecione</option>

                                        <option value="ADM">ADM</option>
                                        <option value="Alimentação">Alimentação</option>
                                        <option value="Ativo">Ativo</option>
                                        <option value="Coleta">Coleta</option>
                                        <option value="Combustivel">Combustivel</option>
                                        <option value="Fixa">Fixa</option>
                                        <option value="RecicFretelagem">Frete</option>
                                        <option value="Geral">Geral</option>
                                        <option value="Imposto">Imposto</option>
                                        <option value="Limpeza">Limpeza</option>
                                        <option value="Investimento">Investimento</option>
                                        <option value="Manutenção Veiculos">Manutenção Veiculos</option>
                                        <option value="Manutenção Geral">Manutenção Geral</option>
                                        <option value="Obras">Obras</option>
                                        <option value="Operacional">Operacional</option>
                                        <option value="Passivo">Passivo</option>
                                        <option value="Tarifa Bancaria">Tarifa bancaria</option>
                                        <option value="Vale Transporte">Vale Transporte</option>

                                    </select>

                                </div> -->

                                <div class="col-md-6">
                                    <p>
                                        <b>Empresa</b>
                                    </p>
                                    <select name="despesa" class="form-control show-tick">
                                        <option>Selecione</option>

                                        <option <?= $conta['despesa'] == 'Óleo' ? 'selected' : '' ?> value="Óleo">Óleo</option>
                                        <option <?= $conta['despesa'] == 'Reciclagem' ? 'selected' : '' ?> value="Reciclagem">Reciclagem</option>


                                    </select>

                                </div>

                                <div class="col-md-6">
                                    <p>
                                        <b>Recebido</b>
                                    </p>
                                    <select name="recebido" class="form-control show-tick">
                                        <option>Selecione</option>

                                        <?php foreach ($contribuintes as $c) { ?>
                                            <option <?= $c['nome'] == $conta['recebido'] ? 'selected' : '' ?>   value="<?= $c['nome'] ?>"><?= $c['nome'] ?></option>
                                        <?php } ?>

                                    </select>

                                </div>

                                <?php if(empty($conta)){ ?>

                                <div class="col-md-4">
                                    <p>
                                        <b>Quantidade de Parcelas</b>
                                    </p>
                                    <select required name="quantidade" class="form-control ">
                                        <option>Selecione</option>

                                        <option value="avista">A vista</option>
                                        <?php for ($c = 1; $c <= 48; $c++) { ?>
                                            <option value="<?= $c ?>"><?= $c . 'x' ?></option>
                                        <?php } ?>

                                    </select>

                                </div>


                             
                               <?php } ?>
                               
                               <div class="col-md-4">
                                    <p>
                                        <b>Data para Pagamento/Primeira Parcela</b>
                                    </p>
                                    <div class="input-group ">
                                        <div class="form-line">
                                            <input type="date" name="vencimento" required value="<?= $conta['vencimento'] ?>" class="form-control" placeholder="Please choose a date...">
                                        </div>

                                    </div>
                                </div>

                                
                                <div class="col-md-4">
                                    <p>
                                        <b>Data Emissão</b>
                                    </p>
                                    <div class="input-group ">
                                        <div class="form-line">
                                            <input type="date" name="data_emissao" required value="<?= $conta['data_emissao'] ?>" class="form-control" placeholder="Please choose a date...">
                                        </div>

                                    </div>
                                </div>




                                <div class="col-md-4">
                                    <label>Valor</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required name="valor"  value="<?= $conta['valor'] ?>" class="form-control valor" placeholder="Insira o valor da conta">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <label>Observação</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="observacao" value="<?= $conta['observacao'] ?>" class="form-control" placeholder="Digite uma observação">

                                        </div>
                                    </div>
                                </div>

                            </div>
                        
                            <!-- Parte de Custos -->

                            <div class='row'>


                                <div class="form_custos"></div>

                            

                                <div class="col-sm-2 col-md-offset-5">
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