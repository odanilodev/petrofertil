<?php

$status = $this->session->userdata('usuario');

if ($status != "logado") {
    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');
$nome_usuario = $this->session->userdata('nome_usuario');

// Calcular o gasto total e o número de manutenções
$gasto_total = 0;
$numero_manutencoes = count($manutencoes);

foreach ($manutencoes as $m) {
    $val_array = json_decode($m['valor'], true);
    $desconto = isset($m['desconto']) ? $m['desconto'] : 0;
    $total = array_sum($val_array) - $desconto;
    $gasto_total += $total;
}
?>


<style>
    #ModalPagar .modal-dialog {
        max-width: 600px;
    }

    #ModalPagar .modal-content {
        border-radius: 10px;
    }

    #ModalPagar .modal-body {
        padding: 20px;
    }

    #ModalPagar .modal-footer {
        justify-content: space-between;
        border-top: none;
    }

    #ModalPagar .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    #ModalPagar .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

<input type='hidden' value="<?= base_url() ?>" class="base-url">


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-3">
                <h2>Manutenções realizadas</h2>
            </div>

            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a style="margin-left: 5px" href="<?= base_url('P_manutencao/formulario_manutencao') ?>"><span
                        type="button" class="btn btn-info  waves-effect">ENTRADA</span></a>
            </div>

        </div>

        <!-- Widgets -->
        <div class="row clearfix">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-blue-grey hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Gasto total em manutenções</div>
                        <div class="number">R$<?= number_format($gasto_total, 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-blue-grey hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">build</i>
                    </div>
                    <div class="content">
                        <div class="text">Total de manutenções realizadas</div>
                        <div class="number"><?= $numero_manutencoes; ?></div>
                    </div>
                </div>
            </div>


            <div class=" col-lg-8 col-md-7 col-sm-7 col-xs-12">
                <form class="" enctype="multipart/form-data"
                    action="<?= site_url('P_manutencao/filtra_manutencao_geral/') ?>" method="post">

                    <div class="col-md-3">

                        <div class="form-group ">
                            <label>De:</label>
                            <input required type="date" value="" name="data_inicial" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group  ">
                            <label>Até:</label>
                            <input required type="date" value="" name="data_final" class="form-control">
                        </div>

                    </div>

                    <button type="submit" style="margin-top: 27px"
                        class="btn btn-primary ml-3 col-sm-3 col-md-3 col-xs-3 ">Filtrar</button>

            </div>

            </form>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="margin-top: 15px" class="card">
                        <div class="header">
                            <h2>
                                Manutenção
                            </h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr align="center">
                                            <th>#</th>
                                            <th>Data</th>
                                            <th>Placa</th>
                                            <th>Oficina</th>
                                            <th>Reclamação</th>
                                            <th>Ordem</th>
                                            <th>Valor</th>
                                            <th>Ver Mais</th>
                                            <th>Deletar</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $contador = 1;
                                        foreach ($manutencoes as $m) {
                                            $serv_array = json_decode($m['servico'], true);
                                            $val_array = json_decode($m['valor'], true);

                                            if ($m['desconto'] == '') {
                                                $total = array_sum($val_array);
                                            } else {
                                                $total = array_sum($val_array) - $m['desconto'];
                                            }
                                            ?>
                                            <tr align="center">
                                                <td><?= $contador ?></td>
                                                <td><?= date("d/m/Y", strtotime($m['data'])); ?></td>
                                                <td><?= $m['placa'] ?></td>
                                                <td><?= $m['oficina'] ?></td>
                                                <td><?= $m['reclamacao'] ?></td>
                                                <td><a
                                                        href="<?= site_url('P_ordem_servico/rever_ordem/' . $m['codigo']) ?>"><?= $m['codigo'] ?></a>
                                                </td>
                                                <td>R$<?= number_format($total, 2, ',', '.'); ?></td>

                                                <td align="center"><a
                                                        href="<?= site_url('P_manutencao/ver_manutencao/') . $m['id'] ?>"><i
                                                            class="material-icons"><i
                                                                class="material-icons">download</i></i></a>
                                                </td>

                                                <td align="center"><a
                                                        href="<?= site_url('P_manutencao/deleta_manutencao/') . $m['id'] ?>"><i
                                                            class="material-icons">
                                                            <ete class="material-icons">delete
                                                        </i></i></a>
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
            </div>
            <!-- #END# Exportable Table -->

            <div class="modal fade" id="deletar_conta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deseja excluir essa conta?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Tem certeza que deseja excluir essa conta?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <a class="deleta" href="#"><button type="button" class="btn btn-danger">
                                    Deletar</button></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</section>