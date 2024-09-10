<?php

$status = $this->session->userdata('usuario');

if ($status != "logado") {

    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');

$nome_usuario = $this->session->userdata('nome_usuario');

?>

<style>
    .caixa_display {
        display: none;
    }

    .caixa_display2 {
        display: none;
    }

    .ocultador {
        display: block;
    }

    .ocultador2 {
        display: block;
    }
</style>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-3">
                <h2>FLUXO DE CAIXA</h2>
            </div>

            <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">

                    <button id="olho" type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">remove_red_eye</i>
                    </button>

                    <a style="margin-left: 5px" href="<?= base_url('F_fluxo/lancar_entrada') ?>"><span type="button" class="btn btn-success  waves-effect">ENTRADA</span></a>
                    <a style="margin-left: 5px" href="<?= base_url('F_fluxo/lancar_saida') ?>"><span type="button" class="btn btn-warning  waves-effect">SAÍDA</span></a>
                    <a style="margin-left: 5px" href="<?= base_url('F_fluxo/inicio') ?>"><span type="button" class="btn btn-info  waves-effect">VISUALIZAR FLUXO RESUMIDO</span></a>

                </div>
            <? } ?>

        </div>

        <?php

        $total_caixa = $caixa['caixa'];

        $total_caixa_reciclagem = $caixa_reciclagem['caixa'];

        ?>

        <!-- Widgets -->
        <div class="row clearfix">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box  hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Caixa Óleo</div>
                        <div id="caixa" class="number caixa_display">R$<?= number_format("$total_caixa", 2, ",", "."); ?></div>
                        <div id="ocultador" class="number ocultador">R$ ------------ </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-blue-info hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Caixa Reciclagem</div>
                        <div id="caixa2" class="number caixa_display2">R$<?= number_format("$total_caixa_reciclagem", 2, ",", "."); ?></div>
                        <div id="ocultador2" class="number ocultador">R$ ------------ </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-blue-grey hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Previsão Caixa Óleo</div>
                        <div  class="number ">R$<?= number_format("$previsao_oleo", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-blue-grey hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Previsão Caixa Reciclagem</div>
                        <div  class="number ">R$<?= number_format("$previsao_reciclagem", 2, ",", "."); ?></div>
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
                            <div class="text">Entradas</div>
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
                            <div class="text">Saídas</div>
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
                            <div class="text">Diferença</div>
                            <div class="number">R$<?= number_format("$lucro", 2, ",", "."); ?></div>
                        </div>
                    </div>
                </div>


            <?php } ?>
        </div>

        <!-- #END# Widgets -->

        <div class="row">
            <div class="container-fluid">
                <form class="col-md-12" enctype="multipart/form-data" action="<?= site_url('F_fluxo/filtra_fluxo_geral/') ?>" method="post">

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

                    <a href="<?= base_url('F_fluxo/inicio/7') ?>"><span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>
                </form>
            </div>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Entradas e Saídas
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Data Saída</th>
                                        <th>Data Emissão</th>
                                        <th>Empresa</th>
                                        <th>Valor</th>
                                        <th>Despesas</th>
                                        <th>Tipo Despesa</th>
                                        <th>Pago/Recebido</th>
                                        <th>Observação</th>
                                        <th>Clientes</th>
                                        <th>Alimentação</th>
                                        <th>Combustivel</th>
                                        <th>Estacionamento</th>
                                        <th>Pedágio</th>
                                        <th>Detergente</th>
                                        <th>Óleo</th>
                                        <th>Outros</th>



                                        <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                            <th>Editar</th>
                                            <th>Deletar</th>
                                        <?php } ?>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>#</th>
                                        <th>Data Saída</th>
                                        <th>Data Emissão</th>
                                        <th>Empresa</th>
                                        <th>Valor</th>
                                        <th>Despesas</th>
                                        <th>Tipo Despesa</th>
                                        <th>Pago/Recebido</th>
                                        <th>Observação</th>
                                        <th>Clientes</th>
                                        <th>Alimentação</th>
                                        <th>Combustivel</th>
                                        <th>Estacionamento</th>
                                        <th>Pedágio</th>
                                        <th>Detergente</th>
                                        <th>Óleo</th>
                                        <th>Outros</th>
                                        <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                            <th>Editar</th>
                                            <th>Deletar</th>
                                        <?php } ?>

                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php

                                    $contador = 1;

                                    foreach ($fluxo as $f) {

                                        $valor = $f['valor'];

                                    ?>
                                        <tr>
                                            <td><?= $contador ?></td>
                                            <td><?= date("d/m/Y", strtotime($f['data_fluxo'])); ?></td>
                                            
                                            <td>
                                            <?php if($f['data_emissao'] == null){ ?>

                                            <?=  '___/___/____';  ?>
                                            
                                            <?php }else{ echo date("d/m/Y", strtotime($f['data_emissao']));} ?>
                                            </td>
                                            
                                            <td><?= $f['empresa'] ?></td>

                                            <td>
                                            <?php  if($f['observacao'] == 'CUSTO OPERACIONAL > INSUMO DE PRODUÇÃO'){ ?>
                                            <a href="<?= base_url('F_fluxo/ver_insumo/').$f['id'] ?>">
                                            <?php } ?>
                                            R$<?= number_format("$valor", 2, ",", "."); ?>
                                            </a></td>

                                            <td><?= $f['despesa'] ?></td>
                                            <td><?= $f['observacao'] ?></td>
                                            <td><?= $f['pago_recebido'] ?></td>
                                            <td><?= $f['observacao_tipo'] ?></td>
                                            <td><?= $f['clientes'] ?></td>
                                            <td><?= $f['alimentacao'] ?></td>
                                            <td><?= $f['combustivel'] ?></td>
                                            <td><?= $f['estacionamento'] ?></td>
                                            <td><?= $f['pedagio'] ?></td>
                                            <td><?= $f['detergente'] ?></td>
                                            <td><?= $f['oleo'] ?></td>
                                            <td><?= $f['outros'] ?></td>

                                            <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                                                <td align="center"><a href="<?= $f['empresa'] == 'Óleo' ? base_url('F_fluxo/edita_oleo/') . $f['id'] : base_url('F_fluxo/edita_reciclagem/') . $f['id'] ?>"><i class="material-icons">mode_edit</i></a></td>
                                                <td align="center"><a data-toggle="modal" data-target="#exampleModal7" data-pegaid="<?= $f['id'] ?>"><i class="material-icons">delete</i></a></td>
                                            <?php } ?>

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




        <div class="modal fade" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deseja excluir essa movimentação?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir essa movimentação?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <a class="deleta" href="#"><button type="button" class="btn btn-danger"> Deletar</button></a>
                        <a class="deleta_fluxo" href="#"><button type="button" class="btn btn-success"> Deletar e atualizar caixa</button></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<script>
    var olho = document.getElementById("olho")


    olho.addEventListener("click", function() {


        var caixa = document.getElementById("caixa")

        var caixa2 = document.getElementById("caixa2")

        var ocultador = document.getElementById("ocultador")
        var ocultador2 = document.getElementById("ocultador2")


        if (caixa.style.display === "block") {

            caixa.style.display = "none"
            caixa2.style.display = "none"

            ocultador.style.display = "block"
            ocultador2.style.display = "block"

        } else {
            caixa.style.display = "block"
            caixa2.style.display = "block"

            ocultador.style.display = "none"
            ocultador2.style.display = "none"
        }

    });
</script>