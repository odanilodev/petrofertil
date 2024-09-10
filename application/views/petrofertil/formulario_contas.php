<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>CADASTRAR PRODUTO</h2>
        </div>
        <!-- Formulário de Cadastro -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form method="post" enctype="multipart/form-data" action="<?= site_url('P_caixa/insere_conta') ?>">
                        <div class="header">
                            <h2>Formulário de Cadastro</h2>
                        </div>
                        <input type="hidden" name="id" value="<?= isset($produto['id']) ? $produto['id'] : '' ?>">
                        <div class="body">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Nome/Descrição</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="descricao" value="<?= isset($produto['nome']) ? $produto['nome'] : '' ?>" class="form-control" placeholder="Digite uma descrição para a conta">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label>Banco</label>
                                    <select name="banco" class="form-control">
                                        <option value="">Selecione</option>

                                        <option value="Banco Inter">Banco Inter</option>
                                        <option value="Banco Safra">Banco Safra</option>
                                        <option value="Banco do Brasil">Banco do Brasil</option>
                                        <option value="Bradesco">Bradesco</option>
                                        <option value="Caixa">Caixa</option>
                                        <option value="HSBC">HSBC</option>
                                        <option value="Itaú">Itaú</option>
                                        <option value="Santander">Santander</option>
                                        <option value="Sicoob">Sicoob</option>
                                        <option value="Sicredi">Sicredi</option>
                                        <option value="Unicred Integração">Unicred Integração</option>
                                        <option value="Outro">Outro</option>  
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label>Agência</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="agencia" value="<?= isset($produto['preco']) ? $produto['preco'] : '' ?>" class="form-control" placeholder="Digite a agência">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label>Conta</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="conta" value="<?= isset($produto['preco']) ? $produto['preco'] : '' ?>" class="form-control" placeholder="Digite a conta">
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
    </div>
</section>
