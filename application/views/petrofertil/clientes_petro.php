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
                <h2>CLIENTES</h2>
            </div>


            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a href="<?= base_url('P_clientes/cadastra_cliente') ?>"><span type="button"
                        class="btn bg-green waves-effect">NOVO</span></a>
            </div>


        </div>

        <!-- We will put our React component inside this div. -->

        <div class="row">
            <div class="container-fluid">
                <form class="col-md-12" enctype="multipart/form-data"
                    action="<?= site_url('P_destinacao/filtra_destinacao_clientes/') ?>" method="post">

                    <div class="col-md-3">

                        <div class="form-group ">
                            <label>De</label>
                            <input type="date" value="" name="data_inicial" class="form-control data_inicial">
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group  ">
                            <label>Até</label>
                            <input type="date" value="" name="data_final" class="form-control data_final">
                        </div>

                    </div>

                    <input type="hidden" name="ids_cliente" class="ids_clientes">

                    <button type="submit" style="margin-top: 27px"
                        class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 btn-filtrar">Filtrar</button>

                    <a href="#"><span style="margin-top: 27px"
                            class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>

            </div>

            </form>

        </div>


        <div id="like_button_container"></div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>
                            Tabela de clientes
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">

                            <table id="tabela-clientes"
                                class="table table-bordered table-striped table-hover dataTable">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>
                                            <input type="checkbox" class="check-all-clientes"
                                                onclick="selecionarTodosClientes()" style="cursor:pointer">
                                        </th>
                                        <th>Nome</th>
                                        <th>CNPJ</th>
                                        <th>Cidade</th>
                                        <th>Contato</th>
                                        <th>Destinações</th>
                                        <th>Ver Mais</th>
                                        <th>Excluir</th>


                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>

                                        </th>
                                        <th>Nome</th>
                                        <th>CNPJ</th>
                                        <th>Cidade</th>
                                        <th>Contato</th>
                                        <th>Destinações</th>
                                        <th>Ver Mais</th>
                                        <th>Excluir</th>

                                    </tr>
                                </tfoot>
                                <tbody>


                                    <?php $contador = 1;
                                    foreach ($clientes as $a) { ?>

                                        <tr>
                                            <td><?= $contador; ?></td>
                                            <td>
                                                <input type="checkbox" class="check-clientes" value="<?= $a['id']; ?>"
                                                    style="cursor:pointer">
                                            </td>
                                            <td><?= $a['nome'] ?></td>
                                            <td><?= $a['cnpj'] ?></td>
                                            <td><?= $a['cidade'] ?></td>
                                            <td><?= $a['contato'] ?></td>

                                            <td align="center"><a
                                                    href="<?= site_url('P_destinacao/inicio/') . $a['id'] ?>"><i
                                                        class="material-icons"><i
                                                            class="material-icons">swap_horiz</i></i></a></td>
                                            <td align="center"><a
                                                    href="<?= site_url('P_clientes/ver_cliente/') . $a['id'] ?>"><i
                                                        class="material-icons"><i
                                                            class="material-icons">remove_red_eye</i></i></a></td>
                                            <td align="center"><a data-toggle="modal" data-target="#exampleModal2"
                                                    data-pegaid="<?= $a['id'] ?>"><i class="material-icons">delete</i></a>
                                            </td>


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


        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deletar Aferição?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir essa aferição permanentemente?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <a class="deleta" href="#"><button type="button" class="btn btn-danger"> Deletar</button></a>
                        <a class="deleta_estoque" href="#"><button type="button" class="btn btn-success"> Deletar e
                                atualizar estoque</button></a>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>

<script>

    $(document).ready(function () {
        // Primeiro, o DataTables pode estar sendo inicializado com configurações globais.
        // Esperamos um breve momento para garantir que o DataTables tenha sido aplicado.

        setTimeout(function () {
            // Destrói a instância existente do DataTables na tabela de clientes, se houver
            if ($.fn.DataTable.isDataTable('#tabela-clientes')) {
                $('#tabela-clientes').DataTable().destroy();
            }

            // Re-inicializa o DataTables apenas na tabela de clientes com a configuração desejada
            $('#tabela-clientes').DataTable({
                "pageLength": 50,  // Define o número padrão de clientes por página como 50
                "ordering": true,
                "searching": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json"
                }
            });
        }, 100);  // 100ms de espera para garantir que a inicialização global tenha ocorrido
    });

</script>