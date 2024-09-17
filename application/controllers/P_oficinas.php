<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_oficinas extends CI_Controller
{


	public function index()
	{
		$this->load->model('P_oficinas_model');

		$data['oficinas'] = $this->P_oficinas_model->recebe_oficinas();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/oficinas');
		$this->load->view('petrofertil/footer');
	}


	public function formulario_oficinas()
	{
		$id = $this->uri->segment(3);

		$this->load->model('P_oficinas_model');

		$data['oficina'] = $this->P_oficinas_model->recebe_oficina($id);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_oficinas');
		$this->load->view('petrofertil/footer');
	}


	public function cadastra_oficina()
	{

		$this->load->model('P_oficinas_model');

		$id = $this->input->post('id');

		$dados['nome'] = $this->input->post('nome');
		$dados['telefone'] = $this->input->post('telefone');
		$dados['endereco'] = $this->input->post('endereco');
		$dados['contato'] = $this->input->post('contato');


		if ($id > 0) {
			$this->P_oficinas_model->edita_oficina($dados, $id);
		} else {
			$this->P_oficinas_model->inserir_oficina($dados);
		}

		redirect("P_oficinas");

	}

	public function deleta_oficina()
	{

		$id = $this->uri->segment(3);

		$this->load->model('P_oficinas_model');

		$this->P_oficinas_model->deleta_oficina($id);

		redirect('P_oficinas');
	}

	public function recebe_prestadores_nome()
	{

		$this->load->model('P_prestadores_servico_model');

		$prestadores = $this->P_prestadores_servico_model->recebe_prestadores_nome();

		echo json_encode($prestadores);
	}


}
