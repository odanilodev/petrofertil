<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_clientes extends CI_Controller {


	public function inicio(){
		
		$this->load->model('F_clientes_model');
		
		$data['pagina'] = $this->uri->segment(3);
		
		$data['clientes'] = $this->F_clientes_model->recebe_clientes();	
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/clientes');
		$this->load->view('financeiro/footer');
		
	}
	
	public function formulario(){
		
		$this->load->model('F_clientes_model');

		
		$id = $this->uri->segment(3);
		
		$data['cliente'] = $this->F_clientes_model->recebe_cliente($id);
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_clientes');
		$this->load->view('financeiro/footer');
		
	}
	
	public function inserir_cliente(){
		
		$this->load->model('F_clientes_model');
		
		
		$id = $this->input->post('id');
		
		$dados['nome'] = $this->input->post('nome');
		$dados['cnpj'] = $this->input->post('cnpj');
		$dados['email'] = $this->input->post('email');
		$dados['cidade'] = $this->input->post('cidade');
		$dados['bairro'] = $this->input->post('bairro');
		$dados['endereco'] = $this->input->post('endereco');
		$dados['contato'] = $this->input->post('contato');
		$dados['inscricao'] = $this->input->post('inscricao');
		
		
		if($id > ''){
			
			$this->F_clientes_model->atualiza_cliente($dados, $id);	
			$dd['log_acao'] = 'atualizar';
			
		}else{
		
			$this->F_clientes_model->inserir_cliente($dados);
			$dd['log_acao'] = 'inserir';
			
		}
		
		
        // Log
		$this->load->model('F_log_model');
		//$dd['log_acao'] = 'inserir';
		$dd['log_dados'] = json_encode($dados);
		$this->F_log_model->set_log($dd);
		// Fim Log
			
		redirect('F_clientes/inicio/5');
		
		
	}
	
	public function deleta_cliente(){
		
		$this->load->model('F_clientes_model');
		
		$id = $this->uri->segment(3);
		
		$this->F_clientes_model->deleta_cliente($id);	
		
		redirect('F_clientes/inicio/5');
		
	}
	
	
	
	
}
