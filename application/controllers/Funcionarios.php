<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionarios extends CI_Controller {

	public function index(){
			
		$this->load->model('Funcionarios_model');
		
		$data['funcionarios'] = $this->Funcionarios_model->recebe_funcionarios();
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/funcionarios');
		$this->load->view('admin/footer');
	}
	
	public function formulario_funcionarios(){ 	
		
		$this->load->view('admin/header');
		$this->load->view('admin/formulario_funcionario');
		$this->load->view('admin/footer');
	}
	
	public function edita_funcionario(){ 	
		
		$this->load->model('Funcionarios_model');
		
		$id = $this->uri->segment(3);
		
		$data['funcionario'] = $this->Funcionarios_model->recebe_funcionario($id);
		
		$this->load->view('admin/header');
		$this->load->view('admin/formulario_edit_funcionario', $data);
		$this->load->view('admin/footer');
	}
	
	public function cadastra_funcionario(){ 	
		
		$this->load->model('Funcionarios_model');
		
		$id = $this->input->post('id_funcionario');
		
		$dados['nome'] = $this->input->post('nome');
		$dados['cargo'] = $this->input->post('cargo');
		 

		
		if($id != ''){
			
			$this->Funcionarios_model->edita_funcionario($dados, $id);
			
		}else{
				
			$dados['data_cadastro'] = date("Y-m-d"); 
			$this->Funcionarios_model->inserir_funcionario($dados);
			
		}
		
	}
	
	public function deleta_funcionario(){
		
		$this->load->model('Funcionarios_model');
		
        $id = $this->uri->segment(3);
		
		$this->Funcionarios_model->deleta_funcionario($id);
    
	}
	
	
	
}
