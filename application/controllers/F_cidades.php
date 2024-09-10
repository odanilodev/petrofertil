<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_cidades extends CI_Controller {


	public function inicio(){
		
		$this->load->model('F_cidades_model');
		
		$data['pagina'] = $this->uri->segment(3);
		
		$data['cidades'] = $this->F_cidades_model->recebe_cidades();	
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/cidades');
		$this->load->view('financeiro/footer');
		
	}
	
	public function cadastrar_cidade(){
		
		$this->load->model('F_cidades_model');
		
		$id = $this->uri->segment(3);
		
		$data['cidade'] = $this->F_cidades_model->recebe_cidade($id);
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_cidade');
		$this->load->view('financeiro/footer');
		
	}
	
	public function inserir_cidade(){
		
		$this->load->model('F_cidades_model');
		
		
		$id = $this->input->post('id');
		
		$dados['nome'] = strtoupper($this->input->post('nome'));
		

		if($id > ''){
			
			$this->F_cidades_model->atualiza_cidade($dados, $id);	
			
		}else{
		
			$this->F_cidades_model->inserir_cidade($dados);	
			
		}
			
		redirect('F_cidades/inicio/cidades');
		
		
	}
	
	public function deleta_cidade(){
		
		$this->load->model('F_cidades_model');
		
		$id = $this->uri->segment(3);
		
		$this->F_cidades_model->deleta_cidade($id);	
		
		redirect('F_cidades/inicio/cidades');
		
	}
	
	
	
	
}
