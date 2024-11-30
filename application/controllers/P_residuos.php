<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_residuos extends CI_Controller
{

	public function index()
	{
		$this->load->model('P_residuos_model');

		$data['residuos'] = $this->P_residuos_model->recebe_residuos();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/residuos');
		$this->load->view('petrofertil/footer');
	}


	public function formulario_residuos()
	{
		$id = $this->uri->segment(3);

		$this->load->model('P_residuos_model');

		$data['residuo'] = $this->P_residuos_model->recebe_residuo($id);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_residuo');
		$this->load->view('petrofertil/footer');
	}


	public function cadastra_residuo()
	{

		$this->load->model('P_residuos_model');

		$id = $this->input->post('id');

		$dados['nome'] = $this->input->post('nome');

		if ($id > 0) {
			$this->P_residuos_model->edita_residuo($dados, $id);
		} else {
			$this->P_residuos_model->inserir_residuos($dados);
		}

		redirect("P_residuos");

	}

	public function inativa_residuo()
	{

		$this->load->model('P_residuos_model');

		$id = $this->uri->segment(3);

		$dados['status'] = 1;

		$this->P_residuos_model->edita_residuo($dados, $id);

		redirect("P_residuos");
	}


}
