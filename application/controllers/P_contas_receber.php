<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_contas_receber extends CI_Controller
{

	public function inicio()
	{

		$this->load->model('P_contas_receber_model');
		$this->load->model('P_contas_model');


		$data['pagina'] = $this->uri->segment(3);

		$data['contas'] = $this->P_contas_receber_model->recebe_contas_vinculo();

		$data['clientes'] = $this->P_contas_receber_model->obtem_clientes_com_contas();

		$bancos = $this->P_contas_model->recebe_contas();

		$data['bancos'] = $bancos;

		$saldo = 0;
		foreach ($bancos as $b) {
			$saldo = $saldo + $b['saldo'];

		}

		$data['saldo'] = $saldo;

		$contas = $data['contas'];

		$receber = 0;

		foreach ($contas as $c) {

			if ($c['status'] == 0) {

				$receber = $receber + $c['valor'];
			}

		}

		$data['receber_total'] = $receber;

		$data['previsao_caixa'] = $saldo + $receber;

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/contas_receber');
		$this->load->view('petrofertil/footer');

	}

	public function filtra_contas_receber()
	{

		$this->load->model('P_contas_receber_model');
		$this->load->model('P_contas_model');

		$data['pagina'] = $this->uri->segment(3);

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		$status = $this->input->post('status');
		$cliente_id = $this->input->post('cliente_id');

		$data['data_inicial'] = $data_inicial;
		$data['data_final'] = $data_final;
		$data['status'] = $status;

		$bancos = $this->P_contas_model->recebe_contas();

		if ($status == 2) {

			$data['contas'] = $this->P_contas_receber_model->recebe_contas_filtrada_data($data_inicial, $data_final);

		} else {

			$data['contas'] = $this->P_contas_receber_model->recebe_contas_filtrada_data_status_cliente($data_inicial, $data_final, $status, $cliente_id);

		}


		$saldo = 0;
		foreach ($bancos as $b) {
			$saldo = $saldo + $b['saldo'];

		}

		$data['saldo'] = $saldo;

		$contas = $data['contas'];

		$receber = 0;

		foreach ($contas as $c) {

			if ($c['status'] == 0) {

				$receber = $receber + $c['valor'];
			}

		}

		$data['receber_total'] = $receber;

		$data['previsao_caixa'] = $saldo + $receber;

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/contas_receber');
		$this->load->view('petrofertil/footer');

	}

	public function visualizar_conta()
	{

		$this->load->model('F_contas_receber_model');

		$id = $this->uri->segment(3);
		$data['conta'] = $this->F_contas_receber_model->recebe_conta($id);

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/visualizar_conta_receber');
		$this->load->view('financeiro/footer');
	}

	public function cadastrar_conta()
	{
		$this->load->model('Clientes_petrofertil_model');
		$this->load->model('P_contas_model');

		$data['clientes'] = $this->Clientes_petrofertil_model->recebe_clientes();
		$data['contas'] = $this->P_contas_model->recebe_contas();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_conta_receber');
		$this->load->view('petrofertil/footer');
	}

	public function editar_conta_receber()
	{
		$this->load->model('P_contas_receber_model');
		$this->load->model('Clientes_petrofertil_model');
		$this->load->model('P_contas_model');

		$id = $this->uri->segment(3);
		$data['clientes'] = $this->Clientes_petrofertil_model->recebe_clientes();
		$data['contas'] = $this->P_contas_model->recebe_contas();
		$data['conta'] = $this->P_contas_receber_model->recebe_conta($id);

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_conta_receber');
		$this->load->view('petrofertil/footer');
	}

	public function inserir_conta()
	{

		$this->load->model('P_contas_receber_model');

		$id = $this->input->post('id');
		$dados['vencimento'] = $this->input->post('vencimento');
		$dados['data_emissao'] = date('Y-m-d');
		$dados['valor'] = $this->input->post('valor');
		$dados['cliente'] = $this->input->post('cliente');
		$dados['conta'] = $this->input->post('conta');
		$dados['status'] = 0;
		$dados['observacao'] = $this->input->post('observacao');

		if ($id != '') {
			$this->P_contas_receber_model->atualiza_conta($id, $dados);
		} else {
			$this->P_contas_receber_model->inserir_conta($dados);
		}

		redirect('P_contas_receber/inicio/9');

	}

	public function atualiza_status()
	{
		// Carregar modelos
		$this->load->model('P_recebimentos_contas_model');
		$this->load->model('P_contas_receber_model');
		$this->load->model('P_contas_model');
		$this->load->model('P_fluxo_model');
		$this->load->model('P_cheques_model');
		$this->load->model('Clientes_petrofertil_model');
		$this->load->model('P_vendedores_petrofertil_model');

		// Receber parâmetros do post
		$id = $this->input->post('id');
		$formaPagamentos = $this->input->post('formaPagamento');
		$cheques = $this->input->post('cheque');
		$data_fluxo = $this->input->post('data_fluxo');

		// Receber informações da conta
		$conta = $this->P_contas_receber_model->recebe_conta($id);
		$cliente = $this->Clientes_petrofertil_model->recebe_cliente($conta['cliente']);

		// Inicializar total pago e array para armazenar formas de pagamento
		$totalPago = 0;
		$valorCheques = 0;
		$formasPagamentoUtilizadas = array();

		// Processar forma de pagamento
		if (!empty($formaPagamentos) && is_array($formaPagamentos)) {
			foreach ($formaPagamentos as $pagamento) {
				$idConta = $pagamento['conta'];

				if ($pagamento['forma'] == 'saldo') {
					// Buscar informações do vendedor/cliente
					$vendedor = $this->P_vendedores_petrofertil_model->recebe_vendedor_nome($conta['recebido_de']);

					if ($vendedor) {
						// Ajustar o saldo do vendedor
						$vendedor['saldo'] -= $pagamento['valor'];
						// Atualizar informações do vendedor no banco de dados
						$this->P_vendedores_petrofertil_model->atualiza_vendedor($vendedor['id'], $vendedor);
					}
				}

				// Adicionar a forma de pagamento ao array
				$formasPagamentoUtilizadas[] = $pagamento['forma'];

				// Se houver cliente, definir o nome no recebimento
				if ($conta['cliente']) {
					$recebimento['nome'] = $cliente['nome_fantasia'];
				}

				// Preencher informações do recebimento
				$recebimento['data_recebimento'] = $data_fluxo;
				$recebimento['id_conta_receber'] = $conta['id'];
				$recebimento['valor'] = $pagamento['valor'];
				$recebimento['forma_recebimento'] = $pagamento['forma'];

				// Inserir recebimento
				$this->P_recebimentos_contas_model->inserir_recebimento($recebimento);

				if ($pagamento['forma'] != 'saldo') {
					// Atualizar saldo da conta, exceto para cheques
					if ($pagamento['forma'] != 'Cheque') {
						$banco = $this->P_contas_model->recebe_conta($idConta);
						$banco['saldo'] += $pagamento['valor'];

						// Inserir entrada no fluxo
						$dados = [
							'data_fluxo' => $data_fluxo,
							'conta' => $banco['descricao'],
							'valor' => $pagamento['valor'],
							'despesa' => 'Entrada',
							'observacao' => $conta['observacao'],
							'id_relacao' => $conta['id'],
							'data_registro' => date('Y-m-d'),
							'pago_recebido' => $conta['cliente']
						];

						$this->P_fluxo_model->inserir_entrada_fluxo($dados);

						// Atualizar conta bancária
						$this->P_contas_model->atualiza_conta($banco, $idConta);
					}

					// Atualizar total pago
					$totalPago += $pagamento['valor'];
				}
			}
		}

		// Processar cheques
		if (!empty($cheques) && is_array($cheques)) {
			$formasPagamentoUtilizadas[] = 'Cheque';
			foreach ($cheques as $c) {
				if ($conta['cliente']) {
					$recebimento['nome'] = $cliente['nome_fantasia'];
				}

				if ($conta['recebido_de']) {
					$cheque['recebido'] = $conta['recebido_de'];
				} else {
					$cheque['recebido'] = $cliente['nome_fantasia'];
				}

				$cheque['data_compensasao'] = $c['vencimento_cheque'];
				$cheque['banco'] = $c['banco'];
				$cheque['valor'] = $c['valor'];
				$cheque['referente'] = 'Recebimento como forma de pagamento de ' . $c['recebido'];
				$cheque['id_conta'] = $conta['id'];
				$cheque['status'] = "A compensar";

				$this->P_cheques_model->inserir_cheque($cheque);

				$recebimento['data_recebimento'] = $data_fluxo;
				$recebimento['id_conta_receber'] = $conta['id'];
				$recebimento['valor'] = $c['valor'];
				$recebimento['forma_recebimento'] = 'Cheque';

				$this->P_recebimentos_contas_model->inserir_recebimento($recebimento);

				$valorCheques += $c['valor'];
			}
		}

		$conta['valor_recebido'] = $totalPago;

		if ($conta['cliente']) {
			$conta['cliente'] = $cliente['id'];
		}

		$conta['status'] = 1;
		$conta['forma_recebimento'] = implode(' - ', $formasPagamentoUtilizadas);

		$this->P_contas_receber_model->atualiza_status($id, $conta);

		echo json_encode(array('success' => true));
	}




	public function atualiza_status_multiplo()
	{
		// Carregar modelos
		$this->load->model('P_recebimentos_contas_model');
		$this->load->model('P_contas_receber_model');
		$this->load->model('P_contas_model');
		$this->load->model('P_fluxo_model');
		$this->load->model('P_cheques_model');
		$this->load->model('Clientes_petrofertil_model');
		$this->load->model('P_vendedores_petrofertil_model');

		// Receber parâmetros do post
		$ids = explode(',', $this->input->post('id')); // Transforma a string de IDs em um array
		$formaPagamentos = $this->input->post('formaPagamento');
		$cheques = $this->input->post('cheque');
		$data_fluxo = $this->input->post('data_fluxo');
		$totalReceber = $this->input->post('valorTotal');
		$nomeVendedor = $this->input->post('nomeVendedor');

		$totalPago = 0; // Inicializar o total pago
		$formasPagamentoUtilizadas = array(); // Armazena as formas de pagamento utilizadas

		// Processar forma de pagamento
		if (!empty($formaPagamentos) && is_array($formaPagamentos)) {
			foreach ($formaPagamentos as $pagamento) {
				$idConta = $pagamento['conta'];

				if ($pagamento['forma'] == 'saldo') {
					$vendedor = $this->P_vendedores_petrofertil_model->recebe_vendedor_nome($nomeVendedor);

					if ($vendedor) {
						$vendedor['saldo'] -= $pagamento['valor'];
						$this->P_vendedores_petrofertil_model->atualiza_vendedor($vendedor['id'], $vendedor);
					}
				}

				// Adicionar a forma de pagamento ao array
				$formasPagamentoUtilizadas[] = $pagamento['forma'];

				$totalPago += $pagamento['valor']; // Somar o valor pago ao totalPago

				if ($pagamento['forma'] != 'saldo' && $pagamento['forma'] != 'Cheque') {
					$banco = $this->P_contas_model->recebe_conta($idConta);
					$banco['saldo'] += $pagamento['valor'];

					$dados = [
						'data_fluxo' => $data_fluxo,
						'conta' => $banco['descricao'],
						'valor' => $pagamento['valor'],
						'despesa' => 'Entrada',
						'observacao' => 'Pagamento com ' . $pagamento['forma'],
						'id_relacao' => null, // Será definido em cada conta
						'data_registro' => date('Y-m-d'),
						'pago_recebido' => null // Será definido em cada conta
					];

					$this->P_fluxo_model->inserir_entrada_fluxo($dados);
					$this->P_contas_model->atualiza_conta($banco, $idConta);
				}
			}
		}

		// Processar cheques
		if (!empty($cheques) && is_array($cheques)) {
			$formasPagamentoUtilizadas[] = 'Cheque';
			foreach ($cheques as $c) {
				$totalPago += $c['valor']; // Somar o valor do cheque ao totalPago

				$cheque['data_compensasao'] = $c['vencimento_cheque'];
				$cheque['banco'] = $c['banco'];
				$cheque['valor'] = $c['valor'];
				$cheque['referente'] = 'Recebimento como forma de pagamento de ' . $c['titular'];
				$cheque['id_conta'] = null; // Será definido em cada conta
				$cheque['status'] = "A compensar";

				$this->P_cheques_model->inserir_cheque($cheque);

				$recebimento['data_recebimento'] = $data_fluxo;
				$recebimento['id_conta_receber'] = null; // Será definido em cada conta
				$recebimento['valor'] = $c['valor'];
				$recebimento['forma_recebimento'] = 'Cheque';

				$this->P_recebimentos_contas_model->inserir_recebimento($recebimento);
			}
		}

		foreach ($ids as $id) {
			$conta = $this->P_contas_receber_model->recebe_conta($id);
			$cliente = $this->Clientes_petrofertil_model->recebe_cliente($conta['cliente']);

			// Atualizar a conta com os valores processados
			$conta['valor_recebido'] = $totalPago;
			$conta['status'] = 1;
			$conta['forma_recebimento'] = implode(' - ', $formasPagamentoUtilizadas);

			if ($conta['cliente']) {
				$conta['cliente'] = $cliente['id'];
			}

			$dados['id_relacao'] = $conta['id'];
			$dados['pago_recebido'] = $conta['cliente'];
			$dados['observacao'] = $conta['observacao'];

			$this->P_fluxo_model->inserir_entrada_fluxo($dados);
			$this->P_contas_receber_model->atualiza_status($id, $conta);
		}


		// Verificar se o valor pago excede o total a receber
		if ($totalPago > $totalReceber) {
			$valorExcedente = $totalPago - $totalReceber;

			$vendedor = $this->P_vendedores_petrofertil_model->recebe_vendedor_nome_individual($nomeVendedor);

			if ($vendedor) {
				$vendedor['saldo'] += $valorExcedente;
				$this->P_vendedores_petrofertil_model->atualiza_vendedor($vendedor['id'], $vendedor);
			}
		}

		echo json_encode(array('success' => true));
	}



	public function atualiza_status_saldo()
	{

		$this->load->model('P_contas_receber_model');
		$this->load->model('P_vendedores_petrofertil_model');
		$this->load->model('P_contas_model');
		$this->load->model('P_fluxo_model');

		$id = $this->uri->segment(3);

		$conta = $this->P_contas_receber_model->recebe_conta($id);

		// Recebe post do modal #ModalReceber
		$dados['data_fluxo'] = $this->input->post('data_fluxo');
		$conta['valor_recebido'] = $this->input->post('valor_recebido');

		$dados['conta'] = $conta['conta'];
		$dados['valor'] = $conta['valor'];
		$dados['despesa'] = 'Entrada';
		$dados['observacao'] = $conta['observacao'];
		$dados['id_relacao'] = $conta['id'];
		$dados['data_registro'] = date('Y-m-d');
		$dados['pago_recebido'] = $conta['cliente'];

		$banco = $this->P_contas_model->recebe_conta($dados['conta']);

		$conta['status'] = 1;

		$banco['saldo'] = $banco['saldo'] + $conta['valor_recebido'];

		$vendedor = $this->P_vendedores_petrofertil_model->recebe_vendedor_nome($conta['recebido_de']);

		if ($vendedor) {

			$diferenca = $conta['valor_recebido'] - $conta['valor'];

			$vendedor['saldo'] = $vendedor['saldo'] + $diferenca;

			$id_vendedor = $vendedor['id'];

			$this->P_vendedores_petrofertil_model->atualiza_vendedor($id_vendedor, $vendedor);

		}

		$this->P_fluxo_model->inserir_entrada_fluxo($dados);

		$this->P_contas_model->atualiza_conta($banco, $id_conta); //Atualiza conta bancaria 

		$this->P_contas_receber_model->atualiza_status($id, $conta); //Atualiza tabela contas a receber

		redirect('P_vendedores_petrofertil/saldo_vendedor/' . $vendedor['nome']);

	}


	public function deleta_status()
	{
		$this->load->model('P_contas_receber_model');
		$this->load->model('P_contas_model');
		$this->load->model('P_fluxo_model');

		$id = $this->uri->segment(3);

		$conta_receber = $this->P_contas_receber_model->recebe_conta($id);

		$banco = $this->P_contas_model->recebe_conta($conta_receber['conta']);

		$banco['saldo'] = $banco['saldo'] - $conta_receber['valor']; //Retira valor recebido da conta bancaria
		$banco = $this->P_contas_model->atualiza_conta($banco); // Atualiza a conta bancaria 

		$conta_receber['status'] = 0; //Muda o status da conta
		$this->P_contas_receber_model->atualiza_status($id, $conta_receber); //Atualiza tabela contas a receber

		$this->P_fluxo_model->deleta_fluxo_relacao($conta_receber['id']); //Deleta registro do fluxo

		redirect('P_contas_receber/inicio/9');

	}

	public function deleta_conta()
	{

		$this->load->model('P_contas_receber_model');

		$id = $this->uri->segment(3);

		$this->P_contas_receber_model->deleta_conta($id);

		redirect('P_contas_receber/inicio/9');

	}

}