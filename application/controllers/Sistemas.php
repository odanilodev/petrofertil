<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sistemas extends CI_Controller
{

	public function index()
	{
		$this->load->view('sistemas');
	}

	public function inicio()
	{
		$this->load->view('sistemas');
	}

	public function teste()
	{
		$this->load->model('F_estoque_oleo_comum_model');
		$valor = 500;
		$operacao = 'soma';
		$data = '2022-10-25';
		$this->F_estoque_oleo_comum_model->atualiza_estoque_oleo_comum($valor,$operacao,$data);
	}


	
}
