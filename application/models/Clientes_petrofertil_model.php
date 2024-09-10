<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clientes_petrofertil_model extends CI_Model
{

	public function inserir_cliente($dados)
	{

		$this->db->set($dados);
		$this->db->insert('p_clientes_petrofertil');

	}

	public function recebe_clientes()
	{

		$this->db->order_by('nome_fantasia', 'ASC');
		$query = $this->db->get('p_clientes_petrofertil');

		return $query->result_array();

	}

	public function recebe_clientes_nome()
	{

		$this->db->select('nome_fantasia');
		$this->db->order_by('nome_fantasia', 'DESC');

		$query = $this->db->get('p_clientes_petrofertil');

		return $query->result_array();
	}


	public function recebe_cliente($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('p_clientes_petrofertil');
		return $query->row_array();
	}

	public function atualiza_cliente($dados, $id)
	{

		$this->db->where('id', $id);
		$this->db->update('p_clientes_petrofertil', $dados);
	}


	public function deleta_cliente($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('p_clientes_petrofertil');

	}

}