<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-4">
                <h2>Formulario de cadastro de categorias micro</h2>
            </div>
            <div class="col-md-8" style="margin-bottom: 12px; margin-top: -8px" align="right">

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
                            <small></small>
                        </h2>

                    </div>

                    <form method="post" action="<?= site_url('F_micro/inserir_micro') ?>">


                        <input type="hidden" name="id" value=""></input>

                        <div class="body">

                            <div class="row clearfix">


                                <input type="hidden" name="id_macro" value="<?= $id_macro ?>"></input>


                                <div class="col-sm-12">

                                    <label>Nome/Catergoria Micro</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='nome' value="" class="form-control " placeholder="">

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