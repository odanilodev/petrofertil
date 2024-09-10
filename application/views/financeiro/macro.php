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
			<div class="block-header col-md-3">
				<h2>GRUPOS MACRO</h2>
			</div>
			<div class="col-md-9" style="margin-bottom: 12px; margin-top: -8px" align="right">
				<a href="<?= base_url('F_clientes/formulario') ?>"><span type="button" class="btn bg-green waves-effect">CADASTRAR CLIENTE</span></a>
			</div>
		</div>

		<?php foreach ($macros as $m) { ?>

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<a href="<?= base_url('F_macro/exibir_macro/') . $m['id'] ?>">
					<div class="info-box hover-expand-effect">
						<div class="icon bg-green">
							<i class="material-icons">attach_money</i>
						</div>
						<div class="content">
							<div style="margin-top: 20px; font-size: 19px;" class="text pt-4"><?= $m['nome']; ?></div>
						</div>
					</div>
				</a>
			</div>

		<?php } ?>


	</div>
</section>