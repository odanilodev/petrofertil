<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_cheques extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('P_cheques_model');
	}

	public function index()
	{

		$this->load->model('P_contas_model');

		$data['bancos'] = $this->P_contas_model->recebe_contas();


		$data_atual = date('Y-m-d');

		$data['cheques'] = $this->P_cheques_model->recebe_cheques();

		$valor_total_compensado = 0;

		$valor_acompensar = 0;

		$valor_cheque_devedor = 0;

		foreach ($data['cheques'] as $cheque) {

			if ($cheque['status'] == 'Compensado') {
				$valor_total_compensado += $cheque['valor'];
			} elseif (strtotime($cheque['data_compensasao']) < strtotime($data_atual)) {
				$valor_cheque_devedor += $cheque['valor'];
			} else {
				$valor_acompensar += $cheque['valor'];
			}
		}

		$data['valor_total_compensado'] = $valor_total_compensado;

		$data['valor_cheque_devedor'] = $valor_cheque_devedor;

		$data['valor_acompensar'] = $valor_acompensar;

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/cheques');
		$this->load->view('petrofertil/footer');
	}

	public function filtra_cheques()
	{

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		$status = $this->input->post('status');

		$data_atual = date('Y-m-d');

		if ($status == 'Geral') {
			$data['cheques'] = $this->P_cheques_model->recebe_cheques_data($data_inicial, $data_final);
		} else {
			$data['cheques'] = $this->P_cheques_model->recebe_cheques_status($data_inicial, $data_final, $status);
		}

		$valor_total_compensado = 0;

		$valor_acompensar = 0;

		$valor_cheque_devedor = 0;

		foreach ($data['cheques'] as $cheque) {

			if ($cheque['status'] == 'Compensado') {
				$valor_total_compensado += $cheque['valor'];
			} elseif (strtotime($cheque['data_compensasao']) < strtotime($data_atual)) {
				if ($cheque['status'] == 'Compensado') {
					$valor_cheque_devedor += $cheque['valor'];
				}
			} else {
				$valor_acompensar += $cheque['valor'];
			}
		}

		$data['valor_total_compensado'] = $valor_total_compensado;

		$data['valor_cheque_devedor'] = $valor_cheque_devedor;

		$data['valor_acompensar'] = $valor_acompensar;

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/cheques');
		$this->load->view('petrofertil/footer');
	}

	public function formulario_cheque()
	{
		$this->load->model('P_contas_model');

		$data['contas_bancarias'] = $this->P_contas_model->recebe_contas();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_cheque');
		$this->load->view('petrofertil/footer');
	}

	public function edita_cheque()
	{
		$this->load->model('P_contas_model');

		$id = $this->uri->segment(3);

		$data['cheque'] = $this->P_cheques_model->recebe_cheque($id);

		$data['contas_bancarias'] = $this->P_contas_model->recebe_contas();

		$this->load->view('petrofertil/header', $data);
		$this->load->view('petrofertil/formulario_cheque');
		$this->load->view('petrofertil/footer');

	}

	public function insere_cheque()
	{

		$id = $this->input->post('id');

		$dados['numero'] = $this->input->post('numero');
		$dados['data_compensasao'] = $this->input->post('data_compensasao');
		$dados['id_conta'] = $this->input->post('id_conta');
		$dados['recebido'] = $this->input->post('recebido');
		$dados['valor'] = $this->input->post('valor');
		$dados['referente'] = $this->input->post('referente');
		$dados['conta'] = $this->input->post('conta');
		$dados['status'] = "A compensar";
		$dados['observacao'] = $this->input->post('observacao');

		if ($id != '') {
			$this->P_cheques_model->atualiza_cheque($dados, $id);
			redirect('P_cheques');

		} else {
			$this->P_cheques_model->inserir_cheque($dados);
			redirect('P_cheques');
		}

	}

	public function Muda_acompensar()
	{

		$this->load->model('P_fluxo_model');
		$this->load->model('P_contas_model');

		$id = $this->input->post('chequeId');
		$bancoId = $this->input->post('bancoId');

		$cheque = $this->P_cheques_model->recebe_cheque($id);
		$banco = $this->P_contas_model->recebe_conta($bancoId);

		$dados['data_fluxo'] = date('Y-m-d');
		$dados['conta'] = $banco['descricao'];
		$dados['valor'] = $cheque['valor'];
		$dados['despesa'] = 'Entrada';
		$dados['observacao'] = $cheque['observacao'];
		$dados['data_registro'] = date('Y-m-d');
		$dados['pago_recebido'] = $cheque['recebido'];

		if ($cheque['posse_de'] == null or $cheque['posse_de'] == 'petrofertil' or $cheque['posse_de'] == '') {

			$banco['saldo'] = $banco['saldo'] + $cheque['valor'];

			$this->P_contas_model->atualiza_conta($banco, $bancoId);

			$this->P_fluxo_model->inserir_entrada_fluxo($dados);
		}

		$data['status'] = "Compensado";

		$this->P_cheques_model->atualiza_cheque($data, $id);
		redirect('P_cheques');

	}

	public function Muda_compensar()
	{
		$id = $this->uri->segment(3);

		$dados['status'] = "A compensar";

		$this->P_cheques_model->atualiza_cheque($dados, $id);
		redirect('P_cheques');

	}

	public function Estornar_cheque()
	{
		$this->load->model('P_fluxo_model');
		$this->load->model('P_contas_model');

		$id = $this->input->post('chequeId');
		$bancoId = $this->input->post('bancoId');
		$motivoEstorno = $this->input->post('motivoEstorno');

		$cheque = $this->P_cheques_model->recebe_cheque($id);
		$banco = $this->P_contas_model->recebe_conta($bancoId);

		$banco['saldo'] = $banco['saldo'] - $cheque['valor'];

		$this->P_contas_model->atualiza_conta($banco, $bancoId);

		$data['status'] = "A compensar";
		$data['posse_de'] = null;
		$data['data_compensasao'] = null;
		$data['motivoEstorno'] = $motivoEstorno;

		$this->P_cheques_model->atualiza_cheque($data, $id);
		redirect('P_cheques');

	}

	public function deleta_cheque()
	{
		$this->load->model('P_vendedores_petrofertil_model');
		$this->load->model('P_contas_receber_model');


		$id = $this->uri->segment(3);

		$cheque = $this->P_cheques_model->recebe_cheque($id);

		$vendedor = $this->P_vendedores_petrofertil_model->recebe_vendedor_nome_individual($cheque['recebido']);

		$observacao = $this->input->post('observacaoDelecao');


		if ($vendedor) {
			$id = $cheque['id'];
			$dados['vencimento'] = date('Y-m-d'); // Define a data de vencimento para o dia atual
			$dados['data_emissao'] = date('Y-m-d');
			$dados['valor'] = $cheque['valor'];
			$dados['conta'] = $cheque['id_conta'];
			$dados['status'] = 0;
			$dados['observacao'] = $cheque['observacao'];
			$dados['recebido_de'] = $vendedor['nome']; // Define o nome do vendedor em recebido_de
			$dados['observacao'] = $observacao; // Define o nome do vendedor em recebido_de

			$this->P_contas_receber_model->inserir_conta($dados);
		}

		$this->P_cheques_model->deleta_cheque($id);

		redirect("P_cheques");
	}
}