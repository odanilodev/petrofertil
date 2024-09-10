<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function index(){
		
		
		$this->load->model('Produtos_model');
		
		$data['produtos'] = $this->Produtos_model->recebe_produtos();
			
		$this->load->view('admin/header', $data);
		$this->load->view('admin/produtos');
		$this->load->view('admin/footer');
	}
	
	public function formulario_produto(){ 	

		$this->load->model('Fornecedores_model');
		$this->load->model('F_macro_model');
		$this->load->model('F_micro_model');

		$data['macros'] = $this->F_macro_model->recebe_macros();

		$data['micros'] = $this->F_micro_model->recebe_micros();
		
		$data['fornecedores'] = $this->Fornecedores_model->recebe_fornecedores();
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/formulario_produto');
		$this->load->view('admin/footer');
	}
	
	public function edita_produto(){ 	
		
		$this->load->model('Produtos_model');
		
		$id = $this->uri->segment(3);
		
		$data['produto'] = $this->Produtos_model->recebe_produto($id);
		
		$this->load->view('admin/header');
		$this->load->view('admin/formulario_edit_produto', $data);
		$this->load->view('admin/footer');
	}
	
	public function cadastra_produto(){ 	
		
		$this->load->model('Produtos_model');
		$this->load->model('F_contas_model');
		
		$id = $this->input->post('id');
		
		//Parte do lancamento da compra do produto
		$dados['nome'] = $this->input->post('nome');
		$dados['quantidade'] = $this->input->post('quantidade');
		$dados['observacao'] = $this->input->post('observacao');
		$dados['data_cadastro'] = date('Y/m/d');
		$dados['data_compra'] = $this->input->post('data_compra');
		$dados['data_pago'] = $this->input->post('data_pago');
		$dados['valor'] = $this->input->post('valor');
		$dados['comprado'] = $this->input->post('comprado');
		
		 
		if($id != ''){
			$this->Produtos_model->edita_produtos($dados, $id);
		}else{
			//Parte lancamento do contas a pagar sistema financeiro
			$data['vencimento'] =$this->input->post('data_pago');
			$data['data_emissao'] = $dados['data_compra'];
			$data['valor'] = $dados['valor'];
			$data['despesa'] = $this->input->post('setor');
			$data['status'] = 0;
			$data['recebido'] = $dados['comprado'];
			$data['categoria'] = 0;
			$data['observacao'] = $dados['observacao'];
			$data['id_macro'] =  $this->input->post('id_macro');
			$data['id_micro'] = $this->input->post('id_micro');

			$enviar = $this->input->post('enviar');
			if($enviar == 'sim'){
				$this->F_contas_model->inserir_conta($data);
			}

			$this->Produtos_model->inserir_produtos($dados);

			redirect('produtos');
		}

		
	}
	
	public function deleta_produto(){
		
		$this->load->model('Produtos_model');
		
        $id = $this->uri->segment(3);
		
		$this->Produtos_model->deleta_produto($id);
    
	}
	
	
	
}
