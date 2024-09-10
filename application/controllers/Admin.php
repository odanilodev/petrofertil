<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{ 	
		$this->load->view('admin/login');
	
	}
	
	public function inicio()
	{ 	
		$this->load->model('Motoristasp_model');
		
		$this->load->model('Combustivel_model');
		
		$this->load->model('Destinacoes_model');
		
		$this->load->model('Manutencao_model');
		
		$this->load->model('Ordem_model');
		
		
		$mes = date("m");
		$ano = date("Y");
		
		$dias_mes = cal_days_in_month(CAL_GREGORIAN,  $mes,  $ano);
		
		
		$data_inicial = date("Y-m-".$dias_mes);
		$data_final = date("Y-m-01");
		
		
		$data['manutencoes'] = $this->Manutencao_model->recebe_manutencoes_mensal($data_inicial, $data_final);
		
		$data['destinacoes'] = $this->Destinacoes_model->recebe_destinacoes();
		
		$data['combustivel'] = $this->Combustivel_model->recebe_combustivel_mensal($data_inicial, $data_final);
		
		$data['motoristas'] = $this->Motoristasp_model->recebe_motoristas();
		
		$data['ordens'] = $this->Ordem_model->recebe_ordens();
		
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	
	}
	
	public function certificado()
	{ 	
		$this->load->view('admin/certificado');
	
	}
	
	
	public function verifica_login()
	{ 
		$this->load->model('Login_model');
		
		$login = $this->input->post('login');
    	$senha = $this->input->post('senha');
		
		$usuario = $this->Login_model->recebe_usuario($login);
		
		
		if($senha == $usuario['senha'] and $senha != ""){
			
			$this->session->set_userdata('usuario', 'logado');
			
			redirect('admin/inicio');
			
		}else{
			
			$data['erro'] = '';
			
			$this->load->view('admin/login', $data);
			
		}
	
	}
	
	
}
