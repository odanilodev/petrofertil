<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembretes extends CI_Controller {

	public function index()
	{ 	
		
		$this->load->model('Lembretes_model');
		
		$data['lembretes'] = $this->Lembretes_model->recebe_lembretes();
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/exibir_lembretes');
		$this->load->view('admin/footer');
	
	}
	
	public function cadastra_lembrete()
	{ 	
		
		
		$this->load->model('Veiculos_model');
		
		$data['carros'] = $this->Veiculos_model->recebe_veiculos();
		
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/formulario_lembrete');
		$this->load->view('admin/footer');
	
	}
	
	public function cadastra()
	{
		
		$this->load->model('Lembretes_model');
		
		$dados['veiculo'] = $this->input->post('veiculo');
		$dados['titulo'] = $this->input->post('titulo');
		$dados['descricao'] = $this->input->post('descricao');	
		
		$this->Lembretes_model->inserir_lembrete($dados);
		
	}
	
	
	public function deleta_lembrete(){
		
        $id = $this->uri->segment(3);
		
		$this->load->model('Lembretes_model');

		$this->Lembretes_model->deleta_lembrete($id);
    
	}
	
	
}
