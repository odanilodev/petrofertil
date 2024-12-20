<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2></h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            FORMULÁRIO DE EPI´S
                            <small></small>
                        </h2>

                    </div>


                    <form method="post" action="<?= site_url('P_epi/edita_epi') ?>">


                        <div class="body">

                            <div class="row clearfix">


                            <input type="hidden" name="id" value="<?= $epi['id']; ?>">

                                <div class="col-sm-12">

                                    <label>Nome EPI</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input require type="text" name='nome' value="<?= $epi['nome'] ?>" class="form-control " placeholder="Digite o nome da EPI (Categoria)">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-12">

                                    <label>CA</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input require type="text" name='ca' value="<?= $epi['ca'] ?>" class="form-control " placeholder="Digite o CA">

                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-12">

                                    <label>Quantidade</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input require type="number" name='quantidade' value="<?= $epi['quantidade'] ?>" class="form-control " placeholder="Digite a quantidade disponivel no estoque">

                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-12">

                                    <label>Observação</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='observacao' value="<?= $epi['observacao'] ?>" class="form-control " placeholder="Digite uma observacao">

                                        </div>
                                    </div>

                                </div>



                                <div class="col-sm-3">
                                    <div class="form-group">

                                        <input type="submit" class="btn bg-blue btn-block waves-effect col-md-3"></input>

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