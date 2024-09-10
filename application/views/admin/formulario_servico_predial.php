<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <div class="pb-2">
                            <a href="<?= site_url('Ordem_servico_predial/mostrar_ordens')?>">
                                <button type="button" class="btn btn-secondary float-right">Voltar</button>
                            </a>
                        </div>
                        <h2 class="pageheader-title">Gerador de Ordem de Serviço Predial</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#" class="breadcrumb-link">Ordem de serviço predial</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->

            <!-- basic form  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <form enctype="multipart/form-data" target="_blank" action="<?= site_url('Ordem_servico_predial/gerador') ?>" method="post">

                                <input type="hidden" value="<?= $placa ?>" name="placa" class="form-control" readonly>

                                <div class="form-group">
                                    <label for="inputEmail">Responsável pelo serviço (Altere o nome caso necessário)</label>
                                    <input type="text" value="Leandro Cantallupi" name="responsavel" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail">Data da ordem de serviço</label>
                                    <input type="date" value="" name="data_ordem" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="selectEmpresa">Empresa responsavel pelo serviço:</label>
                                    <select id="selectEmpresa" name="empresa" class="form-control">
                                        <?php foreach($fornecedores as $f){ ?>
                                            <option value="<?= $f['id'] ?>"><?= $f['nome'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputEmail">Reclamação Suspeita</label>
                                    <textarea name="reclamacao" rows="6" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end basic form  -->
            <!-- ============================================================== -->
        </div>
    </div>