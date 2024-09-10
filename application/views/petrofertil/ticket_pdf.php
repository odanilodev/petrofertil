<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Documento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
        }

        .header p {
            margin: 5px 0;
            font-size: 12px;
        }

        .content table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .content table,
        .content th,
        .content td {
            border: 1px solid #000;
        }

        .content th,
        .content td {
            padding: 8px;
            text-align: left;
            font-size: 14px;
        }

        .content th {
            background-color: #f2f2f2;
        }

        .content .label {
            width: 150px;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            page-break-inside: avoid;
        }

        .footer .signature {
            text-align: center;
            width: 45%;
            display: inline-block;
        }

        .footer .signature p {
            font-size: 12px;
        }
    </style>
</head>

<?php
$produto_decode = json_decode($produto);
?>

<body>
    <div class="header">
        <h1>PETROFERTIL COMPOSTAGEM SUSTENTÁVEL</h1>
        <p>DA SANTA CRUZ AO BAIRRO JACUTINGA - SANTA CRUZ DO RIO PARDO/SP</p>
        <p>Fone: (14) 99125.9472 Email</p>
        <p>CNPJ 24.498.854/0001-00</p>
    </div>
    <div class="content">
        <table style="padding-bottom: 50px">
            <tr>
                <th class="label">Nº Ticket</th>
                <td><?= $ticket ?></td>
                <th class="label">Produto</th>
                <td><?= $produto_decode[0] ?></td>
            </tr>
            <tr>
                <th class="label">Vendedor</th>
                <td><?= $vendedor ?></td>
                <th class="label">Transportador</th>
                <td><?= $transportador ?></td>
            </tr>
            <tr>
                <th class="label">Emissor</th>
                <td><?= $cliente ?></td>
                <th class="label">CNPJ/CPF</th>
                <td><?= $documento ?></td>
            </tr>
            <tr>
                <th class="label">Data Entrada</th>
                <td><?= date('d/m/Y', strtotime($data_entrada)) ?></td>
                <th class="label">Data Saída</th>
                <td><?= date('d/m/Y', strtotime($data_saida)) ?></td>
            </tr>
            <tr>
                <th class="label">Bruto</th>
                <td><?= $peso_bruto ?> Kg</td>
                <th class="label">Líquido</th>
                <td><?= $peso_liquido ?> Kg</td>
            </tr>
            <tr>
                <th class="label">Tara</th>
                <td><?= $tara ?> Kg</td>
                <th class="label">Descontos</th>
                <td><?= $descontos ?></td>
            </tr>
            <tr>
                <th class="label">Cavalo</th>
                <td><?= $placa ?></td>
                <th class="label">Reboque</th>
                <td><?= $motorista ?></td>
            </tr>
            <tr>
                <th class="label">Líquido Final</th>
                <td><?= $peso_liquido ?> Kg</td>
                <th class=""></th>
                <td></td>
            </tr>
        </table>
    </div>
    <div class="footer" style="padding-top: 10px">
        <div class="signature" style="padding-top: 6%">
            <p>_____________________________</p>
            <p>Assinatura do Balançeiro</p>
        </div>
        <div class="signature" style="margin-left: 50%">
            <p>_____________________________</p>
            <p>Assinatura do Motorista</p>
        </div>
    </div>
</body>

</html>