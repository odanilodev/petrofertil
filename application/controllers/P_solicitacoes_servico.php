<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_solicitacoes_servico extends CI_Controller {



	public function formulario_solicitacao_servico()
	{
		
		$this->load->model('P_funcionarios_model');

		$id = $this->uri->segment(3);
	
		$data['funcionario'] = $this->P_funcionarios_model->recebe_funcionario($id);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_solicitacao_servico');
		$this->load->view('petrofertil/footer');

	}

	public function edita_solicitacao_servico()
	{
		
		$this->load->model('P_funcionarios_model');

		$this->load->model('P_solicitacao_servico_model');


		$id_servico = $this->uri->segment(3);

		$id_funcionario = $this->uri->segment(4);

		$data['funcionario'] = $this->P_funcionarios_model->recebe_funcionario($id_funcionario);

		$data['servico'] = $this->P_solicitacao_servico_model->recebe_servico_id($id_servico);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/edita_solicitacao_servico');
		$this->load->view('petrofertil/footer');

	}


	public function criar_solicitacao()
	{
		$this->load->model('P_solicitacao_servico_model');

		$id_funcionario = $this->input->post('id_funcionario');

		$dados['solicitante'] = $this->input->post('solicitante');
		$dados['para'] = $this->input->post('para');
		$dados['titulo'] = $this->input->post('titulo');
		$dados['descricao'] = $this->input->post('descricao');
		$dados['data_conclusao'] = $this->input->post('data_conclusao');
		$dados['status'] = 1;
		
		$this->P_solicitacao_servico_model->inserir_solicitacao($dados);	

		redirect('P_funcionarios/ver_funcionario/'.$id_funcionario);
	
	}

	public function edita_solicitacao()
	{
		$this->load->model('P_solicitacao_servico_model');

		$id_funcionario = $this->input->post('id_funcionario');
		$id_servico = $this->input->post('id_servico');

		$dados['solicitante'] = $this->input->post('solicitante');
		$dados['para'] = $this->input->post('para');
		$dados['titulo'] = $this->input->post('titulo');
		$dados['descricao'] = $this->input->post('descricao');
		$dados['data_conclusao'] = $this->input->post('data_conclusao');
		
		$this->P_solicitacao_servico_model->atualiza_solicitacao($dados, $id_servico);	

		redirect('P_funcionarios/ver_funcionario/'.$id_funcionario);
	
	}
	
	public function finaliza_servico()
	{
		$this->load->model('P_solicitacao_servico_model');

		$id = $this->uri->segment(3);

		$id_funcionario = $this->uri->segment(4);

		$dados['status'] = 2;
		
		$this->P_solicitacao_servico_model->atualiza_status_servico($dados, $id);	

		redirect('p_funcionarios/ver_funcionario/'.$id_funcionario);
	
	}


	public function volta_servico()
	{
		$this->load->model('P_solicitacao_servico_model');

		$id = $this->uri->segment(3);

		$id_funcionario = $this->uri->segment(4);

		$dados['status'] = 1;
		
		$this->P_solicitacao_servico_model->atualiza_status_servico($dados, $id);	

		redirect('P_funcionarios/ver_funcionario/'.$id_funcionario);
	
	}

	public function deleta_servico(){
		
        $id = $this->uri->segment(3);

		$id_funcionario = $this->uri->segment(4);

		
		$this->load->model('P_solicitacao_servico_model');

		$this->P_solicitacao_servico_model->deleta_servico($id);

		redirect('P_funcionarios/ver_funcionario/'.$id_funcionario);
    
	}
	

}
