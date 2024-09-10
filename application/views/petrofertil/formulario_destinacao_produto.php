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
                            FORMULÁRIO DE DESTINACAO PRODUTOS
                            <small></small>
                        </h2>

                    </div>


                    <form method="post" action="<?= site_url('P_produtos/destinar_produto') ?>">

                        <div class="body">

                            <div class="row clearfix">

                            <input type="hidden" name='id_produto' value="<?= $id_produto ?>">

                                <div class="col-sm-6">

                                    <label>Funcionario</label>
                                	 <select  name="funcionario"  class="form-control show-tick">
										<option>Selecione</option>
                                       
										 <?php foreach($funcionarios as $f){ ?>
										 
											<option value="<?= $f['nome'] ?>"><?= $f['nome'] ?></option>	 
										 
										<?php } ?>
                                    </select>

                                </div>

                                <div class="col-sm-6">

                                    <label>Quantidade</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input require type="number" name='quantidade' value="" class="form-control" placeholder="Digite a quantidade">

                                        </div>
                                    </div>

                                </div>
                             
                                <div class="col-sm-6">

                                    <label>Observação</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='observacao' value="" class="form-control" placeholder="Digite uma observacao">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <label>Data de destinação</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" name='data_destinacao' value="" class="form-control">

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