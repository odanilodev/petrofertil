<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petrofertil extends CI_Controller
{

	public function index()
	{
		$this->load->view('header_petro');
		$this->load->view('empresa3');
		$this->load->view('footer');
	}

	public function certificado()
	{
		$this->load->view('admin/certificado');
	}

	public function login()
	{
		$this->load->view('petrofertil/login');
	}

	public function inicio()
	{

		$this->load->model('P_destinacao_model');

		$data['destinacoes'] = $this->P_destinacao_model->recebe_destinacoes();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/estoque_geral');
		$this->load->view('petrofertil/footer');
	}

	public function deleta_destinacao()
	{

		$this->load->model('P_destinacao_model');

		$id = $this->uri->segment(3);

		$this->P_destinacao_model->deleta_destinacao($id);

		redirect('Petrofertil/inicio/deletado');
	}

	public function verifica_login()
	{
		$this->load->model('P_login_model');

		$login = $this->input->post('login');
		$senha = $this->input->post('senha');

		$usuario = $this->P_login_model->recebe_usuario($login);

		if ($senha == $usuario['senha'] and $senha != "") {


			$this->session->set_userdata('usuario', 'logado');
			$this->session->set_userdata('id_usuario', $usuario['id']);
			$this->session->set_userdata('login', $usuario['email']);
			$this->session->set_userdata('nome_usuario', $usuario['nome']);


			if ($login == 'juninho@petrofertil.com.br') {
				redirect('petrofertil/inicio');
			}
			if ($login == 'alaide@petrofertil.com.br') {
				redirect('P_clientes');
			}

			if ($login == 'heloisa.inoue@petrofertil.com.br') {
				redirect('P_clientes_petrofertil');
			}


			if ($login == 'adrielly@petrofertil.com.br') {
				redirect('P_clientes_petrofertil');
			}

			if ($login == 'portaria') {
				redirect('P_pesagem');
			}

			if ($login == 'manutencao@petrofertil.com.br') {
				redirect('P_manutencao');
			}

		} else {

			$data['erro'] = '1';

			$this->load->view('petrofertil/login', $data);

		}

	}


}
