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
                <h2>RESÍDUOS</h2>
            </div>

            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a href="<?= base_url('P_residuos/formulario_residuos') ?>"><span type="button"
                        class="btn bg-green waves-effect">NOVO</span></a>
            </div>

        </div>

        <div id="like_button_container"></div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Tabela de resíduos
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Data de Registro</th>

                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php foreach ($residuos as $residuo) { ?>

                                        <tr>
                                            <td><?= $residuo['nome'] ?></td>
                                            <td><?= date('d/m/Y', strtotime($residuo['criado_em'])) ?></td>


                                            <td align="center"><a
                                                    href="<?= site_url('P_residuos/formulario_residuos/') . $residuo['id'] ?>"><i
                                                        class="material-icons"><i class="material-icons">edit</i></i></a>
                                            </td>
                                            <td align="center"><a
                                                    href="<?= site_url('P_residuos/inativa_residuo/') . $residuo['id'] ?>"><i
                                                        class="material-icons"><i class="material-icons">delete</i></i></a>
                                            </td>

                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</section>