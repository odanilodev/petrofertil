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
                <h2>PRESTADORES DE SERVIÇO</h2>
            </div>

            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a href="<?= base_url('P_prestadores_servico/formulario_prestadores') ?>"><span type="button"
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
                            Tabela de prestadores de serviço
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Telefone</th>
                                        <th>Cidade</th>
                                        <th>Estado</th>
                                        <th>Endereço</th>
                                        <th>Documento</th>
                                        <th>Banco</th>
                                        <th>Agência</th>
                                        <th>Conta</th>
                                        <th>Pix</th>


                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php foreach ($prestadores as $m) { ?>

                                        <tr>
                                            <td><?= $m['nome'] ?></td>
                                            <td><?= $m['telefone'] ?></td>
                                            <td><?= $m['cidade'] ?></td>
                                            <td><?= $m['estado'] ?></td>
                                            <td><?= $m['endereco'] ?></td>
                                            <td><?= $m['documento'] ?></td>
                                            <td><?= $m['banco'] ?></td>
                                            <td><?= $m['agencia'] ?></td>
                                            <td><?= $m['conta'] ?></td>
                                            <td><?= $m['pix'] ?></td>


                                            <td align="center"><a
                                                    href="<?= site_url('P_prestadores_servico/formulario_prestadores/') . $m['id'] ?>"><i
                                                        class="material-icons"><i class="material-icons">edit</i></i></a>
                                            </td>
                                            <td align="center"><a
                                                    href="<?= site_url('P_prestadores_servico/deleta_prestador/') . $m['id'] ?>"><i
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