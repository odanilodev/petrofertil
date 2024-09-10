 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PAINEL INICIAL</h2>
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
                            <div class="number">R$<?=  number_format("$total_saida",2,",",".");?></div>
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
                            <div class="number">R$<?=  number_format("$total_entrada",2,",",".");?></div>
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
                            <div class="number">R$<?=  number_format("$total_caixa",2,",",".");?></div>
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