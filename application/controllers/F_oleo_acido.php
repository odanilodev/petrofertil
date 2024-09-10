<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_oleo_acido extends CI_Controller
{


	public function inicio()
	{
		$this->load->model('F_estoque_oleo_acido_model');

		$this->load->model('F_destinacao_model');

		$this->load->model('F_quebra_oleo_acido_model');


		$data['estoque'] = $this->F_estoque_oleo_acido_model->recebe_estoque();

		$data['destinacoes'] = $this->F_destinacao_model->recebe_destinacoes_oleo_acido();

		$data['quebra'] = $this->F_quebra_oleo_acido_model->recebe_quebras();

		$data['pagina'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/oleo_acido');
		$this->load->view('financeiro/footer');
	}

	public function inicio_filtrado()
	{
		$this->load->model('F_estoque_oleo_acido_model');
		$this->load->model('F_destinacao_model');
		$this->load->model('F_quebra_oleo_acido_model');

		$data['data_inicial'] = $this->input->post('data_inicial');
		$data['data_final'] = $this->input->post('data_final');


		$data['estoque'] = $this->F_estoque_oleo_acido_model->recebe_estoque();

		$data['destinacoes'] = $this->F_destinacao_model->filtra_destinacoes_oleo_acido($data['data_inicial'], $data['data_final']);

		$data['quebra'] = $this->F_quebra_oleo_acido_model->filtra_quebra($data['data_final'], $data['data_inicial']);

		$data['pagina'] = $this->uri->segment(3);

		//Calculo para valor total vendido
		$venda_total = 0;
		foreach($data['destinacoes'] as $d){

			$venda_total = $venda_total + $d['valor_total'];
		}
		$data['venda_total'] = $venda_total;


		//Calculo para quantidade total vendida
		$quantidade_total = 0;
		foreach($data['destinacoes'] as $d){

			$peso = $d['quantidade'] * 0.92;
			$quantidade_total = $quantidade_total + $peso;
		}
		$data['quantidade_total'] = $quantidade_total;

		//Calculo para média
		$data['media_total'] = $venda_total / $quantidade_total;

		


		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/oleo_acido');
		$this->load->view('financeiro/footer');
	}

	public function ver_afericoes()
	{
		$this->load->model('F_estoque_oleo_acido_model');
		$this->load->model('F_afericao_oleo_acido_model');
		$this->load->model('F_quebra_oleo_acido_model');


		$data['afericoes'] = $this->F_afericao_oleo_acido_model->recebe_afericoes();
		$data['quebra'] = $this->F_quebra_oleo_acido_model->recebe_quebras();


		$data['estoque'] = $this->F_estoque_oleo_acido_model->recebe_estoque();

		$data['pagina'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/afericoes_oleo_acido');
		$this->load->view('financeiro/footer');
	}

	public function ver_afericoes_filtrado()
	{
		$this->load->model('F_estoque_oleo_acido_model');
		$this->load->model('F_afericao_oleo_acido_model');
		$this->load->model('F_quebra_oleo_acido_model');


		$data['data_inicial'] = $this->input->post('data_inicial');
		$data['data_final'] = $this->input->post('data_final');

		$data['afericoes'] = $this->F_afericao_oleo_acido_model->recebe_afericoes_filtrado($data['data_final'], $data['data_inicial']);


		$data['quebra'] = $this->F_quebra_oleo_acido_model->filtra_quebra($data['data_final'], $data['data_inicial']);


		$data['estoque'] = $this->F_estoque_oleo_acido_model->recebe_estoque();

		$data['pagina'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/afericoes_oleo_acido');
		$this->load->view('financeiro/footer');
	}


	public function historico_estoque()
	{
		$this->load->model('F_estoque_oleo_acido_model');

		$data['estoque'] = $this->F_estoque_oleo_acido_model->recebe_estoque_total();

		$data['pagina'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/estoque_oleo_acido');
		$this->load->view('financeiro/footer');
	}

	public function filtra_historico_acido()
	{
		$this->load->model('F_estoque_oleo_acido_model');

		$data['data_inicial'] = $this->input->post('data_inicial');
		$data['data_final'] = $this->input->post('data_final');

		$data['estoque'] = $this->F_estoque_oleo_acido_model->filtra_estoque($data['data_final'], $data['data_inicial']);

		$data['pagina'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/estoque_oleo_acido');
		$this->load->view('financeiro/footer');
	}



	public function lancar_quebra()
	{

		$this->load->view('financeiro/header');
		$this->load->view('financeiro/formulario_quebra_acida');
		$this->load->view('financeiro/footer');
	}

	public function formulario_entrada_oleo_acido()
	{
		$this->load->model('F_fornecedores_model');
		$this->load->model('F_afericao_oleo_acido_model');

		$id = $this->uri->segment(3);

		$data['afericao'] = $this->F_afericao_oleo_acido_model->recebe_afericao($id);

		$data['fornecedores'] = $this->F_fornecedores_model->recebe_fornecedores();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_entrada_oleo_acido');
		$this->load->view('financeiro/footer');
	}


	public function inserir_quebra()
	{

		$this->load->model('F_quebra_oleo_acido_model');
		$this->load->model('F_estoque_oleo_acido_model');


		$dados['data_quebra'] = $this->input->post('data_quebra');
		$dados['tipo'] = $this->input->post('tipo');
		$dados['quantidade'] = $this->input->post('quantidade');


		$estoque = $this->F_estoque_oleo_acido_model->recebe_estoque();

		if ($estoque['quantidade'] > $dados['quantidade']) {

			$data['quantidade'] = $estoque['quantidade'] - $dados['quantidade'];
			$data['movimentacao'] = $dados['quantidade'];
			$data['tipo_movimentacao'] = "Lançamento de Quebra";
			$data['data_movimentacao'] = date("Y-m-d H:i:s");
			$data['usuario'] =   $this->session->userdata('nome_usuario');


			$this->F_estoque_oleo_acido_model->inserir_estoque($data);

			$this->F_quebra_oleo_acido_model->inserir_quebra($dados);
		} else {
			redirect('F_oleo_acido/inicio/erro');
		}

		redirect('F_oleo_acido/inicio/oleo_acido');
	}

	public function inserir_oleo_acido()
	{

		$this->load->model('F_estoque_oleo_acido_model');
		$this->load->model('F_afericao_oleo_acido_model');


		//Dados para aferição óleo acido
		$id = $this->input->post('id');

		$data['fornecedor'] = $this->input->post('fornecedor');
		$data['data_entrada'] = $this->input->post('data_entrada');
		$data['tipo'] = $this->input->post('tipo');
		$data['aferido'] = $this->input->post('aferido');
		$data['pago'] = $this->input->post('pago');
		$data['valor'] = $this->input->post('valor');
		$data['nota'] = $this->input->post('nota');


		//se o valor lançado for em tipo KG, converte para Litro, para somar em estoque.
		if ($data['tipo'] == 'Kg') {

			$data['aferido'] = $data['aferido'] / 0.92;
			$data['pago'] = $data['pago'] / 0.92;

			$data['valor'] = $data['valor'] * 0.92;
		}

		$data['valor_total'] = $data['pago'] * $data['valor'];


		//insere afericao

		$estoque = $this->F_estoque_oleo_acido_model->recebe_estoque();

		//Verifica se é o primeiro cadastro ou edição.
		if ($id != '') {

			$data['valor_total'] = $this->input->post('valor_total');


			//recebe novamente a afericao que esta sendo editada, para realizar calculos do estoque.
			$afericao = $this->F_afericao_oleo_acido_model->recebe_afericao($id);

			//Dados para inserir no estoque
			$dados['quantidade'] = $data['aferido'] + $estoque['quantidade'] - $afericao['aferido'];
			$dados['movimentacao'] = $data['aferido'];
			$dados['tipo_movimentacao'] = "Edita entrada de óleo Ácido";
			$dados['data_movimentacao'] = date("Y-m-d H:i:s");

			$this->F_afericao_oleo_acido_model->atualiza_afericao($data, $id);
		} else {

			//Dados para inserir no estoque
			$dados['quantidade'] = $data['aferido'] + $estoque['quantidade'];
			$dados['movimentacao'] = $data['aferido'];
			$dados['tipo_movimentacao'] = "Entrada de óleo Ácido";
			$dados['data_movimentacao'] = date("Y-m-d H:i:s");

			$this->F_afericao_oleo_acido_model->inserir_afericao($data);
		}

		$dados['usuario'] = $this->input->post('usuario');

		$this->F_estoque_oleo_acido_model->inserir_estoque($dados);


		redirect('F_oleo_acido/ver_afericoes');
	}


	public function deleta_quebra_estoque_oleo_acido()
	{

		$this->load->model('F_quebra_oleo_acido_model');
		$this->load->model('F_estoque_oleo_acido_model');

		$id = $this->uri->segment(3);

		$estoque = $this->F_estoque_oleo_acido_model->recebe_estoque();

		$quebra = $this->F_quebra_oleo_acido_model->recebe_quebra($id);

		$dados['quantidade'] = $estoque['quantidade'] + $quebra['quantidade'];
		$dados['movimentacao'] = $quebra['quantidade'];
		$dados['tipo_movimentacao'] = "Cancelamento de Quebra";
		$dados['data_movimentacao'] = date("Y-m-d H:i:s");
		$dados['usuario'] =   $this->session->userdata('nome_usuario');

		$this->F_estoque_oleo_acido_model->inserir_estoque($dados);

		$this->F_quebra_oleo_acido_model->deleta_quebra($id);

		redirect('F_oleo_acido/inicio/oleo_acido');
	}



	public function deleta_quebra_oleo_acido()
	{

		$this->load->model('F_quebra_oleo_acido_model');

		$id = $this->uri->segment(3);

		$this->F_quebra_oleo_acido_model->deleta_quebra($id);

		redirect('F_oleo_acido/inicio/oleo_acido');
	}



	public function exibir_vendas()
	{
		$this->load->model('F_destinacao_model');

		$data['data_inicial'] = date('Y/m/01');
		$data['data_final'] = date('Y/m/d');

		$data['destinacoes'] = $this->F_destinacao_model->filtra_destinacoes($data['data_inicial'], $data['data_final']);

		$data['pagina'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/vendas_oleo_filtrado');
		$this->load->view('financeiro/footer');
	}


	public function exibir_vendas_filtrado()
	{
		$this->load->model('F_destinacao_model');

		$data['data_inicial'] = $this->input->post('data_inicial');
		$data['data_final'] = $this->input->post('data_final');

		$data['destinacoes'] = $this->F_destinacao_model->filtra_destinacoes($data['data_inicial'], $data['data_final']);

		$data['pagina'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/vendas_oleo_filtrado');
		$this->load->view('financeiro/footer');
	}


	public function deleta_afericao_estoque()
	{

		$this->load->model('F_afericao_oleo_acido_model');
		$this->load->model('F_estoque_oleo_acido_model');

		$id = $this->uri->segment(3);

		$estoque = $this->F_estoque_oleo_acido_model->recebe_estoque();
		$afericao = $this->F_afericao_oleo_acido_model->recebe_afericao($id);


		//Dados para inserir no estoque
		$dados['quantidade'] = $estoque['quantidade'] - $afericao['aferido'];
		$dados['movimentacao'] = $afericao['aferido'];
		$dados['tipo_movimentacao'] = "Deleta Aferição de óleo Ácido";
		$dados['data_movimentacao'] = date("Y-m-d H:i:s");
		$dados['usuario'] =   $this->session->userdata('nome_usuario');


		$this->F_estoque_oleo_acido_model->inserir_estoque($dados);

		$this->F_afericao_oleo_acido_model->deleta_afericao($id);

		redirect('F_oleo_acido/ver_afericoes/deletado');
	}


	public function deleta_afericao()
	{

		$this->load->model('F_afericao_oleo_acido_model');

		$id = $this->uri->segment(3);

		$this->F_afericao_oleo_acido_model->deleta_afericao($id);

		redirect('F_oleo_acido/ver_afericoes/deletado');
	}
}
