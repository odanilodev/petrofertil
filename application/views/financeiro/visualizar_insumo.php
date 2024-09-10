<section class="content">

    <?php
    ini_set('display_errors', 0);
    error_reporting(0);
    ?>
    <div class="container-fluid">
        <div class="block-header">
            <h2>FLUXO DE CAIXA</h2>
            <div style="margin-bottom: 10px;" align="right">

                <a style="margin-left: 5px" href="javascript:void(0)" onClick="history.go(-1); return false;"><span type="button" class="btn bg-cyan waves-effect">VOLTAR</span></a>   
             
            </div>
        </div>

      
        
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Exibir Custos detalhados
                            <small></small>
                        </h2>
                    </div>


                    <form method="post" action="<?= site_url('F_fluxo/inserir_saida') ?>">

                        <input type="hidden" name="id" value="<?= $fluxo['id'] ?>"></input>

                        <div class="body">

                            <div class="row clearfix">

                                <div class="testeteste">

                                    
                                    <div class='col-sm-4'><label>Clientes</label>
                                        <div class='form-group'>
                                            <div class='form-line'><input type='text' name='clientes' value='<?= $insumo['clientes'] ?>' class='form-control valor' placeholder='Insira o valor gasto'></div>
                                        </div>
                                    </div>
                                    <div class='col-sm-4'><label>Alimentação</label>
                                        <div class='form-group'>
                                            <div class='form-line'><input type='text' name='alimentacao' value='<?= $insumo['alimentacao'] ?>' class='form-control valor' placeholder='Insira o valor gasto'></div>
                                        </div>
                                    </div>
                                    <div class='col-sm-4'><label>Combustivel</label>
                                        <div class='form-group'>
                                            <div class='form-line'><input type='text' name='combustivel' value='<?= $insumo['combustivel'] ?>' class='form-control valor' placeholder='Insira o valor gasto'></div>
                                        </div>
                                    </div>
                                    <div class='col-sm-4'><label>Estacionamento</label>
                                        <div class='form-group'>
                                            <div class='form-line'><input type='text' name='estacionamento' value='<?= $insumo['estacionamento'] ?>' class='form-control valor' placeholder='Insira o valor gasto'></div>
                                        </div>
                                    </div>
                                    <div class='col-sm-4'><label>Pedágio</label>
                                        <div class='form-group'>
                                            <div class='form-line'><input type='text' name='pedagio' value='<?= $insumo['pedagio'] ?>' class='form-control valor' placeholder='Insira o valor gasto'></div>
                                        </div>
                                    </div>
                                    <div class='col-sm-4'><label>Detergente</label>
                                        <div class='form-group'>
                                            <div class='form-line'><input type='text' name='detergente' value='<?= $insumo['detergente'] ?>' class='form-control valor' placeholder='Insira o valor gasto'></div>
                                        </div>
                                    </div>
                                    <div class='col-sm-4'><label>Óleo</label>
                                        <div class='form-group'>
                                            <div class='form-line'><input type='text' name='oleo' value='<?= $insumo['oleo'] ?>' class='form-control valor' placeholder='Insira o valor gasto'></div>
                                        </div>
                                    </div>
                                    <div class='col-sm-4'><label>Outros</label>
                                        <div class='form-group'>
                                            <div class='form-line'><input type='text' name='outros' value='<?= $insumo['outros'] ?>' class='form-control valor' placeholder='Insira o valor gasto'></div>
                                        </div>
                                    </div>
                                    <div class='col-sm-4'><label>Oque?</label>
                                        <div class='form-group'>
                                            <div class='form-line'><input type='text' name='oque' value='<?= $insumo['oque'] ?>' class='form-control' placeholder=''></div>
                                        </div>
                                    </div </div>


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