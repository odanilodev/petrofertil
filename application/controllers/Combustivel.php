<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Combustivel extends CI_Controller {
	
	
	public function index(){
		
		$this->load->model('Combustivel_model');
		
		$data['combustivel'] = $this->Combustivel_model->recebe_combustivel_geral();
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/exibir_combustivel_geral');
		$this->load->view('admin/footer');	
	}
	
	public function exibir_combustivel()
	{
		$placa = $this->uri->segment(3);
		
		$this->load->model('Combustivel_model');
		
		$data['placa'] = $placa;
		
		$data['combustivel'] = $this->Combustivel_model->recebe_combustivel($placa);
		
		
		/*echo '<pre>';
		print_r($data['combustivel']);
		exit;*/
		
		$data['media_parametro'] = '';
		
		foreach($data['combustivel'] as $c){
			if($c['media'] != 0){
				$data['media_parametro'] .= ','.$c['media'];
			}
		}
		
		$this->load->view('admin/header', $data, $placa);
		$this->load->view('admin/exibir_combustivel');
		$this->load->view('admin/footer');	
	}
	
	
	public function filtra_combustivel()
	{

		$placa = $this->uri->segment(3);
		
		
		$this->load->model('Combustivel_model');
		
		$data['placa'] = $placa;
		
		$data['filtrar'] = true;
		
		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		
		
		$data['combustivel'] = $this->Combustivel_model->filtra_combustivel($placa, $data_inicial, $data_final);
		
		
		$data['media_parametro'] = '';
		
		foreach($data['combustivel'] as $c){
			if($c['media'] != 0){
				$data['media_parametro'] .= ','.$c['media'];
			}
		}

		
		$this->load->view('admin/header', $data, $placa);
		$this->load->view('admin/exibir_combustivel');
		$this->load->view('admin/footer');	
		
		
	}
	
	
	public function filtra_combustivel_geral()
	{

		$this->load->model('Combustivel_model');

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		
		
		$data['combustivel'] = $this->Combustivel_model->filtra_combustivel_geral($data_inicial, $data_final);

		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/exibir_combustivel_geral');
		$this->load->view('admin/footer');	
		
		
	}
	
	
		public function edita_combustivel(){
		
		
		$this->load->model('Combustivel_model');
			
		$id = $this->uri->segment(3);
		
		$data['combustivel'] = $this->Combustivel_model->recebe_combustivel_edit($id);
		
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/edita_combustivel');
		$this->load->view('admin/footer');	
			
	}
	
	
	public function cadastra_combustivel(){
		
		$placa = $this->uri->segment(3);
		
		$this->load->model('Veiculos_model');
		
		
		$data['placa'] = $placa;
		
		$data['veiculos'] = $this->Veiculos_model->recebe_veiculos();
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/formulario_combustivel');
		$this->load->view('admin/footer');	
	}
	
	
	public function cadastra_combustivel_geral(){
		
		$this->load->model('Veiculos_model');
		
		
		$data['carros'] = $this->Veiculos_model->recebe_veiculos();
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/formulario_combustivel_geral');
		$this->load->view('admin/footer');	
	}
	
	
	
	
	public function inserir_combustivel()
	{ 	
		
		$this->load->model('Combustivel_model');

		
		$id = $this->input->post('id');
		
		
		$dados['valor'] = $this->input->post('valor');
		$dados['carro'] = $this->input->post('carro');
		$dados['litragem'] = $this->input->post('litragem');
		$dados['km'] = $this->input->post('km');
		$dados['data_cadastro'] = $this->input->post('data');
		$dados['media'] = '0';
		
		
		
		
		 /*$media = ($dados['km'] - $combustivel[$c+1]['km']) / $dados['litragem'];
		 $dados['media'] = round($media,1);*/
		
		
		
		$placa = $dados['carro'];
		
		
		if($id > 0){
			
			$this->Combustivel_model->edita_combustivel($dados, $id);
			
			
			$comb = $this->Combustivel_model->recebe_combustivel($dados['carro']);
			
			/*echo '<pre>';
			print_r($comb);
			exit;*/
			
			$c=0; foreach($comb as $v){ 
				
				if($v['id'] == $id){ 
				
				 if((count($comb) - 1) != $c) { 

					$media = ($v['km'] - $comb[$c+1]['km']) / $v['litragem'];

					$dados2['media'] = round($media,1);
					 
					$this->Combustivel_model->edita_combustivel($dados2, $id);
				}
					
					}
				
			$c++;	
			}
			
			
			redirect('combustivel');
			
		}else{
			
			$val_id = $this->Combustivel_model->inserir_combustivel($dados, $placa);
			
			$comb = $this->Combustivel_model->recebe_combustivel($dados['carro']);
			
		
			
			$c=0; foreach($comb as $v){ 
				
				if($v['id'] == $val_id){ 
				
				 if((count($comb) - 1) != $c) { 

					$media = ($v['km'] - $comb[$c+1]['km']) / $v['litragem'];

					$dados3['media'] = round($media,1);
					 
					$this->Combustivel_model->edita_combustivel($dados3, $val_id);
				}
					
					}
				
			$c++;	
			}
			
			redirect('combustivel');
		}
		
		
	}
	


	public function deleta_combustivel(){
		
		$this->load->model('Combustivel_model');
		
        $id = $this->uri->segment(3);
		
		$this->Combustivel_model->deleta_combustivel($id);
    
	}
	
	
	
}
