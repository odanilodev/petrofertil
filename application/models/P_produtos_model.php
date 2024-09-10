<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_produtos_model extends CI_Model
{

	public function inserir_produto($dados)
	{
		$this->db->set($dados);
		$this->db->insert('p_produtos');
	}


	public function recebe_produtos()
	{
		$query = $this->db->get('p_produtos');
		return $query->result_array();
	}

	public function recebe_produto_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('p_produtos');

		return $query->row_array();
	}


	public function atualiza_produto($dados, $id)
	{
		$this->db->set($dados);
		$this->db->where('id', $id);
		$this->db->update('p_produtos', $dados);
	}

	public function verifica_produto_pai($nome)
	{
		$this->db->where('nome', $nome);
		$query = $this->db->get('p_produtos');
		return $query->row_array();
	}

	public function deleta_produto($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('p_produtos');
	}

}
