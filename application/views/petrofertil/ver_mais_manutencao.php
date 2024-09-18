<?php
error_reporting(0);
ini_set("display_errors", 0);
$status = $this->session->userdata('usuario');

if ($status != "logado") {
    redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');
$nome_usuario = $this->session->userdata('nome_usuario');

$data = explode('-', $manutencao['data']);
$serv_array = json_decode($manutencao['servico'], true);
$val_array = json_decode($manutencao['valor'], true);
$desconto = $manutencao['desconto'];
$total = ($desconto > 0) ? array_sum($val_array) - $desconto : array_sum($val_array);
$contador = count($serv_array);
?>

<style>
    /* Ajustes Gerais */
    .container-fluid {
        padding: 20px;
    }

    .page-header {
        margin-top: 20px;
    }

    .btn-success {
        margin-bottom: 20px;
    }

    /* Card */
    .card {
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .card-header {
        background-color: #f5f5f5;
        padding: 15px;
        border-bottom: 1px solid #ddd;
    }

    .card-body {
        padding: 20px;
    }

    .card-footer {
        background-color: #f5f5f5;
        padding: 15px;
        border-top: 1px solid #ddd;
    }

    /* Tabela */
    .table {
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .table th {
        background-color: #f2f2f2;
    }

    /* Outros Ajustes */
    .text-small {
        font-size: 1.5rem;
    }

    .text-right {
        text-align: right;
    }

    .float-right {
        float: right;
    }

    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
</style>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header d-flex justify-content-between align-items-center">
                    <h2 class="pageheader-title mb-0">Serviço Detalhado</h2>
                    <a href="<?= site_url('manutencoes/detalhe_veiculo/') . $manutencao['placa'] ?>">
                        <button type="button" class="btn btn-success">Voltar</button>
                    </a>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h3 class="mb-0">Serviço #<?= $manutencao['id'] ?></h3>
                                <div class="text-small">
                                    <p class="mb-1">Serviço/Reclamação: <?= $manutencao['reclamacao'] ?></p>
                                    <p class="mb-1">Ordem de Serviço N°: <?= $manutencao['codigo'] ?></p>
                                    <p class="mb-1">Quilometragem do Veículo:
                                        <?= ($manutencao['km'] != '' ? $manutencao['km'] : 'Não cadastrado') ?> Km
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4 text-right">
                                <p class="mb-0"><?= $data[2] . '/' . $data[1] . '/' . $data[0] ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <h5 class="mb-3">De:</h5>
                                <h3 class="text-dark mb-1"><?= $oficina['nome'] ?></h3>
                                <div><?= $oficina['endereco'] ?></div>
                                <div>Telefone: <?= $oficina['telefone'] ?></div>
                            </div>
                            <div class="col-sm-6">
                                <h5 class="mb-3">Para:</h5>
                                <h3 class="text-dark mb-1">Petrofertil</h3>
                                <div>Bairro Jacutinga Antiga venda da Jacutinga </div>
                                <div>Telefone: (14) 99125-9472</div>
                            </div>
                        </div>

                        <div class="table-responsive" style="margin-top: 15px">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($c = 0; $c < $contador; $c++) { ?>
                                        <tr>
                                            <td><?= $c + 1 ?></td>
                                            <td><?= $serv_array[$c] ?></td>
                                            <td>R$<?= number_format($val_array[$c], 2, ",", ".") ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <p><strong>Desconto:</strong>
                                    <?= ($desconto > 0) ? 'R$' . number_format($desconto, 2, ",", ".") : 'Não gerado desconto' ?>
                                </p>
                            </div>
                            <div class="col-lg-6 col-sm-6 text-right">
                                <p><strong>Total:</strong> R$<?= number_format($total, 2, ",", ".") ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <p class="mb-0">Observação: <?= $manutencao['observacao'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>