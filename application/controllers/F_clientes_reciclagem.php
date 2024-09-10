<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_clientes_reciclagem extends CI_Controller {


	public function inicio(){
		
		
		$this->load->model('F_clientes_reciclagem_model');
		
		
		$data['clientes'] = $this->F_clientes_reciclagem_model->recebe_clientes();	
		
		$data['pagina'] = $this->uri->segment(3);
	
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/clientes_reciclagem');
		$this->load->view('financeiro/footer');
		
	}
	
	public function cadastrar_cliente(){
		
		$this->load->model('F_clientes_reciclagem_model');
		
		$this->load->model('F_grupos_coleta_model');
		
		
		
		$data['grupos'] = $this->F_grupos_coleta_model->recebe_grupos();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_cliente_reciclagem');
		$this->load->view('financeiro/footer');
		
	}
	
	
	public function ver_cliente(){
		
		$this->load->model('F_clientes_reciclagem_model');
		$this->load->model('F_grupos_coleta_model');
		
		
		$id = $this->uri->segment(3);
		
		
		$data['grupos'] = $this->F_grupos_coleta_model->recebe_grupos();
		
		$data['cliente'] = $this->F_clientes_reciclagem_model->recebe_cliente($id);	
		
		
		$data['metodo'] = 'visualizacao'; 
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/ver_cliente_reciclagem');
		$this->load->view('financeiro/footer');
		
	}
	
	
	public function edita_cliente(){
		
		$this->load->model('F_clientes_reciclagem_model');
		
		$this->load->model('F_grupos_coleta_model');
		
		$id = $this->uri->segment(3);
		
		
		$data['grupos'] = $this->F_grupos_coleta_model->recebe_grupos();
		
		$data['cliente'] = $this->F_clientes_reciclagem_model->recebe_cliente($id);	
		
		$data['metodo'] = 'edicao'; 
		
		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/ver_cliente_reciclagem');
		$this->load->view('financeiro/footer');
		
	}
	
	public function inserir_cliente(){
		
		$this->load->model('F_clientes_reciclagem_model');
		
		
		$id = $this->input->post('id');
		
		$dados['cnpj'] = $this->input->post('cnpj');
		$dados['email'] = $this->input->post('email');
		$dados['cidade'] = $this->input->post('cidade');
		$dados['bairro'] = $this->input->post('bairro');
		$dados['endereco'] = $this->input->post('endereco');
		$dados['nome'] = $this->input->post('nome');
		$dados['contato'] = $this->input->post('contato');
		$dados['inscricao'] = $this->input->post('inscricao');
		$dados['pagamento'] = $this->input->post('pagamento');
		$dados['grupo'] = $this->input->post('grupo');

		
		
		if($id > ''){
			
			$this->F_clientes_reciclagem_model->atualiza_cliente($dados, $id);	
			
		}else{
		
			$this->F_clientes_reciclagem_model->inserir_cliente($dados);	
			
		}
			
		redirect('F_clientes_reciclagem/inicio/12');
		
		
	}
	
	public function deleta_cliente(){
		
		$this->load->model('F_clientes_reciclagem_model');
		
		$id = $this->uri->segment(3);
		
		$this->F_clientes_reciclagem_model->deleta_cliente($id);	
		
		redirect('F_clientes_reciclagem/inicio');
		
	}
	
	
	
	
}
