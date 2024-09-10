<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_produtos_reciclagem extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('F_produtos_reciclagem_model');
	}

	public function inicio()
	{
		$this->load->model('F_venda_reciclagem_model');

		$data['produtos'] = $this->F_produtos_reciclagem_model->recebe_produtos();

		$this->F_venda_reciclagem_model->reseta_tabela_venda_produtos();


		
		$vendas = $this->F_venda_reciclagem_model->recebe_vendas();

		foreach ($vendas as $v) {


			$data_venda = $v['data_venda'];
			$comprador = $v['comprador'];

			$produto = json_decode($v['produto'], true);
			$unidade_peso = json_decode($v['unidade_peso'], true);
			$valor_venda = json_decode($v['valor_venda'], true);
			$valor_total = json_decode($v['valor_total'], true);




			for ($i = 0; $i < count($produto); $i++) {

				$dados['data_venda'] = $data_venda;
				$dados['comprador'] = $comprador;

				$dados['produto'] = $produto[$i];
				$dados['unidade_peso'] = $unidade_peso[$i];
				$dados['valor_venda'] = $valor_venda[$i];
				$dados['valor_total'] = $valor_total[$i];

				$this->F_venda_reciclagem_model->cadastrar_produto_individual($dados);
			}
		}

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/produtos_reciclagem');
		$this->load->view('financeiro/footer');
	}


	public function formulario_cadastro()
	{
		$id = $this->uri->segment(3);

		$data['produto'] = $this->F_produtos_reciclagem_model->recebe_produto($id);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_produto_reciclagem');
		$this->load->view('financeiro/footer');
	}

	public function cadastrar_produto_reciclagem()
	{

		$id = $this->input->post('id');

		$dados['nome'] = strtoupper($this->input->post('nome'));


		if ($id != '') {

			$this->F_produtos_reciclagem_model->edita_produto($dados, $id);
		} else {

			$this->F_produtos_reciclagem_model->cadastrar_produto($dados);
		}

		redirect('F_produtos_reciclagem/inicio');
	}

	public function vendas_produtos()
	{
		$data['venda'] = $this->F_produtos_reciclagem_model->recebe_produtos();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/produtos_reciclagem');
		$this->load->view('financeiro/footer');
	}

	public function ver_vendas_geral_produto()
	{
		$this->load->model('F_produtos_reciclagem_model');

		$data['data_inicial'] = date('Y/m/01');
		$data['data_final'] = date('Y/m/d');

		$data['vendas'] = $this->F_produtos_reciclagem_model->recebe_produtos_geral($data['data_inicial'], $data['data_final']);

		$data['produtos'] = $this->F_produtos_reciclagem_model->recebe_produtos();




		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/produtos_reciclagem_geral');
		$this->load->view('financeiro/footer');
	}


	public function ver_vendas_filtrada_produto()
	{
		$this->load->model('F_produtos_reciclagem_model');

		$data['data_inicial'] = $this->input->post('data_inicial');
		$data['data_final'] =	$data['data_final'] = $this->input->post('data_final');

		$data['vendas'] = $this->F_produtos_reciclagem_model->recebe_produtos_geral($data['data_inicial'], $data['data_final']);

		$data['produtos'] = $this->F_produtos_reciclagem_model->recebe_produtos();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/produtos_reciclagem_geral');
		$this->load->view('financeiro/footer');
	}


	public function edita_produto()
	{
		$id = $this->uri->segment(3);

		$data['producao'] = $this->F_producao_model->recebe_producao_id($id);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_edita_producao_reciclagem');
		$this->load->view('financeiro/footer');
	}


	public function deleta_produto()
	{
		$id = $this->uri->segment(3);

		$this->F_produtos_reciclagem_model->deleta_produto($id);

		redirect('F_produtos_reciclagem/inicio');
	}
}
