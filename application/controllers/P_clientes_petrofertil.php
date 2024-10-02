<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_clientes_petrofertil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Login_model');
		$this->load->model('Clientes_petrofertil_model');
	}

	public function index()
	{

		$data['clientes'] = $this->Clientes_petrofertil_model->recebe_clientes();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/clientes_petrofertil');
		$this->load->view('petrofertil/footer');

	}

	public function cadastra_cliente()
	{
		$this->load->model("P_vendedores_petrofertil_model");
		$this->load->model("P_produtos_model");

		$id = $this->uri->segment(3);

		$data['cliente'] = $this->Clientes_petrofertil_model->recebe_cliente($id);
		$data['vendedores'] = $this->P_vendedores_petrofertil_model->recebe_vendedores();
		$data['produtos'] = $this->P_produtos_model->recebe_produtos();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_clientes_petrofertil');
		$this->load->view('petrofertil/footer');

	}


	public function edita_cliente()
	{
		$this->load->model("P_vendedores_petrofertil_model");
		$this->load->model("P_produtos_model");

		$id = $this->uri->segment(3);

		$data['produtos'] = $this->P_produtos_model->recebe_produtos();
		$data['cliente'] = $this->Clientes_petrofertil_model->recebe_cliente($id);
		$data['vendedores'] = $this->P_vendedores_petrofertil_model->recebe_vendedores();

		$data['produto'] = json_decode($data['cliente']['produto']);
		$data['materia_prima'] = json_decode($data['cliente']['materia_prima']);
		$data['medida_produto'] = json_decode($data['cliente']['medida_produto']);
		$data['valor_produto'] = json_decode($data['cliente']['valor_produto']);
		$data['comissao'] = json_decode($data['cliente']['comissao']);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/edita_cliente_petrofertil');
		$this->load->view('petrofertil/footer');

	}

	public function ver_cliente()
	{

		$id = $this->uri->segment(3);

		$data['cliente'] = $this->Clientes_petrofertil_model->recebe_cliente($id);

		$data['produto'] = json_decode($data['cliente']['produto']);
		$data['valor_produto'] = json_decode($data['cliente']['valor_produto']);
		$data['comissao'] = json_decode($data['cliente']['comissao']);
		$data['medida_produto'] = json_decode($data['cliente']['medida_produto']);


		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/ver_cliente_petrofertil');
		$this->load->view('petrofertil/footer');

	}

	public function recebe_cliente()
	{
		$id_cliente = $this->input->post('id_cliente');
		$cliente = $this->Clientes_petrofertil_model->recebe_cliente($id_cliente);

		$produtos = json_decode($cliente['produto'], true);
		$materia_prima = json_decode($cliente['materia_prima'], true);
		$valor_produto = json_decode($cliente['valor_produto'], true);
		$comissao = json_decode($cliente['comissao'], true);
		$medida_produto = json_decode($cliente['medida_produto'], true);
		$valorTipoFrete = $cliente['valor_frete'];
		$valorPorTonelada = $cliente['valor_por_tonelada'];


		$option = '';
		$posicao = 0; // Inicializa a posição aqui

		$option .= '<option>Selecione o produto</option>';

		foreach ($produtos as $p) {
			$option .= "<option class='info-produto' medidaProduto='$medida_produto[$posicao]' valorProduto='$valor_produto[$posicao]' comissaoProduto='$comissao[$posicao]' value='$p / $materia_prima[$posicao]'>$p / $materia_prima[$posicao]</option>";
			$posicao++;
		}

		$option_vendedor = "<option class='info-produto' value='" . $cliente['vendedor'] . "'>" . $cliente['vendedor'] . "</option>";

		$option_frete = "<option class='info-produto' value='" . $cliente['tipo_frete'] . "'>" . $cliente['tipo_frete'] . "</option>";

		// Supondo que $cliente['prazo_pagamento'] contém o número de dias a serem adicionados à data atual
		$prazo_pagamento = $cliente['prazo_pagamento']; // Exemplo: 30 dias

		// Pegar a data atual
		$data_atual = date('Y-m-d'); // Formato de data: Ano-Mês-Dia

		$data_pagamento = date('Y-m-d', strtotime("+$prazo_pagamento days", strtotime($data_atual)));

		$response = array(
			'option_produto' => $option,
			'valor_produto' => $valor_produto,
			'posicao' => $posicao,
			'vendedor' => $option_vendedor,
			'option_frete' => $option_frete,
			'valor_tipo_frete' => $valorTipoFrete,
			'data_pagamento' => $data_pagamento,
			'valor_por_tonelada' => $valorPorTonelada

		);

		return $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}



	public function insere_cliente()
	{

		$id = $this->input->post('id');

		$dados['nome_fantasia'] = $this->input->post('nome_fantasia');
		$dados['razao_social'] = $this->input->post('razao_social');
		$dados['endereco'] = $this->input->post('endereco');
		$dados['cidade'] = $this->input->post('cidade');
		$dados['estado'] = $this->input->post('estado');
		$dados['documento'] = $this->input->post('documento');
		$dados['inscricao_estadual'] = $this->input->post('inscricao_estadual');
		$dados['inscricao_rural'] = $this->input->post('inscricao_rural');
		$dados['contato'] = $this->input->post('contato');
		$dados['telefone'] = $this->input->post('telefone');
		$dados['telefone_secundario'] = $this->input->post('telefone_secundario');
		$dados['vendedor'] = $this->input->post('vendedor');
		$dados['transportador'] = $this->input->post('transportador');
		$dados['forma_pagamento'] = $this->input->post('forma_pagamento');
		$dados['prazo_pagamento'] = $this->input->post('prazo_pagamento');
		$dados['valor_frete'] = $this->input->post('valor_frete');
		$dados['tipo_frete'] = $this->input->post('tipo_frete');
		$dados['valor_por_tonelada'] = $this->input->post('valor_por_tonelada');
		$dados['observacao'] = $this->input->post('observacao');
		$dados['distancia'] = $this->input->post('distancia');

		if ($dados['tipo_frete'] != 'Valor por Tonelada') {
			$dados['valor_por_tonelada'] == '';
		}

		if ($dados['tipo_frete'] != 'Valor por KG') {
			$dados['valor_frete'] == '';
		}

		$dados['produto'] = json_encode($this->input->post('produto'));
		$dados['valor_produto'] = json_encode($this->input->post('valor_produto'));
		$dados['comissao'] = json_encode($this->input->post('comissao'));
		$dados['medida_produto'] = json_encode($this->input->post('medida_produto'));
		$dados['materia_prima'] = json_encode($this->input->post('materia_prima'));


		if ($id != '') {
			$this->Clientes_petrofertil_model->atualiza_cliente($dados, $id);
			redirect('P_clientes_petrofertil');

		} else {
			$this->Clientes_petrofertil_model->inserir_cliente($dados);
			redirect('P_clientes_petrofertil');
		}

	}


	public function download_arquivo()
	{

		$this->load->helper('download');

		$this->load->model('Clientesp_model');

		$id = $this->uri->segment(3);

		$cliente = $this->Clientesp_model->recebe_cliente($id);

		if ($cliente['arquivo'] == '') {

			redirect('Clientes_petro');

		}

		$arquivoPath = base_url('uploads/documentos_petrofertil/') . $cliente['arquivo'];

		$data = file_get_contents('uploads/documentos_petrofertil/' . $cliente['arquivo']); // Read the file's contents

		force_download($arquivoPath, $data);

	}

	public function recebe_todos_clientes_nome()
	{

		$clientes = $this->Clientes_petrofertil_model->recebe_clientes_nome();

		echo json_encode($clientes); // Retorna os dados em formato JSON
	}

	public function deleta_cliente()
	{

		$id = $this->uri->segment(3);

		$this->Clientes_petrofertil_model->deleta_cliente($id);

		redirect("P_clientes_petrofertil");
	}
}
