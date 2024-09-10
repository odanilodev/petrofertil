<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saulo extends CI_Controller
{

	public function index()
	{

        $this->load->view('saulo/login');

	}


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
			
			if ($login == 'fernanda@petroecol.com.br' or $login == 'petroecol@petroecol.com.br' or $login == 'victor@petroecol.com.br') {
				redirect('S_fluxo/inicio');
			}

			
		} else {

			$data['erro'] = '1';

			$this->load->view('Saulo/login', $data);
		}
	}

    public function inicio()
	{

		$this->load->model('F_fluxo_model');

		$this->load->model('F_caixa_model');

		$this->load->model('F_contas_model');

		$this->load->model('F_contas_receber_model');


		$caixa = $this->F_caixa_model->recebe_caixa();

		$data['total_caixa'] = $caixa['caixa'];

		$mes = date("m");
		$ano = date("Y");

		$dias_mes = cal_days_in_month(CAL_GREGORIAN,  $mes,  $ano);


		$data_inicial = date("Y-m-" . $dias_mes);
		$data_final = date("Y-m-01");


		$fluxo = $this->F_fluxo_model->recebe_fluxo_mensal($data_inicial, $data_final);


		$total_entrada = 0;
		$total_saida = 0;

		foreach ($fluxo as $f) {

			if ($f['despesa'] == 'entrada') {

				$total_entrada = $total_entrada + $f['valor'];
				
			} else {

				$total_saida = $total_saida + $f['valor'];
			}
		}

		$data_atual = date('Y-m-d');

		$data['contas'] = $this->F_contas_model->recebe_contas_dia($data_atual);

		$data['contas_receber'] = $this->F_contas_receber_model->recebe_contas_dia($data_atual);


		$data['total_entrada'] = $total_entrada;
		$data['total_saida'] = $total_saida;

		$this->load->view('saulo/header', $data);
		$this->load->view('saulo/inicio');
		$this->load->view('saulo/footer');
	}


	
}
