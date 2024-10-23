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
                <div>CHEQUES PETROFERTIL</div>
            </div>

            <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a href="<?= base_url('P_cheques/formulario_cheque') ?>"><span type="button"
                        class="btn bg-green waves-effect">NOVO</span></a>
            </div>
        </div>

        <div class="row clearfix">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-green hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Valor total compensado</div>
                        <div class="number">R$<?= number_format("$valor_total_compensado", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Valores a compensar (Saldo em cheque)</div>
                        <div class="number">R$<?= number_format("$valor_acompensar", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="info-box bg-red hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">Valores em cheques vencidos</div>
                        <div class="number">R$<?= number_format("$valor_cheque_devedor", 2, ",", "."); ?></div>
                    </div>
                </div>
            </div>

            <div class=" col-lg-8 col-md-7 col-sm-7 col-xs-12">
                <form class="" enctype="multipart/form-data" action="<?= site_url('P_cheques/filtra_cheques/') ?>"
                    method="post">

                    <div class="col-md-3">

                        <div class="form-group ">
                            <label>Status:</label>
                            <select require name="status" class="form-control show-tick">
                                <option value="Geral">Selecione</option>
                                <option value="A compensar">A compensar</option>
                                <option value="Compensado">Compensado</option>
                                <option value="Geral">Geral</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group ">
                            <label>De:</label>
                            <input required type="date" value="" name="data_inicial" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group  ">
                            <label>Até:</label>
                            <input required type="date" value="" name="data_final" class="form-control">
                        </div>

                    </div>

                    <button type="submit" style="margin-top: 27px"
                        class="btn btn-primary ml-3 col-sm-3 col-md-3 col-xs-6 ">Filtrar</button>

                </form>
            </div>
        </div>


        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2>Tabela de cheques</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Data Compensação</th>
                                        <th>Valor</th>
                                        <th>Recebido por</th>
                                        <th>Titular</th>
                                        <th>Referente</th>
                                        <th>Conta</th>
                                        <th>Numero Cheque</th>
                                        <th>Posse</th>
                                        <th>Status</th>
                                        <th>Observação</th>
                                        <th>Motivo Estorno</th>
                                        <th>Estornar</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>

                                <?php $data_atual = date('Y/m/d'); ?>
                                <tbody>
                                    <?php $contador = 1;
                                    foreach ($cheques as $c) { ?>
                                        <tr>
                                            <td><?= $contador ?></td>
                                            <td><?= date('d/m/Y', strtotime($c['data_compensasao'])) ?></td>
                                            <td>R$<?= $c['valor'] ?></td>
                                            <td><?= $c['titular'] ?></td>
                                            <td><?= $c['recebido'] ?></td>
                                            <td><?= $c['referente'] ?></td>
                                            <td><?= $c['conta'] ?></td>
                                            <td><?= $c['numero'] ?></td>
                                            <td>
                                                <?php if (!empty($c['posse_de']) && !empty($c['data_posse'])): ?>
                                                    <?= $c['posse_de'] . ' - ' . date('d/m/Y', strtotime($c['data_posse'])) ?>
                                                <?php endif; ?>
                                            </td>

                                            <td style="color:
                                            <?php
                                            if ($c['status'] == 'A compensar' && strtotime($c['data_compensasao']) < strtotime($data_atual)) {
                                                echo 'red'; // Data de compensação mais antiga
                                            } elseif ($c['status'] == 'A compensar') {
                                                echo 'blue'; // Data de compensação não é mais antiga
                                            } elseif ($c['status'] == 'Compensado') {
                                                echo 'green';
                                            } else {
                                                echo 'black';
                                            }
                                            ?>;
                                            cursor: pointer;" data-id="<?= $c['id']; ?>"
                                                data-status="<?= $c['status'] == 'A compensar' ? 'a-compensar' : ''; ?>"
                                                data-estornar="<?= $c['status'] == 'Estornar' ? 'estornar' : ''; ?>">
                                                <span style="color: inherit; text-decoration: none;">
                                                    <?= $c['status'] ?>
                                                </span>
                                            </td>

                                            <td><?= $c['observacao'] ?></td>
                                            <td><?= $c['motivoEstorno'] ?></td>

                                            <td align="center">
                                                <?php if ($c['status'] == 'A Compensar'): ?>
                                                    <button class="btn btn-danger btnEstornar" data-id="<?= $c['id']; ?>"><i
                                                            class="material-icons">undo</i></button>
                                                <?php endif; ?>
                                            </td>

                                            <td align="center"><a
                                                    href="<?= site_url('P_cheques/edita_cheque/') . $c['id'] ?>"><i
                                                        class="material-icons">edit</i></a></td>
                                            <td align="center">
                                                <a href="<?= base_url('P_cheques/deleta_cheque/') . $c['id'] ?>"
                                                    class="deleta" data-id="<?= $c['id'] ?>"><i
                                                        class="material-icons">delete</i></a>
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
    </div>
</section>

<!-- Modal Structure using Bootstrap -->
<div class="modal fade" id="compensarModal" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLongTitle">Selecione a conta bancaria em qual será compensado o cheque
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <select id="acaoCompensar" class="form-control">
                    <option selected disabled>Selecione</option>
                    <?php foreach ($bancos as $banco) { ?>
                        <option value="<?= $banco['id'] ?>"><?= $banco['descricao'] ?></option>
                    <?php } ?>

                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" id="btnCompensar" class="btn btn-primary">Compensar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="estornarModal" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLongTitle">Selecione a conta bancária em que será estornado o cheque
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <select id="acaoEstornar" class="form-control">
                    <option selected disabled>Selecione</option>
                    <?php foreach ($bancos as $banco) { ?>
                        <option value="<?= $banco['id'] ?>"><?= $banco['descricao'] ?></option>
                    <?php } ?>
                </select>
                <br>
                <label for="motivoEstorno">Motivo do estorno:</label>
                <textarea id="motivoEstorno" class="form-control" rows="3"
                    placeholder="Digite o motivo do estorno"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" id="btnEstornar" class="btn btn-primary">Estornar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Justificativa de Exclusão -->
<div class="modal fade" id="deletarModal" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLongTitle">Justificativa para Excluir Cheque</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea id="observacaoDelecao" class="form-control" rows="3"
                    placeholder="Digite o motivo para deletar o cheque"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" id="btnConfirmarDelecao" class="btn btn-primary">Confirmar Exclusão</button>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    // Compensar Cheque
    $('#btnCompensar').click(function () {
        var chequeId = $('#compensarModal').data('chequeId'); // Recupera o ID do cheque armazenado no modal
        var bancoId = $('#acaoCompensar').val(); // Recupera o ID do banco selecionado

        // Verifica se um banco foi selecionado
        if (!bancoId) {
            alert('Por favor, selecione um banco.');
            return;
        }

        // Envio dos dados para o servidor
        $.post('<?= site_url("P_cheques/Muda_acompensar") ?>', { chequeId: chequeId, bancoId: bancoId })
            .done(function (data) {
                // Tratamento de sucesso
                location.reload(); // Recarrega a página ou redireciona conforme necessário
            })
            .fail(function () {
                alert("Erro ao processar a solicitação.");
            });
    });

    $(document).ready(function () {
        $('td[data-status="a-compensar"]').click(function () {
            var chequeId = $(this).data('id'); // Captura o ID do cheque
            $('#compensarModal').data('chequeId', chequeId); // Armazena o ID no modal
            $('#compensarModal').modal('show');
        });
    });

    // Estornar Cheque
    $('#btnEstornar').click(function () {
        var chequeId = $('#estornarModal').data('chequeId'); // Recupera o ID do cheque armazenado no modal
        var bancoId = $('#acaoEstornar').val(); // Recupera o ID do banco selecionado
        var motivoEstorno = $('#motivoEstorno').val(); // Recupera o motivo do estorno

        // Verifica se um banco foi selecionado
        if (!bancoId) {
            alert('Por favor, selecione um banco.');
            return;
        }

        // Verifica se um motivo foi digitado
        if (!motivoEstorno) {
            alert('Por favor, digite o motivo do estorno.');
            return;
        }

        // Envio dos dados para o servidor
        $.post('<?= site_url("P_cheques/Estornar_cheque") ?>', { chequeId: chequeId, bancoId: bancoId, motivoEstorno: motivoEstorno })
            .done(function (data) {
                // Tratamento de sucesso
                location.reload(); // Recarrega a página ou redireciona conforme necessário
            })
            .fail(function () {
                alert("Erro ao processar a solicitação.");
            });
    });

    $(document).ready(function () {
        // Evento de clique para abrir o modal de estorno
        $('.btnEstornar').click(function (event) {
            event.preventDefault(); // Previne o comportamento padrão de redirecionamento
            var chequeId = $(this).data('id'); // Captura o ID do cheque
            $('#estornarModal').data('chequeId', chequeId); // Armazena o ID no modal
            $('#estornarModal').modal('show');
        });
    });

    $(document).ready(function () {
        // Evento de clique para abrir o modal de exclusão
        $('.deleta').click(function (event) {
            event.preventDefault(); // Previne o comportamento padrão de redirecionamento
            var chequeId = $(this).data('id'); // Captura o ID do cheque
            $('#deletarModal').data('chequeId', chequeId); // Armazena o ID no modal
            $('#deletarModal').modal('show'); // Exibe o modal
        });

        // Confirmação de exclusão com justificativa
        $('#btnConfirmarDelecao').click(function () {
            var chequeId = $('#deletarModal').data('chequeId'); // Recupera o ID do cheque armazenado no modal
            var observacaoDelecao = $('#observacaoDelecao').val(); // Recupera a observação digitada

            // Verifica se a observação foi digitada
            if (!observacaoDelecao) {
                alert('Por favor, digite o motivo para deletar o cheque.');
                return;
            }

            // Envio dos dados para o servidor
            $.post('<?= site_url("P_cheques/deleta_cheque") ?>/' + chequeId, { observacaoDelecao: observacaoDelecao })
                .done(function (data) {
                    // Tratamento de sucesso
                    location.reload(); // Recarrega a página ou redireciona conforme necessário
                })
                .fail(function () {
                    alert("Erro ao processar a solicitação.");
                });
        });
    });

</script>