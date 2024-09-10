<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Romaneio</title>
    <meta charset="utf-8">


</head>

<body>


    <!--Header-->

    <div style="width: 100%;">
        <div style="background-color: #DBDBDB" align="center">
            PETROECOL SOLUÇÕES AMBIENTAIS
        </div>

        <div style="margin-top: 5px">
            <div style="font-size: 14px" class="col-md-6">
                Data: 01/10/2019
            </div>




        </div>

        <div style="margin-top: 2px;">
            <nobr>
                <span style="font-size: 13px; max-width: 25%;">Motorista: <?= $motorista1 ?></span>
                <span style="margin-left: 8%; font-size: 13px; max-width: 25%;">Ajudante:
                    <?= $motorista2 != '' ? $motorista2 : '0' ?></span>
                <span style="margin-left: 8%; font-size: 13px; max-width: 25%;">Placa: <?= $placa; ?></span>

                <span style="margin-left: 8%; font-size: 13px; max-width: 25%;">Romaneio: 000122</span>

            </nobr>
        </div>
        <hr style="font-size: 0.5px; margin-top: 5px;">


    </div>



    <style>
    td {
        border-bottom: 0.5px solid #000;
    }

    ;
    </style>

    <!--EndHeader-->



    <div style="width: 100%;">
        <?php foreach($cidades as $v){ // loop nas cidades ?>
        <h4 style="margin-top: 30px; margin-bottom: 5px"><b><?=$v?></b></h4>

        <table>

            <thead>
                <tr style="font-size: 14px" align="left">
                    <th style="padding-left: 22px">Código</th>
                    <th style="padding-left: 22px">Nome Cliente</th>
                    <th style="padding-left: 22px">Endereço</th>
                    <th style="padding-left: 22px">Telefone</th>
                    <th style="padding-left: 22px">Observação</th>
                    <th style="padding-left: 22px">Forma de Pagto</th>
                    <th style="padding-left: 22px">Ultima Coleta</th>
                    <th style="padding-left: 22px">Qtde Retirado</th>
                    <th style="padding-left: 22px">Valor Pago</th>
                </tr>
            </thead>

            <tbody>





                <?php foreach($clientes[$v] as $c){ // lopp nos clientes  ($v está a cidade do foreach acima das cidades) ?>

                <tr style="font-size: 11px" align="left">
                    <td style="padding-left: 23px"><?= $c['id'] ?></td>
                    <td style="padding-left: 23px"><?= $c['nome'] ?></td>
                    <td style="padding-left: 23px"><?= $c['endereco'] ?></td>
                    <td style="padding-left: 23px"><?= $c['contato'] ?></td>
                    <td style="padding-left: 23px"></td>
                    <td style="padding-left: 23px">3X1 DT</td>
                    <td style="padding-left: 23px">14/10/2021</td>
                    <td style="padding-left: 23px"></td>
                    <td style="padding-left: 23px"></td>

                </tr>

                <?php } // fim loop clientes por cidade ?>

            </tbody>

        </table>

        <?php }  // fim loop cidades ?>

    </div>



</body>

</html>