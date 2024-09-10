<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_estoque_tambores extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('F_estoque_tambores_model');
		$this->load->model('F_estoque_detergente_model');
		$this->load->model('F_estoque_oleo_model');
	}

	public function inicio()
	{
		$data['estoque'] = $this->F_estoque_tambores_model->recebe_estoque();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/tambores');
		$this->load->view('financeiro/footer');
	}

	
}
