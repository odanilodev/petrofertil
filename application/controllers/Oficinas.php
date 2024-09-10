<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oficinas extends CI_Controller {

	public function index(){
		
		$this->load->model('Oficinas_model');
		
		$data['oficinas'] = $this->Oficinas_model->recebe_oficinas();
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/exibir_oficinas');
		$this->load->view('admin/footer');
	}
	
	
	public function formulario_oficinas(){
		
		$this->load->model('Oficinas_model');
		
		$id = $this->uri->segment(3);
		
		$data['oficina'] = $this->Oficinas_model->recebe_oficina($id);
		
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/formulario_oficinas');
		$this->load->view('admin/footer');
	}
	
	
	public function cadastra_oficina(){ 	
		
		$this->load->model('Oficinas_model');
		
		$id = $this->input->post('id');
		
		$dados['nome'] = $this->input->post('nome');
		
		$dados['contato'] = $this->input->post('contato');
		
		$dados['endereco'] = $this->input->post('endereco');
		$dados['telefone'] = $this->input->post('telefone');
		
		
		if($id != ''){
			
			$this->Oficinas_model->atualiza_oficina($dados, $id);
			
		}else{
			
			$this->Oficinas_model->inserir_oficina($dados);
			
		}
		
	}
	
	public function deleta_oficina(){
		
        $id = $this->uri->segment(3);
		
		$this->load->model('Oficinas_model');

		$this->Oficinas_model->deleta_oficina($id);
    
	}
	

}
