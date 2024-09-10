<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_produtos extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('P_produtos_model');
	}

	public function index()
	{
		$data['produtos'] = $this->P_produtos_model->recebe_produtos();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/produtos');
		$this->load->view('petrofertil/footer');
	}

	public function cadastra_produtos()
	{
		$this->load->view('petrofertil/header');
		$this->load->view('petrofertil/formulario_produto');
		$this->load->view('petrofertil/footer');
	}

	public function edita_produto()
	{
		$id = $this->uri->segment(3);

		$data['produto'] = $this->P_produtos_model->recebe_produto_id($id);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_produto');
		$this->load->view('petrofertil/footer');

	}

	public function insere_produto()
	{
		$id = $this->input->post('id');
		$dados['nome'] = $this->input->post('nome');
		$dados['materia_prima'] = json_encode($this->input->post('materia_prima'));
		$dados['observacao'] = $this->input->post('observacao');

		// Verificar se o produto já existe
		$produto_existente = $this->P_produtos_model->verifica_produto_pai($dados['nome']);

		if ($produto_existente && !$id) {
			$this->session->set_flashdata('erro', 'Produto com esse nome já existe!');
			redirect('P_produtos/index/');
		} else {
			if ($id != '') {
				$this->P_produtos_model->atualiza_produto($dados, $id);
			} else {
				$this->P_produtos_model->inserir_produto($dados);
			}
			redirect('P_produtos');
		}
	}

	public function deleta_produto()
	{

		$id = $this->uri->segment(3);

		$this->P_produtos_model->deleta_produto($id);

		redirect("P_produtos");
	}
}