
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
								<a href=""><button type="button" class="btn btn-secondary float-right">Voltar</button></div></a>
								
                                <h2 class="pageheader-title">Compra de Produtos</h2>
									
                                <div class="page-breadcrumb">

                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Estoque</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">PRODUTOS</li>
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
                                        <form enctype="multipart/form-data" action="<?= site_url('Produtos/cadastra_produto') ?>" method="post">
											
                                            <input type="hidden" value="" name="id_cliente" class="form-control" readonly>

                                            <div class="form-group">
                                                <label for="inputEmail">Data da Compra</label>
                                                <input type="date" value="" name="data_compra" class="form-control" >
                                            </div>

                                            <div class="form-group">
                                                <label for="inputEmail">Data Pagamento</label>
                                                <input type="date" value="" name="data_pago" class="form-control" >
                                            </div>
                                           
                                            <div class="form-group">
                                                <label >Setor responsavel</label> 
                                                <select name="setor" class="form-control">
                                                    <option selected>Selecione</option>
                                                    <option required value="Reciclagem">Reciclagem</option>
                                                    <option required value="Óleo">Óleo</option>
											    </select>
                                            </div>

                                             <div class="form-group">
                                                <label >Produto</label>
                                                <input type="text" value="" name="nome" class="form-control" >
                                            </div>
										
											
											<div class="form-group">
                                                <label >Quantidade</label>
                                                <input type="number" value="" name="quantidade"  class="form-control" >
                                            </div>

                                            
                                            <div class="form-group">
                                                <label>Fornecedor</label> 
                                                <select name="comprado" class="form-control">
                                                    <option selected>Selecione</option>
                                                    <?php foreach($fornecedores as $f){ ?>
                                                    <option required value="<?= $f['nome'] ?>"><?= $f['nome'] ?></option>
                                                    <?php } ?>
											    </select>
                                            </div>

                                            <div class="form-group">
                                                <label >Valor total pago</label>
                                                <input type="text" value="" name="valor"  class="form-control valor" >
                                            </div>

                                            <div class="form-group">
                                               
                                                <label>Grupos Macro</label>
                                               
                                                <select   required id="macros" name="id_macro" class="form-control macros show-tick">
                                                    <option>Selecione</option>
                                                    <?php foreach ($macros as $m) { ?>
                                                        <option data-url="<?= base_url("F_micro/recebe_micro") ?>" <?= $m['id'] == $conta['id_macro'] ? 'selected' : '' ?> data-id="<?= $m['id'] ?>" value="<?= $m['id'] ?>"><?= $m['nome'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                            <label>Grupos Micro</label>
                                                <select required name="id_micro" class="form-control show-tick micros">
                                                    <option>Selecione</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                            <label>Enviar ao contas a pagar?</label>
                                                <select required name="enviar" class="form-control">
                                                    <option value='sim'>SIM</option>
                                                    <option value='nao'>NÃO</option>
                                                </select>
                                            </div>

											
											<div class="form-group">
                                                <label >Observação</label>
                                                <input type="text" value="" name="observacao"  class="form-control" >
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
            
            <script>

            $('.valor').mask('###0.00', {
                    reverse: true
            });

            </script>