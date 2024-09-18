<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>CADASTRAR OFICINAS</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">

                    <form method="post" enctype="multipart/form-data"
                        action="<?= site_url('P_oficinas/cadastra_oficina') ?>">
                        <div class="header">
                            <h2>Formulário de Cadastro</h2>
                        </div>

                        <input type='hidden' value='<?= $veiculo['id'] ?>' name='id'>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <label>Nome</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='nome'
                                                value="<?= isset($oficina['nome']) ? $oficina['nome'] : '' ?>"
                                                class="form-control" placeholder="Digite o nome">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Endereço</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='endereco'
                                                value="<?= isset($oficina['endereco']) ? $oficina['endereco'] : '' ?>"
                                                class="form-control" placeholder="Digite o endereço da oficina">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-4">
                                    <label>Telefone</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='telefone'
                                                value="<?= isset($oficina['telefone']) ? $oficina['telefone'] : '' ?>"
                                                class="form-control" placeholder="Digite o telefone">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Contato</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='contato'
                                                value="<?= isset($oficina['contato']) ? $oficina['contato'] : '' ?>"
                                                class="form-control"
                                                placeholder="Digite o nome para contato da oficina">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- #END# Input -->
    </div>

</section>