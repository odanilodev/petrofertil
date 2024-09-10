<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estoque extends CI_Controller {

	public function index()
	{ 	
		
		$this->load->model('Destinacoes_model');
		
		$data['destinacoes'] = $this->Destinacoes_model->recebe_destinacoes();
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/estoque');
		$this->load->view('admin/footer');
	
	}
	
	public function formulario_destinacoes()
	{ 	
		
		$this->load->model('Epi_model');
		
		$this->load->model('Funcionarios_model');
		
		$id = $this->uri->segment(3);
		
		$data['funcionarios'] = $this->Funcionarios_model->recebe_funcionarios();
		
		$data['epi'] = $this->Epi_model->recebe_epi($id);
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/formulario_destinacoes');
		$this->load->view('admin/footer');
	
	}
	
	public function formulario_destinacoesp()
	{ 	
		
		$this->load->model('Produtos_model');
		
		$this->load->model('Funcionarios_model');
		
		$id = $this->uri->segment(3);
		
		$data['funcionarios'] = $this->Funcionarios_model->recebe_funcionarios();
		
		$data['produtos'] = $this->Produtos_model->recebe_produto($id);
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/formulario_destinacoesp');
		$this->load->view('admin/footer');
	
	}
	
	public function baixa_estoque(){ 	
		
		$this->load->model('Epi_model');
		$this->load->model('Destinacoes_model');
		
		$id = $this->input->post('id');
		
		$epi = $this->Epi_model->recebe_epi($id);
		
		$data['nome'] = $epi['nome'];
		$data['ca'] = $epi['ca'];
		$data['data'] = $epi['data'];

		$dados['funcionario'] = $this->input->post('funcionario');
		$dados['produto'] = $epi['nome'];
		$dados['quantidade'] = $this->input->post('quantidade');
		$dados['observacao'] = $this->input->post('observacao'); 	
		$dados['data_destinacao'] = $this->input->post('data_destinacao'); ; 
	
		if($epi['quantidade'] >= $dados['quantidade']){
			
			$data['nome'] = $epi['nome'];
			$data['ca'] = $epi['ca'];
			$data['data'] = $epi['data'];
			$data['quantidade'] = $epi['quantidade'] - $dados['quantidade'];	
			
			
			
			$this->Destinacoes_model->inserir_destinacoes($dados);
			
			$this->Epi_model->edita_epi($data, $id);	
			
		}else{	
			
		
			$data['epis'] = $this->Epi_model->recebe_epis();
			
			$data['aviso'] = true;

			$this->load->view('admin/header', $data);
			$this->load->view('admin/epis');
			$this->load->view('admin/footer');
			
		}
		
		
	}
	
	
	public function baixa_estoquep(){ 	
		
		$this->load->model('Produtos_model');
		$this->load->model('Destinacoes_model');
		
		$id = $this->input->post('id');
		
		$produto = $this->Produtos_model->recebe_produto($id);
		
		$data['nome'] = $produto['nome'];
		

		$dados['funcionario'] = $this->input->post('funcionario');
		$dados['produto'] = $produto['nome'];
		$dados['quantidade'] = $this->input->post('quantidade'); 
		$dados['observacao'] = $this->input->post('observacao'); 
		$dados['data_destinacao'] = date("Y-m-d"); 
	
		if($produto['quantidade'] >= $dados['quantidade']){
			
			$data['nome'] = $produto['nome'];
			$data['quantidade'] = $produto['quantidade'] - $dados['quantidade'];	
			
			
			
			$this->Destinacoes_model->inserir_destinacoes($dados);
			
			$this->Produtos_model->edita_produtos($data, $id);	
		}else{	
			
			$data['produtos'] = $this->Produtos_model->recebe_produtos();

			$data['aviso'] = true;
			
			$this->load->view('admin/header', $data);
			$this->load->view('admin/produtos');
			$this->load->view('admin/footer');
		}
		
	}
	
	public function edita_destinacao()
	{ 	
		
		$this->load->model('Destinacoes_model');
		
		$id = $this->uri->segment(3);
		
		$data['destinacao'] = $this->Destinacoes_model->recebe_destinacao($id);
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/edita_destinacoes');
		$this->load->view('admin/footer');
	
	}
	
	public function altera_destinacao()
	{ 	
		$this->load->model('Destinacoes_model');
		
		$id = $this->input->post('id');
		
		$dados['funcionario'] = $this->input->post('funcionario');
		$dados['produto'] = $this->input->post('produto');
		$dados['quantidade'] = $this->input->post('quantidade');	
		$dados['data_destinacao'] = $this->input->post('data_destinacao');
		
		$this->Destinacoes_model->edita_destinacao($dados, $id);
	
	
	}
	
	public function deleta_destinacao()
	{ 	
		$this->load->model('Destinacoes_model');
		
		$id = $this->uri->segment(3);
	
		$this->Destinacoes_model->deleta_destinacao($id);
	
	}
	

	
}
