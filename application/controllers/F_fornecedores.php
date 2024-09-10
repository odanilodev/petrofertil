<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_fornecedores extends CI_Controller {


	public function inicio(){
		
		$this->load->model('F_fornecedores_model');
		
		$data['pagina'] = $this->uri->segment(3);
		
		$data['fornecedores'] = $this->F_fornecedores_model->recebe_fornecedores();	
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/fornecedores');
		$this->load->view('financeiro/footer');
		
	}
	
	public function cadastrar_fornecedor(){
		
		$this->load->model('F_fornecedores_model');
		
		
		$id = $this->uri->segment(3);
		
		$data['fornecedor'] = $this->F_fornecedores_model->recebe_fornecedor($id);
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_fornecedor');
		$this->load->view('financeiro/footer');
		
	}
	
	public function inserir_fornecedor(){
		
		$this->load->model('F_fornecedores_model');
		
		
		$id = $this->input->post('id');
		
		$dados['nome'] = $this->input->post('nome');
		$dados['contato'] = $this->input->post('contato');
		$dados['cnpj'] = $this->input->post('cnpj');
		$dados['cidade'] = $this->input->post('cidade');
		$dados['endereco'] = $this->input->post('endereco');
		$dados['nome_contato'] = $this->input->post('nome_contato');
		
		
		if($id > ''){
			
			$this->F_fornecedores_model->atualiza_fornecedor($dados, $id);	
			
		}else{
		
			$this->F_fornecedores_model->inserir_fornecedor($dados);	
			
		}
			
		redirect('F_fornecedores/inicio/6');
		
		
	}
	
	public function deleta_fornecedor(){
		
		$this->load->model('F_fornecedores_model');
		
		$id = $this->uri->segment(3);
		
		$this->F_fornecedores_model->deleta_fornecedor($id);	
		
		redirect('F_fornecedores/inicio/6');
		
	}
	
	
	
	
}
