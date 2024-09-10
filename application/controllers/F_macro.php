<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_macro extends CI_Controller
{


	public function inicio()
	{

		$this->load->model('F_macro_model');

		$data['macros'] = $this->F_macro_model->recebe_macros();

		$data['pagina'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/macro');
		$this->load->view('financeiro/footer');
	}

	
	public function exibir_macro()
	{
		$this->load->model('F_macro_model');

		$this->load->model('F_micro_model');

		$id_macro = $this->uri->segment(3);

		$data['macro'] = $this->F_macro_model->recebe_macro($id_macro);

		$data['micros'] = $this->F_micro_model->recebe_micros_macros($id_macro);

		//Parte Financeiro

		$this->load->model('F_caixa_model');

		$this->load->model('F_contas_model');

		$data['contas'] = $this->F_contas_model->recebe_contas_macro($id_macro);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/exibir_macro');
		$this->load->view('financeiro/footer');
	}



	public function exibir_macro_filtrado()
	{
		$this->load->model('F_macro_model');
		$this->load->model('F_micro_model');
		$this->load->model('F_contas_model');


		$id_macro = $this->uri->segment(3);

		$data['macro'] = $this->F_macro_model->recebe_macro($id_macro);

		$data['micros'] = $this->F_micro_model->recebe_micros_macros($id_macro);

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');

		$data['contas'] = $this->F_contas_model->recebe_contas_filtrada_macro($id_macro, $data_inicial, $data_final);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/exibir_macro');
		$this->load->view('financeiro/footer');
	}

}
