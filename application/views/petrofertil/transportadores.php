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
                <h2>TRANSPORTADORES</h2>
            </div>

          
                <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                    <a href="<?= base_url('P_transportadores/formulario_transportadores') ?>"><span type="button" class="btn bg-green waves-effect">NOVO</span></a>
                </div>
         

        </div>

        <!-- We will put our React component inside this div. -->


        <div id="like_button_container"></div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Tabela de transportadores
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome Transportadora</th>
                                        <th>Responsavel</th>
                                        <th>Telefone</th>
                                        <th>Ver Mais</th>
                                        <th>Financeiro</th>
                                        <th>Veiculos</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                        <th>#</th>
                                        <th>Nome Transportadora</th>
                                        <th>Responsavel</th>
                                        <th>Telefone</th>
                                        <th>Veiculos</th>
                                        <th>Ver Mais</th>
                                        <th>Financeiro</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </tfoot>
                                <tbody>


                                    <?php $contador = 1;
                                    foreach ($transportadores as $m) {  ?>

                                        <tr>
                                            <td><?= $contador; ?></td>
                                            <td><?= $m['nome'] ?></td>
                                            <td><?= $m['nome_responsavel'] ?></td>
                                            <td><?= $m['telefone'] ?></td>
                                            <td align="center"><a href="#"><i class="material-icons"><i class="material-icons">remove_red_eye</i></i></a></td>
                                            <?php
                                            $nome_encoded = urlencode($m['nome']);
                                            $nome_url = str_replace(['%20', '+'], '-', $nome_encoded);
                                            ?>
                                            <td align="center"><a href="<?= base_url('P_transportadores/geral_transporadores/') . $nome_url ?>"><i class="material-icons"><i class="material-icons">attach_money</i></i></a></td>
                                            <td align="center"><a href="<?= site_url('P_veiculos/ver_veiculos_transportador/') . $m['id'] ?>"><i class="material-icons"><i class="material-icons">directions_bus</i></i></a></td>
                                            <td align="center"><a href="<?= site_url('P_transportadores/formulario_transportadores/') . $m['id'] ?>"><i class="material-icons"><i class="material-icons">edit</i></i></a></td>
                                            <td align="center"><a data-toggle="modal" data-target="#modalDeleteTransportador" data-pegaid="<?= $m['id'] ?>"><i class="material-icons">delete</i></a></td>
                                         
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


        <div class="modal fade" id="modalDeleteTransportador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deletar Transportador?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir essa transportador permanentemente?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <a class="deleta" href=""><button type="button" class="btn btn-danger"> Deletar</button></a>
                    </div>
                </div>
            </div>
        </div>
       
    </div>

</section>