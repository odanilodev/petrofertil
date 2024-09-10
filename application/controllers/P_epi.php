<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_epi extends CI_Controller
{


	public function inicio()
	{
		$this->load->view('petrofertil/header');
		$this->load->view('petrofertil/estoque_geral');
		$this->load->view('petrofertil/footer');
	}

	public function exibir_estoque_epi()
	{

		$data['alerta'] = $this->uri->segment(3);


		$this->load->model('P_epi_model');

		$data['epis'] = $this->P_epi_model->recebe_epis();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/estoque_epi');
		$this->load->view('petrofertil/footer');
	}

	public function formulario_cadastro_epi()
	{

		$this->load->view('petrofertil/header');
		$this->load->view('petrofertil/formulario_cadastro_epi');
		$this->load->view('petrofertil/footer');
	}

	public function formulario_edita_epi()
	{

		$this->load->model('P_epi_model');

		$id= $this->uri->segment(3);

		$data['epi'] = $this->P_epi_model->recebe_epi_id($id);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_edita_epi');
		$this->load->view('petrofertil/footer');
	}

	public function formulario_destinacao_epi()
	{

		$this->load->model('P_epi_model');
		$this->load->model('P_funcionarios_model');

		$data['id_produto'] = $this->uri->segment(3);

		$data['funcionarios'] = $this->P_funcionarios_model->recebe_funcionarios();


		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_destinacao_epi');
		$this->load->view('petrofertil/footer');

	}

	public function cadastrar_epi()
	{

		$this->load->model('P_epi_model');

		$id = $this->input->post('id');

		$dados['nome'] = $this->input->post('nome');
		$dados['ca'] = $this->input->post('ca');
		$dados['quantidade'] = $this->input->post('quantidade');
		$dados['observacao'] = $this->input->post('observacao');

		$this->P_epi_model->inserir_epi($dados);


		redirect('P_epi/exibir_estoque_epi/');
	}


	public function edita_epi()
	{

		$this->load->model('P_epi_model');

		$id = $this->input->post('id');

		$dados['nome'] = $this->input->post('nome');
		$dados['ca'] = $this->input->post('ca');
		$dados['quantidade'] = $this->input->post('quantidade');
		$dados['observacao'] = $this->input->post('observacao');

		$this->P_epi_model->atualiza_epi($dados, $id);



		redirect('P_epi/exibir_estoque_epi/');
	}


	public function destinar_epi()
	{

		$this->load->model('P_epi_model');
		$this->load->model('P_destinacao_model');

		$dados['funcionario'] = $this->input->post('funcionario');
		$dados['quantidade'] = $this->input->post('quantidade');
		$dados['observacao'] = $this->input->post('observacao');
		$dados['data_destinacao'] = $this->input->post('data_destinacao');

		$id = $this->input->post('id_produto');

		$epi = $this->P_epi_model->recebe_epi_id($id);


		$epi['quantidade'] = $epi['quantidade'] - $dados['quantidade'];

		$dados['produto'] = $epi['nome'];



		if($dados['quantidade'] > $epi['quantidade']){

			redirect('P_epi/exibir_estoque_epi/nao_disponivel');

		}else{

			
		$this->P_epi_model->atualiza_epi($epi, $id);

		
		$this->P_destinacao_model->inserir_destinacao($dados);


		redirect('P_epi/exibir_estoque_epi/');

		}

	
	}


	public function deleta_epi(){
		
		$this->load->model('P_epi_model');
		
        $id = $this->uri->segment(3);
	
		$this->P_epi_model->deleta_epi($id);
		
		redirect('P_epi/exibir_estoque_epi/');
	}

}
