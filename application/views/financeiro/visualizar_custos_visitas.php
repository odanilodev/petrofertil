<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-4">
                <h2>EXIBIR CUSTOS DA VISITA N°<?= $visita['id']; ?></h2>
            </div>
            <div class="col-md-8" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a href="<?= $_SERVER['HTTP_REFERER']; ?>"><span type="button" class="btn bg-green waves-effect">VOLTAR</span></a>
        
            </div>
        </div>

        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <form method="post" action="<?= site_url('F_afericao/inserir_afericao') ?>">

                    <div class="card">
                        <div class="header">
                            <h2>
                                Exibir Custos
                            </h2>

                        </div>


                        <div class="body">

                            <div class="row clearfix">

                                <div class="col-sm-6">
                                    <label>Clientes</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" disabled name="clientes" value="R$<?= $visita['clientes'] ?>" class="form-control " placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Alimentação</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" disabled name="alimentacao" value="R$<?= $visita['alimentacao'] ?>" class="form-control " placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <label>Combustivel</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" disabled name="combustivel" value="R$<?= $visita['combustivel'] ?>" class="form-control " placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Estacionamento</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" disabled name="estacionamento" value="R$<?= $visita['estacionamento'] ?>" class="form-control " placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Pedagio</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" disabled name="pedagio" value="R$<?= $visita['pedagio'] ?>" class="form-control " placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Detergente</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" disabled name="detergente" value="R$<?= $visita['detergente'] ?>" class="form-control " placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <label>Óleo</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" disabled name="oleo" value="R$<?= $visita['oleo'] ?>" class="form-control " placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <label>Outros</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" disabled name="outros" value="R$<?= $visita['outros'] ?>" class="form-control " placeholder="Insira o valor gasto">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Oque?</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" disabled name="oque" value="<?= $visita['oque'] ?>" class="form-control" placeholder="Insira o valor gasto">

                                        </div>
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