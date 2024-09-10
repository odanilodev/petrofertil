<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Epis extends CI_Controller {

	public function index(){
		
		
		$this->load->model('epi_model');
		
		$data['epis'] = $this->epi_model->recebe_epis();
			
		$this->load->view('admin/header', $data);
		$this->load->view('admin/epis');
		$this->load->view('admin/footer');
	}
	
	public function formulario_epi(){ 	
		
		$this->load->view('admin/header');
		$this->load->view('admin/formulario_epi');
		$this->load->view('admin/footer');
	}
	
	public function edita_epi(){ 	
		
		$this->load->model('Epi_model');
		
		$id = $this->uri->segment(3);
		
		$data['epi'] = $this->Epi_model->recebe_epi($id);
		
		$this->load->view('admin/header');
		$this->load->view('admin/formulario_edit_epi', $data);
		$this->load->view('admin/footer');
	}
	
	public function cadastra_epi(){ 	
		
		$this->load->model('Epi_model');
		
		$id = $this->input->post('id');
		
		$dados['nome'] = $this->input->post('nome');
		$dados['ca'] = $this->input->post('ca');
		$dados['quantidade'] = $this->input->post('quantidade');
		$dados['observacao'] = $this->input->post('observacao');
		 
		if($id != ''){
			
				$this->Epi_model->edita_epi($dados, $id);
			
		}else{
				
			$dados['data'] = date("Y-m-d"); 
			$this->Epi_model->inserir_epi($dados);
			
		}
		
	}
	
	public function deleta_epi(){
		
		$this->load->model('Epi_model');
		
        $id = $this->uri->segment(3);
		
		$this->Epi_model->deleta_epi($id);
    
	}
	
	
	
}
