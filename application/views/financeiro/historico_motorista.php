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
            <h2>ESTA DEVE SER A SUA VOLTA!</h2>
        </div>


        <div class="row">

            <div class="col-sm-6">
                <div class="info-box">
                    <div class="icon bg-red">
                        <i class="material-icons">date_range</i>
                    </div>
                    <div class="content">
                        <div class="text">DATA</div>
                        <div class="number"><?= date('d/m/Y', strtotime($volta['data_volta'])); ?></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-box">
                    <div class="icon bg-cyan">
                        <i class="material-icons">invert_colors</i>
                    </div>
                    <div class="content">
                        <div class="text">VOLTA DETERGENTE</div>
                        <div class="number count-to" data-from="0" data-to="<?= $volta['volta_detergente'] ?>" data-speed="900" data-fresh-interval="20"><?= $volta['volta_detergente'] ?></div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="info-box">
                    <div class="icon bg-lime">
                        <i class="material-icons">opacity</i>
                    </div>
                    <div class="content">
                        <div class="text">VOLTA ÓLEO</div>
                        <div class="number count-to" data-from="0" data-to="<?= $volta['volta_oleo'] ?>" data-speed="900" data-fresh-interval="20"><?= $volta['volta_oleo'] ?></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-box">
                    <div class="icon bg-teal">
                        <i class="material-icons">directions_car</i>
                    </div>
                    <div class="content">
                        <div class="text">ULTIMA QUILOMETRAGEM INFORMADA EM SAÍDA</div><?php $quilometragem = $saida['quilometragem'] ?>
                        <div class="number"><?=  number_format("$quilometragem",0,"",".");?>Km</div>
                    </div>
                </div>
            </div>



        </div>


    </div>


</section>

