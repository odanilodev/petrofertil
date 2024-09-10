<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_caixa extends CI_Controller
{

	public function index()
	{
		$this->load->model('P_contas_model');
		$this->load->model('P_fluxo_model');
		$this->load->model('P_cheques_model');

		$bancos = $this->P_contas_model->recebe_contas();

		$saldo = 0;
		foreach ($bancos as $b) {
			$saldo = $saldo + $b['saldo'];
		}

		$data['saldo'] = $saldo;
		$data['contas'] = $this->P_contas_model->recebe_contas();
		$data['fluxo'] = $this->P_fluxo_model->recebe_fluxo();
		$data['cheques'] = $this->P_cheques_model->recebe_cheques();

		$valor_total_compensado = 0;
		$valor_acompensar = 0;
		$valor_cheque_devedor = 0;
		$data_atual = date('Y-m-d');

		foreach ($data['cheques'] as $cheque) {

			if ($cheque['status'] == 'Compensado') {
				$valor_total_compensado += $cheque['valor'];
			} elseif (strtotime($cheque['data_compensasao']) < strtotime($data_atual)) {
				$valor_cheque_devedor += $cheque['valor'];
			} else {
				$valor_acompensar += $cheque['valor'];
			}
		}

		$data['valor_acompensar'] = $valor_acompensar;

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/caixa_petrofertil');
		$this->load->view('petrofertil/footer');

	}

	public function contas_bancarias()
	{

		// $data['clientes'] = $this->Clientesp_model->recebe_clientes();

		$this->load->view('petrofertil/header');
		$this->load->view('petrofertil/contas_bancarias');
		$this->load->view('petrofertil/footer');

	}

	public function insere_entrada_manual()
	{

		$this->load->model('P_contas_model');
		$this->load->model('P_fluxo_model');

		$data_entrada = $this->input->post('data_entrada');
		$banco = $this->input->post('banco');
		$valor_recebido = $this->input->post('valor');

		// Remover pontos como separadores de milhar
		$valor_recebido = str_replace('.', '', $valor_recebido);

		// Substituir vírgula por ponto, se necessário
		$valor_recebido = str_replace(',', '.', $valor_recebido);

		$pagador = $this->input->post('pagador');
		$observacao = $this->input->post('observacao');

		//Busca o banco para verificar saldo
		$banco = $this->P_contas_model->recebe_conta($banco);

		//Atualiza o saldo da conta
		$dados_banco['saldo'] = $banco['saldo'] + $valor_recebido;
		$this->P_contas_model->atualiza_conta($dados_banco, $banco['id']);


		//Insere entrada no fluxo
		$dados_fluxo['conta'] = $banco['descricao'];
		$dados_fluxo['valor'] = $valor_recebido;
		$dados_fluxo['despesa'] = 'Entrada';
		$dados_fluxo['observacao'] = $observacao;
		$dados_fluxo['data_registro'] = date('Y-m-d');
		$dados_fluxo['data_fluxo'] = $data_entrada;
		$dados_fluxo['pago_recebido'] = $pagador;

		$this->P_fluxo_model->inserir_entrada_fluxo($dados_fluxo);

		redirect('P_caixa');

	}

	public function insere_saida_manual()
	{

		$this->load->model('P_contas_model');
		$this->load->model('P_fluxo_model');

		$data_saida = $this->input->post('data_saida');
		$banco = $this->input->post('banco');
		$valor_recebido = $this->input->post('valor');
		$pagador = $this->input->post('pagador');
		$observacao = $this->input->post('observacao');

		//Busca o banco para verificar saldo
		$banco = $this->P_contas_model->recebe_conta($banco);

		//Atualiza o saldo da conta
		$dados_banco['saldo'] = $banco['saldo'] - $valor_recebido;
		$this->P_contas_model->atualiza_conta($dados_banco, $banco['id']);

		//Insere entrada no fluxo
		$dados_fluxo['conta'] = $banco['descricao'];
		$dados_fluxo['valor'] = $valor_recebido;
		$dados_fluxo['despesa'] = 'Saída';
		$dados_fluxo['observacao'] = $observacao;
		$dados_fluxo['data_registro'] = date('Y-m-d');
		$dados_fluxo['data_fluxo'] = $data_saida;
		$dados_fluxo['pago_recebido'] = $pagador;

		$this->P_fluxo_model->inserir_entrada_fluxo($dados_fluxo);

		redirect('P_caixa');

	}

	public function formulario_contas_bancarias()
	{
		// $data['clientes'] = $this->Clientesp_model->recebe_clientes();

		$this->load->view('petrofertil/header');
		$this->load->view('petrofertil/formulario_contas');
		$this->load->view('petrofertil/footer');

	}

	public function formulario_entrada_fluxo()
	{
		$this->load->model('P_contas_model');

		$data['contas'] = $this->P_contas_model->recebe_contas();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_entrada_fluxo');
		$this->load->view('petrofertil/footer');

	}

	public function formulario_saida_fluxo()
	{
		$this->load->model('P_contas_model');

		$data['contas'] = $this->P_contas_model->recebe_contas();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_saida_fluxo');
		$this->load->view('petrofertil/footer');
	}

	public function insere_conta()
	{
		$this->load->model('P_contas_model');

		$id = $this->input->post('id');

		$dados['descricao'] = $this->input->post('descricao');
		$dados['banco'] = $this->input->post('banco');
		$dados['agencia'] = $this->input->post('agencia');
		$dados['conta'] = $this->input->post('conta');

		if ($id != '') {
			$this->P_contas_model->atualiza_conta($id, $dados);
		} else {
			$this->P_contas_model->inserir_conta($dados);
		}

		redirect('P_caixa');

	}

	public function filtra_fluxo_geral()
	{

		$this->load->model('P_fluxo_model');
		$this->load->model('P_contas_model');

		$data['pagina'] = $this->uri->segment(3);

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		$id_conta = $this->input->post('id_conta');

		$data['data_inicial'] = $data_inicial;
		$data['data_final'] = $data_final;
		$data['id_conta'] = $id_conta;

		$bancos = $this->P_contas_model->recebe_contas();

		if ($id_conta == 'Geral') {

			$data['fluxo'] = $this->P_fluxo_model->recebe_fluxo_data($data_inicial, $data_final);

		} else {

			$data['fluxo'] = $this->P_fluxo_model->recebe_fluxo_data_conta($data_inicial, $data_final, $id_conta);

		}

		$saldo = 0;
		foreach ($bancos as $b) {
			$saldo = $saldo + $b['saldo'];
		}

		$data['saldo'] = $saldo;

		$data['contas'] = $this->P_contas_model->recebe_contas();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/caixa_petrofertil');
		$this->load->view('petrofertil/footer');

	}

	public function deleta_movimentacao_fluxo()
	{

		$this->load->model('P_fluxo_model');

		$id = $this->uri->segment(3);

		$this->P_fluxo_model->deleta_fluxo($id);

		redirect('P_caixa/');

	}


}