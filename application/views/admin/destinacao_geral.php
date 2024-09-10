<?php

$des = count($destinacoes);

?>
<?php
ini_set('display_errors', 0);
error_reporting(0);
?>
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">

                    <?php if ($status == 'erro') { ?>

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Atenção!</strong> Selecione uma data onde foram registradas destinações
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    <?php } ?>

                   

                    <h2 class="pageheader-title">Destinação Geral</h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Destinação de Resíduos</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">


            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Numero total de Destinações</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1"><?= $des ?></h1>
                        </div>
                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                            <!--  <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span>-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end sales  -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- total orders  -->
            <!-- ============================================================== -->

            <div class="col-md-12 row mb-1">
                <form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('Destinacao_petro/filtra_destinacao_geral/') . $id ?>" method="post">

                    <button type="submit" class="btn btn-primary ml-2 col-md-2 mt-4 float-right">Filtrar</button>

                    <a href="<?= site_url('Destinacao_petro/destinacao_geral/') . $id ?>"><span class="btn btn-success col-md-2 mt-4 float-right">Geral</span></a>

                    <div style="float: right" class="form-group col-md-3 ">
                        <label>Até</label>
                        <input type="date" value="" name="data_final" class="form-control">
                    </div>


                    <div style="float: right" class="form-group col-md-3">
                        <label>De</label>
                        <input type="date" value="" name="data_inicial" class="form-control">
                    </div>

                </form>

            </div>
            <!-- ============================================================== -->
            <!-- basic table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Tabela de Destinações</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped first" id="minhaTabela1">
                                <thead>

                                    <tr align="center">
                                        <th>#</th>
                                        <th>Data</th>
                                        <th>Nome</th>
                                        <th>Quantidade (NF)</th>
                                        <th>Quantidade (Balança)</th>
                                        <th>Nota Fiscal</th>
                                        <th>Observação</th>
                                        <th>Gera custo?</th>
                                        <th>Custo</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    <?php $contador = 1;
                                    foreach ($destinacoes as $v) {

                                        $v['data'] = implode("/", array_reverse(explode("-", $v['data'])));


                                        $valor_frete = (float) $v['valor_frete'];

                                        $valor_agenciador = (float)$v['valor_agenciador'];

                                        $valor_manifesto = (float) $v['valor_manifesto'];

                                        $quantidade  =  $v['quantidade'];

                                        $quantidade = str_replace('.', '', $quantidade);

                                        $valor_produto = (float) $v['valor_produto'];

                                        $valor_total_nota = $valor_produto * $quantidade;

                                        $demais_custos = $valor_manifesto + $valor_agenciador + $valor_frete;;
                                        $custao_total = $demais_custos + $valor_total_nota;


                                        $custo_total = $custao_total / $quantidade;


                                    ?>

                                        <tr align="center">
                                            <td><?= $contador ?></td>
                                            <td><?= $v['data'] ?></td>
                                            <td><?= $v['cliente'] ?></td>
                                            <td><?= $v['quantidade'] ?>Kg</td>

                                            <td><?php

                                                if ($v['balanca'] == "") {
                                                    echo "Não Cadastrado";
                                                } else {
                                                    echo $v['balanca'] . 'Kg';
                                                }

                                                ?></td>

                                            <td><?= $v['nota'] ?></td>
                                            <td><?= $v['observacao'] ?></td>
                                            <td><?= $v['custo'] ?></td>
                                            <td><?= mb_strimwidth("$custo_total", 0, 5, "") ?></td>

                                            <td><a href="<?= site_url('destinacao_petro/edita_destinacao/') . $v['id'] ?>"><i class="fas fa-pencil-alt"></i></a></td>

                                            <td><a href="<?= site_url('destinacao_petro/deleta_destinacao/') . $v['id'] . '/' . $id ?>"><i class="fas fa-trash"></i></a></td>

                                        </tr>

                                    <?php $contador++;
                                    } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end basic table  -->
            <!-- ============================================================== -->
        </div>

      
    </div>
