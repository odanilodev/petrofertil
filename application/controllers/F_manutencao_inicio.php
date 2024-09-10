<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Financeiro extends CI_Controller
{
	public function verifica_login()
	{
		$this->load->model('F_login_model');

		$login = $this->input->post('login');
		$senha = $this->input->post('senha');

		$usuario = $this->F_login_model->recebe_usuario($login);

		if ($senha == $usuario['senha'] and $senha != "") {


			$this->session->set_userdata('usuario', 'logado');
			$this->session->set_userdata('id_usuario', $usuario['id']);
			$this->session->set_userdata('login', $usuario['email']);
			$this->session->set_userdata('nome_usuario', $usuario['nome']);
			
			if ($login == 'atendimento@petroecol.com.br') {
				redirect('F_estoque_motoristas/inicio');
			}
			if ($login == 'fernanda@petroecol.com.br' or $login == 'petroecol@petroecol.com.br' or $login == 'victor@petroecol.com.br') {
				redirect('financeiro/inicio');
			}
			if ($login == 'comercial@petroecol.com.br') {
				redirect('financeiro/afericao/2');
			}
			if ($login == 'reciclagem@petroecol.com.br') {
				redirect('F_pesagem/inicio/11');
			}
			if ($login == 'producao@petroecol.com.br') {
				redirect('F_pesagem/inicio/11');
			}
			if ($login == 'manutencao@petroecol.com.br') {
				redirect('F_manutencao/inicio/11');
			}
			
		} else {

			$data['erro'] = '1';

			$this->load->view('financeiro/login', $data);
		}
	}
}