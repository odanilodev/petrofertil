<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_venda_reciclagem extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('F_venda_reciclagem_model');
	}


	public function job()
	{

		$vendas = $this->F_venda_reciclagem_model->recebe_vendas();

		foreach ($vendas as $v) {


			$data_venda = $v['data_venda'];
			$comprador = $v['comprador'];

			$produto = json_decode($v['produto'], true);
			$unidade_peso = json_decode($v['unidade_peso'], true);
			$valor_venda = json_decode($v['valor_venda'], true);
			$valor_total = json_decode($v['valor_total'], true);


			for ($i = 0; $i < count($produto); $i++) {

				$dados['data_venda'] = $data_venda;
				$dados['comprador'] = $comprador;

				$dados['produto'] = $produto[$i];
				$dados['unidade_peso'] = $unidade_peso[$i];
				$dados['valor_venda'] = $valor_venda[$i];
				$dados['valor_total'] = $valor_total[$i];

				$this->F_venda_reciclagem_model->cadastrar_produto_individual($dados);
			}
		}
	}

	public function inicio()
	{
		$data['vendas'] = $this->F_venda_reciclagem_model->recebe_vendas();

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/vendas_reciclagem');
		$this->load->view('financeiro/footer');
	}

	public function filtra_vendas_reciclagem()
	{

		$data['data_inicial'] = $this->input->post('data_inicial');
		$data['data_final'] = $this->input->post('data_final');
	
		$status = $this->input->post('status');

		if($status == 'ambas'){

			$data['vendas'] = $this->F_venda_reciclagem_model->recebe_vendas_filtrada($data['data_inicial'], $data['data_final']);

		}elseif($status == 'pagas'){

			$data['vendas'] = $this->F_venda_reciclagem_model->recebe_vendas_filtrada_pagas($data['data_inicial'], $data['data_final']);

		}elseif($status == 'naopagas'){

			$data['vendas'] = $this->F_venda_reciclagem_model->recebe_vendas_filtrada_naopagas($data['data_inicial'], $data['data_final']);

		}

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/vendas_reciclagem_filtrada');
		$this->load->view('financeiro/footer');
	}


	public function formulario_cadastro()
	{

		$this->load->model('F_produtos_reciclagem_model');

		$this->load->model('F_clientes_model');


		$data['produtos'] = $this->F_produtos_reciclagem_model->recebe_produtos();

		$data['clientes'] = $this->F_clientes_model->recebe_clientes();


		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_venda_reciclagem');
		$this->load->view('financeiro/footer');
	}


	public function cadastrar_venda()
	{

		$dados['data_venda'] = $this->input->post('data_venda');
		$dados['produto'] = json_encode($this->input->post('produto'));
		$dados['comprador'] = $this->input->post('comprador');
		$dados['unidade_peso'] = json_encode($this->input->post('unidade_peso'));
		$dados['valor_venda'] = json_encode($this->input->post('valor_venda'));
		$dados['valor_total'] = json_encode($this->input->post('valor_total'));

		$unidade_peso = $this->input->post('unidade_peso');

		$contador = count($unidade_peso);


		for ($a = 0; $a < $contador; $a++) {

			$data_venda = $this->input->post('data_venda');
			$produto = $this->input->post('produto');
			$comprador = $this->input->post('comprador');
			$unidade_peso = $this->input->post('unidade_peso');
			$valor_venda = $this->input->post('valor_venda');
			$valor_total = $this->input->post('valor_total');

			$data['data_venda'] = $data_venda;
			$data['produto'] = $produto[$a];
			$data['comprador'] = $comprador;
			$data['unidade_peso'] = $unidade_peso[$a];
			$data['valor_venda'] = $valor_venda[$a];
			$data['valor_total'] = $valor_total[$a];

			$this->F_venda_reciclagem_model->cadastrar_produto_individual($data);
		}

		$total = $this->input->post('valor_total');

		$soma_total = 0;

		foreach ($total as $t) {

			$soma_total = $soma_total + $t;
		}

		$dados['soma_total'] = $soma_total;

		$this->F_venda_reciclagem_model->cadastrar_venda($dados);

		redirect('F_venda_reciclagem/inicio/');
	}


	public function atualizar_venda()
	{

		$id = $this->input->post('id');
		$dados['data_venda'] = $this->input->post('data_venda');
		$dados['data_recebimento'] = $this->input->post('data_recebimento');
		$dados['produto'] = json_encode($this->input->post('produto'));
		$dados['comprador'] = $this->input->post('comprador');
		$dados['unidade_peso'] = json_encode($this->input->post('unidade_peso'));
		$dados['valor_venda'] = json_encode($this->input->post('valor_venda'));
		$dados['valor_total'] = json_encode($this->input->post('valor_total'));

		if ($dados['data_recebimento'] == '' or $dados['data_recebimento'] == '0000-00-00') {

			$dados['data_recebimento'] = null;
		};

		$unidade_peso = $this->input->post('unidade_peso');

		$contador = count($unidade_peso);

		for ($a = 0; $a < $contador; $a++) {

			$data_venda = $this->input->post('data_venda');
			$produto = $this->input->post('produto');
			$comprador = $this->input->post('comprador');
			$unidade_peso = $this->input->post('unidade_peso');
			$valor_venda = $this->input->post('valor_venda');
			$valor_total = $this->input->post('valor_total');

			$data['data_venda'] = $data_venda;
			$data['produto'] = $produto[$a];
			$data['comprador'] = $comprador;
			$data['unidade_peso'] = $unidade_peso[$a];
			$data['valor_venda'] = $valor_venda[$a];
			$data['valor_total'] = $valor_total[$a];

			$this->F_venda_reciclagem_model->cadastrar_produto_individual($data);
		}

		$total = $this->input->post('valor_total');

		$soma_total = 0;

		foreach ($total as $t) {

			$soma_total = $soma_total + $t;
		}

		$dados['soma_total'] = $soma_total;

		$this->F_venda_reciclagem_model->edita_venda($dados, $id);

		redirect('F_venda_reciclagem/inicio/');
	}

	public function atualiza_venda_produto()
	{
		$id = $this->input->post('id');

		$id_produto =  $this->input->post('pagina_id');

		$data['data_venda'] = $this->input->post('data_venda');
		$data['produto'] =  $this->input->post('produto');
		$data['comprador'] =  $this->input->post('comprador');
		$data['unidade_peso'] = $this->input->post('unidade_peso');
		$data['valor_venda'] = $this->input->post('valor_venda');
		$data['valor_total'] = $this->input->post('valor_total');

		$this->F_venda_reciclagem_model->atualiza_venda_produto($data, $id);


		redirect('F_venda_reciclagem/ver_vendas_produto/' . $id_produto);
	}

	public function recebe_valor()
	{

		$this->load->model('F_fluxo_model');

		$this->load->model('F_caixa_model');



		$id = $this->uri->segment(3);

		$comprador = $this->uri->segment(4);

		$emissao = $this->uri->segment(5);


		$venda = $this->F_venda_reciclagem_model->recebe_venda($id);



		$caixa = $this->F_caixa_model->recebe_caixa_reciclagem();

		$data['data_recebimento'] = $this->input->post('data_recebimento');

		$data['valor_recebido'] = $this->input->post('valor_recebido');

		$fluxo['data_registro'] = date('Y-m-d H:i:s');
		$fluxo['data_fluxo'] = $data['data_recebimento'];
		$fluxo['data_emissao'] = $data['data_recebimento'];
		$fluxo['empresa'] = "Reciclagem";
		$fluxo['valor'] = $data['valor_recebido'];
		$fluxo['despesa'] = 'entrada';
		$fluxo['pago_recebido'] = $venda['comprador'];
		$fluxo['observacao'] = "Venda de Reciclagem";


		$dados['caixa'] = $caixa['caixa'] + $data['valor_recebido'];


		$this->F_caixa_model->atualiza_caixa_reciclagem($dados);

		$this->F_venda_reciclagem_model->edita_venda($data, $id);

		$this->F_fluxo_model->inserir_entrada_fluxo($fluxo);


		redirect('F_venda_reciclagem/inicio/');
	}


	public function visualizar_venda()
	{
		$this->load->model('F_produtos_reciclagem_model');

		$id = $this->uri->segment(3);

		$venda = $this->F_venda_reciclagem_model->recebe_venda($id);


		$this->load->view('financeiro/header', $venda);
		$this->load->view('financeiro/ver_venda_reciclagem');
		$this->load->view('financeiro/footer');
	}


	public function imprimir_venda()
	{
		$this->load->model('F_produtos_reciclagem_model');

		$id = $this->uri->segment(3);

		$venda = $this->F_venda_reciclagem_model->recebe_venda($id);

		$this->load->view('financeiro/venda_reciclagem_impressao', $venda);
		$html = $this->output->get_output();
		// Load pdf library
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->render();
		// Output the generated PDF (1 = download and 0 = preview)
		$this->pdf->stream("venda_reciclagem.pdf", array("Attachment" => 1));
	}

	public function editar_venda()
	{
		$this->load->model('F_produtos_reciclagem_model');

		$this->load->model('F_clientes_model');


		$data['produtos'] = $this->F_produtos_reciclagem_model->recebe_produtos();

		$data['clientes'] = $this->F_clientes_model->recebe_clientes();

		$id = $this->uri->segment(3);

		$data['venda'] = $this->F_venda_reciclagem_model->recebe_venda($id);


		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/editar_venda_reciclagem');
		$this->load->view('financeiro/footer');
	}

	public function editar_venda_produto()
	{
		$this->load->model('F_produtos_reciclagem_model');

		$this->load->model('F_clientes_model');


		$data['produtos'] = $this->F_produtos_reciclagem_model->recebe_produtos();

		$data['clientes'] = $this->F_clientes_model->recebe_clientes();

		$id = $this->uri->segment(3);

		$data['venda'] = $this->F_venda_reciclagem_model->recebe_venda_produto($id);

		$data['id'] = $id;

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/edita_venda_produto_reciclagem');
		$this->load->view('financeiro/footer');
	}



	public function ver_vendas_produto()
	{

		$this->load->model('F_produtos_reciclagem_model');

		$data['data_inicial'] = date('Y/m/01');
		$data['data_final'] = date('Y/m/d');

		$data['id'] = $this->uri->segment(3);

		$produto = $this->F_produtos_reciclagem_model->recebe_produto($data['id']);

		$data['vendas'] = $this->F_produtos_reciclagem_model->recebe_produtos_relatorio($produto['nome'], $data['data_inicial'], $data['data_final']);

		$data['produto'] = $produto;


		$this->load->view('financeiro/header', $data, $produto);
		$this->load->view('financeiro/ver_venda_produto');
		$this->load->view('financeiro/footer');
	}

	public function ver_vendas_produto_filtrado()
	{

		$this->load->model('F_produtos_reciclagem_model');

		$data['data_inicial'] = $this->input->post('data_inicial');
		$data['data_final'] = $this->input->post('data_final');

		$data['id'] = $this->uri->segment(3);

		$produto = $this->F_produtos_reciclagem_model->recebe_produto($data['id']);

		$data['vendas'] = $this->F_produtos_reciclagem_model->recebe_produtos_relatorio($produto['nome'], $data['data_inicial'], $data['data_final']);

		$data['produto'] = $produto;


		$this->load->view('financeiro/header', $data, $produto);
		$this->load->view('financeiro/ver_venda_produto');
		$this->load->view('financeiro/footer');
	}


	public function deleta_venda()
	{
		$id = $this->uri->segment(3);

		$this->F_venda_reciclagem_model->deleta_venda($id);

		redirect('F_venda_reciclagem/inicio');
	}

	public function deleta_venda_produto()
	{
		$id = $this->uri->segment(3);

		$id_produto = $this->uri->segment(4);

		$this->F_venda_reciclagem_model->deleta_venda_produto($id);

		redirect('F_venda_reciclagem/ver_vendas_produto/' . $id_produto);
	}
}
