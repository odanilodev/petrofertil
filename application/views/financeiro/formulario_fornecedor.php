<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>FORMULÁRIO DE CADASTRO</h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Cadastro de fornecedores
                            <small></small>
                        </h2>

                    </div>



                    <form method="post" action="<?= site_url('F_fornecedores/inserir_fornecedor') ?>">

                        <div class="body">

                            <div class="row clearfix">

                                <input type="hidden" name="id" value="<?= $fornecedor['id'] ?>"></input>


                                <div class="col-sm-6">

                                    <label>Nome do Fornecedor</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='nome' value="<?= $fornecedor['nome'] ?>" class="form-control " placeholder="Digite o nome do fornecedor">
                                        </div>
                                    </div>

                                </div>


                                <div class="col-sm-6">

                                    <label>Telefone de contato</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="<?= $fornecedor['contato'] ?>" name="contato" class="form-control telefone" placeholder="Digite o telefone para contato">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <label>CNPJ</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='cnpj' value="<?= $fornecedor['cnpj'] ?>" class="form-control cnpj" placeholder="Digite o nome do fornecedor">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <label>Cidade</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='cidade' value="<?= $fornecedor['cidade'] ?>" class="form-control " placeholder="Digite a cidade do fornecedor">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <label>Endereço</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='endereco' value="<?= $fornecedor['endereco'] ?>" class="form-control " placeholder="Digite o endereco do fornecedor">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <label>Nome do contato principal</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='nome_contato' value="<?= $fornecedor['nome_contato'] ?>" class="form-control " placeholder="Digite o nome do contato">
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