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
                <h2>TABELA DE DOCUMENTOS</h2>
            </div>

            <?php if($usuario == 'fernanda@petroecol.com.br' or $usuario == 'reciclagem@petroecol.com.br'){ ?>
				<div class="col-md-12" style="margin-bottom: 12px; margin-top: -8px" align="right">
					
					<a style="margin-left: 5px" href="<?= base_url('F_motoristas/cadastrar_documentos/'.$motorista['id']) ?>"><span type="button" class="btn bg-green waves-effect">CADASTRO</span></a>
				</div>
				<? }  ?>
            <!-- Basic Example -->
            <div class="row clearfix">
              
				
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DOCUMENTOS DE <?= strtoupper($motorista['nome']) ?>
                            </h2>
                           
                        </div>
                        <div class="body">
                            <div class="list-group">
                                <a href="<?= base_url('F_motoristas/download_cpf/').$motorista['cpf'] ?>" class="list-group-item">
                                    <span class="badge <?= $motorista['cpf'] != '' ? 'bg-green' : 'bg-red' ?>"><?= $motorista['cpf'] != '' ? 'Disponível' : 'Indisponível' ?></span><i style="font-size: 16px;" class="material-icons">cloud_download</i> CPF
                                </a>
                                <a href="<?= base_url('F_motoristas/download_aso/').$motorista['aso'] ?>" class="list-group-item">
                                    <span class="badge <?= $motorista['aso'] != '' ? 'bg-green' : 'bg-red' ?>"><?= $motorista['aso'] != '' ? 'Disponível' : 'Indisponível' ?></span><i style="font-size: 16px;" class="material-icons">cloud_download</i> ASO
                                </a>
                                <a href="<?= base_url('F_motoristas/download_epi/').$motorista['epi'] ?>" class="list-group-item">
                                    <span class="badge <?= $motorista['epi'] != '' ? 'bg-green' : 'bg-red' ?>"><?= $motorista['epi'] != '' ? 'Disponível' : 'Indisponível' ?></span><i style="font-size: 16px;" class="material-icons">cloud_download</i> Ficha EPI
                                </a>
                                <a href="<?= base_url('F_motoristas/download_registro/').$motorista['registro'] ?>" class="list-group-item">
                                    <span class="badge <?= $motorista['registro'] != '' ? 'bg-green' : 'bg-red' ?>"><?= $motorista['registro'] != '' ? 'Disponível' : 'Indisponível' ?></span><i style="font-size: 16px;" class="material-icons">cloud_download</i> Ficha Registro
                                </a>
                                <a href="<?= base_url('F_motoristas/download_carteira_trabalho/').$motorista['carteira_trabalho'] ?>" class="list-group-item">
                                    <span class="badge <?= $motorista['carteira_trabalho'] != '' ? 'bg-green' : 'bg-red' ?>"><?= $motorista['carteira_trabalho'] != '' ? 'Disponível' : 'Indisponível' ?></span><i style="font-size: 16px;" class="material-icons">cloud_download</i> Carteira de Trabalho
                                </a>
                                <a href="<?= base_url('F_motoristas/download_carteira_vacinacao/').$motorista['carteira_vacinacao'] ?>" class="list-group-item">
                                    <span class="badge <?= $motorista['carteira_vacinacao'] != '' ? 'bg-green' : 'bg-red' ?>"><?= $motorista['carteira_vacinacao'] != '' ? 'Disponível' : 'Indisponível' ?></span><i style="font-size: 16px;" class="material-icons">cloud_download</i> Carteira Vacinação
                                </a>
                                <a href="<?= base_url('F_motoristas/download_certificados/').$motorista['certificados'] ?>" class="list-group-item">
                                    <span class="badge <?= $motorista['certificados'] != '' ? 'bg-green' : 'bg-red' ?>"><?= $motorista['certificados'] != '' ? 'Disponível' : 'Indisponível' ?></span><i style="font-size: 16px;" class="material-icons">cloud_download</i> Certificados
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Example -->
            <!-- Colored Card - With Loading -->
	</section>