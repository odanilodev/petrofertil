<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_oleos extends CI_Controller
{

	public function inicio()
	{

		$this->load->model('F_estoque_oleo_model');
		$this->load->model('F_volta_motoristas_model');
		$this->load->model('F_saida_motoristas_model');
		$this->load->model('Motoristasp_model');

		$data['estoque_oleo'] = $this->F_estoque_oleo_model->recebe_estoque();
		$data['voltas'] = $this->F_volta_motoristas_model->recebe_voltas();
		$data['saidas'] = $this->F_saida_motoristas_model->recebe_saidas();
		$data['motoristas'] = $this->Motoristasp_model->recebe_motoristas();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/estoque_oleos');
		$this->load->view('financeiro/footer');
	}

	public function editar_estoque()
	{

		$this->load->model('F_estoque_oleo_model');

		$data['estoque_oleo'] = $this->F_estoque_oleo_model->recebe_estoque();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/edita_estoque_oleo');
		$this->load->view('financeiro/footer');
	}

	public function atualiza_estoque()
	{

		$this->load->model('F_estoque_oleo_model');

		$dados['quantidade'] = $this->input->post('quantidade');

		$this->F_estoque_oleo_model->atualiza_estoque($dados);

		redirect('F_oleos/inicio');
	}
}
