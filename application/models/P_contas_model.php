<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_contas_model extends CI_Model
{

	public function inserir_conta($dados)
	{
		$this->db->set($dados);
		$this->db->insert('p_contas_bancarias');
	}

	public function recebe_contas()
	{
		$query = $this->db->get('p_contas_bancarias');
		return $query->result_array();
	}

	public function recebe_conta($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('p_contas_bancarias');
		return $query->row_array();
	}

	public function recebe_conta_nome($nomeConta)
	{
		$this->db->where('descricao', $nomeConta);
		$query = $this->db->get('p_contas_bancarias');
		return $query->row_array();
	}

	public function deleta_conta($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('p_contas_bancarias');
	}

	public function atualiza_conta($dados, $id_conta)
	{
		$this->db->set($dados);
		$this->db->where('id', $id_conta);
		$this->db->update('p_contas_bancarias', $dados);
	}
}