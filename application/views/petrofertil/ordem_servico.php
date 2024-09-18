<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Ordem de serviço</title>
    <meta charset="utf-8">

</head>

<body>

    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <img class="img-fluid" style="height: 30px" src="<?= base_url('assets/img/logopetro.png') ?>">
            </div>


            <div align="center" style="font-size: 14px" class="col-md-12 mt-4">
                <h1>ORDEM DE SERVIÇO (OS) - N°<?= $codigo ?></h1>
            </div>

            <div align="center" class="col-md-12 mt-5">
                <h1 style="font-size: 22px">SAÍDA DA EMPRESA</h1>
            </div>

            <div align="right"><img class="img-fluid" style="padding-top: -70px; height: 80px; margin-right: 30px;"
                    src="<?= base_url('assets/img/marcador.jpg') ?>"></div>
            <?php $data = date('Y/m/d') ?>

            <div style="" class="col-md-6 mt-4">
                <h4 style="font-size: 14px">KM DE SAÍDA: __________________________</h4>
            </div>
            <div align="right" style="margin-top: -60px" class="col-md-6 mt-4">
                <h4>VISTO: __________________________</h4>

            </div>

            <div style="" class="col-md-6 mt-4">
                <h4 style="font-size: 14px">HORA: _____:_____</h4>
            </div>


            <div align="center" class="col-md-12 mt-5">
                <h1 style="font-size: 22px">ENTRADA NA OFICINA</h1>

            </div>
            <div align="right"><img class="img-fluid" style="padding-top: -80px; height: 80px; margin-right: 30px;"
                    src="<?= base_url('assets/img/marcador.jpg') ?>"></div>
            <?php $data = date('Y/m/d') ?>


            <div style="" class="col-md-6 mt-4">
                <h4 style="font-size: 14px">DATA: <?= date("d/m/Y", strtotime($data_ordem)); ?></h4>
            </div>
            <div align="center" style="margin-top: -60px; margin-left: 172px" class="col-md-6 mt-4">
                <h4 style="font-size: 14px">HORA: _____:_____</h4>
            </div>

            <div style="margin-top: -15" class="col-md-6 mt-4">
                <h4 style="font-size: 14px">OFICINA: <?= $oficina ?></h4>
            </div>
            <div align="center" style="margin-top: -60px; margin-left: 160px;" class="col-md-6 mt-4">
                <h4 style="font-size: 14px">PLACA: <?= $veiculo['placa'] ?></h4>
            </div>



            <div style="margin-top: -15" class="col-md-6 mt-4">
                <h4 style="font-size: 14px">VEÍCULO: <?= $veiculo['modelo'] ?></h4>
            </div>
            <div align="right" style="margin-top: -60px" class="col-md-6 mt-4">
                <h4 style="font-size: 14px">KM DE ENTRADA: ____________________________</h4>
            </div>



            <div class="col-md-12 mt-4">
                <h4 style="font-size: 14px">RECLAMAÇÃO SUSPEITA
                    <?php echo ($motorista != '0' ? 'DE ' . strtoupper($motorista) . ', REALIZADA NO DIA ' . date("d/m/Y", strtotime($data_reclamacao)) : '') ?>:
                    <?= $reclamacao ?>
                </h4>
            </div>


            <div align="center" style="margin-top: 40px" class="col-md-12 mt-5">
                <h1 style="font-size: 22px">SAÍDA DA OFICINA</h1>

            </div>
            <div align="right"><img class="img-fluid" style="padding-top: -80px; height: 80px; margin-right: 30px;"
                    src="<?= base_url('assets/img/marcador_saida.jpg') ?>"></div>
            <?php $data = date('Y/m/d') ?>

            <div style="" class="col-md-6 mt-4">
                <h4 style="font-size: 14px">DATA: ____/____/____</h4>
            </div>

            <div align="center" style="margin-top: -60px; margin-left: 180px" class="col-md-6 mt-4">
                <h4 style="font-size: 14px">HORA: _____:_____</h4>
            </div>


            <div style="margin-top: -15" class="col-md-6 mt-4">
                <h4 style="font-size: 14px">KM DE SAÍDA: __________________________</h4>
            </div>


            <div class="col-md-12 mt-3">
                <h4 style="font-size: 14px">SERVIÇO EXECUTADO:
                    ________________________________________________________________________</h4>
            </div>
            <div style="margin-top: -20px" class="col-md-12 mt-1">
                <h4 style="font-size: 14px">
                    _____________________________________________________________________________________________</h4>
            </div>
            <div style="margin-top: -20px" class="col-md-12 mt-1">
                <h4 style="font-size: 14px">
                    _____________________________________________________________________________________________</h4>
            </div>


        </div>
    </div>
</body>



</html>