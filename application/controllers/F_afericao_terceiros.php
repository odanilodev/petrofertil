<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_afericao_terceiros extends CI_Controller {

	
	public function afericao(){
		
		$this->load->model('F_afericao_terceiros_model');
		
		$data['pagina'] = $this->uri->segment(3);
		
		$data['afericoes'] = $this->F_afericao_model->recebe_afericao();
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/afericao');
		$this->load->view('financeiro/footer');
	}
	
	public function lancar_afericao(){
		
		$this->load->model('F_afericao_model');
		$this->load->model('Veiculos_model');
		$this->load->model('Motoristasp_model');
		
		$id = $this->uri->segment(3);
		
		$data['afericao'] = $this->F_afericao_model->seleciona_afericao($id);
		
		$data['motoristas'] = $this->Motoristasp_model->recebe_motoristas();
		
		$data['veiculos'] = $this->Veiculos_model->recebe_veiculos();
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_afericao');
		$this->load->view('financeiro/footer');
	}
	
	
	public function inserir_afericao(){
		
		$this->load->model('F_afericao_model');
		$this->load->model('F_estoque_model');
		
		$id = $this->input->post('id');
		
		$dados['veiculo'] = $this->input->post('veiculo');
		$dados['data_afericao'] = $this->input->post('data_afericao');
		$dados['motorista'] = $this->input->post('motorista');
		$dados['pago'] = $this->input->post('pago');
		$dados['aferido'] = $this->input->post('aferido');
		$dados['gasto'] = $this->input->post('gasto');
		
		$custo = $dados['gasto'] / $dados['aferido'];
		
		$dados['custo'] = round($custo, 2);
		
		$estoque = $this->F_estoque_model->recebe_estoque();
		
		
		if($id == ''){
			
			$data['quantidade'] = $estoque['quantidade'] + $dados['aferido'];
			
			$this->F_estoque_model->atualiza_estoque($data);	
			
			$this->F_afericao_model->inserir_afericao($dados);	
			
		}else{
			
			$afericao = $this->F_afericao_model->seleciona_afericao($id);	
			
			$atualizado = $estoque['quantidade'] - $afericao['aferido'];
			
			$data['quantidade'] = $atualizado + $dados['aferido'];
			
			$this->F_estoque_model->atualiza_estoque($data);
			
			$this->F_afericao_model->atualiza_afericao($dados, $id);	
			
		}
		
		
	}
	
	
	
	public function filtra_afericao_geral()
	{

		$this->load->model('F_afericao_model');

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		
		
		if($data_final == '' or $data_inicial == ''){
			
			redirect('Financeiro/afericao/erro');
			
		}
		
		
		$data['afericoes'] = $this->F_afericao_model->filtra_afericao_geral($data_inicial, $data_final);
		
		
		if(empty($data['afericoes'])){
		
			redirect('Financeiro/afericao/erro');
			
		};
		
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/afericao_filtrada');
		$this->load->view('financeiro/footer');
		
	}
	
	
	public function filtra_afericao_motorista()
	{

		$this->load->model('F_afericao_model');

		$motorista = $this->input->post('nome_motorista');
		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		
		
		if($data_final == '' or $data_inicial == ''){
			
			redirect('Financeiro/afericao/erro');
			
		}
		
		
		$data['afericoes'] = $this->F_afericao_model->filtra_afericao_motorista($data_inicial, $data_final, $motorista);
		
		
		if(empty($data['afericoes'])){
		
			redirect('Financeiro/afericao/erro');
			
		};
		
		$data['motorista'] = $motorista;
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/afericao_filtrada_motorista');
		$this->load->view('financeiro/footer');
		
	}
	
	
	
	public function deleta_afericao(){
		
		$this->load->model('F_afericao_model');
		$this->load->model('F_estoque_model');
		
		$id = $this->uri->segment(3);
		
		
		$estoque = $this->F_estoque_model->recebe_estoque();
		
		$afericao = $this->F_afericao_model->seleciona_afericao($id);	
			
		$data['quantidade'] = $estoque['quantidade'] - $afericao['aferido'];
			
		
		$this->F_estoque_model->atualiza_estoque($data);
		
		$this->F_afericao_model->deleta_afericao($id);	
		
	}
	
}
