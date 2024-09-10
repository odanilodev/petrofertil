<?php

$status = $this->session->userdata('usuario');

if ($status != "logado") {

    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');

$nome_usuario = $this->session->userdata('nome_usuario');

$id_usuario = $this->session->userdata('id_usuario');

$foto_perfil = $this->session->userdata('foto_perfil');

$funcao = $this->session->userdata('funcao');

?>



<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>ESTAS SÃO SUAS ULTIMAS 5 SAÍDAS!</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Ultimas Saídas
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Veículo</th>
                                        <th>Tambor</th>
                                        <th>Óleo</th>
                                        <th>Detergente</th>
                                        <th>Veiculo</th>
                                        <th>Quilometragem</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Data</th>
                                        <th>Veículo</th>
                                        <th>Tambor</th>
                                        <th>Óleo</th>
                                        <th>Detergente</th>
                                        <th>Veiculo</th>
                                        <th>Quilometragem</th>

                                    </tr>
                                </tfoot>
                                <tbody>


                                    <?php foreach ($saidas as $a) { ?>

                                        <tr>
                                            <td><?= date("d/m", strtotime($a['data_saida']));  ?></td>
                                            <td><?= $a['veiculo'] ?></td>
                                            <td><?= $a['tambor'] ?></td>
                                            <td><?= $a['oleo'] ?></td>
                                            <td><?= $a['detergente'] ?></td>
                                            <td><?= $a['veiculo'] ?></td>
                                            <td><?= $a['quilometragem'] ?></td>

                                        </tr>



                                    <?php $contador++;
                                    }     ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</section>