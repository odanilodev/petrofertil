<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_destinacoes extends CI_Controller
{


	public function lancar_destinacao()
	{

		$this->load->model('F_clientes_model');

		$this->load->model('F_destinacao_model');

		$id = $this->uri->segment(3);

		$data['clientes'] = $this->F_clientes_model->recebe_clientes();

		$data['destinacao'] = $this->F_destinacao_model->recebe_destinacao($id);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_destinacao');
		$this->load->view('financeiro/footer');
	}


	public function lancar_destinacao_oleo_acido()
	{

		$this->load->model('F_clientes_model');

		$this->load->model('F_destinacao_model');

		$id = $this->uri->segment(3);

		$data['clientes'] = $this->F_clientes_model->recebe_clientes();

		$data['destinacao'] = $this->F_destinacao_model->recebe_destinacao($id);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_destinacao_oleo_acido');
		$this->load->view('financeiro/footer');
	}


	public function lancar_afericao_terceiros()
	{
		$this->load->model('F_afericao_model');
		$this->load->model('F_fornecedores_model');

		$id = $this->uri->segment(3);

		$data['afericao'] = $this->F_afericao_model->seleciona_afericao_terceiros($id);

		$data['fornecedores'] = $this->F_fornecedores_model->recebe_fornecedores();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_afericao_terceiros');
		$this->load->view('financeiro/footer');
	}


	public function inserir_destinacao()
	{

		$this->load->model('F_destinacao_model');
		$this->load->model('F_estoque_model');
		$this->load->model('F_contas_receber_model');
		$this->load->model('F_estoque_oleo_comum_model');


		$id = $this->input->post('id');

		$dados['data_destinacao'] = $this->input->post('data_destinacao');
		$dados['cliente'] = $this->input->post('cliente');
		$dados['quantidade'] = $this->input->post('quantidade');
		$dados['valor'] = $this->input->post('valor');

		$dados['valor_total'] = $this->input->post('valor_total');

		//Cria as informações que serão cadastradas no contas a receber
		$dias_vencimento = 5;
		$conta['vencimento'] =  date('Y-m-d', strtotime("+{$dias_vencimento} days", strtotime($dados['data_destinacao'])));
		$conta['valor'] = $dados['valor_total'];
		$conta['empresa'] = "Óleo";
		$conta['nome'] = $dados['cliente'];
		$conta['status'] = 0;


		$retorno = $this->F_contas_receber_model->inserir_conta_id($conta);

		$dados['id_conta'] = $retorno;

		$tipo = $this->input->post('tipo');


		if ($tipo == 'kg') {

			$dados['quantidade'] = $dados['quantidade'] / 0.92;

			$dados['valor'] = $dados['valor'] * 0.92;
		}


		//altera valor do estoque de óleo
		$alterar = $this->input->post('alterar');

		$quantidade_antiga = $this->input->post('quantidade_antiga');

		$data_antiga = $this->input->post('data_antiga');

		$estoque = $this->F_estoque_model->recebe_estoque();

		
		if ($id == '') {

				$data['quantidade'] = $estoque['quantidade'] - $dados['quantidade'];
				$data['movimentacao'] = $dados['quantidade'];
				$data['tipo_movimentacao'] = "Destinação de óleo";
				$data['data_movimentacao'] = date("Y-m-d H:i:s");
				$data['usuario'] =   $this->session->userdata('nome_usuario');

				//Estoque Novo, retira do estoque para destinar, alterando demais dias.
				$valor = $dados['quantidade'];
				$operacao = 'subtrai';
				$data_operacao = $dados['data_destinacao'];

				$this->F_estoque_oleo_comum_model->atualiza_estoque_oleo_comum($valor, $operacao, $data_operacao);

				$this->F_estoque_model->insere_estoque($data);

				$this->F_destinacao_model->inserir_destinacao($dados);
			
		
		} else {

			//analisa se o estoque deve ser alterado ou não.
			if ($alterar == 'radio_3') {

				//retira do estoque a antiga aferição
				$valor = $quantidade_antiga;
				$operacao = 'subtrai';
				$data_operacao = $data_antiga;
				$this->F_estoque_oleo_comum_model->atualiza_estoque_oleo_comum($valor, $operacao, $data_operacao);


				//adiciona a atualizada
				$valor = $dados['quantidade'];
				$operacao = 'soma';
				$data_operacao = $dados['data_destinacao'];

				$this->F_estoque_oleo_comum_model->atualiza_estoque_oleo_comum($valor, $operacao, $data_operacao);



				$data['quantidade'] = $estoque['quantidade'] + $quantidade_antiga;

				$data['quantidade'] = $data['quantidade'] - $dados['quantidade'];
				$data['movimentacao'] = $dados['quantidade'];
				$data['tipo_movimentacao'] = "Edita destinação de óleo usado";
				$data['data_movimentacao'] = date("Y-m-d H:i:s");
				$data['usuario'] =   $this->session->userdata('nome_usuario');
				


				$this->F_estoque_model->insere_estoque($data);
			}

			$this->F_destinacao_model->atualiza_destinacao($dados, $id);
		}

		redirect('F_estoque/inicio');
	}


	public function inserir_destinacao_oleo_acido()
	{

		$this->load->model('F_destinacao_model');
		$this->load->model('F_contas_receber_model');
		$this->load->model('F_estoque_oleo_acido_model');


		$dados['cliente'] = $this->input->post('cliente');
		$dados['quantidade'] = $this->input->post('quantidade');
		$dados['valor'] = $this->input->post('valor');
		$dados['data_destinacao'] = $this->input->post('data_destinacao');
		$dados['valor_total'] = $this->input->post('valor_total');

		$id = $this->input->post('id');


		//Cria as informações que serão cadastradas no contas a receber
		$dias_vencimento = 5;
		$conta['vencimento'] =  date('Y-m-d', strtotime("+{$dias_vencimento} days", strtotime($dados['data_destinacao'])));

		$conta['valor'] = $dados['valor_total'];
		$conta['empresa'] = "Óleo";
		$conta['nome'] = $dados['cliente'];
		$conta['status'] = 0;

		$this->F_contas_receber_model->inserir_conta($conta);

		//Se necessario, realiza a conversão de KG para litro.
		$tipo = $this->input->post('tipo');


		if ($tipo == 'kg') {

			$dados['quantidade'] = $dados['quantidade'] / 0.92;

			$dados['valor'] = $dados['valor'] * 0.92;
		}

		//altera valor do estoque de óleo
		$estoque = $this->F_estoque_oleo_acido_model->recebe_estoque();

		// $alterar = $this->input->post('alterar');
		//$quantidade_antiga = $this->input->post('quantidade_antiga');

		//Informações para inserir no estoque
		$data['quantidade'] = $estoque['quantidade'] - $dados['quantidade'];
		$data['movimentacao'] = $dados['quantidade'];
		$data['tipo_movimentacao'] = 'Destinação do óleo para ' . $dados['cliente'];
		$data['data_movimentacao'] = date("Y-m-d H:i:s");
		$data['usuario'] =   $this->session->userdata('nome_usuario');

		$this->F_estoque_oleo_acido_model->inserir_estoque($data);
		$this->F_destinacao_model->inserir_destinacao_oleo_acido($dados);


		redirect('F_oleo_acido/inicio/oleo_acido');
	}



	public function deleta_destinacao_estoque()
	{

		$this->load->model('F_destinacao_model');
		$this->load->model('F_estoque_oleo_comum_model');

		$id = $this->uri->segment(3);


		$destinacao_antiga = $this->F_destinacao_model->recebe_destinacao($id);


		//retira do estoque a antiga aferição
		$valor = $destinacao_antiga['quantidade'];
		$operacao = 'soma';
		$data_operacao = $destinacao_antiga['data'];
		$this->F_estoque_oleo_comum_model->atualiza_estoque_oleo_comum($valor, $operacao, $data_operacao);

		$this->F_destinacao_model->deleta_destinacao($id);			


		redirect('F_estoque/inicio/3');
	}

	public function deleta_destinacao()
	{

		$this->load->model('F_destinacao_model');

		$id = $this->uri->segment(3);

		$this->F_destinacao_model->deleta_destinacao($id);

		redirect('F_estoque/inicio/3');
	}

	public function deleta_destinacao_acido()
	{

		$this->load->model('F_destinacao_model');

		$id = $this->uri->segment(3);

		$this->F_destinacao_model->deleta_destinacao_acido($id);

		redirect('F_oleo_acido/inicio/8');
	}
	


	public function deleta_destinacao_estoque_acido()
	{

		$this->load->model('F_estoque_oleo_acido_model');
		$this->load->model('F_destinacao_model');

		$id = $this->uri->segment(3);

		$destinacao = $this->F_destinacao_model->recebe_destinacao_oleo_acido($id);

		$estoque = $this->F_estoque_oleo_acido_model->recebe_estoque();


		//Dados para inserir no estoque
		$dados['quantidade'] = $estoque['quantidade'] + $destinacao['quantidade'];
		$dados['movimentacao'] = $destinacao['quantidade'];
		$dados['tipo_movimentacao'] = "Deleta Destinacao de óleo Ácido";
		$dados['data_movimentacao'] = date("Y-m-d H:i:s");
		$dados['usuario'] =  $this->session->userdata('nome_usuario');


		$this->F_destinacao_model->deleta_destinacao($id);
		$this->F_estoque_oleo_acido_model->inserir_estoque($dados);

		redirect('F_oleo_acido/inicio/oleo_acido');
	}
}
