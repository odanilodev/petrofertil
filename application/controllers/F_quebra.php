<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_quebra extends CI_Controller
{


	public function lancar_quebra()
	{

		//$this->load->model('F_quebra_model');

		$this->load->view('financeiro/header');
		$this->load->view('financeiro/formulario_quebra');
		$this->load->view('financeiro/footer');
	}


	public function inserir_quebra()
	{

		$this->load->model('F_quebra_model');
		$this->load->model('F_estoque_model');
		$this->load->model('F_estoque_oleo_comum_model');


		$dados['data_quebra'] = $this->input->post('data_quebra');
		$dados['tipo'] = $this->input->post('tipo');
		$dados['quantidade'] = $this->input->post('quantidade');



		$estoque = $this->F_estoque_model->recebe_estoque();



			$valor =  $dados['quantidade'];
			$operacao = 'subtrai';
			$data_operacao = $dados['data_quebra'];
	
			$this->F_estoque_oleo_comum_model->atualiza_estoque_oleo_comum($valor, $operacao, $data_operacao);
		


			$data['quantidade'] = $estoque['quantidade'] - $dados['quantidade'];
			$data['movimentacao'] = $dados['quantidade'];
			$data['tipo_movimentacao'] = "Quebra óleo";
			$data['data_movimentacao'] = date("Y-m-d H:i:s");
			$data['usuario'] =   $this->session->userdata('nome_usuario');

			$this->F_estoque_model->insere_estoque($data);
			$this->F_quebra_model->inserir_quebra($dados);
		

		redirect('F_estoque/inicio');
	}


	public function deleta_quebra_estoque()
	{

		$this->load->model('F_quebra_model');
		$this->load->model('F_estoque_model');
		$this->load->model('F_estoque_oleo_comum_model');

		

		$id = $this->uri->segment(3);

		$estoque = $this->F_estoque_model->recebe_estoque();

		$quebra = $this->F_quebra_model->recebe_quebra($id);


		$data['quantidade'] = $estoque['quantidade'] + $quebra['quantidade'];
		$data['movimentacao'] = $quebra['quantidade'];
		$data['tipo_movimentacao'] = "Deleta quebra de óleo";
		$data['data_movimentacao'] = date("Y-m-d H:i:s");
		$data['usuario'] =   $this->session->userdata('nome_usuario');

		

		$valor =  $quebra['quantidade'];
		$operacao = 'soma';
		$data_operacao = $quebra['data_quebra'];

		$this->F_estoque_oleo_comum_model->atualiza_estoque_oleo_comum($valor, $operacao, $data_operacao);



		$this->F_estoque_model->insere_estoque($data);
		$this->F_quebra_model->deleta_quebra($id);

		redirect('F_estoque/inicio/3');
	}


	public function deleta_quebra()
	{

		$this->load->model('F_quebra_model');

		$id = $this->uri->segment(3);

		$this->F_quebra_model->deleta_quebra($id);

		redirect('F_estoque/inicio/3');
	}
}
