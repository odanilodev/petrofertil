<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_contas_pagar_model extends CI_Model
{

	public function recebe_ultimo_id()
	{
		$query = $this->db->select('id')
			->from('f_contas')
			->order_by('id', 'desc')
			->limit(1)
			->get();

		return $query->row_array();
	}

	public function inserir_conta($dados)
	{
		$this->db->set($dados);
		$this->db->insert('p_contas_pagar');
	}

	public function atualiza_conta($dados, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('p_contas_pagar', $dados);

	}

	public function recebe_contribuintes()
	{
		$this->db->order_by('nome', 'DESC');
		$query = $this->db->get('f_contribuintes');

		return $query->result_array();
	}


	public function recebe_contas()
	{
		$this->db->select('p_contas_pagar.*, p_contas_bancarias.descricao as conta_descricao, p_contribuinte.nome as contribuinte_nome');
		$this->db->from('p_contas_pagar');
		$this->db->join('p_contas_bancarias', 'p_contas_pagar.id_conta = p_contas_bancarias.id', 'left');
		$this->db->join('p_contribuinte', 'p_contas_pagar.id_recebido = p_contribuinte.id', 'left');
		$this->db->order_by('p_contas_pagar.vencimento', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
	}


	public function recebe_contas_filtrada_data($data_final, $data_inicial)
	{
		$this->db->select('p_contas_pagar.*, p_contas_bancarias.descricao as conta_descricao, p_contribuinte.nome as contribuinte_nome');
		$this->db->from('p_contas_pagar');
		$this->db->join('p_contas_bancarias', 'p_contas_pagar.id_conta = p_contas_bancarias.id', 'left');
		$this->db->join('p_contribuinte', 'p_contas_pagar.id_recebido = p_contribuinte.id', 'left');
		$this->db->where('vencimento BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->order_by('p_contas_pagar.vencimento', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function recebe_contas_filtrada_data_nome($data_inicial, $data_final, $nome_vendedor)
	{

		$this->db->select('p_contas_pagar.*, p_contas_bancarias.descricao as conta_descricao, p_contribuinte.nome as contribuinte_nome');
		$this->db->from('p_contas_pagar');
		$this->db->join('p_contas_bancarias', 'p_contas_pagar.id_conta = p_contas_bancarias.id', 'left');
		$this->db->join('p_contribuinte', 'p_contas_pagar.id_recebido = p_contribuinte.id', 'left');
		$this->db->where('p_contas_pagar.pago_para', $nome_vendedor);
		$this->db->where('vencimento BETWEEN "' . date('Y-m-d', strtotime($data_inicial)) . '" and "' . date('Y-m-d', strtotime($data_final)) . '"');
		$this->db->order_by('p_contas_pagar.vencimento', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function recebe_contas_filtrada_data_nome_status($data_inicial, $data_final, $nome_vendedor, $status)
	{
		$this->db->select('p_contas_pagar.*, p_contas_bancarias.descricao as conta_descricao, p_contribuinte.nome as contribuinte_nome');
		$this->db->from('p_contas_pagar');
		$this->db->join('p_contas_bancarias', 'p_contas_pagar.id_conta = p_contas_bancarias.id', 'left');
		$this->db->join('p_contribuinte', 'p_contas_pagar.id_recebido = p_contribuinte.id', 'left');
		$this->db->where('p_contas_pagar.pago_para', $nome_vendedor);
		$this->db->where('p_contas_pagar.status', $status);
		$this->db->where('vencimento BETWEEN "' . date('Y-m-d', strtotime($data_inicial)) . '" and "' . date('Y-m-d', strtotime($data_final)) . '"');
		$this->db->order_by('p_contas_pagar.vencimento', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function recebe_contas_filtrada_data_status($data_final, $data_inicial, $status)
	{

		$this->db->select('p_contas_pagar.*, p_contas_bancarias.descricao as conta_descricao, p_contribuinte.nome as contribuinte_nome');
		$this->db->from('p_contas_pagar');
		$this->db->join('p_contas_bancarias', 'p_contas_pagar.id_conta = p_contas_bancarias.id', 'left');
		$this->db->join('p_contribuinte', 'p_contas_pagar.id_recebido = p_contribuinte.id', 'left');
		$this->db->where('vencimento BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->where('p_contas_pagar.status', $status);
		$this->db->order_by('p_contas_pagar.vencimento', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function recebe_contas_filtrada_macro($id_macro, $data_final, $data_inicial)
	{

		$this->db->where('id_macro', $id_macro);
		$this->db->where('vencimento BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->order_by('vencimento', 'DESC');
		/* $this->db->where('media <>', 0);*/
		$query = $this->db->get('f_contas');
		return $query->result_array();
	}

	public function recebe_contas_dia($data_atual)
	{
		$this->db->order_by('vencimento', 'DESC');
		$this->db->where('vencimento', $data_atual);
		$query = $this->db->get('f_contas');

		return $query->result_array();
	}

	public function recebe_contas_macro($id_macro)
	{
		$this->db->order_by('vencimento', 'DESC');
		$this->db->where('id_macro', $id_macro);
		$query = $this->db->get('f_contas');

		return $query->result_array();
	}

	public function recebe_conta($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('p_contas_pagar');

		return $query->row_array();
	}


	public function deleta_contribuinte($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('f_contribuintes');
	}

	public function deleta_conta($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('p_contas_pagar');
	}

	public function deleta_conta_vinculo($codigo)
	{
		$this->db->where('codigo_venda', $codigo);
		$this->db->delete('p_contas_pagar');
	}


	public function atualiza_status($id, $conta)
	{
		$this->db->where('id', $id);
		$this->db->update('p_contas_pagar', $conta);
	}
}