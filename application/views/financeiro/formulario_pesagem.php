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
        <div class="block-header">
            <h2>FORMULARIO DE CADASTRO</h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Formulário de Cadastro
                        </h2>

                    </div>



                    <form method="post" action="<?= site_url('F_pesagem/inserir_pesagem') ?>">



                        <div class="body">

                            <div class="row clearfix">


                                <input name="id" type="hidden" value=""></input>

                                <input name="usuario" type="hidden" value="<?= $usuario ?>"></input>


                                <div class="col-sm-3">
                                    <label>Data</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" name="data" value="" class="form-control">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Empresa</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="empresa" value="" class="form-control"
                                                placeholder="Digite um observação">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Placa</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="placa" value="" class="form-control"
                                                placeholder="Digite um observação">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Motorista</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="motorista" value="" class="form-control"
                                                placeholder="Digite um observação">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Peso de Saída</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="peso_saida" value="" class="form-control"
                                                placeholder="Digite o peso de saída">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Peso de entrada</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="peso_entrada" value="" class="form-control"
                                                placeholder="Digite o peso de entrada">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Plástico</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="plastico" value="" class="form-control"
                                                placeholder="Quantidade de plástico">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <label>Papel</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="papel" value="" class="form-control"
                                                placeholder="Quantidade de papel">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Vidro</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="vidro" value="" class="form-control"
                                                placeholder="Quantidade de Vidro">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <label>Ferro</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="ferro" value="" class="form-control"
                                                placeholder="Quantidade de ferro">

                                        </div>
                                    </div>
                                </div>



                                <div class="col-sm-3">
                                    <label>Farinaceos</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="farinaceos" value="" class="form-control"
                                                placeholder="Quantidade de farinaceos">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Orgânico</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="organico" value="" class="form-control"
                                                placeholder="Quantidade de orgânicos">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Rejeito</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="rejeito" value="" class="form-control"
                                                placeholder="Quantidade de rejeito">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <label>Lixo</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="lixo" value="" class="form-control"
                                                placeholder="Quantidade de lixo">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <label>PS</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="ps" value="" class="form-control"
                                                placeholder="Quantidade de PS">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Plastico b.o.p.p</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="plastico_pp" value="" class="form-control"
                                                placeholder="Quantidade de Plastico PP">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <label>Plastico M</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="plastico_m" value="" class="form-control"
                                                placeholder="Quantidade de Plastico M">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Plástico Stretch</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="plastico_b" value="" class="form-control"
                                                placeholder="Quantidade de Plastico B">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>PP Duro</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="pp_duro" value="" class="form-control"
                                                placeholder="Quantidade de Plastico duro">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Cobre</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="cobre" value="" class="form-control"
                                                placeholder="Quantidade de cobre">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Alumínio Grosso</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="aluminio_grosso" value="" class="form-control"
                                                placeholder="Quantidade de aluminio">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Metal</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="metal" value="" class="form-control"
                                                placeholder="Quantidade de metal">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Inox</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="inox" value="" class="form-control"
                                                placeholder="Quantidade de inox">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Aluminio Chapa</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="aluminio_chapa" value="" class="form-control"
                                                placeholder="Quantidade de aluminio">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Fio Misto</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="fio_misto" value="" class="form-control"
                                                placeholder="Quantidade de fio">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Papelão Cimento</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="papelao_cimento" value="" class="form-control"
                                                placeholder="Quantidade de papelao">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Papelão Tubete</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="papelao_tubete" value="" class="form-control"
                                                placeholder="Quantidade de papelao">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Isopor</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="isopor" value="" class="form-control"
                                                placeholder="Quantidade de isopor">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Tambor</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="tambor" value="" class="form-control"
                                                placeholder="Quantidade de tambor">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Abastecimento</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="abastecimento" value="" class="form-control"
                                                placeholder="Quantidade de abastecimento">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Pet</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="pet" value="" class="form-control"
                                                placeholder="Quantidade de Pet">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Pet Óleo</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="pet_oleo" value="" class="form-control"
                                                placeholder="Quantidade de Pet">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Pead</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="pead" value="" class="form-control"
                                                placeholder="Quantidade de Pead">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Sacaria</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="sacaria" value="" class="form-control"
                                                placeholder="Quantidade de Sacaria">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <label>Fita</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="fita" value="" class="form-control"
                                                placeholder="Quantidade de Fita">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <label>Lata</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="lata" value="" class="form-control"
                                                placeholder="Quantidade de Lata">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Leite Tetra Park</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="leite_tetra_park" value="" class="form-control"
                                                placeholder="Quantidade de LTP">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <label>Caixas</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="caixas" value="" class="form-control"
                                                placeholder="Quantidade de Caixas">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Papelão Bom</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="papelao_bom" value="" class="form-control"
                                                placeholder="Quantidade de Papelão">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Papelão Misto</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="papelao_misto" value="" class="form-control"
                                                placeholder="Quantidade de Papelão">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>PVC</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="pvc" value="" class="form-control"
                                                placeholder="Quantidade de PVC">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Rafia</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="rafia" value="" class="form-control"
                                                placeholder="Quantidade de Rafia">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Outros</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="outros" value="" class="form-control"
                                                placeholder="Quantidade de outros resíduos">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Oque?</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="oque" value="" class="form-control" placeholder="">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label>Justificativa</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="justificativa" value="" class="form-control"
                                                placeholder="Digite uma justificativa">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 mt-1">
                                    <div class="col-sm-offset-3 col-sm-3">
                                        <div class="form-group">

                                            <input type="submit"
                                                class="btn bg-red btn-block waves-effect col-md-3"></input>

                                        </div>
                                    </div>
                                </div>




                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
    <!-- #END# Input -->

    </div>
</section>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>