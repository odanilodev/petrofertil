<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_contas_pagar extends CI_Controller
{

	public function inicio()
	{

		$this->load->model('P_contas_pagar_model');
		$this->load->model('P_contas_model');
		$this->load->model('P_cheques_model');


		$data['pagina'] = $this->uri->segment(3);

		$data['contas'] = $this->P_contas_pagar_model->recebe_contas();

		$data['cheques'] = $this->P_cheques_model->recebe_cheques_compensar();

		// echo "<pre>"; print_r($data['cheques']); exit;

		$bancos = $this->P_contas_model->recebe_contas();

		$saldo = 0;
		foreach ($bancos as $b) {
			$saldo = $saldo + $b['saldo'];
		}

		$data['saldo'] = $saldo;

		$contas = $data['contas'];

		$pagar = 0;

		foreach ($contas as $c) {

			if ($c['status'] == 0) {

				$pagar = $pagar + $c['valor'];
			}

		}

		$data['bancos'] = $bancos;


		$data['pagar_total'] = $pagar;

		$data['previsao_caixa'] = $saldo - $pagar;

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/contas_pagar');
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

	public function filtra_contas_pagar()
	{
		$this->load->model('P_contas_pagar_model');
		$this->load->model('P_contas_model');
		$this->load->model('P_cheques_model');

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		$status = $this->input->post('status');

		$data['pagina'] = $this->uri->segment(3);

		// Filtra as contas com base no status e no intervalo de datas
		if ($status == 2) {
			// Se status == 2, busca todas as contas no intervalo de datas, independentemente do status
			$data['contas'] = $this->P_contas_pagar_model->recebe_contas_filtrada_data($data_inicial, $data_final);
		} else {
			// Se status != 2, filtra contas por status e intervalo de datas
			$data['contas'] = $this->P_contas_pagar_model->recebe_contas_filtrada_data_status($data_inicial, $data_final, $status);
		}

		$data['cheques'] = $this->P_cheques_model->recebe_cheques_compensar();

		$bancos = $this->P_contas_model->recebe_contas();
		$saldo = 0;
		foreach ($bancos as $b) {
			$saldo += $b['saldo'];
		}
		$data['saldo'] = $saldo;
		$data['bancos'] = $bancos;

		$pagar = 0;
		foreach ($data['contas'] as $c) {
			if ($c['status'] == 0) {
				$pagar += $c['valor'];
			}
		}
		$data['pagar_total'] = $pagar;
		$data['previsao_caixa'] = $saldo - $pagar;

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/contas_pagar');
		$this->load->view('petrofertil/footer');
	}


	public function cadastrar_conta()
	{
		$this->load->model('Clientes_petrofertil_model');
		$this->load->model('P_contas_model');

		$data['clientes'] = $this->Clientes_petrofertil_model->recebe_clientes();
		$data['contas'] = $this->P_contas_model->recebe_contas();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_conta_pagar');
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
		$this->load->model('P_contas_pagar_model');

		$id = $this->uri->segment(3);

		$dados['data_emissao'] = $this->input->post('data_emissao');
		$dados['valor'] = $this->input->post('valor');
		$dados['id_conta'] = $this->input->post('id_conta');
		$dados['status'] = 0;
		$dados['pago_para'] = $this->input->post('pago_para');
		$dados['categoria'] = $this->input->post('categoria');
		$dados['observacao'] = $this->input->post('observacao');
		$dados['numero_nota'] = $this->input->post('numero_nota');
		$dados['quantidade_parcela'] = $this->input->post('quantidade_parcela');
		$dados['tipo_pagamento'] = $this->input->post('tipo_pagamento');

		// Verifique se a quantidade de parcelas é maior que 0
		if ($dados['quantidade_parcela'] > 0) {

			// Divide o valor total pelo número de parcelas
			$valor_parcela = $dados['valor'] / $dados['quantidade_parcela'];

			for ($contador = 1; $contador <= $dados['quantidade_parcela']; $contador++) {
				// Clone os dados para evitar a sobreposição
				$dados_parcela = $dados;
				// Configure a quantidade de parcela corretamente
				$dados_parcela['quantidade_parcela'] = $contador . '/' . $dados['quantidade_parcela'];
				// Define o valor da parcela
				$dados_parcela['valor'] = $valor_parcela;
				// Captura a data da parcela específica
				$dados_parcela['vencimento'] = $this->input->post('data_parcela_' . $contador);

				// Insira os dados no banco de dados
				$this->P_contas_pagar_model->inserir_conta($dados_parcela);
			}
		}
		redirect('P_contas_pagar/inicio/8');
	}



	public function atualiza_status()
	{

		$this->load->model('P_contas_pagar_model');
		$this->load->model('P_vendedores_petrofertil_model');
		$this->load->model('P_contas_model');
		$this->load->model('P_fluxo_model');
		$this->load->model('P_cheques_model');


		$idConta = $this->input->post('idConta');

		$conta = $this->P_contas_pagar_model->recebe_conta($idConta);

		$formasPagamento = $this->input->post('formaPagamento');

		$valorPago = 0;

		$dados['data_fluxo'] = $this->input->post('data_fluxo');


		$formasDeRecebimento = []; // Inicializa um array para armazenar as formas de pagamento


		foreach ($formasPagamento as $formaPagamento) {

			if ($formaPagamento['cheque']) {

				$cheque = $this->P_cheques_model->recebe_cheque($formaPagamento['cheque']);
				$cheque['posse_de'] = $conta['pago_para'];
				$cheque['data_posse'] = $this->input->post('data_fluxo');

				$cheque['status'] = 'Compensado';
				$this->P_cheques_model->atualiza_cheque($cheque, $cheque['id']);

				$valorPago += $cheque['valor'];
				$formasDeRecebimento[] = 'cheque'; // Adiciona "cheque" às formas de recebimento

			} elseif ($formaPagamento['forma'] == 'parcelado') {

				$valorPago += $formaPagamento['valorParcela'] * $formaPagamento['qtdParcela'];

				$contaPagar['vencimento'] = $this->input->post('data_fluxo');
				$contaPagar['data_emissao'] = date('Y-m-d');
				$contaPagar['valor'] = $formaPagamento['valorParcela'];
				$contaPagar['pago_para'] = $conta['pago_para'];
				$contaPagar['status'] = 0;
				$contaPagar['categoria'] = 'Parcelamento de conta';
				$contaPagar['observacao'] = '';
				$contaPagar['quantidade_parcela'] = $formaPagamento['qtdParcela'];

				// Verifique se a quantidade de parcelas é maior que 0
				if ($contaPagar['quantidade_parcela'] > 0) {
					for ($contador = 0; $contador < $contaPagar['quantidade_parcela']; $contador++) {
						// Clone os dados para evitar a sobreposição
						$dados_parcela = $contaPagar;
						// Configure a quantidade de parcela corretamente
						$dados_parcela['quantidade_parcela'] = $contador + 1 . '/' . $contaPagar['quantidade_parcela'];

						// Adicione um mês ao vencimento a partir da data original
						$dados_parcela['vencimento'] = date("Y-m-d", strtotime("+$contador months", strtotime($contaPagar['vencimento'])));

						// Insira os dados no banco de dados
						$this->P_contas_pagar_model->inserir_conta($dados_parcela);
					}
				}

			} else {

				if (!in_array($formaPagamento['forma'], $formasDeRecebimento)) {
					$formasDeRecebimento[] = $formaPagamento['forma']; // Adiciona a forma de pagamento ao array
				}

				if ($formaPagamento['forma'] != 'saldo') {

					$contaBancaria = $this->P_contas_model->recebe_conta_nome($formaPagamento['banco']);

					$contaBancaria['saldo'] = $contaBancaria['saldo'] - $formaPagamento['valor'];
					$this->P_contas_model->atualiza_conta($contaBancaria, $contaBancaria['id']);

				}

				$valorPago += $formaPagamento['valor'];

				$conta['valor_pago'] += $valorPago;


				$dados['conta'] = $formaPagamento['banco'];
				$dados['valor'] = $formaPagamento['valor'];
				$dados['pago_recebido'] = $conta['pago_para'];
				$dados['despesa'] = 'Saída';
				$dados['observacao'] = $conta['observacao'];
				$dados['id_relacao'] = $idConta;
				$dados['data_registro'] = date('Y-m-d');
				$dados['pago_recebido'] = $conta['pago_para'];


				$vendedor = $this->P_vendedores_petrofertil_model->recebe_vendedor_nome($conta['pago_para']);


				if ($vendedor) {

					if ($formaPagamento['forma'] == 'saldo') {


						$vendedor['saldo'] = $vendedor['saldo'] + $formaPagamento['valor'];

						$id_vendedor = $vendedor['id'];

						$this->P_vendedores_petrofertil_model->atualiza_vendedor($id_vendedor, $vendedor);

					}

				}

				if ($formaPagamento['forma'] != 'saldo') {

					$this->P_fluxo_model->inserir_entrada_fluxo($dados);
				}

			}

			$conta['status'] = 1;
			$conta['data_pagamento'] = $this->input->post('data_pagamento');
			$conta['valor_pago'] = $valorPago;

			// Converta o array de formas de recebimento em uma string
			$conta['forma_pagamento'] = implode(' - ', $formasDeRecebimento);

			$this->P_contas_pagar_model->atualiza_status($idConta, $conta); //Atualiza tabela contas a pagar

		}

		echo 'aqui';

	}

	public function atualiza_status_multiplo()
	{

		$this->load->model('P_contas_pagar_model');
		$this->load->model('P_vendedores_petrofertil_model');
		$this->load->model('P_contas_model');
		$this->load->model('P_fluxo_model');
		$this->load->model('P_cheques_model');

		// Recebe a string de IDs separados por vírgulas
		$idsContaString = $this->input->post('idConta');

		// Converte a string em um array usando a vírgula como delimitador
		$idsContaArray = explode(',', $idsContaString);

		$dataPagamento = $this->input->post('data_pagamento');
		$dataFluxo = $this->input->post('data_fluxo');
		$formasPagamento = $this->input->post('formaPagamento');

		$nomeVendedor = $this->input->post('nomeVendedor');

		$valorTotalPago = $this->input->post('valorTotal');

		$contadorFluxo = 0;

		$valorPago = 0;
		$formasDeRecebimento = [];

		foreach ($idsContaArray as $idConta) {

			$contasBancariasAtualizadas = []; // Array para rastrear as contas bancárias já atualizadas

			$conta = $this->P_contas_pagar_model->recebe_conta($idConta);
			if ($contadorFluxo == 0) {
				foreach ($formasPagamento as $formaPagamento) {
					// Processa cheques
					if ($formaPagamento['cheque']) {
						$cheque = $this->P_cheques_model->recebe_cheque($formaPagamento['cheque']);
						$cheque['posse_de'] = $conta['pago_para'];
						$cheque['data_posse'] = $this->input->post('data_pagamento');
						$cheque['status'] = 'Compensado';
						$this->P_cheques_model->atualiza_cheque($cheque, $cheque['id']);

						$valorPago += $cheque['valor'];
						$formasDeRecebimento[] = 'cheque';
					} elseif ($formaPagamento['forma'] == 'parcelado') {
						// Processa pagamento parcelado
						$totalParcelas = $formaPagamento['valorParcela'] * $formaPagamento['qtdParcela'];
						$valorPago += $totalParcelas;
						for ($i = 0; $i < $formaPagamento['qtdParcela']; $i++) {
							$vencimento = date("Y-m-d", strtotime("+$i months", strtotime($dataFluxo)));
							// Cria parcela
							$parcela = [
								'data_emissao' => date('Y-m-d'),
								'vencimento' => $vencimento,
								'valor' => $formaPagamento['valorParcela'],
								'pago_para' => $conta['pago_para'],
								'status' => 0,
								'categoria' => 'Parcelamento de conta',
								'observacao' => '',
								'quantidade_parcela' => ($i + 1) . '/' . $formaPagamento['qtdParcela'],
							];
							$this->P_contas_pagar_model->inserir_conta($parcela);
						}
					} else {
						// Outras formas de pagamento
						if (!in_array($formaPagamento['forma'], $formasDeRecebimento)) {
							$formasDeRecebimento[] = $formaPagamento['forma'];
						}

						if ($formaPagamento['forma'] != 'saldo' && !in_array($formaPagamento['banco'], $contasBancariasAtualizadas)) {
							$contaBancaria = $this->P_contas_model->recebe_conta_nome($formaPagamento['banco']);
							$contaBancaria['saldo'] -= $formaPagamento['valor'];
							$this->P_contas_model->atualiza_conta($contaBancaria, $contaBancaria['id']);

							// Adiciona a conta bancária ao array de contas já atualizadas
							$contasBancariasAtualizadas[] = $formaPagamento['banco'];
						}

						$valorPago += $formaPagamento['valor'];

						if ($formaPagamento['forma'] == 'saldo') {
							$vendedor = $this->P_vendedores_petrofertil_model->recebe_vendedor_nome($conta['pago_para']);
							if ($vendedor) {
								$vendedor['saldo'] += $formaPagamento['valor'];
								$this->P_vendedores_petrofertil_model->atualiza_vendedor($vendedor['id'], $vendedor);
							}
						} else {
							// Registra fluxo financeiro
							$fluxo = [
								'conta' => $formaPagamento['banco'],
								'valor' => $formaPagamento['valor'],
								'pago_recebido' => $conta['pago_para'],
								'despesa' => 'Saída',
								'observacao' => $conta['observacao'],
								'id_relacao' => $idConta,
								'data_registro' => date('Y-m-d'),
								'data_fluxo' => $dataFluxo,
								'pago_recebido' => $conta['pago_para'],
							];
							$this->P_fluxo_model->inserir_entrada_fluxo($fluxo);

						}
					}
				}
			}
			$contadorFluxo++;

			// Atualiza a conta com o total pago e as formas de recebimento
			$contaAtualizada = [
				'status' => 1,
				'data_pagamento' => $dataPagamento,
				'valor_pago' => $valorPago,
				'forma_pagamento' => implode(' - ', $formasDeRecebimento),
			];

			$this->P_contas_pagar_model->atualiza_status($idConta, $contaAtualizada);
		}

		if ($valorPago < $valorTotalPago) {

			$restantePago = $valorPago - $valorTotalPago;

			$conta_pagar['vencimento'] = date('Y-m-d', strtotime('+30 days'));
			$conta_pagar['data_emissao'] = date('Y-m-d');
			$conta_pagar['valor'] = abs($restantePago);
			$conta_pagar['pago_para'] = $nomeVendedor;
			$conta_pagar['status'] = 0;
			$conta_pagar['categoria'] = 'Sobra de montante pago';
			$conta_pagar['observacao'] = 'Restante de total pago';
			$conta_pagar['quantidade_parcela'] = '1/1';


			$this->P_contas_pagar_model->inserir_conta($conta_pagar);

		}



	}




	public function atualiza_status_saldo()
	{

		$this->load->model('P_contas_pagar_model');
		$this->load->model('P_vendedores_petrofertil_model');
		$this->load->model('P_contas_model');
		$this->load->model('P_fluxo_model');

		$id = $this->uri->segment(3);

		$conta = $this->P_contas_pagar_model->recebe_conta($id);

		// Recebe post do modal #ModalReceber
		$dados['data_fluxo'] = $this->input->post('data_fluxo');
		$conta['valor_pago'] = $this->input->post('valor_pago');

		$dados['conta'] = $conta['id_conta'];
		$dados['valor'] = $conta['valor_pago'];
		$dados['pago_recebido'] = $conta['pago_para'];
		$dados['despesa'] = 'Saída';
		$dados['observacao'] = $conta['observacao'];
		$dados['id_relacao'] = $conta['id'];
		$dados['data_registro'] = date('Y-m-d');
		$dados['pago_recebido'] = $conta['id_recebido'];

		$banco = $this->P_contas_model->recebe_conta($dados['conta']);

		$conta['status'] = 1;

		$banco['saldo'] = $banco['saldo'] - $conta['valor_pago'];

		$vendedor = $this->P_vendedores_petrofertil_model->recebe_vendedor_nome($conta['pago_para']);

		if ($vendedor) {

			$diferenca = $conta['valor_pago'] - $conta['valor'];

			$vendedor['saldo'] = $vendedor['saldo'] - $diferenca;

			$id_vendedor = $vendedor['id'];

			$this->P_vendedores_petrofertil_model->atualiza_vendedor($id_vendedor, $vendedor);


		}

		$this->P_fluxo_model->inserir_entrada_fluxo($dados);

		$this->P_contas_model->atualiza_conta($banco); //Atualiza conta bancaria 

		$this->P_contas_pagar_model->atualiza_status($id, $conta); //Atualiza tabela contas a receber

		redirect('P_vendedores_petrofertil/saldo_vendedor/' . $vendedor['nome']);

	}


	public function deleta_status_vendedor()
	{
		$this->load->model('P_contas_pagar_model');
		$this->load->model('P_contas_model');
		$this->load->model('P_fluxo_model');

		$id = $this->uri->segment(3);

		$conta_pagar = $this->P_contas_pagar_model->recebe_conta($id);

		$banco = $this->P_contas_model->recebe_conta($conta_pagar['id_conta']);

		$banco['saldo'] = $banco['saldo'] + $conta_pagar['valor_pago']; //Retira valor recebido da conta bancaria
		$banco = $this->P_contas_model->atualiza_conta($banco); // Atualiza a conta bancaria 

		$conta_pagar['status'] = 0; //Muda o status da conta
		$this->P_contas_pagar_model->atualiza_status($id, $conta_pagar); //Atualiza tabela contas a receber

		$this->P_fluxo_model->deleta_fluxo_relacao($conta_pagar['id']); //Deleta registro do fluxo

		redirect('P_contas_pagar/inicio/9');

	}


	public function deleta_status()
	{
		$this->load->model('P_contas_pagar_model');
		$this->load->model('P_contas_model');
		$this->load->model('P_fluxo_model');

		$id = $this->uri->segment(3);

		$conta_pagar = $this->P_contas_pagar_model->recebe_conta($id);

		$banco = $this->P_contas_model->recebe_conta($conta_pagar['id_conta']);

		$banco['saldo'] = $banco['saldo'] + $conta_pagar['valor']; //Retira valor recebido da conta bancaria
		$banco = $this->P_contas_model->atualiza_conta($banco); // Atualiza a conta bancaria 

		$conta_pagar['status'] = 0; //Muda o status da conta
		$this->P_contas_pagar_model->atualiza_status($id, $conta_pagar); //Atualiza tabela contas a receber

		$this->P_fluxo_model->deleta_fluxo_relacao($conta_pagar['id']); //Deleta registro do fluxo

		redirect('P_contas_pagar/inicio/9');

	}

	public function deleta_conta()
	{

		$this->load->model('P_contas_pagar_model');

		$id = $this->uri->segment(3);

		$this->P_contas_pagar_model->deleta_conta($id);

		redirect('P_contas_pagar/inicio/9');

	}


}