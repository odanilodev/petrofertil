<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_prestadores_servico extends CI_Controller
{


	public function index()
	{
		$this->load->model('P_prestadores_servico_model');

		$data['prestadores'] = $this->P_prestadores_servico_model->recebe_prestadores();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/prestadores_servico');
		$this->load->view('petrofertil/footer');
	}


	public function formulario_prestadores()
	{
		$id = $this->uri->segment(3);

		$this->load->model('P_prestadores_servico_model');

		$data['prestador'] = $this->P_prestadores_servico_model->recebe_prestador($id);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_prestador');
		$this->load->view('petrofertil/footer');
	}


	public function cadastra_prestador()
	{

		$this->load->model('P_prestadores_servico_model');

		$id = $this->input->post('id');

		$dados['nome'] = $this->input->post('nome');
		$dados['telefone'] = $this->input->post('telefone');
		$dados['documento'] = $this->input->post('documento');
		$dados['endereco'] = $this->input->post('endereco');
		$dados['cidade'] = $this->input->post('cidade');
		$dados['estado'] = $this->input->post('estado');
		$dados['banco'] = $this->input->post('banco');
		$dados['agencia'] = $this->input->post('agencia');
		$dados['conta'] = $this->input->post('conta');
		$dados['pix'] = $this->input->post('pix');


		if ($id > 0) {
			$this->P_prestadores_servico_model->edita_prestador($dados, $id);
		} else {
			$this->P_prestadores_servico_model->inserir_prestador($dados);
		}

		redirect("P_prestadores_servico");

	}

	public function deleta_prestador()
	{

		$id = $this->uri->segment(3);

		$this->load->model('P_prestadores_servico_model');

		$this->P_prestadores_servico_model->deleta_prestador($id);

		redirect('P_prestadores_servico');
	}

	public function recebe_prestadores_nome()
	{

		$this->load->model('P_prestadores_servico_model');

		$prestadores = $this->P_prestadores_servico_model->recebe_prestadores_nome();

		echo json_encode($prestadores);
	}


}
