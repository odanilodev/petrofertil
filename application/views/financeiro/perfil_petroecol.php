<?php

$status = $this->session->userdata('usuario');

if ($status != "logado") {
    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');

$nome_usuario = $this->session->userdata('nome_usuario');

$data_atual = date('Y-m-d');

?>

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
            <div class="block-header col-md-4">
                <div id="like_button_container"></div>
                <h2>PERFIL/SOLICITAÇÕES DE SERVIÇO INTERNO</h2>
            </div>

            <?php if ($usuario == 'fernanda@petroecol.com.br' or $usuario == 'comercial@petroecol.com.br') { ?>
                <div class="col-md-8" style="margin-bottom: 12px; margin-top: -8px" align="right">
                    <a href="<?= $_SERVER['HTTP_REFERER'] ?>"><span type="button" class="btn bg-cyan waves-effect">VOLTAR</span></a>
                    <a href="<?= base_url('F_solicitacoes_servico/formulario_solicitacao_servico/' . $funcionario['id']) ?>"><span type="button" class="btn bg-green waves-effect">SOLICITAR SERVIÇO</span></a>
                    <a href="<?= base_url('F_funcionarios/edita_funcionario/' . $funcionario['id']) ?>"><span type="button" class="btn bg-amber waves-effect">EDITAR</span></a>
                    <a data-toggle="modal" data-target="#exampleModalDeletaFuncionario" data-pegaid="<?= $funcionario['id'] ?>"><span type="button" class="btn bg-orange waves-effect">EXCLUIR</span></a>
                </div>
            <?php  } ?>

        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-3">
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">
                            <img class="img-responsive" src="<?= base_url('uploads/funcionarios/foto_perfil/') . $funcionario['foto_perfil'] ?>" alt="AdminBSB - Profile Image">
                        </div>
                        <div class="content-area">
                            <h3><?= $funcionario['nome'] ?></h3>
                            <p><?= $funcionario['funcao'] ?></p>
                            <p><?= strtoupper($funcionario['grupo']) ?></p>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <ul>
                            <li>
                                <span>Na empresa desde:</span>
                                <span><?= date('d/m/Y', strtotime($funcionario['opcao'])) ?></span>
                            </li>
                            <li>
                                <span>Data de nascimento</span>
                                <span><?= date('d/m/Y', strtotime($funcionario['data_nascimento'])) ?></span>
                            </li>
                            <li>
                                <span>CPF</span>
                                <span>348.887.508-31</span>
                            </li>
                        </ul>
                        <!-- <button class="btn btn-primary btn-lg waves-effect btn-block">FOLLOW</button> -->
                    </div>
                </div>

                <div class="card card-about-me">
                    <div class="header">
                        <h2>DESCRIÇÃO DA ATIVIDADE</h2>
                    </div>
                    <div class="body">
                        <ul>
                            <li>
                                <div class="title">
                                    <i class="material-icons">library_books</i>
                                    Função
                                </div>
                                <div class="content">
                                    <?= $funcionario['funcao']; ?>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <i class="material-icons">location_on</i>
                                    Endereço
                                </div>
                                <div class="content">
                                    <?= $funcionario['residencia']; ?>
                                </div>
                            </li>
                          <!--  <li>
                                <div class="title">
                                    <i class="material-icons">edit</i>
                                    Documentos
                                </div>
                                <div class="content">
                                    <span class="label bg-red">CNH</span>
                                    <span class="label bg-teal">Carteira de trabalho</span>
                                    <span class="label bg-blue">PHP</span>
                                    <span class="label bg-amber">Node.js</span>
                                    <span class="label bg-red">CNH</span>
                                    <span class="label bg-teal">Carteira de trabalho</span>
                                    <span class="label bg-blue">PHP</span>
                                    <span class="label bg-amber">Node.js</span>
                                </div>
                            </li> -->
                            <li>
                                <div class="title">
                                    <i class="material-icons">notes</i>
                                    Salario Base
                                </div>
                                <div class="content">
                                    <b> R$<?= $funcionario['salario']; ?> </b>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="card card-about-me">
                    <div class="header">
                        <div class="row">
                            <div style="font-size: 19px;" class="col-md-9"> ADVERTÊNCIAS </div>
                            <div class="col-md-3">
                                <button type="button" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float">
                                    <a href="<?= base_url('F_funcionarios/formulario_advertencia/').$id_funcionario ?>"><i class="material-icons">add_circle</i></a>
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="body">
                        <ul>
                            <li>
                                <div class="title">
                                    <i class="material-icons">hearing</i>
                                    Verbais
                                </div>
                                <div class="content">

                                    <?php foreach ($advertencias as $a) { ?>

                                      <a href="<?= base_url('F_funcionarios/ver_advertencia/').$a['id']  ?>">  <?= $a['tipo'] == 'VERBAL' ? $a['titulo'] : ''  ?></br> </a>

                                    <?php } ?>

                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <i class="material-icons">library_books</i>
                                    Escritas
                                </div>
                                <div class="content">

                                    <?php foreach ($advertencias as $b) { ?>

                                       <a href="<?= base_url('F_funcionarios/ver_advertencia/').$b['id']  ?>"> <?= $b['tipo'] == 'ESCRITA' ? $b['titulo'] : ''  ?></br> </a>

                                    <?php } ?>


                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>


            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">Serviços Solicitados</a></li>
                                <li role="presentation" class=""><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">Serviços Finalizados</a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="home">

                                    <?php foreach ($servicos as $s) {
                                        if ($s['status'] == 1) { ?>

                                            <div class="card">
                                                <div class="header <?= $s['data_conclusao'] >= $data_atual ? 'bg-blue-grey"' : 'bg-red' ?>">
                                                    <h2>
                                                        <?= $s['titulo'] ?> <small> <?= date("d/m/Y", strtotime($s['data_conclusao'])); ?></small>
                                                    </h2>
                                                    <ul class="header-dropdown m-r--5">

                                                        <li class="dropdown">
                                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                                <i class="material-icons">more_vert</i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li><a href="<?= base_url('F_solicitacoes_servico/finaliza_servico/' . $s['id'] . '/' . $id_funcionario) ?>" class=" waves-effect waves-block">Finalizar</a></li>
                                                                <li><a href="" class=" waves-effect waves-block">Editar</a></li>
                                                                <li><a href="" class=" waves-effect waves-block">Excluir</a></li>
                                                            </ul>
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="body">
                                                    <?= $s['descricao'] ?>
                                                </div>
                                            </div>

                                    <?php }
                                    } ?>

                                </div>


                                <div role="tabpanel" class="tab-pane fade" id="profile_settings">

                                    <?php foreach ($servicos as $c) {
                                        if ($c['status'] == 2) { ?>

                                            <div class="card">
                                                <div class="header bg-green">
                                                    <h2>
                                                        <?= $c['titulo'] ?> <small> <?= date("d/m/Y", strtotime($c['data_conclusao'])); ?></small>
                                                    </h2>
                                                    <ul class="header-dropdown m-r--5">

                                                        <li class="dropdown">
                                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                                <i class="material-icons">more_vert</i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li><a href="<?= base_url('F_solicitacoes_servico/volta_servico/' . $c['id'] . '/' . $id_funcionario) ?>" class=" waves-effect waves-block">Mudar status</a></li>
                                                                <li><a href="" class=" waves-effect waves-block">Editar</a></li>
                                                                <li><a href="" class=" waves-effect waves-block">Excluir</a></li>
                                                            </ul>
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="body">
                                                    <?= $s['descricao'] ?>
                                                </div>
                                            </div>

                                    <?php }
                                    } ?>


                                </div>



                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-9">

                <div class="card">
                    <div class="header">
                        <h2>
                            Documentos
                        </h2>

                    </div>
                    <div class="body">
                        <ul class="list-group">

                            <li class="list-group-item clearfix">
                                CPF
                                <a href="<?= base_url('F_funcionarios/download_cpf/') . $funcionario['doc_cpf'] ?>"><button type="button" class="btn btn-default btn-circle waves-effect waves-purple waves-circle waves-float pull-right">
                                        <i class="material-icons">download</i>
                                    </button></a>
                            </li>
                            <li class="list-group-item clearfix">
                                ASO
                                <a href="<?= base_url('F_funcionarios/download_aso/') . $funcionario['aso'] ?>"> <button type="button" class="btn btn-default btn-circle waves-effect waves-red waves-circle waves-float pull-right">
                                        <i class="material-icons">download</i>
                                    </button></a>
                            </li>
                            <li class="list-group-item clearfix">
                                Ficha EPI
                                <a href="<?= base_url('F_funcionarios/download_ficha_epi/') . $funcionario['epi'] ?>"><button type="button" class="btn btn-default btn-circle waves-effect waves-pink waves-circle waves-float pull-right">
                                        <i class="material-icons">download</i>
                                    </button></a>
                            </li>
                            <li class="list-group-item clearfix">
                                Ficha Registro
                                <a href="<?= base_url('F_funcionarios/download_ficha_registro') . $funcionario['ficha_registro'] ?>"> <button type="button" class="btn btn-default btn-circle waves-effect waves-purple waves-circle waves-float pull-right">
                                        <i class="material-icons">download</i>
                                    </button></a>
                            </li>
                            <li class="list-group-item clearfix">
                                Carteira de Trabalho
                                <a href="<?= base_url('F_funcionarios/download_carteira_trabalho/') . $funcionario['carteira_trabalho'] ?>"> <button type="button" class="btn btn-default btn-circle waves-effect waves-deep-purple waves-circle waves-float pull-right">
                                        <i class="material-icons">download</i>
                                    </button></a>
                            </li>
                            <li class="list-group-item clearfix">
                                Carteira de vacinação
                                <a href="<?= base_url('F_funcionarios/download_carteira_vacinacao/') . $funcionario['carteira_vacinacao'] ?>"><button type="button" class="btn btn-default btn-circle waves-effect waves-indigo waves-circle waves-float pull-right">
                                        <i class="material-icons">download</i>
                                    </button></a>
                            </li>
                            <li class="list-group-item clearfix">
                                Certificados
                                <a href="<?= base_url('F_funcionarios/download_certificados/') . $funcionario['certificados'] ?>"><button type="button" class="btn btn-default btn-circle waves-effect waves-red waves-circle waves-float pull-right">
                                        <i class="material-icons">download</i>
                                    </button></a>
                            </li>
                            <li class="list-group-item clearfix">
                                CNH
                                <a href="<?= base_url('F_funcionarios/download_cnh/') . $funcionario['doc_cnh'] ?>"><button type="button" class="btn btn-default btn-circle waves-effect waves-pink waves-circle waves-float pull-right">
                                        <i class="material-icons">download</i>
                                    </button></a>
                            </li>
                            <li class="list-group-item clearfix">
                                Ordem de Serviço
                                <a href="<?= base_url('F_funcionarios/download_ordem_servico/') . $funcionario['ordem_servico'] ?>"> <button type="button" class="btn btn-default btn-circle waves-effect waves-purple waves-circle waves-float pull-right">
                                        <i class="material-icons">download</i>
                                    </button></a>
                            </li>


                        </ul>
                    </div>
                </div>


            </div>
        </div>





        <div class="modal fade" id="exampleModalDeletaFuncionario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deletar Funcionario?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <b>Tem certeza que deseja excluir esse funcionário permanentemente?</b></br>Os documentos e arquivos anexados em seu cadastro serão mantidos no servidor(Caso precise solicite ao administrador do sistema).
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <a class="deleta" href="#"><button type="button" class="btn btn-danger"> Deletar</button></a>
                    </div>
                </div>
            </div>
        </div>


</section>