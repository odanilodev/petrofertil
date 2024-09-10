<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_borra extends CI_Controller
{

	public function exibir_vendas()
	{

		$this->load->model('F_borra_model');
		
		$data['vendas'] = $this->F_borra_model->recebe_vendas();	

		$data['pagina'] = "venda_borra";

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/vendas_borra');
		$this->load->view('financeiro/footer');
	}

	public function exibir_vendas_filtrada()
	{

		$this->load->model('F_borra_model');

		$data_inicial = $this->input->post('data_inicial');
		$data_final = $this->input->post('data_final');
		
		$data['vendas'] = $this->F_borra_model->recebe_vendas_filtrada($data_inicial, $data_final);	

		$data['pagina'] = "venda_borra";

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/vendas_borra');
		$this->load->view('financeiro/footer');
	}

	public function lancar_venda()
	{
		$this->load->model('F_clientes_model');

		$data['clientes'] = $this->F_clientes_model->recebe_clientes();	

		$data['pagina'] = "venda_borra";

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_venda_borra');
		$this->load->view('financeiro/footer');
	}

	public function edita_venda()
	{
		
		$this->load->model('F_borra_model');
		$this->load->model('F_clientes_model');

		$id_venda = $this->uri->segment(3);

		$data['venda'] = $this->F_borra_model->recebe_venda($id_venda);	

		$data['clientes'] = $this->F_clientes_model->recebe_clientes();	

		$data['pagina'] = "venda_borra";

		$this->load->view('financeiro/header', $data);
		$this->load->view('financeiro/formulario_venda_borra');
		$this->load->view('financeiro/footer');
	}
	

	public function inserir_venda_borra()
	{
		$this->load->model('F_contas_receber_model');
		$this->load->model('F_borra_model');

		$id = $this->input->post('id');
		$dados['cliente'] = $this->input->post('cliente');
		$dados['quantidade'] = $this->input->post('quantidade');
		$dados['valor'] = $this->input->post('valor');
		$contas = $this->input->post('contas');
		$dados['valor_total'] = $dados['quantidade'] * $dados['valor'];
		$dados['data_destinacao'] = $this->input->post('data_destinacao');


		if($contas == 'sim'){
			
			$data['vencimento'] = $dados['data_destinacao'];

			$data['valor'] = $dados['valor_total'];
			$data['empresa'] = 'Óleo';
			$data['status'] = 0;
			$data['nome'] = $dados['cliente'];
			$data['observacao'] = 'Venda de borra';
		
			$this->F_contas_receber_model->inserir_conta($data);
		}

		if($id != '' ){

			$this->F_borra_model->atualiza_venda($dados, $id); //edita

		}else{

			$this->F_borra_model->cadastrar_venda($dados); //cadastra

		}


		redirect('F_borra/exibir_vendas/');
		
	}

	public function deleta_venda()
	{

		$this->load->model('F_borra_model');

		$id = $this->uri->segment(3);

		$this->F_borra_model->deleta_venda($id);

		redirect('F_borra/exibir_vendas/');
		
	}




	public function historico_oleo()
	{
		$this->load->model('F_estoque_model');
		
		$data['data_inicial'] = date('Y/m/01');
		$data['data_final'] =date('Y/m/d', strtotime("+1 days"));	

		$data['estoque'] = $this->F_estoque_model->filtra_estoque_historico($data['data_inicial'], $data['data_final']);
		;
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

}
