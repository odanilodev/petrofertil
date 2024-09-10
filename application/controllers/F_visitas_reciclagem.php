<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_visitas_reciclagem extends CI_Controller {


	
	public function inicio()
	{
		
		$this->load->model('F_visita_reciclagem_model');
		
		
		$data['pagina'] = $this->uri->segment(3);
		
		$data['visitas'] = $this->F_visita_reciclagem_model->recebe_visitas();

		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/visitas_reciclagem');
		$this->load->view('financeiro/footer');
	}
	
	
	public function lancar_visita()
	{
		
		$this->load->model('F_visita_reciclagem_model');
		$this->load->model('Veiculos_model');
		$this->load->model('Motoristasp_model');
		
		$id = $this->uri->segment(3);
		
		$data['visita'] = $this->F_visita_reciclagem_model->seleciona_visita($id);
		
		$data['motoristas'] = $this->Motoristasp_model->recebe_motoristas();
		
		$data['veiculos'] = $this->Veiculos_model->recebe_veiculos();
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_visitas_reciclagem');
		$this->load->view('financeiro/footer');
	}
	
	
	
	public function inserir_visita(){
		
		$this->load->model('F_visita_reciclagem_model');
		
		$id = $this->input->post('id');
		
		$dados['veiculo'] = $this->input->post('veiculo');
		$dados['data_visita'] = $this->input->post('data_visita');
		$dados['cidade'] = $this->input->post('cidade');
		$dados['motorista'] = $this->input->post('motorista');
		$dados['producao'] = $this->input->post('producao');
		
	
		
		$dados['visitas'] = $this->input->post('visitas');
		
	
		if($id == ''){
			
			$this->F_visita_reciclagem_model->inserir_visita($dados);	
			
		}else{
			
			$this->F_visita_reciclagem_model->atualiza_visita($dados, $id);	
			
		}
		
		
	}
	
	
	
	
	public function filtra_visitas()
	{

		$this->load->model('F_visita_reciclagem_model');
		
		$data['pagina'] = 16;

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		
		if($data_final == '' or $data_inicial == ''){
			
			redirect('F_visitas/inicio/erro');
			
		}
		
		
		$data['visitas'] = $this->F_visita_reciclagem_model->filtra($data_inicial, $data_final);
	
		
		if(empty($data['visitas'])){
		
			redirect('F_visitas_reciclagem/inicio/erro');
			
		};
		
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/visitas_reciclagem');
		$this->load->view('financeiro/footer');
		
	}
	
	
	public function deleta_visita(){
		
		$this->load->model('F_visita_reciclagem_model');
		
		$id = $this->uri->segment(3);
		
		$this->F_visita_reciclagem_model->deleta_visita($id);	
		
	}
	
	
}
