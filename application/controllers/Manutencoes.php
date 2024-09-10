<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manutencoes extends CI_Controller
{

	public function index()
	{

		$this->load->model('Manutencao_model');

		$data['manutencoes'] = $this->Manutencao_model->recebe_manutencoes();

		$this->load->view('admin/header', $data);
		$this->load->view('admin/exibir_manutencoes');
		$this->load->view('admin/footer');

	}


	public function filtra_manutencao_geral()
	{

		$this->load->model('Manutencao_model');

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');

		$data['manutencoes'] = $this->Manutencao_model->filtra_manutencao_geral($data_inicial, $data_final);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/exibir_manutencoes');
		$this->load->view('admin/footer');

	}


	public function filtra_manutencao()
	{

		$placa = $this->uri->segment(3);


		$this->load->model('Manutencao_model');

		$data['placa'] = $placa;

		$data['filtrar'] = true;

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');


		$data['manutencao'] = $this->Manutencao_model->filtra_manutencao($placa, $data_inicial, $data_final);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/detalhe_veiculo');
		$this->load->view('admin/footer');


	}


	public function detalhe_veiculo()
	{

		$this->load->model('Manutencao_model');

		$this->load->model('Ordem_model');


		$placa = $this->uri->segment(3);

		$data['manutencao'] = $this->Manutencao_model->recebe_detalhe($placa);

		$data['certificados'] = $this->Ordem_model->recebe_ordem_placa($placa);


		$data['placa'] = $placa;



		$this->load->view('admin/header', $data);
		$this->load->view('admin/detalhe_veiculo');
		$this->load->view('admin/footer');
	}


	public function ver_manutencao()
	{

		$this->load->model('Manutencao_model');

		$this->load->model('Oficinas_model');

		$id = $this->uri->segment(3);

		$data['manutencao'] = $this->Manutencao_model->recebe_manutencao($id);


		$oficina = $data['manutencao']['oficina'];

		$data['oficina'] = $this->Oficinas_model->localiza_oficina($oficina);


		$this->load->view('admin/header', $data);
		$this->load->view('admin/ver_mais');
		$this->load->view('admin/footer');
	}


	public function formulario_manutencao()
	{


		$this->load->model('Veiculos_model');

		$data['placa'] = $this->uri->segment(3);

		$data['carros'] = $this->Veiculos_model->recebe_veiculos();

		$this->load->model('Oficinas_model');

		$data['oficinas'] = $this->Oficinas_model->recebe_oficinas();

		$this->load->view('admin/header', $data);
		$this->load->view('admin/formulario_manutencoes');
		$this->load->view('admin/footer');

	}

	public function edita_manutencao()
	{

		$this->load->model('Oficinas_model');

		$this->load->model('Veiculos_model');

		$this->load->model('Manutencao_model');



		$id = $this->uri->segment(3);

		$data['carros'] = $this->Veiculos_model->recebe_veiculos();

		$data['oficinas'] = $this->Oficinas_model->recebe_oficinas();


		$data['manutencao'] = $this->Manutencao_model->recebe_manutencao($id);


		$this->load->view('admin/header', $data);
		$this->load->view('admin/formulario_edita_manutencoes');
		$this->load->view('admin/footer');

	}


	public function cadastra_manutencao()
	{
		// Carregando os modelos necessários
		$this->load->model('F_contas_model');
		$this->load->model('Manutencao_model');
	
		// Recebendo o último ID de F_contas_model
		$ultimo_id = $this->F_contas_model->recebe_ultimo_id();
	
		// Validando e obtendo dados do POST
		$servicos = $this->input->post('servico');
		$valor = $this->input->post('valor');
		$desconto = $this->input->post('desconto');
		$desconto = is_numeric($desconto) ? $desconto : 0; // Validação básica
	
		// Preparando dados para inserção
		$dados = [
			'servico' => json_encode($servicos),
			'desconto' => $desconto,
			'valor' => json_encode($valor),
			'id_conta' => $ultimo_id['id'],
			'codigo' => $this->input->post('codigo'),
			'placa' => $this->input->post('placa'),
			'oficina' => $this->input->post('oficina'),
			'reclamacao' => $this->input->post('reclamacao'),
			'km' => $this->input->post('km'),
			'data' => $this->input->post('data'),
			'data_saida' => $this->input->post('data_saida'),
			'observacao' => $this->input->post('observacao')
		];
	
		// Calculando valor total da conta
		$valor_conta = array_sum($valor) - $desconto;
	
		// Preparando dados comuns para inserção de conta
		$data = [
			'vencimento' => $this->input->post('data_saida'),
			'data_emissao' => $this->input->post('data'),
			'valor' => $valor_conta,
			'despesa' => $this->input->post('setor'),
			'status' => 0,
			'recebido' => $this->input->post('oficina'),
			'categoria' => 0,
			'observacao' => $this->input->post('placa') . ' > ' . $this->input->post('observacao'),
			'id_macro' => 5,
			'id_micro' => 37
		];
	
		// Inserindo contas
		$valor_parcela = $this->input->post('valor_parcela');
		$quantidade_parcela = $this->input->post('quantidade_parcela');
	
		if ($valor_parcela > 0) {
			for ($contador = 0; $contador < $quantidade_parcela; $contador++) {
				$data['valor'] = ($contador == 0) ? $valor_parcela : $valor_conta;
				if ($contador > 0) {
					$data['vencimento'] = date("Y-m-d", strtotime("+1 month", strtotime($data['vencimento'])));
				}
				$this->F_contas_model->inserir_conta($data);
			}
		} else {
			$this->F_contas_model->inserir_conta($data);
		}
	
		// Inserindo manutenção
		$placa = $this->input->post('placa'); // Verifique se esta variável é necessária
		$this->Manutencao_model->inserir_manutencao($dados, $placa);
	}
	

	public function atualiza_manutencao()
	{
		$this->load->model('F_contas_model');
		$this->load->model('Manutencao_model');

		$id = $this->input->post('id');

		$servicos = $this->input->post('servico');

		$dados['servico'] = json_encode($servicos);

		$valor = $this->input->post('valor');

		$valor_conta = 0;

		foreach($valor as $v){
		$valor_conta = $valor_conta + $v;	
		}

		$valor_conta = $valor_conta - $this->input->post('desconto');

		$dados['valor'] = json_encode($valor);

		$placa = $this->input->post('placa');

		$id_conta = $this->input->post('id_conta');

		$dados['id'] = $this->input->post('id');
		$dados['desconto'] = $this->input->post('desconto');
		$dados['codigo'] = $this->input->post('codigo');
		$dados['placa'] = $this->input->post('placa');
		$dados['oficina'] = $this->input->post('oficina');
		$dados['reclamacao'] = $this->input->post('reclamacao');
		$dados['km'] = $this->input->post('km');
		$dados['data'] = $this->input->post('data');
		$dados['data_saida'] = $this->input->post('data_saida');
		$dados['observacao'] = $this->input->post('observacao');

		$data['vencimento'] = $this->input->post('data_saida');
		$data['data_emissao'] = $this->input->post('data');
		$data['valor'] = $valor_conta;
		$data['despesa'] = $this->input->post('setor');
		$data['status'] = 0;
		$data['recebido'] = $this->input->post('oficina');
		$data['categoria'] = 0;
		$data['observacao'] = $this->input->post('placa');
		$data['id_macro'] = 5;
		$data['id_micro'] = 37;

		$this->F_contas_model->atualiza_conta($data , $id_conta);
		

		$this->Manutencao_model->atualiza_manutencao($dados, $id);


	}


	public function deleta_manutencao()
	{
		$this->load->model('F_contas_model');
		$this->load->model('Manutencao_model');

		$id = $this->uri->segment(3);

		$manutencao = $this->Manutencao_model->recebe_manutencao($id);

		$this->F_contas_model->deleta_conta($manutencao['id_conta']);

		$this->Manutencao_model->deleta_manutencao($id);

	}




}