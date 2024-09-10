<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_estoque extends CI_Controller
{

	public function inicio()
	{
		$this->load->model('F_estoque_model');

		$this->load->model('F_destinacao_model');

		$this->load->model('F_quebra_model');

		$id_estoque = $this->F_estoque_model->recebe_id();

		$data['estoque'] = $this->F_estoque_model->recebe_estoque_new($id_estoque['id']);

		$data['destinacoes'] = $this->F_destinacao_model->recebe_destinacoes();

		$data['quebra'] = $this->F_quebra_model->recebe_quebras();

		$data['pagina'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/estoque');
		$this->load->view('financeiro/footer');
	}


	public function historico_oleo_new()
	{
		$this->load->model('F_estoque_model');

		
		$data['data_inicial'] = date('Y/m/01');
		$data['data_final'] =date('Y/m/d', strtotime("+1 days"));	

		$data['estoque'] = $this->F_estoque_model->filtra_estoque_new($data['data_inicial'], $data['data_final']);
		
		$data['pagina'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/historico_oleo_comum_new');
		$this->load->view('financeiro/footer');
	}

	public function historico_oleo()
	{
		$this->load->model('F_estoque_model');

		
		$data['data_inicial'] = date('Y/m/01');
		$data['data_final'] =date('Y/m/d', strtotime("+1 days"));	

		$data['estoque'] = $this->F_estoque_model->filtra_estoque_historico($data['data_inicial'], $data['data_final']);

		
		$data['pagina'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/historico_oleo_comum');
		$this->load->view('financeiro/footer');
	}

	public function historico_oleo_filtrado()
	{
		$this->load->model('F_estoque_model');

		$data['data_inicial'] = $this->input->post('data_inicial');
		$data['data_final'] = $this->input->post('data_final');

		$data['estoque'] = $this->F_estoque_model->filtra_estoque_historico($data['data_inicial'], $data['data_final']);
		
		$data['pagina'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/historico_oleo_comum');
		$this->load->view('financeiro/footer');
	}

	public function historico_oleo_filtrado_new()
	{
		$this->load->model('F_estoque_model');

		$data['data_inicial'] = $this->input->post('data_inicial');
		$data['data_final'] = $this->input->post('data_final');

		$data['estoque'] = $this->F_estoque_model->filtra_estoque_historico_new($data['data_inicial'], $data['data_final']);
		
		$data['pagina'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/historico_oleo_comum_new');
		$this->load->view('financeiro/footer');
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



	public function inserir_fechamento()
	{

		$this->load->model('F_estoque_model');


		$dados['data_fechamento'] = $this->input->post('data_fechamento');
		$dados['estoque'] = $this->input->post('estoque');

		$estoque_atual = $this->F_estoque_model->busca_estoque($dados['data_fechamento']);



		if ($estoque_atual > 0) {

			$this->F_estoque_model->atualiza_fechamento($dados, $estoque_atual['data_fechamento']);
		} else {
			$this->F_estoque_model->inserir_fechamento($dados);
		}

		redirect('F_estoque/inicio/fechado');
	}

	public function formulario_fechamento()
	{
		$this->load->model('F_estoque_model');


		$data['quantidade'] = $this->uri->segment(3);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_fechamento');
		$this->load->view('financeiro/footer');
	}

	public function busca_diario()
	{

		$this->load->model('F_estoque_model');

		$this->load->model('F_afericao_model');

		$this->load->model('F_quebra_model');

		$this->load->model('F_destinacao_model');


		$data_inicial = '2021-08-04';

		$data_final = $this->input->post('data_inicial');

		$afericoes = $this->F_afericao_model->filtra_afericao_geral($data_inicial, $data_final);

		$afericoes_terceiros = $this->F_afericao_model->filtra_afericao_geral_terceiros($data_inicial, $data_final);


		$aferido = 0;

		foreach ($afericoes as $a) {

			$aferido = $aferido + $a['aferido'];
		};

		foreach ($afericoes_terceiros as $b) {

			$aferido = $aferido + $b['aferido'];
		};

		$quebras = $this->F_quebra_model->filtra_quebra_geral($data_inicial, $data_final);

		$quebras_total = 0;

		foreach ($quebras as $q) {

			$quebras_total = $quebras_total + $q['quantidade'];
		};



		$destinacoes = $this->F_destinacao_model->filtra_destinacoes($data_inicial, $data_final);

		$destinacoes_total = 0;

		foreach ($destinacoes as $d) {

			$destinacoes_total = $destinacoes_total + $d['quantidade'];
		};


		$retira_aferido = $quebras_total + $destinacoes_total;

		$data['estoque_dia'] = $aferido - $retira_aferido;


		$data['estoque_dia'] = $data['estoque_dia'] + 9973;


		$data['fechamentos'] = $this->F_estoque_model->recebe_fechamentos();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/estoque_filtrado');
		$this->load->view('financeiro/footer');
	}

	public function recebe_valor(){


		$this->load->model('F_destinacao_model');

		$this->load->model('F_fluxo_model');
		$this->load->model('F_caixa_model');
		$this->load->model('F_contas_receber_model');

		$id = $this->uri->segment(3);

		$cliente = $this->uri->segment(4);

		$data['valor_recebido'] = $this->input->post('valor_recebido');

		$data['data_recebimento'] = $this->input->post('data_recebimento');

		$destinacao = $this->F_destinacao_model->recebe_destinacao($id);

		$conta = $this->F_contas_receber_model->recebe_conta($destinacao['id_conta']);

		$conta['status'] = 1;
		$conta['valor_recebido'] = $data['valor_recebido'];

		$this->F_contas_receber_model->atualiza_status($destinacao['id_conta'], $conta);

		$this->F_destinacao_model->atualiza_destinacao($data, $id);

		$dados['data_registro'] = date('Y-m-d H:i:s');
		$dados['data_fluxo'] = $data['data_recebimento'];
		$dados['data_emissao'] = $data['data_recebimento'];
		$dados['empresa'] = 'Óleo';
		$dados['valor'] = $data['valor_recebido'];
		$dados['despesa'] = 'entrada';
		$dados['pago_recebido'] = urldecode($cliente);
		$dados['observacao'] = 'Venda de óleo';


		$caixa = $this->F_caixa_model->recebe_caixa();

		$ca['caixa'] = $caixa['caixa'] + $data['valor_recebido'];
	

		$this->F_caixa_model->atualiza_caixa($ca);
		
		
		$this->F_fluxo_model->inserir_entrada_fluxo($dados);


		redirect('F_estoque/inicio/7');

	}
}