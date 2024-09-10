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
                <h2>VEÍCULOS DE <?= strtoupper($transportador['nome']) ?></h2>
            </div>

                <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                    <a href="<?= base_url('P_veiculos/formulario_veiculos') ?>"><span type="button" class="btn bg-green waves-effect">NOVO</span></a>
                </div>
        </div>

        <div id="like_button_container"></div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Tabela de veiculos
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                <thead>
                                    <tr>
                                    <th>#</th>
                                        <th>Modelo</th>
                                        <th>Marca</th>
                                        <th>Placa</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                        <th>#</th>
                                        <th>Modelo</th>
                                        <th>Marca</th>
                                        <th>Placa</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </tfoot>
                                <tbody>


                                    <?php $contador = 1;
                                    foreach ($veiculos as $v) {  ?>
                                        <tr>
                                            <td><?= $contador; ?></td>
                                            <td><?= $v['modelo'] ?></td>
                                            <td><?= $v['marca'] ?></td>
                                            <td><?= $v['placa'] ?></td>
                                            <td align="center"><a href="<?= site_url('P_veiculos/formulario_veiculos/') . $v['id'] ?>"><i class="material-icons"><i class="material-icons">edit</i></i></a></td>
                                            <td align="center"><a data-toggle="modal" data-target="#modalDeleteVeiculo" data-pegaid="<?= $v['id'] ?>"><i class="material-icons">delete</i></a></td>
                                         
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


        <div class="modal fade" id="modalDeleteVeiculo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deletar Veiculo?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir essa veiculo permanentemente?
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