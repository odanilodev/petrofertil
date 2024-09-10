<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedores extends CI_Controller {

	public function index(){
		
		$this->load->model('F_fornecedores_model');
		
		$data['fornecedores'] = $this->F_fornecedores_model->recebe_fornecedores();	
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/exibir_fornecedores');
		$this->load->view('admin/footer');
	}
	
	
	public function formulario_fornecedores(){
		
		$this->load->model('Fornecedores_model');
		
		$id = $this->uri->segment(3);
		
		$data['fornecedor'] = $this->Fornecedores_model->recebe_fornecedor($id);
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/formulario_fornecedores');
		$this->load->view('admin/footer');
	}
	
	
	public function cadastra_fornecedor(){ 	
		
		$this->load->model('Fornecedores_model');
		
		$id = $this->input->post('id');
		
		$dados['nome'] = $this->input->post('nome');
		$dados['contato'] = $this->input->post('contato');
		$dados['endereco'] = $this->input->post('endereco');
		$dados['telefone'] = $this->input->post('telefone');
		$dados['cnpj'] = $this->input->post('cnpj');
		$dados['categoria'] = $this->input->post('categoria');
		
		
		if($id != ''){
			
			$this->Fornecedores_model->atualiza_fornecedor($dados, $id);
			
		}else{
			
			$this->Fornecedores_model->inserir_fornecedor($dados);
			
		}
		
	}
	
	public function deleta_fornecedor(){
		
        $id = $this->uri->segment(3);
		
		$this->load->model('Fornecedores_model');

		$this->Fornecedores_model->deleta_fornecedor($id);
    
	}
	

}
