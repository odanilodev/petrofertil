<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>CADASTRAR VEÍCULOS DA EMPRESA</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">

                    <form method="post" enctype="multipart/form-data"
                        action="<?= site_url('P_veiculos_empresa/cadastrar_veiculo') ?>">
                        <div class="header">
                            <h2>Formulário de Cadastro</h2>
                        </div>

                        <input type='hidden' value='<?= $veiculo['id'] ?>' name='id'>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <label>Modelo</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='modelo'
                                                value="<?= isset($veiculo['modelo']) ? $veiculo['modelo'] : '' ?>"
                                                class="form-control" placeholder="Digite o modelo">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Placa</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name='placa'
                                                value="<?= isset($veiculo['placa']) ? $veiculo['placa'] : '' ?>"
                                                class="form-control" placeholder="Digite a placa do veiculo">
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