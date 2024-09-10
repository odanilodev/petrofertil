<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_fluxo extends CI_Controller
{

	
	public function inicio()
	{
		$this->load->model('F_fluxo_model');
		$this->load->model('F_caixa_model');
		$this->load->model('F_contas_model');
		$this->load->model('F_contas_receber_model');

		$data['pagina'] = $this->uri->segment(3);
		$data['fluxo'] = $this->F_fluxo_model->recebe_fluxo();
		$data['caixa'] = $this->F_caixa_model->recebe_caixa();
		$data['caixa_reciclagem'] = $this->F_caixa_model->recebe_caixa_reciclagem();
		$data['contas'] = $this->F_contas_model->recebe_contas();
		$data['contas_receber'] = $this->F_contas_receber_model->recebe_contas();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/fluxo');
		$this->load->view('financeiro/footer');
	}

	public function fluxo_detalhado()
	{
		$this->load->model('F_fluxo_model');
		$this->load->model('F_caixa_model');
		$this->load->model('F_contas_model');
		$this->load->model('F_contas_receber_model');

		$data['pagina'] = $this->uri->segment(3);
		$data['fluxo'] = $this->F_fluxo_model->recebe_fluxo();
		$data['caixa'] = $this->F_caixa_model->recebe_caixa();
		$data['caixa_reciclagem'] = $this->F_caixa_model->recebe_caixa_reciclagem();
		$data['contas'] = $this->F_contas_model->recebe_contas();
		$data['contas_receber'] = $this->F_contas_receber_model->recebe_contas();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/fluxo_detalhado');
		$this->load->view('financeiro/footer');
	}


	public function lancar_entrada()
	{
		$this->load->model('F_fluxo_model');
		$this->load->model('F_fornecedores_model');
		
		$data['fornecedores'] = $this->F_fornecedores_model->recebe_fornecedores();	

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_fluxo_entrada');
		$this->load->view('financeiro/footer');
	}


	public function ver_insumo()
	{
		$this->load->model('F_fluxo_model');

		$id = $this->uri->segment(3);

		$data['insumo'] = $this->F_fluxo_model->seleciona_fluxo($id);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/visualizar_insumo');
		$this->load->view('financeiro/footer');
	}


	public function lancar_saida()
	{

		$this->load->model('F_fluxo_model');
		$this->load->model('F_macro_model');
		$this->load->model('F_micro_model');
		$this->load->model('F_fornecedores_model');

		$data['fornecedores'] = $this->F_fornecedores_model->recebe_fornecedores();

		$data['macros'] = $this->F_macro_model->recebe_macros();

		$data['micros'] = $this->F_micro_model->recebe_micros();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_fluxo_saida');
		$this->load->view('financeiro/footer');
	}



	public function inserir_entrada()
	{

		$this->load->model('F_fluxo_model');
		$this->load->model('F_caixa_model');


		$id_edita = $this->input->post('edita');

		$dados['data_registro'] = date('Y-m-d H:i:s');
		$dados['data_fluxo'] = $this->input->post('data');
		$dados['empresa'] = $this->input->post('empresa');
		$dados['valor'] = $this->input->post('valor');
		$dados['despesa'] = 'entrada';
		$dados['pago_recebido'] = $this->input->post('pago_recebido');
		$dados['observacao'] = $this->input->post('observacao');


		if ($dados['empresa'] == 'Óleo') {

			$caixa = $this->F_caixa_model->recebe_caixa();
		} else {

			$caixa = $this->F_caixa_model->recebe_caixa_reciclagem();
		}


		$data['caixa'] = $caixa['caixa'] + $dados['valor'];



		if ($dados['empresa'] == 'Óleo') {

			$this->F_caixa_model->atualiza_caixa($data);
		} else {

			$this->F_caixa_model->atualiza_caixa_reciclagem($data);
		}

		if ($id_edita) {

			$this->F_fluxo_model->atualiza_entrada_fluxo($id_edita, $dados);
		} else {


			$this->F_fluxo_model->inserir_entrada_fluxo($dados);
		}


		redirect('F_fluxo/inicio');
	}

	public function inserir_saida()
	{

		$this->load->model('F_fluxo_model');
		$this->load->model('F_caixa_model');
		$this->load->model('F_micro_model');

		//$data['micros'] = $this->F_micro_model->recebe_micros();

		$id = $this->input->post('id');
		$id_edita = $this->input->post('edita');


		$dados['data_registro'] = date('Y-m-d H:i:s');
		$dados['data_fluxo'] = $this->input->post('data');
		$dados['data_emissao'] = $this->input->post('data_emissao');
		$dados['empresa'] = $this->input->post('empresa');
		$dados['valor'] = $this->input->post('valor');

		$dados['clientes'] = $this->input->post('clientes');
		$dados['alimentacao'] = $this->input->post('alimentacao');
		$dados['combustivel'] = $this->input->post('combustivel');
		$dados['estacionamento'] = $this->input->post('estacionamento');
		$dados['pedagio'] = $this->input->post('pedagio');
		$dados['detergente'] = $this->input->post('detergente');
		$dados['oleo'] = $this->input->post('oleo');
		$dados['outros'] = $this->input->post('outros');
		$dados['oque'] = $this->input->post('oque');

		$dados['pago_recebido'] = $this->input->post('pago_recebido');
		$dados['observacao_tipo'] = $this->input->post('observacao_tipo');

		$micro = $this->F_micro_model->recebe_micro($this->input->post('id_micro'));

		$dados['despesa'] = 'Saida';

		$dados['observacao'] = strtoupper($this->input->post('id_macro')) . ' > ' . $micro['nome'];


		if ($id != '') {


			$caixa = $this->F_caixa_model->recebe_caixa();


			$fluxo = $this->F_fluxo_model->seleciona_fluxo($id);


			if ($fluxo['empresa'] == 'Óleo') {

				$caixa = $this->F_caixa_model->recebe_caixa();
			} else {

				$caixa = $this->F_caixa_model->recebe_caixa_reciclagem();
			}

			if ($fluxo['despesa'] == 'entrada' and $fluxo['empresa'] == 'Óleo') {

				$data['caixa'] = $caixa['caixa'] - $fluxo['valor'];

				$this->F_caixa_model->atualiza_caixa($data);
			}

			if ($fluxo['despesa'] != 'entrada' and $fluxo['empresa'] == 'Óleo') {

				$data['caixa'] = $caixa['caixa'] + $fluxo['valor'];

				$this->F_caixa_model->atualiza_caixa($data);
			}

			if ($fluxo['despesa'] == 'entrada' and $fluxo['empresa'] == 'Reciclagem') {

				$data['caixa'] = $caixa['caixa'] - $fluxo['valor'];

				$this->F_caixa_model->atualiza_caixa_reciclagem($data);
			}

			if ($fluxo['despesa'] != 'entrada' and $fluxo['empresa'] == 'Reciclagem') {

				$data['caixa'] = $caixa['caixa'] + $fluxo['valor'];

				$this->F_caixa_model->atualiza_caixa_reciclagem($data);
			}

			if ($id_edita >= 0) {

				$this->F_fluxo_model->atualiza_entrada_fluxo($id, $dados);
			} else {
				$this->F_fluxo_model->deleta_fluxo($id);
			}
		}

		if ($dados['empresa'] == 'Óleo') {

			$caixa = $this->F_caixa_model->recebe_caixa();
		} else {

			$caixa = $this->F_caixa_model->recebe_caixa_reciclagem();
		}

		$data['caixa'] = $caixa['caixa'] - $dados['valor'];


		if ($dados['empresa'] == 'Óleo') {

			$this->F_caixa_model->atualiza_caixa($data);
		} else {

			$this->F_caixa_model->atualiza_caixa_reciclagem($data);
		}

		if ($id == '') {
			$this->F_fluxo_model->inserir_entrada_fluxo($dados);
		};



		redirect('F_fluxo/inicio');
	}



	public function filtra_fluxo_geral()
	{

		$this->load->model('F_caixa_model');

		$this->load->model('F_fluxo_model');

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		$empresa = $this->input->post('empresa');
		
		if($empresa == 'ambas'){

			$fluxo_geral = $this->F_fluxo_model->recebe_fluxo_nolimit('2022-12-01', $data_final);

		}else{

			$fluxo_geral = $this->F_fluxo_model->recebe_fluxo_nolimit_empresa('2022-12-01', $data_final, $empresa);

		}

		$previsao_reciclagem = -49322.92; 

		$previsao_oleo = 210615.20;


		foreach($fluxo_geral as $f){

			if($f['despesa'] == 'Saida' && $f['empresa'] == 'Reciclagem'){

				$previsao_reciclagem = $previsao_reciclagem - $f['valor'];

			}

			if($f['despesa'] == 'entrada' && $f['empresa'] == 'Reciclagem'){

				$previsao_reciclagem = $previsao_reciclagem + $f['valor'];

			}

			if($f['despesa'] == 'Saida' && $f['empresa'] == 'Óleo'){

				$previsao_oleo = $previsao_oleo - $f['valor'];
		
			}

			if($f['despesa'] == 'entrada' && $f['empresa'] == 'Óleo'){

				$previsao_oleo = $previsao_oleo + $f['valor'];

			}
			
		}


		if ($data_final == '' or $data_inicial == '') {

			redirect('F_fluxo/inicio/erro');
		}


		if($empresa == 'ambas'){

			$data['fluxo'] = $this->F_fluxo_model->filtra_fluxo_geral($data_inicial, $data_final);

		}else{

			$data['fluxo'] = $this->F_fluxo_model->filtra_fluxo_geral_empresa($data_inicial, $data_final, $empresa);

		}

		if (empty($data['fluxo'])) {

			redirect('F_fluxo/inicio/erro');
		};


		$data['caixa'] = $this->F_caixa_model->recebe_caixa();
		$data['caixa_reciclagem'] = $this->F_caixa_model->recebe_caixa_reciclagem();

		$fluxos = $data['fluxo'];

		$gastos = 0;

		$entrada = 0;

		foreach ($fluxos as $c) {

			if ($c['despesa'] != 'entrada') {
				$gastos = $gastos + $c['valor'];
			} else {
				$entrada = $entrada + $c['valor'];
			}
		}

		$data['entrada'] = $entrada;

		$data['gastos'] = $gastos;

		$data['lucro'] = $entrada - $gastos;
		
		
		$data['previsao_reciclagem'] = $previsao_reciclagem;
		$data['previsao_oleo'] = $previsao_oleo;

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/fluxo');
		$this->load->view('financeiro/footer');
	}


	public function deleta_fluxo()
	{

		$this->load->model('F_fluxo_model');

		$id = $this->uri->segment(3);

		$this->F_fluxo_model->deleta_fluxo($id);

		redirect('F_fluxo/inicio/7');
	}

	public function deleta_caixa_fluxo()
	{

		$this->load->model('F_fluxo_model');
		$this->load->model('F_caixa_model');

		$id = $this->uri->segment(3);

		$caixa = $this->F_caixa_model->recebe_caixa();

		$fluxo = $this->F_fluxo_model->seleciona_fluxo($id);


		if ($fluxo['empresa'] == 'Óleo') {

			$caixa = $this->F_caixa_model->recebe_caixa();
		} else {

			$caixa = $this->F_caixa_model->recebe_caixa_reciclagem();
		}


		if ($fluxo['despesa'] == 'entrada' and $fluxo['empresa'] == 'Óleo') {

			$data['caixa'] = $caixa['caixa'] - $fluxo['valor'];


			$this->F_caixa_model->atualiza_caixa($data);
		}

		if ($fluxo['despesa'] != 'entrada' and $fluxo['empresa'] == 'Óleo') {

			$data['caixa'] = $caixa['caixa'] + $fluxo['valor'];

			$this->F_caixa_model->atualiza_caixa($data);
		}

		if ($fluxo['despesa'] == 'entrada' and $fluxo['empresa'] == 'Reciclagem') {


			$data['caixa'] = $caixa['caixa'] - $fluxo['valor'];

			$this->F_caixa_model->atualiza_caixa_reciclagem($data);
		}

		if ($fluxo['despesa'] != 'entrada' and $fluxo['empresa'] == 'Reciclagem') {

			$data['caixa'] = $caixa['caixa'] + $fluxo['valor'];

			$this->F_caixa_model->atualiza_caixa_reciclagem($data);
		}



		$this->F_fluxo_model->deleta_fluxo($id);

		redirect('F_fluxo/inicio/7');
	}



	public function edita_oleo()
	{

		$this->load->model('F_fluxo_model');
		$this->load->model('F_caixa_model');
		$this->load->model('F_fornecedores_model');

		$data['fornecedores'] = $this->F_fornecedores_model->recebe_fornecedores();

		$id = $this->uri->segment(3);

		$caixa = $this->F_caixa_model->recebe_caixa();

		$data['fluxo'] = $this->F_fluxo_model->seleciona_fluxo($id);


		if ($data['fluxo']['despesa'] == 'entrada') {

			$this->load->view('financeiro/header', $data);
			$this->load->view('financeiro/formulario_fluxo_entrada');
			$this->load->view('financeiro/footer');
		} else {

			$this->load->model('F_macro_model');
			$this->load->model('F_micro_model');

			$data['macros'] = $this->F_macro_model->recebe_macros();

			$data['micros'] = $this->F_micro_model->recebe_micros();

			$this->load->view('financeiro/header', $data);
			$this->load->view('financeiro/formulario_fluxo_saida');
			$this->load->view('financeiro/footer');
		}
	}

	public function edita_reciclagem()
	{

		$this->load->model('F_fluxo_model');
		$this->load->model('F_caixa_model');

		$this->load->model('F_macro_model');
		$this->load->model('F_micro_model');
		$this->load->model('F_fornecedores_model');

		$data['fornecedores'] = $this->F_fornecedores_model->recebe_fornecedores();

		$data['macros'] = $this->F_macro_model->recebe_macros();

		$data['micros'] = $this->F_micro_model->recebe_micros();

		$id = $this->uri->segment(3);


		$caixa = $this->F_caixa_model->recebe_caixa();


		$data['fluxo'] = $this->F_fluxo_model->seleciona_fluxo($id);



		if ($data['fluxo']['despesa'] == 'entrada') {

			$this->load->view('financeiro/header', $data);
			$this->load->view('financeiro/formulario_fluxo_entrada');
			$this->load->view('financeiro/footer');
		} else {

			$this->load->view('financeiro/header', $data);
			$this->load->view('financeiro/formulario_fluxo_saida');
			$this->load->view('financeiro/footer');
		}
	}
}
