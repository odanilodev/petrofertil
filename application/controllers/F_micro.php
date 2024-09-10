<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_micro extends CI_Controller
{


	public function cadastrar_micro()
	{

		$data['id_macro'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_micro');
		$this->load->view('financeiro/footer');
	}


	public function inserir_micro()
	{

		$this->load->model('F_micro_model');

		$dados['id_macro'] = $this->input->post('id_macro');
		$dados['nome'] = $this->input->post('nome');

		$this->F_micro_model->inserir_micro($dados);

		redirect('F_macro/exibir_macro/' . $dados['id_macro']);
	}

	public function recebe_micro()
	{

		$this->load->model('F_micro_model');

		$id_macro = $this->input->post('id_macro');

		$data['micros'] = $this->F_micro_model->recebe_micros_macros($id_macro);

		echo "<option>Selecione</option>";
		foreach ($data['micros'] as $mi) {
			echo "<option data-id='". $mi['id'] ."' value='" . $mi['id'] . "'>" . $mi['nome'] . "</option>";
		};
	}

	
}
