<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_contas_receber extends CI_Controller {
	
	public function inicio(){
		
		$this->load->model('F_caixa_model');
		
		$this->load->model('F_contas_receber_model');
		
		$data['pagina'] = $this->uri->segment(3);
		
	
		$data['contas'] = $this->F_contas_receber_model->recebe_contas();
		
		$data['caixa'] = $this->F_caixa_model->recebe_caixa();
		
		$data['caixa_reciclagem'] = $this->F_caixa_model->recebe_caixa_reciclagem();
		
		$contas = $data['contas'];
		
		$receber = 0;
		
		foreach($contas as $c){
			
			if($c['status'] == 0){
			
			$receber = $receber + $c['valor'];
			}
			
		}
		
		$data['receber_total'] = $receber;
		
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/contas_receber');
		$this->load->view('financeiro/footer');
		
	}

	public function visualizar_conta()
	{
			
		$this->load->model('F_contas_receber_model');
		
		$id = $this->uri->segment(3);	
		$data['conta'] = $this->F_contas_receber_model->recebe_conta($id);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/visualizar_conta_receber');
		$this->load->view('financeiro/footer');
	}

	public function editar_conta_receber()
	{
		$this->load->model('F_contas_receber_model');
		
		$id = $this->uri->segment(3);	
		$data['conta'] = $this->F_contas_receber_model->recebe_conta($id);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/editar_conta_receber');
		$this->load->view('financeiro/footer');
	}
	
	
	public function cadastrar_conta()
	{
			
		$this->load->model('F_clientes_model');
		
		$data['clientes'] = $this->F_clientes_model->recebe_clientes();	

		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_conta_receber');
		$this->load->view('financeiro/footer');
	}
	
	public function inserir_conta(){
		
		$this->load->model('F_contas_receber_model');
		
		$id =  $this->input->post('id');
		$dados['vencimento'] = $this->input->post('vencimento');
		$dados['valor'] = $this->input->post('valor');
		$dados['empresa'] = $this->input->post('empresa');
		$dados['nome'] = $this->input->post('nome');
		$dados['status'] = 0;
		$dados['observacao'] = $this->input->post('observacao');

		if ($id != ''){
			$this->F_contas_receber_model->atualiza_conta($id, $dados);	
		}else{
			$this->F_contas_receber_model->inserir_conta($dados);	 
		}
		
		redirect('F_contas_receber/inicio/9');
		
	}
	
	public function atualiza_status()
	{
				
		$this->load->model('F_contas_receber_model');
		$this->load->model('F_caixa_model');
		$this->load->model('F_fluxo_model');
		
		$id = $this->uri->segment(3);

		$vencimento = $this->uri->segment(4);

		$nome_pagador = $this->uri->segment(5);

		$conta = $this->F_contas_receber_model->recebe_conta($id);
		
		$dados['data_fluxo'] = $this->input->post('data_fluxo');

		$conta['valor_recebido'] = $this->input->post('valor_recebido');
		
		$dados['empresa'] = $conta['empresa'];
		$dados['valor'] = $conta['valor'];
		$dados['despesa'] = 'entrada';
		$dados['observacao'] = $conta['observacao'];
		$dados['id_relacao'] = $conta['id'];
		$dados['data_emissao'] = $vencimento;
		$dados['pago_recebido'] = urldecode($nome_pagador);

		
		if($dados['empresa'] == 'Óleo'){
			
			$caixa = $this->F_caixa_model->recebe_caixa();
			
		}elseif($dados['empresa'] == 'Reciclagem'){
			
			$caixa = $this->F_caixa_model->recebe_caixa_reciclagem();

		}
		
		
		if($conta['status'] == 0){
			
			$conta['status'] = 1;
			
			$data['caixa'] = $caixa['caixa'] + $conta['valor_recebido'];
			
			$this->F_fluxo_model->inserir_entrada_fluxo($dados);
			
		}else{ 
			
			$conta['status'] = 0;
			
			$data['caixa'] = $caixa['caixa'] - $conta['valor_recebido'];
		
		}
		
		
			if($dados['empresa'] == 'Óleo'){
			
			$this->F_caixa_model->atualiza_caixa($data);
			
		}elseif($dados['empresa'] == 'Reciclagem'){
			
			$this->F_caixa_model->atualiza_caixa_reciclagem($data);
		}
		
		
		$this->F_contas_receber_model->atualiza_status($id, $conta);	
		
		
		redirect('F_contas_receber/inicio/9');
		
	}
	
	
	public function deleta_status()
	{
				
		$this->load->model('F_contas_receber_model');
		$this->load->model('F_caixa_model');
		$this->load->model('F_fluxo_model');
		

		$id = $this->uri->segment(3);
		
		$conta = $this->F_contas_receber_model->recebe_conta($id);
		
		
		$dados['empresa'] = $conta['empresa'];
		$dados['valor'] = $conta['valor'];
		$dados['despesa'] = 'Saida';
		$dados['observacao'] = $conta['observacao'];
		$dados['id_relacao'] = $conta['id'];
		
		
		if($dados['empresa'] == 'Óleo'){
			
			$caixa = $this->F_caixa_model->recebe_caixa();
			
		}elseif($dados['empresa'] == 'Reciclagem'){
			
			$caixa = $this->F_caixa_model->recebe_caixa_reciclagem();

		}
		
		
		$id_relacao = $conta['id'];


		if($conta['status'] == 0){
			
			$conta['status'] = 1;

			
			$data['caixa'] = $caixa['caixa'] + $conta['valor_recebido'];

			
			$this->F_fluxo_model->inserir_entrada_fluxo($dados);	
			$conta['valor_recebido'] = null;

			
		}else{ 
			
			$conta['status'] = 0;
		
			$data['caixa'] = $caixa['caixa'] - $conta['valor_recebido'];
			
		
			$this->F_fluxo_model->deleta_fluxo_relacao($id_relacao);	
			$conta['valor_recebido'] = null;

		
		}
		
		
	
		if($conta['empresa'] == 'Óleo'){
			
			$this->F_caixa_model->atualiza_caixa($data);
		}else{
			$this->F_caixa_model->atualiza_caixa_reciclagem($data);
		}
		
		
		$this->F_contas_receber_model->atualiza_status($id, $conta);	
		
		
		
		redirect('F_contas_receber/inicio/9');
		
	}
	
	public function deleta_conta(){
		
		$this->load->model('F_contas_receber_model');
		
		$id = $this->uri->segment(3);
		
		$this->F_contas_receber_model->deleta_conta($id);	
		
		redirect('F_contas_receber/inicio/9');
		
	}
	
	
}
