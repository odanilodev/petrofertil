<?php  
	
	$status = $this->session->userdata('usuario');
	
	if($status != "logado"){
		
		redirect('financeiro/verifica_login');
	}
	
	$usuario = $this->session->userdata('login');
	
	$nome_usuario = $this->session->userdata('nome_usuario');
	
?>

<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="block-header col-md-4">
                <h2>CONTROLE DE PESAGEM DE RECICLÁVEIS</h2>
            </div>

            <?php if($usuario == 'reciclagem@petroecol.com.br' or $usuario == 'producao@petroecol.com.br'){ ?>
            <div class="col-md-8" style="margin-bottom: 12px; margin-top: -8px" align="right">
                <a href="<?= base_url('F_pesagem/lancar_pesagem') ?>"><span type="button"
                        class="btn bg-pink waves-effect">LANÇAR PESAGEM</span></a>
            </div>
            <?php  } ?>

        </div></br>


        <?php if($usuario == 'reciclagem@petroecol.com.br' or $usuario == 'fernanda@petroecol.com.br' or $usuario == 'petroecol@petroecol.com.br'){ ?>
        <div class="row">
            <div class="container-fluid">
                <?php if($pagina == 'erro'){ ?>
                <div class="alert bg-teal alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                        aria-label="Close"><span aria-hidden="true">×</span></button>
                    Não foram encontrados <b>registros</b> nas datas selecionadas, ou os campos nao foram preenchidos
                    corretamente.
                </div>
                <?php } ?>
                <form class="col-md-12" enctype="multipart/form-data"
                    action="<?= site_url('F_pesagem/filtra_pesagem/') ?>" method="post">

                    <div class="col-md-3">

                        <div class="form-group ">
                            <label>De</label>
                            <input required type="date" value="" name="data_inicial" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group  ">
                            <label>Até</label>
                            <input required type="date" value="" name="data_final" class="form-control">
                        </div>

                    </div>



                    <button type="submit" style="margin-top: 27px"
                        class="btn btn-primary ml-2 col-sm-6 col-md-3 col-xs-6 ">Filtrar</button>

                    <a href="<?= site_url('F_pesagem/inicio') ?>"><span style="margin-top: 27px"
                            class="btn btn-success col-md-3 col-sm-6 col-xs-6">Geral</span></a>


                    <?php if($pagina == 'deletado'){ ?>

                    <div class="alert bg-teal alert-dismissible col-xs-12" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                        Aferição deletada com sucesso
                    </div>
                    <?php } ?>

            </div>

            </form>

        </div>

        <?php } ?>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 15px" class="card">
                    <div class="header">
                        <h2> Pesagem </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Data</th>
                                        <th>Empresa</th>
                                        <th>Placa</th>
                                        <th>Motorista</th>
                                        <th>Saída</th>
                                        <th>Entrada</th>
                                        <th>Peso</th>
                                        <th>Plastico</th>
                                        <th>Papel</th>
                                        <th>Vidro</th>
                                        <th>Ferro</th>
                                        <th>Farinaceos</th>
                                        <th>Orgânico</th>
                                        <th>Rejeito</th>
                                        <th>Lixo</th>
                                        <th>PS</th>
                                        <th>Plastico b.o.p.p</th>
                                        <th>Plastico M</th>
                                        <th>Plastico Stretch</th>
                                        <th>PP Duro</th>
                                        <th>Cobre</th>
                                        <th>Alumínio Grosso</th>
                                        <th>Metal</th>
                                        <th>Inox</th>
                                        <th>Aluminio Chapa</th>
                                        <th>Fio Misto</th>
                                        <th>Papelão Cimento</th>
                                        <th>Papelão Tubete</th>
                                        <th>Isopor</th>
                                        <th>Tambor</th>
                                        <th>Abastecimento</th>
                                        <th>Pet</th>
                                        <th>Pet Óleo</th>
                                        <th>Pead</th>
                                        <th>Sacaria</th>
                                        <th>Fita</th>
                                        <th>Lata</th>
                                        <th>Leite Tetra Park</th>
                                        <th>Caixas</th>
                                        <th>Papelão Bom</th>
                                        <th>Papelão Misto</th>
                                        <th>PVC</th>
                                        <th>Rafia</th>
                                        <th>Outros</th>
                                        <th>Oque?</th>
                                        <th>Diferença</th>
                                        <th>Justificativa</th>
                                        <th>Editar</th>
                                        <?php if($usuario == 'reciclagem@petroecol.com.br'){ ?>
                                        <th>Excluir</th>
                                        <th>Status</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Data</th>
                                        <th>Empresa</th>
                                        <th>Placa</th>
                                        <th>Motorista</th>
                                        <th>Saída</th>
                                        <th>Entrada</th>
                                        <th>Peso</th>
                                        <th>Plastico</th>
                                        <th>Papel</th>
                                        <th>Vidro</th>
                                        <th>Ferro</th>
                                        <th>Farinaceos</th>
                                        <th>Orgânico</th>
                                        <th>Rejeito</th>
                                        <th>Lixo</th>
                                        <th>PS</th>
                                        <th>Plastico b.o.p.p</th>
                                        <th>Plastico M</th>
                                        <th>Plastico Stretch</th>
                                        <th>PP Duro</th>
                                        <th>Cobre</th>
                                        <th>Alumínio Grosso</th>
                                        <th>Metal</th>
                                        <th>Inox</th>
                                        <th>Aluminio Chapa</th>
                                        <th>Fio Misto</th>
                                        <th>Papelão Cimento</th>
                                        <th>Papelão Tubete</th>
                                        <th>Isopor</th>
                                        <th>Tambor</th>
                                        <th>Abastecimento</th>
                                        <th>Pet</th>
                                        <th>Pet Óleo</th>
                                        <th>Pead</th>
                                        <th>Sacaria</th>
                                        <th>Fita</th>
                                        <th>Lata</th>
                                        <th>Leite Tetra Park</th>
                                        <th>Caixas</th>
                                        <th>Papelão Bom</th>
                                        <th>Papelão Misto</th>
                                        <th>PVC</th>
                                        <th>Rafia</th>
                                        <th>Outros</th>
                                        <th>Oque?</th>
                                        <th>Diferença</th>
                                        <th>Justificativa</th>
                                        <th>Editar</th>
                                        <?php if($usuario == 'reciclagem@petroecol.com.br'){ ?>
                                        <th>Excluir</th>
                                        <th>Status</th>
                                        <?php } ?>
                                    </tr>
                                </tfoot>
                                <tbody align="center">


                                    <?php $contador = 1; foreach($pesagem as $p){?>
                                    <tr>
                                        <td style="background-color: <?= $p['status'] == 1 ? 'yellow' : '' ?>;">
                                            <?= $contador; ?></td>
                                        <td style="background-color: #fff2e8;">
                                            <?= date("d/m/Y", strtotime($p['data'])); ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['empresa'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['placa'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['motorista'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['peso_saida'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['peso_entrada'] ?></td>
                                        <td style="background-color: #4cccfb; color: #000">
                                            <b><?= $p['peso_liquido'] ?></b>
                                        </td>
                                        <td style="background-color: #fff2e8;"><?= $p['plastico'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['papel'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['vidro'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['ferro'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['farinaceos'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['organico'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['rejeito'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['lixo'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['ps'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['plastico_pp'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['plastico_m'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['plastico_b'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['pp_duro'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['cobre'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['aluminio_grosso'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['metal'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['inox'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['aluminio_chapa'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['fio_misto'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['papelao_cimento'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['papelao_tubete'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['isopor'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['tambor'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['abastecimento'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['pet'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['pet_oleo'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['pead'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['sacaria'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['fita'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['lata'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['leite_tetra_park'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['caixas'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['papelao_bom'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['papelao_misto'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['pvc'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['rafia'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['outros'] ?></td>
                                        <td style="background-color: #fff2e8;"><?= $p['oque'] ?></td>
                                        <td
                                            style="background-color: <?= $p['diferenca'] < 0 ? '#fc6767' : '#55fb55' ?> ; color: #000">
                                            <b><?= $p['diferenca'] ?></b>
                                        </td>
                                        <td style="background-color: #fff2e8;"><?= $p['justificativa'] ?></td>
                                        <td align="center"><a
                                                href="<?= site_url('F_pesagem/edita_pesagem/').$p['id'] ?>"><i
                                                    class="material-icons"><i
                                                        class="material-icons">mode_edit</i></i></a></td>

                                        <?php if($usuario == 'reciclagem@petroecol.com.br'){ ?>
                                        <td align="center"><a
                                                href="<?= base_url('F_pesagem/deleta_pesagem/').$p['id'] ?>"><i
                                                    class="material-icons">delete</i></a></td>
                                        <td align="center"><a
                                                href="<?= site_url('F_pesagem/edita_status/').$p['id'] ?>"><i
                                                    class="material-icons"><i class="material-icons">refresh</i></i></a>
                                        </td>
                                        <?php } ?>


                                    </tr>
                                    <?php $contador++; } ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</section>