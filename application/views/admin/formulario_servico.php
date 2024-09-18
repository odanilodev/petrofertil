<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">

                        <div class="pb-2">
                            <a href="<?= site_url('Ordem_servico_predial/formulario_ordem_predial/') . $placa ?>"><button
                                    type="button" class="btn btn-secondary float-right">Voltar</button>
                        </div></a>

                        <h2 class="pageheader-title">Gerador de Ordem de Serviço</h2>

                        <div class="page-breadcrumb">

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manutenções</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Ordem de serviço</li>
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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <div class="card">

                        <div class="card-body">
                            <form enctype="multipart/form-data" target="_blank"
                                action="<?= site_url('ordem_servico/gerador') ?>" method="post">

                                <input type="hidden" value="<?= $placa ?>" name="placa" class="form-control" readonly>

                                <label for="inputEmail">Motorista</label>
                                <select name="motorista" class="form-control col-md-5">
                                    <option value="0">Nenhum Motorista</option>
                                    <?php foreach ($motoristas as $m) { ?>

                                        <option value="<?= $m['nome'] ?>"><?= $m['nome'] ?></option>

                                    <?php } ?>
                                </select></br>

                                <div class="form-group">
                                    <label for="inputEmail">Data Reclamação</label>
                                    <input type="date" value="" name="data_reclamacao" class="form-control col-md-5">
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail">Data da ordem de serviço</label>
                                    <input type="date" id="data_ordem" name="data_ordem" class="form-control col-md-5"
                                        readonly>
                                </div>

                                <label for="inputEmail">Oficina</label>
                                <select name="oficina" class="form-control col-md-5">
                                    <option>Selecione</option>
                                    <?php foreach ($oficinas as $o) { ?>
                                        <option value="<?= $o['nome'] ?>"><?= $o['nome'] ?></option>
                                    <?php } ?>
                                </select></br>

                                <div class="form-group">
                                    <label for="inputEmail">Reclamação Suspeita</label>
                                    <input type="text" value="" name="reclamacao" class="form-control">

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

    <script>
        // Obtenha o elemento de entrada de data pelo ID
        var dataOrdemInput = document.getElementById("data_ordem");

        // Obtenha a data atual no formato "AAAA-MM-DD"
        var dataAtual = new Date().toISOString().slice(0, 10);

        // Defina o valor do campo de entrada de data como a data atual
        dataOrdemInput.value = dataAtual;
    </script>