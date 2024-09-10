<?php
$status = $this->session->userdata('usuario');

if ($status != "logado") {

    redirect('saulo/verifica_login');
}

$usuario = $this->session->userdata('login');

$nome_usuario = $this->session->userdata('nome_usuario');

?>

<style>
    .caixa_display {
        display: none;
    }

    .caixa_display2 {
        display: none;
    }

    .caixa_display3 {
        display: none;
    }

    .ocultador {
        display: block;
    }

    .ocultador2 {
        display: block;
    }

    .ocultador3 {
        display: block;
    }

</style>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="block-header col-md-3">
                <h2>FLUXO DE CAIXA</h2>
            </div>

            <?php if ($usuario == 'fernanda@petroecol.com.br') { ?>
                <div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">

                    <button id="olho" type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">remove_red_eye</i>
                    </button>

                </div>
            <? } ?>

        </div>

          
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons col-red">money_off</i>
                        </div>
                        <div class="content">
                            <div class="text">DESPESAS DO MÊS</div>
                            <div id="caixa" class="number caixa_display">R$<?=  number_format("$total_saida",2,",",".");?></div>
                            <div id="ocultador" class="number ocultador">R$ ------------ </div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons col-green">attach_money</i>
                        </div>
                        <div class="content">
                            <div class="text">ENTRADAS DO MÊS</div>
                            <div id="caixa2" class="number caixa_display2">R$<?=  number_format("$total_entrada",2,",",".");?></div>
                            <div id="ocultador2" class="number ocultador2">R$ ------------ </div>
                        </div>
                    </div>
                </div>
               
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons col-green">monetization_on</i>
                        </div>
                        <div class="content">
                            <div class="text">SALDO ATUAL</div>
                            <div id="caixa3" class="number caixa_display3">R$<?=  number_format("$total_caixa",2,",",".");?></div>
                            <div id="ocultador3" class="number ocultador3">R$ ------------ </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            
            <div class="row clearfix">   
                <!-- Answered Tickets -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="body bg-teal">
                            <div class="font-bold m-b--35">CONTAS A PAGAR DO DIA <?= date('d/m/Y') ?></div>
                            <ul class="dashboard-stat-list">
								
							<?php foreach($contas as $c){ ?>
								<?php if($c['status'] == 0){ ?>
								
                                <li>
                                    <?= $c['recebido'] ?>
                                    <span class="pull-right"><b>R$<?php $valor_pagar = $c['valor']; echo number_format("$valor_pagar",2,",","."); ?></b></span>
                                </li>
                            <?php } } ?>	  
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Answered Tickets -->
				
				 <!-- Answered Tickets -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="body bg-cyan">
                            <div class="font-bold m-b--35">CONTAS A RECEBER DO DIA <?= date('d/m/Y') ?></div>
                            <ul class="dashboard-stat-list">
								
							<?php foreach($contas_receber as $r){ ?>
								
								
								<?php if($r['status'] == 0){ ?>
								
                                <li>
                                    <?= $r['nome'] ?>
                                    <span class="pull-right"><b>R$<?php $valor_receber = $r['valor']; echo number_format("$valor_receber",2,",","."); ?></b></span>
                                </li>
                            <?php } } ?>	  
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Answered Tickets -->
               
    </section>

    <script>
        

    var olho = document.getElementById("olho")


    olho.addEventListener("click", function() {

        var caixa = document.getElementById("caixa")
        var caixa2 = document.getElementById("caixa2")
        var caixa3 = document.getElementById("caixa3")

        var ocultador = document.getElementById("ocultador")
        var ocultador2 = document.getElementById("ocultador2")
        var ocultador3 = document.getElementById("ocultador3")


        if (caixa.style.display === "block") {

            caixa.style.display = "none"
            caixa2.style.display = "none"
            caixa3.style.display = "none"

            ocultador.style.display = "block"
            ocultador2.style.display = "block"
            ocultador3.style.display = "block"

        } else {
            caixa.style.display = "block"
            caixa2.style.display = "block"
            caixa3.style.display = "block"

            ocultador.style.display = "none"
            ocultador2.style.display = "none"
            ocultador3.style.display = "none"
        }

    });
</script>