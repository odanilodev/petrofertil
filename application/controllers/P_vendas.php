<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_vendas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('P_vendas_model');
	}

	public function index()
	{

		$vendas = $this->P_vendas_model->recebe_vendas();

		$total_vendido = 0;
		$numero_vendas = 0;
		foreach ($vendas as $venda) {

			$total_vendido += $venda['valor_total_venda'];
			$numero_vendas++;
		}

		$data['total_vendido'] = $total_vendido;
		$data['numero_vendas'] = $numero_vendas;

		$data['vendas'] = $vendas;

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/vendas_petrofertil');
		$this->load->view('petrofertil/footer');

	}

	public function filtra_vendas()
	{

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');

		$vendas = $this->P_vendas_model->recebe_vendas_filtrada($data_inicial, $data_final);

		$total_vendido = 0;
		$numero_vendas = 0;
		foreach ($vendas as $venda) {

			$total_vendido += $venda['valor_total_venda'];
			$numero_vendas++;
		}

		$data['total_vendido'] = $total_vendido;
		$data['numero_vendas'] = $numero_vendas;

		$data['vendas'] = $vendas;



		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/vendas_petrofertil');
		$this->load->view('petrofertil/footer');

	}


	public function vendas_vendedor()
	{

		$nome_url = $this->uri->segment(3);
		$nome_decoded = str_replace(['-', '_'], [' ', '+'], $nome_url);
		$nome_vendedor = urldecode($nome_decoded);

		$vendas = $this->P_vendas_model->recebe_vendas_vendedor($nome_vendedor);

		$total_vendido = 0;
		$numero_vendas = 0;
		foreach ($vendas as $venda) {

			$total_vendido += $venda['valor_total_venda'];
			$numero_vendas++;
		}

		$data['vendas'] = $vendas;

		$data['total_vendido'] = $total_vendido;
		$data['numero_vendas'] = $numero_vendas;


		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/vendas_petrofertil');
		$this->load->view('petrofertil/footer');

	}

	public function formulario_vendas()
	{
		$this->load->model('P_contas_model');
		$this->load->model('P_vendedores_petrofertil_model');
		$this->load->model('Clientes_petrofertil_model');
		$this->load->model('P_motoristas_model');
		$this->load->model('P_produtos_model');
		$this->load->model('P_transportadores_model');


		$data['contas'] = $this->P_contas_model->recebe_contas();
		$data['clientes'] = $this->Clientes_petrofertil_model->recebe_clientes();
		$data['vendedores'] = $this->P_vendedores_petrofertil_model->recebe_vendedores();
		$data['motoristas'] = $this->P_motoristas_model->recebe_motoristas();
		$data['produtos'] = $this->P_produtos_model->recebe_produtos();
		$data['transportadores'] = $this->P_transportadores_model->recebe_transportadores();


		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_vendas');
		$this->load->view('petrofertil/footer');

	}


	public function ver_venda()
	{
		$this->load->model('P_vendas_model');
		$this->load->model('Clientes_petrofertil_model');

		$id_venda = $this->uri->segment(3);

		$data['venda'] = $this->P_vendas_model->recebe_venda($id_venda);

		$data['cliente'] = $this->Clientes_petrofertil_model->recebe_cliente($data['venda']['cliente']);

		$data['produto'] = json_decode($data['venda']['produto']);
		$data['valor_produto'] = json_decode($data['venda']['valor_produto']);
		$data['comissao'] = json_decode($data['venda']['comissao']);
		$data['quantidade'] = json_decode($data['venda']['quantidade']);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/ver_venda');
		$this->load->view('petrofertil/footer');

	}

	public function ver_venda_codigo()
	{
		$this->load->model('P_vendas_model');
		$this->load->model('Clientes_petrofertil_model');

		$codigo = $this->uri->segment(3);

		$data['venda'] = $this->P_vendas_model->recebe_venda_codigo($codigo);

		$data['cliente'] = $this->Clientes_petrofertil_model->recebe_cliente($data['venda']['cliente']);

		$data['produto'] = json_decode($data['venda']['produto']);
		$data['valor_produto'] = json_decode($data['venda']['valor_produto']);
		$data['comissao'] = json_decode($data['venda']['comissao']);
		$data['quantidade'] = json_decode($data['venda']['quantidade']);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/ver_venda');
		$this->load->view('petrofertil/footer');

	}

	public function edita_venda()
	{

		$id = $this->uri->segment(3);

		$data['venda'] = $this->P_vendas_model->recebe_venda($id);

		//$this->load->view('petrofertil/header', $data);
		//$this->load->view('petrofertil/formulario_vendedores_petrofertil');
		//$this->load->view('petrofertil/footer');

	}

	public function cadastra_venda()
	{

		$this->load->model('P_fluxo_model');
		$this->load->model('P_cheques_model');
		$this->load->model('P_contas_receber_model');
		$this->load->model('P_contas_pagar_model');
		$this->load->model('P_vendas_produtos_model');

		$id = $this->input->post('id');

		$dados['data_venda'] = $this->input->post('data_venda');
		$dados['ticket'] = $this->input->post('ticket');
		$dados['cliente'] = $this->input->post('cliente');
		$dados['vendedor'] = $this->input->post('vendedor');
		$dados['preco_kg'] = $this->input->post('preco_kg');
		$dados['prazo_pagamento'] = $this->input->post('prazo_pagamento');
		$dados['forma_pagamento'] = $this->input->post('forma_pagamento');
		$dados['status_pagamento'] = $this->input->post('status_pagamento');
		$dados['valor_frete'] = $this->input->post('valor_frete');
		$dados['valor_comissao'] = $this->input->post('valor_comissao');
		$dados['frete'] = $this->input->post('frete');
		$dados['motorista'] = $this->input->post('motorista');
		$dados['placa'] = $this->input->post('placa');
		$dados['transportador'] = $this->input->post('transportador');
		$dados['produto'] = $this->input->post('produto');
		$dados['valor_produto'] = $this->input->post('valor_produto');
		$dados['comissao'] = $this->input->post('comissao');
		$dados['quantidade'] = $this->input->post('quantidade');
		$dados['imposto'] = $this->input->post('imposto');
		$dados['lucro_bruto'] = $this->input->post('lucro_bruto');
		$dados['informacoes_pagamento'] = $this->input->post('informacoes_pagamento');
		$dados['conta_relacionada'] = $this->input->post('conta_relacionada');
		$dados['adicional'] = $this->input->post('adicional');
		$dados['motivo_adicional'] = $this->input->post('motivo_adicional');
		$dados['valor_total_venda'] = $this->input->post('valor_total_venda');
		$dados['valor_km'] = $this->input->post('valor_km');
		$dados['km_total'] = $this->input->post('km_total');

		$prefixo = 'VENDA_'; // Prefixo para garantir unicidade

		// Gerar um código aleatório único
		$codigo_venda = $prefixo . uniqid();


		if ($dados['valor_frete'] != '') {
			$conta_pagar['vencimento'] = $dados['prazo_pagamento'];
			$conta_pagar['data_emissao'] = $dados['data_venda'];
			$conta_pagar['valor'] = $dados['valor_frete'];
			$conta_pagar['pago_para'] = $dados['transportador'];
			$conta_pagar['id_conta'] = $dados['conta_relacionada'];
			$conta_pagar['status'] = 0;
			$conta_pagar['categoria'] = 'Pagamento de frete';
			$conta_pagar['observacao'] = 'Pagamento de frete ->' . $dados['transportador'];
			$conta_pagar['quantidade_parcela'] = '1/1';

			$conta_pagar['codigo_venda'] = $codigo_venda;

			$this->P_contas_pagar_model->inserir_conta($conta_pagar);

		}



		$contador = 0;
		foreach ($dados['produto'] as $produtos) {

			$produto = explode('/', $produtos);
			$venda['quantidade'] = $dados['quantidade'][$contador];
			$venda['produto'] = $produto[$contador];
			$venda['materia_prima'] = $produto[$contador];
			$venda['valor_produto'] = $dados['valor_produto'][$contador];


			if ($dados['vendedor'] != '' && $dados['vendedor'] != '*Sem Vendedor*') {

				$quantidade = str_replace('.', '', $dados['quantidade'][$contador]);

				$venda['comissao_vendedor'] = $quantidade * $dados['comissao'][$contador];

				$venda['vendedor'] = $dados['vendedor'];

				$conta_pagar['vencimento'] = $dados['data_venda'];
				$conta_pagar['data_emissao'] = $dados['data_venda'];
				$conta_pagar['valor'] = $venda['comissao_vendedor'];
				$conta_pagar['pago_para'] = $venda['vendedor'];
				$conta_pagar['id_conta'] = $dados['conta_relacionada'];
				$conta_pagar['status'] = 0;
				$conta_pagar['categoria'] = 'Comissao sobre venda';
				$conta_pagar['observacao'] = 'Pagamento de comissão para sob venda';
				$conta_pagar['quantidade_parcela'] = '1/1';

				$conta_pagar['codigo_venda'] = $codigo_venda;


				$this->P_contas_pagar_model->inserir_conta($conta_pagar);


			}


			$this->P_vendas_produtos_model->insere_venda($venda);

			$contador++;

		}



		if ($dados['status_pagamento'] == 'pago') {

			if ($dados['forma_pagamento'] == 'cheque') {

				$cheque['numero'] = $this->input->POST('nome_cheque');
				$cheque['data_compensasao'] = $this->input->POST('data_vencimento_cheque');
				$cheque['recebido'] = $dados['cliente'];
				$cheque['valor'] = $this->input->POST('valor_cheque');
				$cheque['referente'] = 'Venda ticket ' . $dados['ticket'];
				$cheque['status'] = "A compensar";
				$cheque['observacao'] = $dados['informacoes_pagamento'];

				$this->P_cheques_model->inserir_cheque($cheque);

			}

			if ($dados['forma_pagamento'] != 'cheque') {

				$data['conta'] = $dados['conta_relacionada'];
				$data['valor'] = $dados['valor_total_venda'];
				$data['despesa'] = 'Entrada';
				$data['observacao'] = $dados['total'];
				$data['id_relacao'] = 0;
				$data['data_registro'] = $dados['data_venda'];
				$data['pago_recebido'] = $dados['cliente'];

				$this->P_fluxo_model->inserir_entrada_fluxo($data);

			}

		} else {

			$receber['vencimento'] = $dados['prazo_pagamento'];
			$receber['data_emissao'] = date('Y-m-d');
			$receber['valor'] = $dados['valor_total_venda'];
			$receber['cliente'] = $dados['cliente'];

			if ($dados['vendedor'] != '' && $dados['vendedor'] != '*Sem Vendedor*') {

				$receber['recebido_de'] = $venda['vendedor'];

			} else {
				$receber['recebido_de'] = '*Sem Vendedor*';
			}

			$receber['conta'] = $dados['conta_relacionada'];
			$receber['status'] = 0;
			$receber['observacao'] = $dados['informacoes_pagamento'];

			$receber['codigo_venda'] = $codigo_venda;

			$this->P_contas_receber_model->inserir_conta($receber);

		}

		$dados['produto'] = json_encode($this->input->post('produto'));
		$dados['valor_produto'] = json_encode($this->input->post('valor_produto'));
		$dados['comissao'] = json_encode($this->input->post('comissao'));
		$dados['quantidade'] = json_encode($this->input->post('quantidade'));
		$dados['codigo_venda'] = $codigo_venda;


		$this->P_vendas_model->insere_venda($dados);

		redirect('P_vendas');


	}

	public function deleta_venda()
	{

		$this->load->model('P_contas_pagar_model');
		$this->load->model('P_contas_receber_model');

		$id = $this->uri->segment(3);

		$codigo_venda = $this->uri->segment(4);


		$this->P_contas_pagar_model->deleta_conta_vinculo($codigo_venda);
		$this->P_contas_receber_model->deleta_conta_vinculo($codigo_venda);

		$this->P_vendas_model->deleta_venda($id);

		redirect("P_vendas");
	}
}