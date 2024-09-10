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
            <div class="block-header col-md-3">
                <h2>Motoristas/Metas</h2>
            </div>
        </div>

        <?php

      
        foreach ($afericoes as $c) {

            if($cidade[$c['cidade']]['quantidade'] == ''){ $cidade[$c['cidade']]['quantidade'] = 0;};

            $cidade[$c['cidade']]['aferido'] = $cidade[$c['cidade']]['aferido'] + $c['aferido'];

            $cidade[$c['cidade']]['pago'] = $cidade[$c['cidade']]['pago'] + $c['pago'];

            $cidade[$c['cidade']]['custo'] = $cidade[$c['cidade']]['custo'] + $c['custo'];

            $cidade[$c['cidade']]['quantidade'] = $cidade[$c['cidade']]['quantidade'] + 1;

            $cidade[$c['cidade']]['custo_medio'] = $cidade[$c['cidade']]['custo'] / $cidade[$c['cidade']]['quantidade'] ;
        
            $cidade[$c['cidade']]['nome'] = $c['cidade'];
        }

        ?>

        <div class="row">
            <div class="container-fluid">
                <?php if ($pagina == 'erro') { ?>
                    <div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Não foram encontradas <b>aferições</b> nas datas selecionadas, ou os campos nao foram preenchidos corretamente.
                    </div>
                <?php } ?>
                <form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_relatorios/relatorio_oleo_filtrado/') ?>" method="post">


                    <div class="col-md-3">

                        <div class="form-group">
                            <label>De</label>
                            <input type="date" value="" name="data_inicial" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group">
                            <label>Até</label>
                            <input type="date" value="" name="data_final" class="form-control">
                        </div>

                    </div>


                    <button type="submit" style="margin-top: 27px" class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 ">Filtrar</button>

                    <a href="<?= site_url('F_relatorios/relatorio_oleo') ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>


                </form>

            </div>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Total pago e aferido cidades
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Pago</th>
                                        <th>Aferido</th>
                                        <th>Custo Médio</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Pago</th>
                                        <th>Aferido</th>
                                        <th>Custo Médio</th>
                                    </tr>
                                </tfoot>
                                <tbody>


                                    <?php $contador = 1;
                                    foreach ($cidade as $m) {  ?>

                                        <tr>
                                            <td><?= $contador ?></td>
                                            <td><?= $m['nome'] ?></td>
                                            <td><?= $m['pago'] ?></td>
                                            <td style=""><?= $m['aferido'] ?></td>
                                            <td>R$<?php $custo_medio = $m['custo_medio']; echo number_format("$custo_medio", 2, ",", ".");  ?></td>

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




    </div>
</section>