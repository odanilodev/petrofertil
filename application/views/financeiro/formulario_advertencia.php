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
            <div class="block-header col-md-4">
                <h2>Formulario de advertencia</h2>
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

                    <form enctype="multipart/form-data" method="post" action="<?= site_url('F_funcionarios/inserir_advertencia') ?>">


                        <div class="body">

                            <input type="hidden" value="<?= $id ?>" name="id_funcionario">
                    

                            </input>

                            <div class="row clearfix">

                                <div class="col-sm-6">
                                    <label>Tipo Advertência: </label>
                                    <select require name="tipo" class="form-control show-tick">
                                        <option>Selecione</option>
                                        <option value="VERBAL">VERBAL</option>
                                        <option value="ESCRITA">ESCRITA</option>
                                    </select>
                                </div>

                                <div class="col-sm-6">

                                    <label>Titulo</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='titulo' value="" class="form-control " placeholder="Digite aqui o titulo">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <label>Arquivo (Caso contenha)</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="arquivo" value="" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">

                                    <label>Data</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" name='data' value="" class="form-control " placeholder="Digite aqui o titulo">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-12">

                                    <label>Observação</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" name='observacao' class="form-control no-resize" placeholder="Em caso de advertência oral, especifique todos os detalhes aqui em observação"></textarea>
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