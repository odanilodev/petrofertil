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
            <h2>PAINEL INICIAL</h2>
        </div>

        <?php if ($alerta == 'saida') { ?>

            <div class="alert bg-teal alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><b>Saída</b> cadastrada com sucesso!
            </div>

        <?php } ?>

        <?php if ($alerta == 'volta') { ?>

            <div class="alert bg-teal alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><b>Volta</b> cadastrada com sucesso!
            </div>

        <?php } ?>

        <div class="row">

            <a style="text-decoration: none;" href="<?= base_url('Eco/formulario_saida_motorista') ?>">
                <div class="demo-color-box bg-blue ">
                    <i class="material-icons">assignment_return</i>
                    <div class="color-name">SAÍDA</div>
                </div>
            </a>

            <a style="text-decoration: none;" href="<?= base_url('Eco/formulario_volta_motorista') ?>">
                <div class="demo-color-box bg-teal ">
                    <i class="material-icons">attach_money</i>
                    <div class="color-name">PAGAMENTO</div>
                </div>
            </a>

           <a style="text-decoration: none;" href="<?= base_url('Eco/historico_motorista/').$id_usuario ?>">
                <div class="demo-color-box bg-green ">
                    <i class="material-icons">assignment_returned</i>
                    <div class="color-name">VOLTA</div>
                </div>
            </a> 


        </div>


    </div>


</section>