<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_vendedores_petrofertil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('P_vendedores_petrofertil_model');
	}

	public function index()
	{

		$data['vendedores'] = $this->P_vendedores_petrofertil_model->recebe_vendedores();


		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/vendedores_petrofertil');
		$this->load->view('petrofertil/footer');

	}

	public function cadastra_vendedores()
	{
		$this->load->view('petrofertil/header');
		$this->load->view('petrofertil/formulario_vendedores_petrofertil');
		$this->load->view('petrofertil/footer');
	}

	public function saldo_vendedor()
	{

		$this->load->model('P_contas_pagar_model');
		$this->load->model('P_contas_receber_model');
		$this->load->model('P_contas_model');
		$this->load->model('P_cheques_model');


		$data['cheques'] = $this->P_cheques_model->recebe_cheques_compensar();


		// Obter valores do post
		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		$nome_decoded = $this->uri->segment(3);

		$nome_vendedor = str_replace('-', ' ', urldecode($nome_decoded));

		// Verificar e definir valores padrão se necessário
		if (empty($data_inicial)) {
			$data_inicial = date('Y-m-d', strtotime('-60 days'));
		}

		if (empty($data_final)) {
			$data_final = date('Y-m-d', strtotime('+60 days'));
		}

		// Atribuir valores ao array $data
		$data['data_inicial'] = $data_inicial;
		$data['data_final'] = $data_final;


		$data['pagina'] = $this->uri->segment(3);

		$bancos = $this->P_contas_model->recebe_contas();

		$data['vendedor'] = $this->P_vendedores_petrofertil_model->recebe_vendedor_nome_individual($nome_vendedor);

		$data['contas'] = $this->P_contas_pagar_model->recebe_contas_filtrada_data_nome($data_inicial, $data_final, $nome_vendedor);

		$data['contas_receber'] = $this->P_contas_receber_model->recebe_contas_data_nome($data_inicial, $data_final, $nome_vendedor);

		$saldo = 0;
		foreach ($bancos as $b) {
			$saldo = $saldo + $b['saldo'];
		}

		$data['saldo'] = $saldo;

		$data['bancos'] = $bancos;


		$contas = $data['contas'];

		$pagar = 0;

		foreach ($contas as $c) {

			if ($c['status'] == 0) {

				$pagar = $pagar + $c['valor'];
			}

		}

		$contas_receber = $data['contas_receber'];

		$receber = 0;

		foreach ($contas_receber as $cb) {

			if ($cb['status'] == 0) {

				$receber = $receber + $cb['valor'];
			}

		}

		$data['pagar_total'] = $pagar;
		$data['receber_total'] = $receber;
		$data['previsao_caixa'] = $saldo - $pagar;

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/contas_pagar_vendedor');
		$this->load->view('petrofertil/footer');

	}


	public function edita_vendedor()
	{

		$id = $this->uri->segment(3);

		$data['vendedor'] = $this->P_vendedores_petrofertil_model->recebe_vendedor($id);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_vendedores_petrofertil');
		$this->load->view('petrofertil/footer');

	}

	public function insere_vendedor()
	{

		$id = $this->input->post('id');

		$dados['nome'] = $this->input->post('nome');
		$dados['email'] = $this->input->post('email');
		$dados['telefone'] = $this->input->post('telefone');
		$dados['nome_conta'] = $this->input->post('nome_conta');
		$dados['cpf'] = $this->input->post('cpf');
		$dados['conta'] = $this->input->post('conta');
		$dados['agencia'] = $this->input->post('agencia');

		if ($id != '') {
			$this->P_vendedores_petrofertil_model->atualiza_vendedor($dados, $id);
			redirect('P_vendedores_petrofertil');

		} else {
			$this->P_vendedores_petrofertil_model->cadastrar_vendedor($dados);
			redirect('P_vendedores_petrofertil');
		}

	}

	public function recebe_vendedores_nome()
	{
		$vendedores = $this->P_vendedores_petrofertil_model->recebe_vendedor_nome();

		echo json_encode($vendedores); // Retorna os dados em formato JSON
	}

	public function deleta_vendedor()
	{

		$id = $this->uri->segment(3);

		$this->P_vendedores_petrofertil_model->deleta_vendedor($id);

		redirect("P_vendedores_petrofertil");
	}
}
