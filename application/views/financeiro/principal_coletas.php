<?php

$status = $this->session->userdata('usuario');

if ($status != "logado") {

	redirect('financeiro/verifica_login');
}

$usuario = $this->session->userdata('login');

$nome_usuario = $this->session->userdata('nome_usuario');


?>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="block-header col-md-2">
				<img class="img-responsive" src="<?= base_url('assets/img/logo_new.png') ?>">
			</div>
		</div>

		<div class="row">

			<div class="col-md-3">
				<div style="height: 240px;" class="card">
					<div class="header">
						<h2>
							<i class="material-icons">person_outline</i>Clientes<small>Gestão e acompanhamento</small>
						</h2>

					</div>
					<div class="body">
						Painel de visualização e pesquissa dos clientes e geradores de resíduos.</br></br>
						<a href="<?= base_url('F_clientes_reciclagem/inicio')?>"><button type="button" class="btn btn-default waves-effect">ACESSAR</button></a>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div style="height: 240px;" class="card">
					<div class="header">
						<h2>
							<i class="material-icons">perm_contact_calendar</i> Atendimentos <small>Registros e movimentações</small>
						</h2>

					</div>
					<div class="body">
						Painel de visualização e controle das solicitações e registros de atendimento.</br></br>
						<button type="button" class="btn btn-default waves-effect">ACESSAR</button>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div style="height: 240px;" class="card">
					<div class="header">
						<h2>
							<i class="material-icons">map</i> Rotas <small>Logística e operação</small>
						</h2>

					</div>
					<div class="body">
						Painel de visualização e controle das operações e rotas da empresa.</br></br>
						<button type="button" class="btn btn-default waves-effect">ACESSAR</button>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div style="height: 240px;" class="card">
					<div class="header">
						<h2>
							<i class="material-icons">assessment</i> Relatorios <small>Gerenciamento e relatórios</small>
						</h2>
					</div>
					<div class="body">
						Informações de uso, análise e relatórios do sistema.</br></br>
						<button type="button" class="btn btn-default waves-effect">ACESSAR</button>
					</div>
				</div>
			</div>



</section>