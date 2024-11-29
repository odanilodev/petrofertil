<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_contas_receber_model extends CI_Model
{
	public function inserir_conta($dados)
	{
		$this->db->set($dados);
		$this->db->insert('p_contas_receber');
	}

	public function inserir_conta_id($dados)
	{
		$this->db->set($dados);
		$this->db->insert('p_contas_receber');

		// Obtenha o ID gerado após a inserção
		$id_inserido = $this->db->insert_id();

		return $id_inserido;
	}

	public function atualiza_conta($id, $dados)
	{
		$this->db->where('id', $id);
		$this->db->update('p_contas_receber', $dados);
	}

	public function atualiza_conta_vinculo($codigo_venda, $dados)
	{
		$this->db->where('codigo_venda', $codigo_venda);
		$this->db->update('p_contas_receber', $dados);
	}

	public function recebe_contas()
	{
		$this->db->order_by('vencimento', 'DESC');
		$query = $this->db->get('p_contas_receber');
		return $query->result_array();
	}

	public function recebe_contas_vinculo()
	{
		$this->db->select('p_contas_receber.*, p_clientes_petrofertil.nome_fantasia, p_contas_bancarias.descricao');
		$this->db->from('p_contas_receber');
		$this->db->join('p_clientes_petrofertil', 'p_contas_receber.cliente = p_clientes_petrofertil.id', 'left');
		$this->db->join('p_contas_bancarias', 'p_contas_receber.conta = p_contas_bancarias.id', 'left');
		$this->db->order_by('vencimento', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function obtem_clientes_com_contas()
	{
		$this->db->select('p_clientes_petrofertil.id, p_clientes_petrofertil.nome_fantasia');
		$this->db->from('p_contas_receber');
		$this->db->join('p_clientes_petrofertil', 'p_contas_receber.cliente = p_clientes_petrofertil.id', 'left');
		$this->db->group_by('p_clientes_petrofertil.id, p_clientes_petrofertil.nome_fantasia');
		$this->db->order_by('p_clientes_petrofertil.nome_fantasia', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
	}


	public function recebe_contas_filtrada_data($data_final, $data_inicial, $cliente_id)
	{
		$this->db->select('p_contas_receber.*, p_clientes_petrofertil.nome_fantasia, p_contas_bancarias.descricao');
		$this->db->from('p_contas_receber');
		$this->db->join('p_clientes_petrofertil', 'p_contas_receber.cliente = p_clientes_petrofertil.id', 'left');
		$this->db->join('p_contas_bancarias', 'p_contas_receber.conta = p_contas_bancarias.id', 'left');

		if (!empty($cliente_id)) {
			$this->db->where('p_clientes_petrofertil.id', $cliente_id);
		}

		$this->db->where('vencimento BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->order_by('vencimento', 'DESC');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function recebe_contas_data_nome($data_inicial, $data_final, $vendedor)
	{
		$this->db->select('p_contas_receber.*, p_clientes_petrofertil.nome_fantasia, p_contas_bancarias.descricao');
		$this->db->from('p_contas_receber');
		$this->db->join('p_clientes_petrofertil', 'p_contas_receber.cliente = p_clientes_petrofertil.id', 'left');
		$this->db->join('p_contas_bancarias', 'p_contas_receber.conta = p_contas_bancarias.id', 'left');
		$this->db->where('vencimento BETWEEN "' . date('Y-m-d', strtotime($data_inicial)) . '" and "' . date('Y-m-d', strtotime($data_final)) . '"');
		$this->db->where('recebido_de', $vendedor);
		$this->db->order_by('vencimento', 'DESC');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function recebe_contas_filtrada_data_status_cliente($data_final, $data_inicial, $status, $cliente_id)
	{
		$this->db->select('p_contas_receber.*, p_clientes_petrofertil.nome_fantasia, p_contas_bancarias.descricao');
		$this->db->from('p_contas_receber');
		$this->db->join('p_clientes_petrofertil', 'p_contas_receber.cliente = p_clientes_petrofertil.id', 'left');
		$this->db->join('p_contas_bancarias', 'p_contas_receber.conta = p_contas_bancarias.id', 'left');
		$this->db->where('vencimento BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->where('status', $status);

		if (!empty($cliente_id)) {
			$this->db->where('p_clientes_petrofertil.id', $cliente_id);
		}

		$this->db->order_by('vencimento', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}


	public function recebe_contas_dia($data_atual)
	{
		$this->db->order_by('vencimento', 'DESC');
		$this->db->where('vencimento', $data_atual);
		$query = $this->db->get('p_contas_receber');

		return $query->result_array();
	}

	public function recebe_conta($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('p_contas_receber');

		return $query->row_array();
	}

	public function deleta_conta($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('p_contas_receber');
	}


	public function deleta_conta_vinculo($codigo)
	{
		$this->db->where('codigo_venda', $codigo);
		$this->db->delete('p_contas_receber');
	}

	public function atualiza_status($id, $conta)
	{
		$this->db->where('id', $id);
		$this->db->update('p_contas_receber', $conta);
	}
}