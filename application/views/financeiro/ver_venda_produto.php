<?php
$status = $this->session->userdata('usuario');

if ($status != "logado") {

    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');

$nome_usuario = $this->session->userdata('nome_usuario');

?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-5">
                <h2>VENDAS E INFORMAÇÕES DO PRODUTO <?= strtoupper($produto['nome']) ?></h2>
            </div>

            <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                <div class="col-md-7" style="margin-bottom: 12px; margin-top: -8px" align="right">
                    <a style="margin-left: 5px" href="<?= $_SERVER['HTTP_REFERER'] ?>"><span type="button" class="btn btn-warning  waves-effect">VOLTAR</span></a>
                </div>
            <? } ?>

        </div>


        <?php

        $soma_valores = 0;
        $unidade_peso_total = 0;

        foreach ($vendas as $a) {

            $soma_valores = $soma_valores + $a['valor_total'];

            $unidade_peso_total = $unidade_peso_total + $a['unidade_peso'];
        }

        ?>


        <!-- Widgets -->
        <div class="row clearfix">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-green hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Valor Total de Venda</div>
                        <div class="number">R$<?= number_format("$soma_valores", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Unidade/Peso Total vendido</div>
                        <div class="number"><?= $unidade_peso_total ?></div>
                    </div>
                </div>
            </div>

            <?php if (isset($entrada) and isset($gastos)) { ?>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">attach_money</i>
                        </div>
                        <div class="content">
                            <div class="text">Ganhos</div>
                            <div class="number">R$<?= number_format("$entrada", 2, ",", "."); ?></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-red hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">money_off</i>
                        </div>
                        <div class="content">
                            <div class="text">Despesas</div>
                            <div class="number">R$<?= number_format("$gastos", 2, ",", "."); ?></div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <div class="content">
                            <div class="text">Lucro</div>
                            <div class="number">R$<?= number_format("$lucro", 2, ",", "."); ?></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">attach_money</i>
                        </div>
                        <div class="content">
                            <div class="text">Ganhos</div>
                            <div class="number">R$<?= number_format("$entrada", 2, ",", "."); ?></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-red hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">money_off</i>
                        </div>
                        <div class="content">
                            <div class="text">Despesas</div>
                            <div class="number">R$<?= number_format("$gastos", 2, ",", "."); ?></div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <div class="content">
                            <div class="text">Lucro</div>
                            <div class="number">R$<?= number_format("$lucro", 2, ",", "."); ?></div>
                        </div>
                    </div>
                </div>


            <?php } ?>
        </div>

        <!-- #END# Widgets -->

        <div class="row">
            <div class="container-fluid">
                <form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_venda_reciclagem/ver_vendas_produto_filtrado/' . $id) ?>" method="post">

                    <div class="col-md-3 col-sm-12">

                        <div class="form-group ">
                            <label>De</label>
                            <input type="date" value="" name="data_inicial" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-3 col-sm-12">

                        <div class="form-group  ">
                            <label>Até</label>
                            <input type="date" value="" name="data_final" class="form-control">
                        </div>

                    </div>



                    <button type="submit" style="margin-top: 27px" class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 ">Filtrar</button>

                    <a href="<?= base_url('F_venda_reciclagem/ver_vendas_produto/' . $id) ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>
                </form>
            </div>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Vendas no Período
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>Data da Venda</th>
                                        <th>Produto</th>
                                        <th>Comprador</th>
                                        <th>Unidade/Peso</th>
                                        <th>Valor de Venda</th>
                                        <th>Preço Total</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Data da Venda</th>
                                        <th>Produto</th>
                                        <th>Comprador</th>
                                        <th>Unidade/Peso</th>
                                        <th>Valor de Venda</th>
                                        <th>Preço Total</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php

                                    $contador = 1;

                                    foreach ($vendas as $v) {

                                        $valor_total = $v['valor_total'];

                                    ?>
                                        <tr>
                                            <td><?= $contador ?></td>
                                            <td><?= date("d/m/Y", strtotime($v['data_venda'])); ?></td>
                                            <td><?= $v['produto'] ?></td>
                                            <td><?= $v['comprador'] ?></td>
                                            <td><?= $v['unidade_peso'] ?></td>
                                            <td><?= $v['valor_venda'] ?></td>

                                            <td>R$<?= number_format("$valor_total", 2, ",", "."); ?></td>

                                            <td align="center"><a data-toggle="modal" href="<?= base_url('F_venda_reciclagem/editar_venda_produto/') . $v['id'] ?>" style="cursor: pointer;"><i class="material-icons">edit</i></a></td>
                                            <td align="center"><a data-toggle="modal" href="<?= base_url('F_venda_reciclagem/deleta_venda_produto/') . $v['id'].'/'.$id ?>" style="cursor: pointer;"><i class="material-icons">delete</i></a></td>
                                        </tr>
                                    <?php $contador++;
                                    } ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->





    </div>
</section>