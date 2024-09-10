<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_transportadores extends CI_Controller
{


	public function index()
	{
		$this->load->model('P_transportadores_model');

		$data['transportadores'] = $this->P_transportadores_model->recebe_transportadores();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/transportadores');
		$this->load->view('petrofertil/footer');
	}

	public function ver_motorista()
	{

		$id = $this->uri->segment(3);

		$this->load->model('P_motoristas_model');

		$data['motorista'] = $this->P_motoristas_model->recebe_motorista($id);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/ver_motorista');
		$this->load->view('petrofertil/footer');
	}

	public function formulario_transportadores()
	{
		$id = $this->uri->segment(3);

		$this->load->model('P_transportadores_model');

		$data['transportador'] = $this->P_transportadores_model->recebe_transportador($id);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_transportador');
		$this->load->view('petrofertil/footer');
	}


	public function cadastra_transportador()
	{

		$this->load->model('P_transportadores_model');

		$id = $this->input->post('id');

		$dados['nome'] = $this->input->post('nome');
		$dados['telefone'] = $this->input->post('telefone');
		$dados['nome_responsavel'] = $this->input->post('nome_responsavel');
		$dados['prazo_pagamento'] = $this->input->post('prazo_pagamento');

		if ($id > 0) {
			$this->P_transportadores_model->edita_transportador($dados, $id);
		} else {
			$this->P_transportadores_model->inserir_transportador($dados);
		}

		redirect("p_transportadores");

	}

	public function deleta_transportador()
	{

		$id = $this->uri->segment(3);

		$this->load->model('P_transportadores_model');

		$this->P_transportadores_model->deleta_transportador($id);

		return ('P_transportadores');
	}

	public function geral_transporadores()
	{

		$this->load->model('P_contas_pagar_model');
		$this->load->model('P_contas_receber_model');
		$this->load->model('P_contas_model');
		$this->load->model('P_cheques_model');

		$data['contas'] = $this->P_contas_pagar_model->recebe_contas();

		$data['cheques'] = $this->P_cheques_model->recebe_cheques_compensar();


		// Obter valores do post
		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		$status = $this->input->post('status');
		$nome_decoded = $this->uri->segment(3);

		if (!$nome_decoded) {
			$nome_transportador = $this->input->post('nome_transportador');
		} else {
			$nome_transportador = str_replace('-', ' ', urldecode($nome_decoded));
		}

		// Verificar e definir valores padrão se necessário
		if (empty($data_inicial)) {
			$data_inicial = date('Y-m-d', strtotime('-60 days'));
		}

		if (empty($data_final)) {
			$data_final = date('Y-m-d');
		}

		// Atribuir valores ao array $data
		$data['data_inicial'] = $data_inicial;
		$data['data_final'] = $data_final;

		$data['pagina'] = $this->uri->segment(3);

		$bancos = $this->P_contas_model->recebe_contas();

		$data['nome_transportador'] = $nome_transportador;

		if ($status) {
			$data['contas'] = $this->P_contas_pagar_model->recebe_contas_filtrada_data_nome_status($data_inicial, $data_final, $nome_transportador, $status);
		} else {
			$data['contas'] = $this->P_contas_pagar_model->recebe_contas_filtrada_data_nome($data_inicial, $data_final, $nome_transportador);
		}

		$data['contas_receber'] = $this->P_contas_receber_model->recebe_contas_data_nome($data_inicial, $data_final, $nome_transportador);

		$saldo = 0;
		foreach ($bancos as $b) {
			$saldo = $saldo + $b['saldo'];
		}

		$data['saldo'] = $saldo;

		// Calcular o total a pagar
		$contas_pagar = $data['contas'];
		$pagar = 0;

		foreach ($contas_pagar as $c) {
			if ($c['status'] == 0) {
				$pagar = $pagar + $c['valor'];
			}
		}

		$data['pagar_total'] = $pagar;
		$data['previsao_caixa'] = $saldo - $pagar;

		// Calcular o total a receber
		$contas_receber = $data['contas_receber'];
		$receber = 0;

		foreach ($contas_receber as $cr) {
			// Verificar o status desejado (você pode ajustar conforme necessário)
			if ($cr['status'] == 0) {
				$receber = $receber + $cr['valor'];
			}
		}

		$data['receber_total'] = $receber;
		$data['saldo_disponivel'] = $saldo + $receber;
		$data['bancos'] = $bancos;

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/contas_pagar_transportador');
		$this->load->view('petrofertil/footer');

	}

	public function recebe_transportadores_nome()
	{

		$this->load->model('p_transportadores_model');

		$transportadores = $this->p_transportadores_model->recebe_transportadores_nome();

		echo json_encode($transportadores);

	}

}
