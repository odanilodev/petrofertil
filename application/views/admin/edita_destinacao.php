
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
								
								<div class="pb-2">
								<a href="<?= site_url('destinacao_petro/inicio/').$destinacao['id_cliente'] ?>"><button type="button" class="btn btn-secondary float-right">Voltar</button></div></a>
								
                                <h2 class="pageheader-title">Editar Destinação</h2>
									
                                <div class="page-breadcrumb">

                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Clientes</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Formulario de Destinação</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
					
					
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
					
						<!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                              
                                <div class="card">
                                   
                                    <div class="card-body">
                                        <form enctype="multipart/form-data" action="<?= site_url('destinacao_petro/atualiza_destinacao') ?>" method="post">
											
											
                                                
											<input type="hidden" value="<?= $destinacao['id'] ?>" name="id" class="form-control" readonly>
											
                                                <input type="hidden" value="<?= $destinacao['id_cliente'] ?>" name="id_cliente" class="form-control" readonly>
                                           
											
                                             <div class="form-group">
                                                <label for="inputEmail">Cliente</label>
                                                <input type="text" value="<?=  $destinacao['cliente'] ?>" name="cliente" class="form-control" readonly>
                                                
                                            </div>
											
                                            <div class="form-group">
                                                <label for="inputEmail">Quantidade (NF)</label>
                                                <input type="text" value="<?=  $destinacao['quantidade'] ?>" name="quantidade" class="form-control">
                                                
                                            </div>
											
											 <div class="form-group">
                                                <label for="inputEmail">Quantidade (Balança)</label>
                                                <input type="text" value="<?=  $destinacao['balanca'] ?>" name="balanca" class="form-control">
                                                
                                            </div>
											
											<?php /*?><div class="form-group">
                                                <label for="inputEmail"> Quantidade de Plástico</label>
                                                <input type="text" value="<?=  $destinacao['plastico'] ?>" name="plastico" class="form-control">
                                                
                                            </div>
											
											
											<div class="form-group">
                                                <label for="inputEmail">Quantidade Ráfia</label>
                                                <input type="text" value="<?=  $destinacao['rafia'] ?>" name="rafia" class="form-control">
                                                
                                            </div>
											<?php */?>
											<div class="form-group">
                                                <label for="inputEmail">Nota</label>
                                                <input type="text" value="<?=  $destinacao['nota'] ?>" name="nota" class="form-control">
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">MTR</label>
                                                <input type="text" value="<?=  $destinacao['mtr'] ?>" name="mtr" class="form-control">
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Data da destinação</label>
                                                <input type="date" value="<?=  $destinacao['data'] ?>" name="data" class="form-control">
                                                
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Valor Frete</label>
                                                <input type="text" value="<?=  $destinacao['valor_frete'] ?>" name="valor_frete" class="form-control">
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Valor agenciador</label>
                                                <input type="text" value="<?=  $destinacao['valor_agenciador'] ?>" name="valor_agenciador" class="form-control">
                                            </div>
											
											
											<div class="form-group">
                                                <label for="inputEmail">Valor Produto</label>
                                                <input type="text" value="<?=  $destinacao['valor_produto'] ?>" name="valor_produto" class="form-control">
                                            </div>
											
											
											<div class="form-group">
                                                <label for="inputEmail">Valor manifesto</label>
                                                <input type="text" value="<?=  $destinacao['valor_manifesto'] ?>" name="valor_manifesto" class="form-control">
                                            </div>
											
											<div class="form-group">
                                                <label for="inputEmail">Observação</label>
                                                <input type="text" value="<?=  $destinacao['observacao'] ?>" name="observacao" class="form-control">
                                            </div>
											
											<div class="form-group ">
                                                <label for="exampleFormControlSelect1">Gera Custo?</label>
													<select name="custo" class="form-control" id="exampleFormControlSelect1">
													  <option>Selecione</option>
													  <option <?= $destinacao['custo'] == 'SIM' ? 'selected' : '' ?> value="SIM">SIM</option>
													  <option <?= $destinacao['custo'] == 'NAO' ? 'selected' : '' ?> value="NÃO">NÃO</option>
													</select>
                                            </div>
											
											
                                          
											<button type="submit" class="btn btn-primary">Cadastrar</button>
                                        </form>
                                    </div>
									
									
                                   
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end basic form  -->
                        <!-- ============================================================== -->
                </div>
            </div>
            