<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-4">
                <h2>Formulario de advertencia</h2>
            </div>
            <div class="col-md-8" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a href="<?= base_url('F_funcionarios/deleta_advertencia/').$advertencia['id'].'/'.$advertencia['id_funcionario']; ?>"><span type="button" class="btn bg-red waves-effect">DELETAR</span></a>
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

                    <form enctype="multipart/form-data" method="post" action="<?= site_url('F_funcionarios/inserir_advertencia') ?>">

                        <div class="body">

                            <input type="hidden" value="<?= $advertencia['id_funcionario'] ?>" name="id_funcionario">

                            </input>

                            <div class="row clearfix">

                                <div class="col-sm-6">
                                    <label>Tipo Advertência: </label>
                                    <select readonly require name="tipo" class="form-control show-tick">
                                        <?php if ($advertencia['tipo'] == 'VERBAL') { ?>
                                            <option <?= $advertencia['tipo'] == 'VERBAL' ? 'selected' : '' ?> value="VERBAL">VERBAL</option>
                                        <?php } ?>
                                        <?php if ($advertencia['tipo'] == 'ESCRITA') { ?>
                                            <option <?= $advertencia['tipo'] == 'ESCRITA' ? 'selected' : '' ?> value="ESCRITA">ESCRITA</option>
                                        <?php } ?>
                                    </select>
                                </div>


                                <div class="col-sm-6">

                                    <label>Titulo</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input readonly type="text" name='titulo' value="<?= $advertencia['titulo'] ?>" class="form-control " placeholder="Digite aqui o titulo">
                                        </div>
                                    </div>

                                </div>


                                <div class="col-sm-6">
                                    <b>Download Anexo </b>

                                    <?php if ($advertencia['arquivo'] != '') { ?>

                                        <a href="<?= base_url('F_funcionarios/download_anexo/') . $advertencia['arquivo'] ?>"> <button type="button" class="btn bg-teal btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">download</i>
                                            </button> </a>

                                    <?php } else { ?>

                                        <button type="button" class="btn bg-grey btn-circle waves-effect waves-circle waves-float">
                                            <i class="material-icons">download</i>
                                        </button>

                                    <?php } ?>

                                </div>


                                <div class="col-sm-6">
                                    <label>Data</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input readonly type="date" name='data' value="<?= $advertencia['data'] ?>" class="form-control " placeholder="Digite aqui o titulo">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <label>Observação</label>
                                    <p><?= $advertencia['observacao'] ?></p>
                                </div>


                                <div style="margin-top: 20px;" class="col-sm-3">
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