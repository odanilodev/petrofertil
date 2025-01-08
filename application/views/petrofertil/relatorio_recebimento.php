<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Recebimentos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
            word-wrap: break-word;
        }

        th {
            background-color: #f4f4f4;
        }

        .total {
            font-weight: bold;
            background-color: #e0e0e0;
        }

        .section-title {
            font-size: 16px;
            margin-top: 10px;
            font-weight: bold;
            text-align: center;
        }

        .company-info {
            text-align: center;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: bold;
        }

        @media print {
            @page {
                size: A4;
                margin: 20mm;
            }

            body {
                margin: 0;
            }
        }
    </style>
</head>

<body>
    <div>
        <div class="section-title">Controle de Recebimentos</div>
        <div class="company-info">
            Empresa: <?= htmlspecialchars($recebimentos[0]['nome_empresa']); ?><br>
            Data de Geração: <?= date('d/m/Y'); ?>
        </div>

        <?php
        $dadosPorData = [];
        $totalGeral = [
            'quantidade_total' => 0,
            'organico' => 0,
            'mineral' => 0,
            'molhado' => 0,
            'latinha' => 0,
            'palha' => 0,
            'outro' => 0,
        ];

        // Organiza os recebimentos por data
        foreach ($recebimentos as $recebimento) {
            $data = $recebimento['data_recebimento'];

            if (!isset($dadosPorData[$data])) {
                $dadosPorData[$data] = [];
            }

            $dadosPorData[$data][] = $recebimento;

            // Soma os totais gerais
            $totalGeral['quantidade_total'] += $recebimento['quantidade_total'];
            $totalGeral['organico'] += $recebimento['organico'];
            $totalGeral['mineral'] += $recebimento['mineral'];
            $totalGeral['molhado'] += $recebimento['molhado'];
            $totalGeral['latinha'] += $recebimento['latinha'];
            $totalGeral['palha'] += $recebimento['palha'];
            $totalGeral['outro'] += $recebimento['outro'];
        }

        // Renderiza as tabelas por data
        foreach ($dadosPorData as $data => $recebimentosDoDia) {
            $totalDia = [
                'quantidade_total' => 0,
                'organico' => 0,
                'mineral' => 0,
                'molhado' => 0,
                'latinha' => 0,
                'palha' => 0,
                'outro' => 0,
            ];
            ?>
            <div class="section-title">Recebimentos do Dia: <?= date('d/m/Y', strtotime($data)); ?></div>
            <table>
                <thead>
                    <tr>
                        <th>Nº NF</th>
                        <th>QUANT. TOTAL</th>
                        <th>PLACA</th>
                        <th>ORGÂNICO</th>
                        <th>MINERAL</th>
                        <th>MOLHADO</th>
                        <th>LATINHA/SACHÊS</th>
                        <th>PALHA</th>
                        <th>OUTRO</th>
                        <th>OBSERVAÇÃO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($recebimentosDoDia as $recebimento) {
                        // Soma os totais do dia
                        $totalDia['quantidade_total'] += $recebimento['quantidade_total'];
                        $totalDia['organico'] += $recebimento['organico'];
                        $totalDia['mineral'] += $recebimento['mineral'];
                        $totalDia['molhado'] += $recebimento['molhado'];
                        $totalDia['latinha'] += $recebimento['latinha'];
                        $totalDia['palha'] += $recebimento['palha'];
                        $totalDia['outro'] += $recebimento['outro'];
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($recebimento['numero_nota']); ?></td>
                            <td><?= htmlspecialchars($recebimento['quantidade_total']); ?></td>
                            <td><?= htmlspecialchars($recebimento['placa']); ?></td>
                            <td><?= htmlspecialchars($recebimento['organico']); ?></td>
                            <td><?= htmlspecialchars($recebimento['mineral']); ?></td>
                            <td><?= htmlspecialchars($recebimento['molhado']); ?></td>
                            <td><?= htmlspecialchars($recebimento['latinha']); ?></td>
                            <td><?= htmlspecialchars($recebimento['palha']); ?></td>
                            <td><?= htmlspecialchars($recebimento['outro']); ?></td>
                            <td><?= htmlspecialchars($recebimento['obs']); ?></td>
                        </tr>
                    <?php } ?>
                    <tr class="total">
                        <td>TOTAL DO DIA</td>
                        <td><?= $totalDia['quantidade_total']; ?></td>
                        <td>-</td>
                        <td><?= $totalDia['organico']; ?></td>
                        <td><?= $totalDia['mineral']; ?></td>
                        <td><?= $totalDia['molhado']; ?></td>
                        <td><?= $totalDia['latinha']; ?></td>
                        <td><?= $totalDia['palha']; ?></td>
                        <td><?= $totalDia['outro']; ?></td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>

        <div class="section-title">Total Geral</div>
        <table>
            <thead>
                <tr>
                    <th>QUANT. TOTAL</th>
                    <th>ORGÂNICO</th>
                    <th>MINERAL</th>
                    <th>MOLHADO</th>
                    <th>LATINHA/SACHÊS</th>
                    <th>PALHA</th>
                    <th>OUTRO</th>
                </tr>
            </thead>
            <tbody>
                <tr class="total">
                    <td><?= $totalGeral['quantidade_total']; ?></td>
                    <td><?= $totalGeral['organico']; ?></td>
                    <td><?= $totalGeral['mineral']; ?></td>
                    <td><?= $totalGeral['molhado']; ?></td>
                    <td><?= $totalGeral['latinha']; ?></td>
                    <td><?= $totalGeral['palha']; ?></td>
                    <td><?= $totalGeral['outro']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>