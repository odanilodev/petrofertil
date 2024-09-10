<style>
    .img-produto {
        height: 180px;
    }

    .main {
        font-family: arial, sans-serif;
        border: 2px solid lightgray;
        position: relative;
        margin: 0;
        padding: 10px;
    }

    .header {
        text-align: center;
        color: gray;
        border: 1px solid lightgray;
        padding-bottom: 15px;
    }

    .header img {
        text-align: center;
    }

    .n-orcamento p {
        /* padding: 100px; */
        position: absolute;
        bottom: 0;
        left: 0;
        font-size: 14px;
        color: gray;
    }

    .n-orcamento span {
        color: grey;
        font-weight: bold;
    }

    .dados-form h3 {
        color: gray;
        text-align: center;
        background-color: #eaeaea;
        padding: 5px;
        border-radius: 5px;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        width: 50%;
        color: #404040;
    }

    tr:nth-child(even) {
        background-color: #eaeaea;
    }

    tr .produto-name {
        width: 200px;
        text-align: center;
        font-weight: bold;
    }

    .footer-pdf h3 {
        color: gray;
        text-align: center;
        background-color: #eaeaea;
        padding: 5px;
        border-radius: 5px;
    }
</style>


<div class="main">

    <div class="header">

        <div class="title-header">
            <img style="max-width: 260px;" class="img-fluid" src="<?= base_url() ?>/assets/financeiro/images/new_logo.png"><br>
        </div>

    </div>

    <br>

    <div class="body-pdf">
        <div class="dados-form">
            <div class="titulo-dados">
                <h3>N° Venda: <?= $id ?></h3>
            </div>

            <table>

                <tr>
                    <td>Nome:</td>
                    <td><?= $comprador ?></td>
                </tr>

                <tr>
                    <td>Data de Criação:</td>
                    <td><?= date('d/m/Y', strtotime($data_venda)) ?></td>
                </tr>

            </table>
        </div>


        <?php

        $produtos = json_decode($produto);
        $unidade_peso = json_decode($unidade_peso);
        $valor_venda = json_decode($valor_venda);
        $valor_total = json_decode($valor_total);

        $contador = count($produtos);

        ?>



        <div class="dados-form">
            <div class="titulo-dados">
                <h3>Dados da Venda</h3>
            </div>

            <table>

                <tr>
                    <th>Produto:</th>
                    <th>KG/Quantidade:</th>
                    <th>Preço de Venda:</th>
                    <th>Valor Total:</th>
                </tr>

                <?php $soma_total = 0;
                $soma_kg = 0;
                for ($a = 0; $a < $contador; $a++) { ?>

                    <tr>
                        <td><?= $produtos[$a] ?></td>
                        <td><?= $unidade_peso[$a] ?></td>
                        <td><?= number_format("$valor_venda[$a]", 2, ",", "."); ?></td>
                        <td><?= number_format("$valor_total[$a]", 2, ",", "."); ?></td>
                    </tr>

                <?php $soma_total = $soma_total + $valor_total[$a];
                    $soma_kg = $soma_kg + $unidade_peso[$a];
                } ?>

                <tr>
                    <td>Total da Venda:</td>
                    <td><?= $soma_kg ?></td>
                    <td></td>
                    <td>R$<?= number_format("$soma_total", 2, ",", "."); ?></td>
                </tr>

            </table>


        </div>


    </div>

</div>