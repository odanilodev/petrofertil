<section class="content">

    <?php
    ini_set('display_errors', 0);
    error_reporting(0);
    ?>
    <div class="container-fluid">
        <div class="block-header">
            <h2>FLUXO DE CAIXA</h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Formulário de lançamentos
                            <small></small>
                        </h2>
                    </div>


                    <form method="post" action="<?= site_url('S_fluxo/inserir_saida') ?>">

                        <input type="hidden" name="id" value="<?= $fluxo['id'] ?>"></input>
                        <input type="hidden" name="edita" value="<?= $fluxo['id'] ?>"></input>


                        <div class="body">

                            <div class="row clearfix">   

                            <div class="col-sm-6">
                                    <label>Valor</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input required type="text" name="valor" value="<?= $fluxo['valor'] ?>" class="form-control valor" placeholder="Insira o valor de entrada">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <p>
                                        <b>Data Saída</b>
                                    </p>
                                    <div class="input-group ">
                                        <div class="form-line">
                                            <input type="date" name="data_movimentacao" value="<?= $fluxo['data_fluxo'] ?>" class="form-control" placeholder="Please choose a date...">
                                        </div>

                                    </div>
                                </div>

                               


                                <div class="col-sm-12">
                                    <p>
                                        <b>Despesa</b>
                                    </p>
                                    <select name="tipo_despesa" class="form-control show-tick">
                                        <option>Selecione</option>

                                        <option <?= $fluxo['despesa'] == 'Ativo' ? 'selected' : '' ?> value="Ativo">Ativo</option>
                                        <option <?= $fluxo['despesa'] == 'Automóvel' ? 'selected' : '' ?> value="Automóvel">Automóvel</option>
                                        <option <?= $fluxo['despesa'] == 'BioGS' ? 'selected' : '' ?> value="BioGS">BioGS</option>
                                        <option <?= $fluxo['despesa'] == 'BioSinergia' ? 'selected' : '' ?> value="BioSinergia">BioSinergia</option>
                                        <option <?= $fluxo['despesa'] == 'D.Lia' ? 'selected' : '' ?> value="D.Lia">D.Lia</option>
                                        <option <?= $fluxo['despesa'] == 'Fazenda' ? 'selected' : '' ?> value="Fazenda">Fazenda</option>
                                        <option <?= $fluxo['despesa'] == 'Imóvel' ? 'selected' : '' ?> value="Imóvel">Imóvel</option>
                                        <option <?= $fluxo['despesa'] == 'Impostos' ? 'selected' : '' ?> value="Impostos">Impostos</option>
                                        <option <?= $fluxo['despesa'] == 'Pessoal' ? 'selected' : '' ?> value="Pessoal">Pessoal</option>
                                        <option <?= $fluxo['despesa'] == 'Solara' ? 'selected' : '' ?> value="Solara">Solara</option>
                                        <option <?= $fluxo['despesa'] == 'Sr. Nicolas' ? 'selected' : '' ?> value="Sr. Nicolas">Sr. Nicolas</option>




                                        <!--  <option <?php $fluxo['despesa'] == 'ADM' ? 'selected' : '' ?> value="ADM">ADM</option>
                                        <option <?php $fluxo['despesa'] == 'Alimentação' ? 'selected' : '' ?> value="Alimentação">Alimentação</option>
                                        <option <?php $fluxo['despesa'] == 'Coleta' ? 'selected' : '' ?> value="Coleta">Coleta</option>
                                        <option <?php $fluxo['despesa'] == 'Combustivel' ? 'selected' : '' ?> value="Combustivel">Combustivel</option>
                                        <option <?php $fluxo['despesa'] == 'Doacao' ? 'selected' : '' ?> value="Doacao">Doação</option>
                                        <option <?php $fluxo['despesa'] == 'Fixa' ? 'selected' : '' ?> value="Fixa">Fixa</option>
                                        <option <?php $fluxo['despesa'] == 'Frete' ? 'selected' : '' ?> value="Frete">Frete</option>
                                        <option <?php $fluxo['despesa'] == 'Geral' ? 'selected' : '' ?> value="Geral">Geral</option>
                                        <option <?php $fluxo['despesa'] == 'Imposto' ? 'selected' : '' ?> value="Imposto">Imposto</option>
                                        <option <?php $fluxo['despesa'] == 'Limpeza' ? 'selected' : '' ?> value="Limpeza">Limpeza</option>
                                        <option <?php $fluxo['despesa'] == 'Investimento' ? 'selected' : '' ?> value="Investimento">Investimento</option>
                                        <option <?php $fluxo['despesa'] == 'Manutenção Veiculos' ? 'selected' : '' ?> value="Manutenção Veiculos">Manutenção Veiculos</option>
                                        <option <?php $fluxo['despesa'] == 'Manutenção Geral' ? 'selected' : '' ?> value="Manutenção Geral">Manutenção Geral</option>
                                        <option <?php $fluxo['despesa'] == 'Obras' ? 'selected' : '' ?> value="Obras">Obras</option>
                                        <option <?php $fluxo['despesa'] == 'Operacional' ? 'selected' : '' ?> value="Operacional">Operacional</option>
                                        <option <?php $fluxo['despesa'] == 'Passivo' ? 'selected' : '' ?> value="Passivo">Passivo</option>
                                        <option <?php $fluxo['despesa'] == 'Tarifa Bancaria' ? 'selected' : '' ?> value="Tarifa Bancaria">Tarifa bancaria</option>
                                        <option <?php $fluxo['despesa'] == 'Vale Transporte' ? 'selected' : '' ?> value="Vale Transporte">Vale Transporte</option>
                                        <option <?php $fluxo['despesa'] == 'Petrofertil' ? 'selected' : '' ?> value="Petrofertil">Petrofertil</option> --> 

                                    </select>

                                </div> 
                             

                                <div class="col-sm-12">
                                    <label>Observação</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="observacao" value="<?= $fluxo['observacao_tipo'] ?>" class="form-control" placeholder="Insira uma observação">
                                        </div>
                                    </div>
                                </div></br></br></br>

                                <!-- Parte de Custos -->

                                <div class="form_custos"></div>

                              


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