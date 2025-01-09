<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Venda</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .ticket {
            width: 100%;
            max-width: 700px;
            margin: 30px auto;
            background-color: #fff;
            padding: 25px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .ticket-header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #f1f1f1;
            padding-bottom: 10px;
        }

        .ticket-header h1 {
            margin: 0;
            font-size: 22px;
            color: #4CAF50;
        }

        .ticket-header p {
            font-size: 14px;
            color: #888;
        }

        .ticket-details {
            margin-top: 20px;
        }

        .ticket-details p {
            font-size: 16px;
            margin: 8px 0;
            line-height: 1.6;
        }

        .ticket-details strong {
            color: #333;
        }

        .ticket-details hr {
            border: 0;
            border-top: 1px solid #f1f1f1;
            margin: 15px 0;
        }

        .product-info {
            margin-bottom: 10px;
        }

        .product-info span {
            display: inline-block;
            width: 50%;
        }

        .product-info strong {
            color: #4CAF50;
        }

        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            color: #c00;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #888;
        }

        .footer p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="ticket">
        <div class="ticket-header">
            <h1>Ticket de Venda</h1>
            <p><strong>Ticket Nº:</strong> <?= $venda['ticket'] ?> - Data:</strong>
                <?= date('d/m/Y', strtotime($venda['data_venda'])) ?></p>
        </div>

        <div class="ticket-details">
            <p><strong>Nome do Cliente:</strong> <?= $cliente['nome_fantasia'] ?></p>
            <p><strong>Vendedor:</strong> <?= $cliente['vendedor'] ?></p>

            <hr>

            <p><strong>Produtos:</strong></p>
            <?php
            $comissao_total = 0; // Inicializando o total da comissão
            
            for ($i = 0; $i < count($produto); $i++) {
                // Calcular comissão para o produto
                $comissao_produto = $quantidade[$i] * $comissao[0]; // multiplicar quantidade pela comissão
            
                // Adicionar a comissão ao total
                $comissao_total += $comissao_produto;
                ?>
                <div class="product-info">
                    <span><strong>Produto:</strong> <?= $produto[$i] ?></span>
                    <span><strong>Quantidade:</strong> <?= number_format($quantidade[$i], 3, ',', '.') ?> kg</span>
                    <span><strong>Preço:</strong> R$ <?= number_format($valor_produto[$i], 2, ',', '.') ?> /kg</span>
                    <span><strong>Comissão:</strong> R$ <?= number_format($comissao_produto, 2, ',', '.') ?></span>
                </div>
                <hr>
                <?php
            }
            ?>
        </div>

        <div class="ticket-details">
            <p><strong>Comissão Total do Vendedor:</strong> R$ <?= number_format($comissao_total, 2, ',', '.') ?></p>
            <p><strong>Valor do Frete:</strong> R$ <?= number_format($venda['valor_frete'], 2, ',', '.') ?></p>
            <p><strong>Tipo de Frete:</strong> <?= $cliente['tipo_frete'] ?></p>
        </div>

        <div class="total">
            <p><strong>Total Final:</strong> R$ <?= number_format($venda['valor_total_venda'], 2, ',', '.') ?></p>
        </div>

        <div class="footer">
            <p>Gerado pelo sistema em <?= date('d/m/Y') ?></p>
        </div>
    </div>
</body>

</html>