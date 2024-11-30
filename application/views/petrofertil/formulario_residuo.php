<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>CADASTRAR RESÍDUO PETROFERTIL</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form method="post" enctype="multipart/form-data"
                        action="<?= site_url('P_residuos/cadastra_residuo') ?>">
                        <div class="header">
                            <h2>Formulário de Cadastro</h2>
                        </div>

                        <input type='hidden' value='<?= $residuo['id'] ?>' name='id'>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label>Nome</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='nome'
                                                value="<?= isset($residuo['nome']) ? $residuo['nome'] : '' ?>"
                                                class="form-control" placeholder="Digite o nome">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>