<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_petro extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Login_model');
		$this->load->model('Clientesp_model');
	}

	public function teste()
	{
		$this->load->view('admin/cert');
	}

	public function index()
	{
		$this->load->view('admin/login_petro');
	}


	public function verifica_login()
	{

		$login = $this->input->post('login');
		$senha = $this->input->post('senha');
		if ($senha == '@123petro' and $login == 'admin') {


			$this->session->set_userdata('usuario', 'logado');

			redirect('admin_petro/inicio');
		} else {

			$data['erro'] = '';

			$this->load->view('admin/login_petro', $data);
		}
	}

	public function inicio()
	{


		$data['clientes'] = $this->Clientesp_model->recebe_clientes();

		$this->load->view('admin/header_petro', $data);
		$this->load->view('admin/painel_petro');
		$this->load->view('admin/footer_petro');
	}


	public function painel()
	{

		$this->load->view('admin/header_petro');
		$this->load->view('admin/painel_dados');
		$this->load->view('admin/footer_petro');
	}
}
