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
        <div class="block-header">

            <div class="col-md-3">
                <h2>Solicitações de Serviço Interno</h2>
            </div>

            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a href="<?=  $_SERVER['HTTP_REFERER']; ?>"><span type="button" class="btn bg-orange waves-effect">VOLTAR</span></a>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Solicitação de Serviço Interno (TRELLO)
                        </h2>

                    </div>


                    <div class="body">

                        <form method="post" action="<?= site_url('F_solicitacoes_servico/enviar_trello') ?>">

                            <div class="row clearfix">

                                <div class="col-sm-6">

                                    <label>Descrição Breve (Título Card)</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="" name="name" class="form-control" placeholder="FIcará no titulo do card">
                                        </div>
                                    </div>

                                </div>



                                <div class="col-sm-6">
                                    <p>
                                        <b>Tipo/Setor </b>
                                    </p>
                                    <select name="tipo" class="form-control show-tick">
                                        <option>Selecione</option>

                                        <option value="0">Serviços de Manutenção e Compra</option>

                                        <option value="1">Serviços do Pátio</option>

                                    </select>

                                </div>


                                <div class="col-sm-12">

                                    <label>Descricao Detalhada (Corpo do card)</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" name="desc" class="form-control no-resize" placeholder="Descrição do serviço"></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div style="margin-top: 20px;" class="col-sm-3 col-md-offset-1">
                                    <div class="form-group">

                                        <input type="submit" class="btn bg-red btn-block waves-effect  col-md-3"></input>

                                    </div>
                                </div>



                            </div>



                        </form>

                    </div>

                </div>
            </div>
        </div>


        <!-- Colored Card - With Loading -->
</section>