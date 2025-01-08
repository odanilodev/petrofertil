<?php

$status = $this->session->userdata('usuario');

if ($status != "logado") {
    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');

$nome_usuario = $this->session->userdata('nome_usuario');

?>

<style>
    .table-bordered td {
        border: 1px solid #000 !important;
        /* Linhas internas em preto */
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: #fff;
        min-width: 120px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown-item {
        padding: 6px 14px;
        text-decoration: none;
        display: block;
        color: #000;
    }

    .dropdown-item:hover {
        background-color: #f1f1f1;
    }

    .text-danger {
        color: red;
    }
</style>

<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="block-header col-md-3">
                <div id="like_button_container"></div>
                <h2>CONTROLE DE PRODUÇÃO</h2>
            </div>

            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a href="<?= base_url('P_controle_recebimento/formulario_recebimento') ?>"><span type="button"
                        class="btn bg-green waves-effect">NOVO</span></a>

                <a href="<?= base_url('P_controle_recebimento/formulario_relatorio') ?>"><span type="button"
                        class="btn bg-primary waves-effect">Gerar Relatório</span></a>

            </div>

        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3  col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">eco</i> <!-- Ícone relacionado a "orgânico" -->
                    </div>
                    <div class="content">
                        <div class="text">Orgânico</div>
                        <div class="number"><?= $total_organico ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-red hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">science</i> <!-- Ícone relacionado a "mineral" -->
                    </div>
                    <div class="content">
                        <div class="text">Mineral</div>
                        <div class="number"><?= $total_mineral ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">grass</i> <!-- Ícone relacionado a "palha" -->
                    </div>
                    <div class="content">
                        <div class="text">Palha</div>
                        <div class="number"><?= $total_palha ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-purple hover-expand-effect"> <!-- Alterei a cor de gray para purple -->
                    <div class="icon">
                        <i class="material-icons">category</i> <!-- Ícone relacionado a "outros" -->
                    </div>
                    <div class="content">
                        <div class="text">Outros</div>
                        <div class="number"><?= $total_outro ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-gray hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">calendar_today</i> <!-- Ícone relacionado a "dias" -->
                    </div>
                    <div class="content">
                        <div class="text">N° de Dias</div>
                        <div class="number"><?= $numero_de_dias ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-gray hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">calendar_view_day</i> <!-- Ícone relacionado a "total diário" -->
                    </div>
                    <div class="content">
                        <div class="text">Total Diário</div>
                        <div class="number"><?= $total_diario ?></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="container-fluid">
                <form class="col-md-12" enctype="multipart/form-data"
                    action="<?= site_url('P_controle_recebimento/inicio/') ?>" method="post">

                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                            <label>De</label>
                            <input type="date" value="<?= isset($data_inicial) ? $data_inicial : '' ?>"
                                name="data_inicial" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                            <label>Até</label>
                            <input type="date" value="<?= isset($data_final) ? $data_final : '' ?>" name="data_final"
                                class="form-control">
                        </div>
                    </div>

                    <button type="submit" style="margin-top: 27px"
                        class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6">Filtrar</button>

                    <a href="<?= site_url('P_controle_recebimento/inicio/') ?>">
                        <span style="margin-top: 27px" class="btn btn-success col-md-3 col-sm-6 col-xs-6">Mês
                            Atual</span>
                    </a>
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
                            Tabela de Controle de Recebimento
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                <thead>
                                    <tr>
                                        <th>Data de Recebimento</th>
                                        <th>Periodo</th>
                                        <th>Empresa</th>
                                        <th>N° NF</th>
                                        <th>Quantidade</th>
                                        <th>Placa</th>
                                        <th>Orgânico</th>
                                        <th>Mineral</th>
                                        <th>Molhado</th>
                                        <th>Latinha</th>
                                        <th>Palha</th>
                                        <th>Outro</th>
                                        <th>Área de Descarregamento</th>
                                        <th>Observação</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>Data de Recebimento</th>
                                        <th>Periodo</th>
                                        <th>Empresa</th>
                                        <th>N° NF</th>
                                        <th>Quantidade</th>
                                        <th>Placa</th>
                                        <th>Orgânico</th>
                                        <th>Mineral</th>
                                        <th>Molhado</th>
                                        <th>Latinha</th>
                                        <th>Palha</th>
                                        <th>Outro</th>
                                        <th>Área de Descarregamento</th>
                                        <th>Observação</th>
                                        <th>Ações</th>
                                    </tr>
                                </tfoot>

                                <tbody>
                                    <?php foreach ($recebimentos as $r): ?>
                                        <?php $dataFormatada = date("d/m/Y", strtotime($r['data_recebimento'])); ?>
                                        <tr>
                                            <td style='background-color: #eaf2fd'><?= $dataFormatada ?></td>
                                            <td style='background-color: #eaf2fd'><?= $r['periodo'] ?></td>
                                            <td style='background-color: #C6E0B4 '><?= $r['nome_empresa'] ?></td>
                                            <td style='background-color: #eaf2fd'><?= $r['numero_nota'] ?></td>
                                            <td style='background-color:rgb(223, 255, 234)'><?= $r['quantidade_total'] ?>
                                            </td>
                                            <td style='background-color: #fcecec'><?= $r['placa'] ?></td>
                                            <td style='background-color: #fcecec'><?= $r['organico'] ?></td>
                                            <td style='background-color: #fcecec'><?= $r['mineral'] ?></td>
                                            <td style='background-color: #fcecec'><?= $r['molhado'] ?></td>
                                            <td style='background-color: #fcecec'><?= $r['latinha'] ?></td>
                                            <td style='background-color: #fcecec'><?= $r['palha'] ?></td>
                                            <td style='background-color: #fcecec'><?= $r['outro'] ?></td>
                                            <td style='background-color: #fcecec'><?= $r['area_descarregamento'] ?></td>
                                            <td style='background-color: #fcecec'><?= $r['obs'] ?></td>
                                            <td align="center">
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        Ações
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                                href="<?= base_url('P_controle_recebimento/formulario_recebimento/' . $r['id']) ?>">Editar</a>
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="<?= base_url('P_controle_recebimento/deleta_recebimento/' . $r['id']) ?>">Deletar</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modalDeleteMotorista" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deletar Aferição?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir essa motorista permanentemente?
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