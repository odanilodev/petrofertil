<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_contas extends CI_Controller
{

	public function inicio()
	{

		$this->load->model('F_caixa_model');

		$this->load->model('F_contas_model');

		$data['pagina'] = $this->uri->segment(3);

		$data['caixa'] = $this->F_caixa_model->recebe_caixa();

		$data['caixa_reciclagem'] = $this->F_caixa_model->recebe_caixa_reciclagem();

		$data['contribuintes'] = $this->F_contas_model->recebe_contribuintes();
		$data['contas'] = $this->F_contas_model->recebe_contas();

		$contas = $data['contas'];
		$despesas = 0;

		foreach ($contas as $c) {
			if ($c['status'] == 0 && is_numeric($c['valor'])) {
				$despesas += $c['valor'];
			}
		}		

		$data['despesa_total'] = $despesas;

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/contas');
		$this->load->view('financeiro/footer');
	}

	public function filtra_contas_pagar()
	{

		$this->load->model('F_caixa_model');

		$this->load->model('F_contas_model');

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		$status = $this->input->post('status');

		$data['data_inicial'] = $data_inicial;
		$data['data_final'] = $data_final;
		$data['status'] = $status;


		$data['pagina'] = $this->uri->segment(3);

		$data['caixa'] = $this->F_caixa_model->recebe_caixa();
		
		$data['caixa_reciclagem'] = $this->F_caixa_model->recebe_caixa_reciclagem();

		$data['contribuintes'] = $this->F_contas_model->recebe_contribuintes();

		
		if($status == 2){

		$data['contas'] = $this->F_contas_model->recebe_contas_filtrada_data($data_inicial, $data_final);

		}else{

			$data['contas'] = $this->F_contas_model->recebe_contas_filtrada_data_status($data_inicial, $data_final, $status);

		}


		$contas = $data['contas'];
		$despesas = 0;

		foreach ($contas as $c) {

			if ($c['status'] == 0) {

				$despesas = $despesas + $c['valor'];
			}
		}

		$data['despesa_total'] = $despesas;

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/contas');
		$this->load->view('financeiro/footer');
	}


	public function cadastrar_contribuinte()
	{

		$this->load->view('financeiro/header');
		$this->load->view('financeiro/formulario_contribuintes');
		$this->load->view('financeiro/footer');
	}



	public function cadastrar_conta()
	{

		$this->load->model('F_contas_model');
		$this->load->model('F_macro_model');
		$this->load->model('F_micro_model');


		$data['contribuintes'] = $this->F_contas_model->recebe_contribuintes();

		$data['macros'] = $this->F_macro_model->recebe_macros();

		$data['micros'] = $this->F_micro_model->recebe_micros();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_conta');
		$this->load->view('financeiro/footer');
	}

	public function editar_conta()
	{

		$this->load->model('F_contas_model');
		$this->load->model('F_macro_model');
		$this->load->model('F_micro_model');

		$id = $this->uri->segment(3);
		
		$data['conta'] = $this->F_contas_model->recebe_conta($id);

		$data['contribuintes'] = $this->F_contas_model->recebe_contribuintes();

		$data['macros'] = $this->F_macro_model->recebe_macros();

		$data['micros'] = $this->F_micro_model->recebe_micros();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_conta');
		$this->load->view('financeiro/footer');
	}

	public function visualizar_conta()
	{

		$this->load->model('F_contas_model');
		$this->load->model('F_macro_model');
		$this->load->model('F_micro_model');

		$id = $this->uri->segment(3);

		$data['contribuintes'] = $this->F_contas_model->recebe_contribuintes();

		$data['macros'] = $this->F_macro_model->recebe_macros();

		$data['micros'] = $this->F_micro_model->recebe_micros();

		$data['conta'] = $this->F_contas_model->recebe_conta($id);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/visualizar_conta_pagar');
		$this->load->view('financeiro/footer');
	}


	public function inserir_contribuintes()
	{

		$this->load->model('F_contas_model');

		$dados['nome'] = $this->input->post('nome');
		$dados['telefone'] = $this->input->post('telefone');
		$dados['cnpj'] = $this->input->post('cnpj');
		$dados['email'] = $this->input->post('email');

		$this->F_contas_model->inserir_contribuintes($dados);

		redirect('F_contas/inicio/8');
	}

	public function inserir_conta()
	{

		$this->load->model('F_contas_model');

		$dados['vencimento'] = $this->input->post('vencimento');
		$dados['data_emissao'] = $this->input->post('data_emissao');

		$id = $this->uri->segment(3);

		$dados['valor'] = $this->input->post('valor');
		$dados['despesa'] = $this->input->post('despesa');
		$dados['status'] = 0;
		$dados['recebido'] = $this->input->post('recebido');
		$dados['categoria'] = 0;
		$dados['observacao'] = $this->input->post('observacao');
		$dados['id_macro'] = $this->input->post('id_macro');
		$dados['id_micro'] = $this->input->post('id_micro');

		$dados['quantidade'] = $this->input->post('quantidade');

		$dados['clientes'] = $this->input->post('clientes');
		$dados['alimentacao'] = $this->input->post('alimentacao');
		$dados['combustivel'] = $this->input->post('combustivel');
		$dados['estacionamento'] = $this->input->post('estacionamento');
		$dados['pedagio'] = $this->input->post('pedagio');
		$dados['detergente'] = $this->input->post('detergente');
		$dados['oleo'] = $this->input->post('oleo');
		$dados['outros'] = $this->input->post('outros');
		$dados['oque'] = $this->input->post('oque');


		$contador = 0;
		if ($dados['quantidade'] == 'avista' or $dados['quantidade'] == null) {

			if(empty($id)){
				$this->F_contas_model->inserir_conta($dados);
			

			}else{
				$this->F_contas_model->atualiza_conta($dados, $id);

			}


		} else {


			for ($quantidade = $dados['quantidade']; $quantidade > $contador; $contador++) {

				if($contador == 0 ){
					$this->F_contas_model->inserir_conta($dados);
				}else{

					$dados['vencimento'] = date("Y-m-d", strtotime("+1 month", strtotime($dados['vencimento'])));

					$this->F_contas_model->inserir_conta($dados);
				}

			}
		}

		redirect('F_contas/inicio/8');


	}


	public function atualiza_status()
	{

		$this->load->model('F_contas_model');
		$this->load->model('F_caixa_model');
		$this->load->model('F_fluxo_model');
		$this->load->model('F_macro_model');
		$this->load->model('F_micro_model');

		$id = $this->uri->segment(3);

		$recebido = $this->uri->segment(4);

		$emissao = $this->uri->segment(5);

		$id_micro =  $this->uri->segment(6);

		$id_macro =  $this->uri->segment(7);

		$obs =  $this->uri->segment(8);

		
		if($this->uri->segment(9)){

			$obs =  $this->uri->segment(8);

			$data_pagamento =  $this->uri->segment(9);

			$valor_pago =  $this->uri->segment(10);

		}else{

			$data_pagamento =  $this->uri->segment(8);

			$valor_pago =  $this->uri->segment(9);

		}
	
		
		$macro = $this->F_macro_model->recebe_macro($id_macro);

		$micro= $this->F_micro_model->recebe_micro($id_micro);

		$observacao = $macro['nome'] . '>' . $micro['nome'];


		$conta = $this->F_contas_model->recebe_conta($id);

		$conta['valor_pago'] = $valor_pago;
		$conta['data_pagamento'] = $data_pagamento;

		$dados['data_fluxo'] = $data_pagamento;
		$dados['data_emissao'] = urldecode($emissao);

		$dados['empresa'] = $conta['despesa'];
		$dados['valor'] = $conta['valor_pago'];
		$dados['despesa'] = 'Saida';
		$dados['observacao'] = strtoupper($observacao);
		$dados['id_relacao'] = $conta['id'];
		$dados['observacao_tipo'] = urldecode($obs);

		
		$dados['clientes'] = $conta['clientes'];
		$dados['alimentacao'] = $conta['alimentacao'];
		$dados['combustivel'] = $conta['combustivel'];
		$dados['estacionamento'] = $conta['estacionamento'];
		$dados['pedagio'] = $conta['pedagio'];
		$dados['detergente'] = $conta['detergente'];
		$dados['oleo'] = $conta['oleo'];
		$dados['outros'] = $conta['outros'];
		$dados['oque'] = $conta['oque'];
		
		$conta['valor_pago'] = $valor_pago;

		$conta['data_pagamento'] = $data_pagamento;
		

		$dados['pago_recebido'] = urldecode($recebido);


		if ($dados['empresa'] == 'Óleo') {

			$caixa = $this->F_caixa_model->recebe_caixa();

		} elseif ($dados['empresa'] == 'Reciclagem') {

			$caixa = $this->F_caixa_model->recebe_caixa_reciclagem();
		}


		if ($conta['status'] == 0) {

			$conta['status'] = 1;

			$conta['data_pagamento'] = $data_pagamento;

			$data['caixa'] = $caixa['caixa'] - $conta['valor_pago'];

			


			$this->F_fluxo_model->inserir_entrada_fluxo($dados);
				
			

			
		} else {

			$conta['status'] = 0;

			$data['caixa'] = $caixa['caixa'] + $conta['valor_pago'];
		}


		if ($dados['empresa'] == 'Óleo') {

			$this->F_caixa_model->atualiza_caixa($data);
		} elseif ($dados['empresa'] == 'Reciclagem') {

			$this->F_caixa_model->atualiza_caixa_reciclagem($data);
		}


		$this->F_contas_model->atualiza_status($id, $conta);

		redirect('F_contas/inicio/8');
	}

	function pagar_varias() {

		$this->load->model('F_contas_model');
		$this->load->model('F_caixa_model');
		$this->load->model('F_fluxo_model');
		$this->load->model('F_macro_model');
		$this->load->model('F_micro_model');

		$ids = $this->input->post('ids-contas');
		$datafluxo = $this->input->post('data-fluxo');
		$valorecebido = $this->input->post('valor-recebido');

		$array_ids = explode(",", $ids);

		$posicao = 0; 
		foreach ($array_ids as $id) {
			
			$conta = $this->F_contas_model->recebe_conta($id);

			$macro = $this->F_macro_model->recebe_macro($conta['id_macro']);
			$micro= $this->F_micro_model->recebe_micro($conta['id_micro']);

			$conta['valor_pago'] = $valorecebido[$posicao];
			$conta['data_pagamento'] = $datafluxo[$posicao];
			
			$dados['data_fluxo'] =  $datafluxo[$posicao];
			$dados['data_emissao'] = $conta['data_emissao'];
			
			$dados['empresa'] = $conta['despesa'];
			$dados['valor'] = $conta['valor_pago'];
			$dados['despesa'] = 'Saida';
			$dados['observacao'] = $macro['nome'] . '>' . $micro['nome'];
			$dados['id_relacao'] = $conta['id'];
			$dados['data_registro'] = date('Y/m/d H:i:s');
			$dados['observacao_tipo'] = $conta['observacao'];
			$dados['clientes'] = $conta['clientes'];
			$dados['alimentacao'] = $conta['alimentacao'];
			$dados['combustivel'] = $conta['combustivel'];
			$dados['estacionamento'] = $conta['estacionamento'];
			$dados['pedagio'] = $conta['pedagio'];
			$dados['detergente'] = $conta['detergente'];
			$dados['oleo'] = $conta['oleo'];
			$dados['outros'] = $conta['outros'];
			$dados['oque'] = $conta['oque'];
			$dados['pago_recebido'] = $conta['recebido'];

			$this->F_fluxo_model->inserir_entrada_fluxo($dados);

			


			if ($dados['empresa'] == 'Óleo') {

				$caixa = $this->F_caixa_model->recebe_caixa();
	
			} elseif ($dados['empresa'] == 'Reciclagem') {
	
				$caixa = $this->F_caixa_model->recebe_caixa_reciclagem();
			}



			if ($conta['status'] == 0) {

				$conta['status'] = 1;
	
				$conta['data_pagamento'] = $datafluxo[$posicao];
	
				$data['caixa'] = $caixa['caixa'] - $conta['valor_pago'];
					
			} else {
	
				$conta['status'] = 0;
	
				$data['caixa'] = $caixa['caixa'] + $conta['valor_pago'];
			}
	
			if ($dados['empresa'] == 'Óleo') {
	
				$this->F_caixa_model->atualiza_caixa($data);

			} elseif ($dados['empresa'] == 'Reciclagem') {
	
				$this->F_caixa_model->atualiza_caixa_reciclagem($data);
			}
	
			$this->F_contas_model->atualiza_status($id, $conta);

			$posicao++;
		}
	
		redirect('F_contas/inicio/8');
		
	}


	public function deleta_status()
	{

		$this->load->model('F_contas_model');
		$this->load->model('F_caixa_model');
		$this->load->model('F_fluxo_model');


		$id = $this->uri->segment(3);

		$conta = $this->F_contas_model->recebe_conta($id);


		$dados['empresa'] = $conta['despesa'];
		$dados['valor'] = $conta['valor'];
		$dados['despesa'] = 'Saida';
		$dados['observacao'] = $conta['observacao'];
		$dados['id_relacao'] = $conta['id'];


		if ($dados['empresa'] == 'Óleo') {

			$caixa = $this->F_caixa_model->recebe_caixa();
		} elseif ($dados['empresa'] == 'Reciclagem') {

			$caixa = $this->F_caixa_model->recebe_caixa_reciclagem();
		}


		$id_relacao = $conta['id'];


		if ($conta['status'] == 0) {

			$conta['status'] = 1;

			$data['caixa'] = $caixa['caixa'] - $conta['valor'];


			$this->F_fluxo_model->inserir_entrada_fluxo($dados);
		} else {

			$conta['status'] = 0;

			$data['caixa'] = $caixa['caixa'] + $conta['valor'];


			$this->F_fluxo_model->deleta_fluxo_relacao($id_relacao);
		}


		if ($conta['despesa'] == 'Óleo') {
			$this->F_caixa_model->atualiza_caixa($data);
		} else {
			$this->F_caixa_model->atualiza_caixa_reciclagem($data);
		}


		$this->F_contas_model->atualiza_status($id, $conta);


		
		// Obter os dados do POST
		$dados = $_POST;

		// Construir a URL de redirecionamento com os parâmetros
		$url = $_SERVER['HTTP_REFERER'] . '?' . http_build_query($dados);

		// Redirecionar para a página anterior com os parâmetros
		header("Location: " . $url);
		exit();
	}




	public function deleta_contribuinte()
	{

		$this->load->model('F_contas_model');

		$id = $this->uri->segment(3);

		$this->F_contas_model->deleta_contribuinte($id);

		redirect('F_contas/inicio/8');
	}

	public function deleta_conta()
	{

		$this->load->model('F_contas_model');

		$id = $this->uri->segment(3);

		$this->F_contas_model->deleta_conta($id);

		redirect('F_contas/inicio/8');
	}
}
