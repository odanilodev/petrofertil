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
                <div id="like_button_container"></div>
                <h2>TICKETS PETROFERTIL</h2>
            </div>

            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a href="<?= base_url('P_pesagem/formulario_ticket') ?>"><span type="button"
                        class="btn bg-green waves-effect">Gerar novo
                        ticket</span></a>
            </div>

        </div>

        <div class="row clearfix">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-blue-grey hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">developer_board</i>
                    </div>
                    <div class="content">
                        <div class="text">Tickets Gerados</div>
                        <div class="number"><?= $total_tickets ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-teal hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">play_for_work</i>
                    </div>
                    <div class="content">
                        <div class="text">Total Peso Liquido</div>
                        <div class="number"><?= $liquido_total ?></div>
                    </div>
                </div>
            </div>

            <div class=" col-lg-12 col-md-12 col-sm-7 col-xs-12">
                <form class="" enctype="multipart/form-data" action="<?= site_url('P_pesagem/') ?>" method="post">

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

                    <div class="col-md-3">
                        <button type="submit" style="margin-top: 27px"
                            class="btn btn-primary ml-2 col-sm-12 col-md-12 col-xs-6 ">Filtrar</button>
                    </div>

                    <div class="col-md-3">
                        <a href="<?= base_url('P_pesagem/index') ?>"><span style="margin-top: 27px"
                                class="btn btn-success col-md-12 col-sm-12 col-xs-6">Geral</span></a>
                    </div>

                </form>

            </div>

        </div>

        <div id="like_button_container"></div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Gerador de Tickets
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ticket</th>
                                        <th>Entrada</th>
                                        <th>Saída</th>
                                        <th>Vendedor</th>
                                        <th>Motorista</th>
                                        <th>Caminhao</th>
                                        <th>Cliente</th>
                                        <th>Peso Liquido</th>
                                        <th>Status</th>
                                        <th>Saida</th>

                                        <th>Download</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Ticket</th>
                                        <th>Entrada</th>
                                        <th>Saída</th>
                                        <th>Vendedor</th>
                                        <th>Motorista</th>
                                        <th>Caminhao</th>
                                        <th>Cliente</th>
                                        <th>Peso Liquido</th>
                                        <th>Status</th>
                                        <th>Saida</th>

                                        <th>Download</th>
                                        <th>Excluir</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php $contador = 1;
                                    foreach ($tickets as $t) { ?>

                                        <tr>
                                            <td><?= $contador ?></td>
                                            <td><?= $t['ticket'] ?></td>
                                            <td><?= date('d/m/Y H:i', strtotime($t['data_entrada'])) ?></td>
                                            <td>
                                                <?php
                                                if (!empty($t['data_saida'])) {
                                                    echo date('d/m/Y H:i', strtotime($t['data_saida']));
                                                }
                                                ?>
                                            </td>

                                            <td><?= $t['vendedor'] ?></td>
                                            <td><?= $t['motorista'] ?></td>
                                            <td><?= $t['placa'] ?></td>
                                            <td><?= $t['cliente'] ?></td>
                                            <td><?= $t['peso_liquido'] ?></td>
                                            <td>
                                                <?php
                                                switch ($t['status']) {
                                                    case 1:
                                                        echo "No pátio";
                                                        break;
                                                    case 2:
                                                        echo "Finalizado";
                                                        break;
                                                    default:
                                                        echo $t['status']; // Para outros casos, exiba o valor original de status
                                                        break;
                                                }
                                                ?>
                                            </td>

                                            <td align="center">
                                                <?php if ($t['status'] != 2): // Verifica se o status não é "Finalizado" ?>
                                                    <a href="<?= site_url('P_pesagem/lancar_saida/') . $t['id'] ?>">
                                                        <i class="material-icons">exit_to_app</i>
                                                    </a>
                                                <?php endif; ?>
                                            </td>


                                            <td align="center"><a target="_blank"
                                                    href="<?= site_url('P_pesagem/download_ticket/') . $t['id'] ?>"><i
                                                        class="material-icons"><i
                                                            class="material-icons">assignment_returned</i></i></a>
                                            </td>

                                            <td align="center"><a
                                                    href="<?= site_url('P_pesagem/deleta_ticket/') . $t['id'] ?>"><i
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
        </div>

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
                        Tem certeza que deseja excluir esse cliente permanentemente?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <a class="deleta" href="#"><button type="button" class="btn btn-danger"> Deletar</button></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>