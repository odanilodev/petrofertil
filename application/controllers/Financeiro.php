<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Financeiro extends CI_Controller
{
	public function index()
	{
		redirect('Sistemas/inicio');
	}

	public function login()
	{
		$this->load->view('financeiro/login');
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

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/inicio');
		$this->load->view('financeiro/footer');
	}

	public function afericao()
	{

		$this->load->model('F_afericao_model');

		$data['pagina'] = $this->uri->segment(3);

		$data['afericoes'] = $this->F_afericao_model->recebe_afericao();
		$data['afericoes_terceiros'] = $this->F_afericao_model->recebe_afericao_terceiros();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/afericao');
		$this->load->view('financeiro/footer');
	}

	public function phpinfo()
	{

		phpinfo();
	}
}
