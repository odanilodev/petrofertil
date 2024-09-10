<?php

$status = $this->session->userdata('usuario');

if ($status != "logado") {

    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');

$nome_usuario = $this->session->userdata('nome_usuario');


?>

<?php

$des = count($destinacoes);

?>
<?php
ini_set('display_errors', 0);
error_reporting(0);
?>

<?php

$peso_balanca_tot = 0;

foreach ($destinacoes as $d) {

    $valor_frete = (float) $d['valor_frete'];

    $valor_agenciador = (float) $d['valor_agenciador'];

    $valor_manifesto = (float) $d['valor_manifesto'];

    $quantidade = str_replace('.', '', $d['quantidade']);

    $quantidade = str_replace(',', '.', $quantidade);

    $valor_produto = (float) $d['valor_produto'];


    $valor_total_nota = $valor_produto * $quantidade;

    $demais_custos = $valor_manifesto + $valor_agenciador + $valor_frete;
    $custao_total = $demais_custos + $valor_total_nota;


    $custo_total = $custao_total / $quantidade;

    $custo_medio = $custo_medio + $custo_total;

    $peso_tot = $peso_tot + $quantidade;
    $custo_tot = $custo_tot + $custo_total;

    $custo_filtrado = $custo_filtrado + $custao_total;

    if (!empty($d['balanca'])) {
        $peso_balanca_tot += (float) str_replace(',', '.', str_replace('.', '', $d['balanca']));
    }


}

$custo_final = $peso_tot / $custo_tot;

$custo_medio_total = $custo_filtrado / $peso_tot;

?>



<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-5">
                <h2>DESTINAÇÕES GERAIS</h2>
            </div>

        </div>

        <!-- Widgets -->
        <div class="row clearfix">

            <!-- Custo Total -->
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-blue">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Custo Total</div>
                        <div class="number"><?= number_format($custo_filtrado, 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>

            <!-- Custo Médio -->
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-blue">
                        <i class="material-icons">attach_money</i>
                    </div>
                    <div class="content">
                        <div class="text">Custo Médio</div>
                        <div class="number"><?= mb_strimwidth($custo_medio_total, 0, 5, ""); ?></div>
                    </div>
                </div>
            </div>

            <!-- Total de Destinações -->
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-blue">
                        <i class="material-icons">swap_horiz</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL DE DESTINAÇÕES</div>
                        <div class="number"><?= $des ?></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Peso Total NF -->
        <div class="col-lg-6 col-md-6 col-sm-3 col-xs-12">
            <div class="info-box hover-zoom-effect">
                <div class="icon bg-blue">
                    <i class="material-icons">vertical_align_center</i>
                </div>
                <div class="content">
                    <div class="text">Peso Total NF</div>
                    <div class="number"><?= number_format($peso_tot, 2, ",", "."); ?></div>
                </div>
            </div>
        </div>

        <!-- Peso Total Balança -->
        <div class="col-lg-6 col-md-6 col-sm-3 col-xs-12">
            <div class="info-box hover-zoom-effect">
                <div class="icon bg-blue">
                    <i class="material-icons">scale</i> <!-- Você pode usar o ícone que preferir -->
                </div>
                <div class="content">
                    <div class="text">Peso Total Balança</div>
                    <div class="number"><?= number_format($peso_balanca_tot, 2, ",", "."); ?></div>
                </div>
            </div>
        </div>

        <!-- #END# Widgets -->

        <div class="row">
            <div class="container-fluid">
                <form class="col-md-12" enctype="multipart/form-data"
                    action="<?= site_url('P_destinacao/filtra_destinacao_geral/') . $id ?>" method="post">

                    <div class="col-md-3">

                        <div class="form-group ">
                            <label>De</label>
                            <input type="date" value="" name="data_inicial" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group  ">
                            <label>Até</label>
                            <input type="date" value="" name="data_final" class="form-control">
                        </div>

                    </div>

                    <button type="submit" style="margin-top: 27px"
                        class="btn btn-primary ml-2 col-sm-12 col-md-3 col-xs-12 ">Filtrar</button>

                               </div>

            </form>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Tabela de destinações
                        </h2>

                    </div>

                    <div class="body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                <thead>
                                    <tr>
                                        <th>#</th>

                                        <th>Data</th>
                                        <th>Cliente</th>
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
                                <tfoot>
                                    <tr>
                                        <th>#</th>

                                        <th>Data</th>
                                        <th>Cliente</th>
                                        <th>Quantidade (NF)</th>
                                        <th>Quantidade (Balança)</th>
                                        <th>Nota Fiscal</th>
                                        <th>Observação</th>
                                        <th>Gera custo?</th>
                                        <th>Custo</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </tfoot>
                                <tbody>


                                    <?php $contador = 1;
                                    foreach ($destinacoes as $v) {


                                        $v['data'] = implode("/", array_reverse(explode("-", $v['data'])));

                                        $valor_frete = (double) $v['valor_frete'];

                                        $valor_agenciador = (double) $v['valor_agenciador'];

                                        $valor_manifesto = (double) $v['valor_manifesto'];


                                        $quantidade = str_replace('.', '', $v['quantidade']);

                                        $valor_produto = str_replace(',', '.', $v['valor_produto']);

                                        $valor_total_nota = $valor_produto * $quantidade;

                                        $demais_custos = $valor_manifesto + $valor_agenciador + $valor_frete;

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

                                            <td align="center"><a
                                                    href="<?= site_url('P_destinacao/edita_destinacao/') . $v['id'] ?>"><i
                                                        class="material-icons"><i class="material-icons">edit</i></i></a>
                                            </td>
                                            <td align="center"><a
                                                    href="<?= site_url('P_destinacao/deleta_destinacao/') . $v['id'] . '/' . $id ?>"><i
                                                        class="material-icons"><i class="material-icons">delete</i></i></a>
                                            </td>



                                        </tr>

                                        <?php $contador++;
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div></br></br>


    </div>
</section>