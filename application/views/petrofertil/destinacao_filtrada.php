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

		$certs = count($certificados);

?>
<?php
ini_set('display_errors', 0 );
error_reporting(0);

function deixarNumero($string)
{
    return preg_replace("/[^0-9]/", "", $string);
}
?>



<?php

$peso_tot = 0;
$custo_tot = 0;
$custo_medio = 0;
$custo_filtrado = 0;

foreach ($destinacoes as $d) {

$valor_frete = (float) $d['valor_frete'];

$valor_agenciador = (float)$d['valor_agenciador'];

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


}

$custo_final = $peso_tot / $custo_tot;

$custo_medio_total = $custo_filtrado / $peso_tot;

?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-5">
                <h2>DESTINAÇÕES DE <?= strtoupper($cliente['nome']) ?></h2>
            </div>


            <div class="col-md-7" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a href="<?= site_url('P_destinacao/formulario_destinacao/').$cliente['id'] ?>"><span type="button"
                        class="btn bg-green waves-effect">NOVO</span></a>
            </div>




        </div>



        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-blue">
                        <i class="material-icons">swap_horiz</i>
                    </div>
                    <div class="content">
                        <div class="text">NUMERO TOTAL DE DESTINAÇÕES</div>
                        <div class="number"><?= $des ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-blue">
                        <i class="material-icons">assignment_turned_in</i>
                    </div>
                    <div class="content">
                        <div class="text">PESO TOTAL NF</div>
                        <div class="number"><?= number_format("$peso_tot", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-blue">
                        <i class="material-icons">assignment_turned_in</i>
                    </div>
                    <div class="content">
                        <div class="text">CUSTO TOTAL</div>
                        <div class="number">R$<?= number_format("$custo_filtrado", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-blue">
                        <i class="material-icons">assignment_turned_in</i>
                    </div>
                    <div class="content">
                        <div class="text">CUSTO MÉDIO</div>
                        <div class="number"><?= mb_strimwidth($custo_medio_total, 0, 5, ""); ?></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- #END# Widgets -->


        <div class="row">
            <div class="container-fluid">
                <form class="col-md-12" enctype="multipart/form-data"
                    action="<?= site_url('P_destinacao/filtra_destinacao/') . $id ?>" method="post">

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
                        class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 ">Filtrar</button>

                    <a href="<?= site_url('p_destinacao/inicio/'). $id ?>"><span style="margin-top: 27px"
                            class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>

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


                                        $v['data'] = implode("/",array_reverse(explode("-",$v['data'])));
                        
                                        $valor_frete = (double) $v['valor_frete'];

                                        $valor_agenciador = (double)$v['valor_agenciador'];

                                        $valor_manifesto = (double) $v['valor_manifesto'];


                                        $quantidade = str_replace('.', '', $v['quantidade']);

                                        $valor_produto =  str_replace(',', '.', $v['valor_produto']);

                                        $valor_total_nota = $valor_produto * $quantidade;

                                        $demais_custos = $valor_manifesto + $valor_agenciador + $valor_frete;

                                        $custao_total = $demais_custos + $valor_total_nota;

                                        $custo_total = $custao_total / $quantidade;


                                    ?>


                                    <tr align="center">
                                        <td><?= $contador ?></td>
                                        <td><?= $v['data'] ?></td>
                                        <td><?= $v['quantidade'] ?>Kg</td>


                                        <td><?php
												
												if($v['balanca'] == ""){
													echo "Não Cadastrado";
												}else{ echo $v['balanca'].'Kg'; }
													
													
												?></td>


                                        <td><?= $v['nota'] ?></td>
                                        <td><?= $v['observacao'] ?></td>
                                        <td><?= $v['custo'] ?></td>
                                        <td><?=  mb_strimwidth("$custo_total", 0, 5, "") ?></td>

                                        <td align="center"><a
                                                href="<?= site_url('P_destinacao/edita_destinacao/').$v['id']?>"><i
                                                    class="material-icons"><i class="material-icons">edit</i></i></a>
                                        </td>
                                        <td align="center"><a
                                                href="<?= site_url('P_destinacao/deleta_destinacao/').$v['id'].'/'.$id ?>"><i
                                                    class="material-icons"><i class="material-icons">delete</i></i></a>
                                        </td>



                                    </tr>


                                    <?php $contador++; } ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div></br></br>



        <div class="row">
            <div class="block-header col-md-3">
                <h2>EMISSÕES DE CERTIFICADO</h2>
            </div>

        </div>

        <div class="row">
            <div class="container-fluid">
                <form class="col-md-12" enctype="multipart/form-data"
                    action="<?= site_url('P_destinacao/gera_destinacao') ?>" method="post">

                    <div class="col-md-3">
                        <input type="hidden" value="<?= $cliente['id'] ?>" name="id" class="form-control">
                    </div>

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
                        class="btn btn-success ml-2 col-sm-6 col-md-3 col-xs-6 ">Gerar</button>

            </div>

            </form>

        </div>



        <?php foreach($certificados as $a){ ?>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Código <?= $a['numero'] ?>
                        <small>
                            <?php $data = implode("/",array_reverse(explode("-",$a['data_cadastro']))) ?></br>
                            <p style="font-size: 15px;color: #0019;">Data de Emissão: <?= $data ?></p>
                        </small>
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li>
                            <a href="<?= site_url('P_destinacao/ver_certificado').'/'.$a['id'] ?>">
                                <i class="material-icons">assignment_returned</i>
                            </a>
                        </li>

                        <li>
                            <a href="<?= site_url('P_destinacao/deleta_certificado/').$a['id'].'/'.$id ?>">
                                <i class="material-icons">delete</i>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <?php } ?>



        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deletar Aferição?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir essa aferição permanentemente?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <a class="deleta" href="#"><button type="button" class="btn btn-danger"> Deletar</button></a>
                        <a class="deleta_estoque" href="#"><button type="button" class="btn btn-success"> Deletar e
                                atualizar estoque</button></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>