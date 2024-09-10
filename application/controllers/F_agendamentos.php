<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_agendamentos extends CI_Controller {


	public function inicio(){
		
		$this->load->model('F_clientes_reciclagem_model');
		
		$data['pagina'] = $this->uri->segment(3);
		
		
		$clientes = $this->F_clientes_reciclagem_model->recebe_clientes();		
		
		
		//---------------------------------------------------------------//
		//-----------------------Dias do agendamento---------------------//
		//---------------------------------------------------------------//
		
		$data['d13'] = date('d/m/Y', strtotime('+6 days'));
		
		$data['d12'] =  date('d/m/Y', strtotime('+5 days'));
		
		$data['d11'] =  date('d/m/Y', strtotime('+4 days'));
		
		$data['d10'] =  date('d/m/Y', strtotime('+3 days'));
		
		$data['d9'] =  date('d/m/Y', strtotime('+2 days'));
		
		$data['d8'] =  date('d/m/Y', strtotime('+1 days'));
		
		$data['d7'] = date('d/m/Y');
		
		$data['d6'] =  date('d/m/Y', strtotime('-1 days'));
		
		$data['d5'] =  date('d/m/Y', strtotime('-2 days'));
		
		$data['d4'] =  date('d/m/Y', strtotime('-3 days'));
		
		$data['d3']=  date('d/m/Y', strtotime('-4 days'));
		
		$data['d2'] =  date('d/m/Y', strtotime('-5 days'));
		
		$data['d1'] =  date('d/m/Y', strtotime('-6 days'));
		
		
		
		//---------------------------------------------------------------//
		//-----------------------Dias da semana--------------------------//
		//---------------------------------------------------------------//
		
		
		$data['semana'] = array(
			'Sun' => 'Domingo',
			'Mon' => 'Segunda-Feira',
			'Tue' => 'Terça-Feira',
			'Wed' => 'Quarta-Feira',
			'Thu' => 'Quinta-Feira',
			'Fri' => 'Sexta-Feira',
			'Sat' => 'Sábado'
		);
		
		
		$data['semana13'] = date('D', strtotime('+6 days'));
		
		$data['semana12'] =  date('D', strtotime('+5 days'));
		
		$data['semana11'] =  date('D', strtotime('+4 days'));
		
		$data['semana10'] =  date('D', strtotime('+3 days'));
		
		$data['semana9'] =  date('D', strtotime('+2 days'));
		
		$data['semana8'] =  date('D', strtotime('+1 days'));
		
		$data['semana7'] = date('D');
		
		$data['semana6'] =  date('D', strtotime('-1 days'));
		
		$data['semana5'] =  date('D', strtotime('-2 days'));
		
		$data['semana4'] =  date('D', strtotime('-3 days'));
		
		$data['semana3']=  date('D', strtotime('-4 days'));
		
		$data['semana2'] =  date('D', strtotime('-5 days'));
		
		$data['semana1'] =  date('D', strtotime('-6 days'));
		
		//---------------------------------------------------------------//
		//---------------------------------------------------------------//
			
		for($a = 1; $a <= 13; $a++){
				
				$data['concluido'.$a] = 0;
				
				$data['agendado'.$a] = 0;
				
				$data['atrasado'.$a] = 0;
				
				
				
			foreach($clientes as $c){
				
				if(date("d/m/Y", strtotime($c['data_atendimento'])) == $data["d".$a]){
					
					
					
					
					if($data["d".$a] < date('d/m/Y') ){
						
						
						$data['atrasado'.$a] = $data['atrasado'.$a] + 1;
						
						
							
					};
					
					if($data["d".$a] >= date('d/m/Y') ){
						
						$data['agendado'.$a] = $data['agendado'.$a] + 1;
						
						
							
					};
					
					if($data["d".$a] < date('d/m/Y') and $c['status'] == 'concluido'){
						
						$data['concluido'.$a] = $data['concluido'.$a] + 1;
						
						
							
					};
					
					
				};
				
			}
			
		}

		
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/agendamentos');
		$this->load->view('financeiro/footer');
		
	}
	
	
	
		public function filtra_agendamentos(){
		
		$this->load->model('F_clientes_reciclagem_model');
		
		$data['pagina'] = $this->uri->segment(3);
		
		$cidade = strtoupper($this->input->post('cidade'));;
		
			
		$data['cidade_filtrada'] = $cidade;
		
		$clientes = $this->F_clientes_reciclagem_model->recebe_clientes_cidade($cidade);		
		
		if(empty($clientes)){
			
			redirect('F_agendamentos/inicio/error');
			
		}
		
		//---------------------------------------------------------------//
		//-----------------------Dias do agendamento---------------------//
		//---------------------------------------------------------------//
		
		$data['d13'] = date('d/m/Y', strtotime('+6 days'));
		
		$data['d12'] =  date('d/m/Y', strtotime('+5 days'));
		
		$data['d11'] =  date('d/m/Y', strtotime('+4 days'));
		
		$data['d10'] =  date('d/m/Y', strtotime('+3 days'));
		
		$data['d9'] =  date('d/m/Y', strtotime('+2 days'));
		
		$data['d8'] =  date('d/m/Y', strtotime('+1 days'));
		
		$data['d7'] = date('d/m/Y');
		
		$data['d6'] =  date('d/m/Y', strtotime('-1 days'));
		
		$data['d5'] =  date('d/m/Y', strtotime('-2 days'));
		
		$data['d4'] =  date('d/m/Y', strtotime('-3 days'));
		
		$data['d3']=  date('d/m/Y', strtotime('-4 days'));
		
		$data['d2'] =  date('d/m/Y', strtotime('-5 days'));
		
		$data['d1'] =  date('d/m/Y', strtotime('-6 days'));
		
		
		
		//---------------------------------------------------------------//
		//-----------------------Dias da semana--------------------------//
		//---------------------------------------------------------------//
		
		
		$data['semana'] = array(
			'Sun' => 'Domingo',
			'Mon' => 'Segunda-Feira',
			'Tue' => 'Terça-Feira',
			'Wed' => 'Quarta-Feira',
			'Thu' => 'Quinta-Feira',
			'Fri' => 'Sexta-Feira',
			'Sat' => 'Sábado'
		);
		
		
		$data['semana13'] = date('D', strtotime('+6 days'));
		
		$data['semana12'] =  date('D', strtotime('+5 days'));
		
		$data['semana11'] =  date('D', strtotime('+4 days'));
		
		$data['semana10'] =  date('D', strtotime('+3 days'));
		
		$data['semana9'] =  date('D', strtotime('+2 days'));
		
		$data['semana8'] =  date('D', strtotime('+1 days'));
		
		$data['semana7'] = date('D');
		
		$data['semana6'] =  date('D', strtotime('-1 days'));
		
		$data['semana5'] =  date('D', strtotime('-2 days'));
		
		$data['semana4'] =  date('D', strtotime('-3 days'));
		
		$data['semana3']=  date('D', strtotime('-4 days'));
		
		$data['semana2'] =  date('D', strtotime('-5 days'));
		
		$data['semana1'] =  date('D', strtotime('-6 days'));
		
		//---------------------------------------------------------------//
		//---------------------------------------------------------------//
			
		for($a = 1; $a <= 13; $a++){
				
				$data['concluido'.$a] = 0;
				
				$data['agendado'.$a] = 0;
				
				$data['atrasado'.$a] = 0;
				
				
				
			foreach($clientes as $c){
				
				if(date("d/m/Y", strtotime($c['data_atendimento'])) == $data["d".$a]){
					
					
					
					
					if($data["d".$a] < date('d/m/Y') ){
						
						
						$data['atrasado'.$a] = $data['atrasado'.$a] + 1;
						
						
							
					};
					
					if($data["d".$a] >= date('d/m/Y') ){
						
						$data['agendado'.$a] = $data['agendado'.$a] + 1;
						
						
							
					};
					
					if($data["d".$a] < date('d/m/Y') and $c['status'] == 'concluido'){
						
						$data['concluido'.$a] = $data['concluido'.$a] + 1;
						
						
							
					};
					
					
				};
				
			}
			
		}

		
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/agendamentos_cidade');
		$this->load->view('financeiro/footer');
		
	}
	
	public function dia_agendado(){
		
		$this->load->view('financeiro/header');
		$this->load->view('financeiro/dia_agendado');
		$this->load->view('financeiro/footer');
		
	}
	
	public function formulario_agendamento(){
		
		
		$data['id'] = $this->uri->segment(3);

		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_agendamento');
		$this->load->view('financeiro/footer');
		
	}
	
	
	
	public function inserir_agendamento(){
		
		$this->load->model('F_clientes_reciclagem_model');
		
		
		$id = $this->input->post('id');
		
		$dados['frequencia'] = $this->input->post('frequencia');
		$dados['data_atendimento'] = $this->input->post('data_atendimento');
		
		
		
		
		$this->F_clientes_reciclagem_model->atualiza_cliente($dados, $id);	
		
		$dd['log_acao'] = 'atualizar';
			
		
        // Log
		$this->load->model('F_log_model');
		//$dd['log_acao'] = 'inserir';
		$dd['log_dados'] = json_encode($dados);
		$this->F_log_model->set_log($dd);
		// Fim Log
			
		redirect('F_coletas_reciclagem/inicio/'.$id);
		
		
	}
	
	public function deleta_cliente(){
		
		$this->load->model('F_clientes_model');
		
		$id = $this->uri->segment(3);
		
		$this->F_clientes_model->deleta_cliente($id);	
		
		redirect('F_clientes/inicio/5');
		
	}
	
	
	
	
}
