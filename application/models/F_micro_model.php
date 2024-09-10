<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_micro_model extends CI_Model
{

	public function inserir_micro($dados)
	{

		$this->db->set($dados);
		$this->db->insert('f_micros');
	}

	public function recebe_micros()
	{

		$this->db->order_by('nome', 'DESC');
		$query = $this->db->get('f_micros');

		return $query->result_array();
	}

	public function recebe_micro($id_micro)
	{
		$this->db->where('id', $id_micro);
		$query = $this->db->get('f_micros');

		return $query->row_array();
	}

	public function recebe_micros_macros($id_macro)
	{

		$this->db->order_by('nome', 'DESC');
		$this->db->where('id_macro', $id_macro);
		$query = $this->db->get('f_micros');
		return $query->result_array();
	}

	public function recebe_cliente($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('f_micros');
		return $query->row_array();
	}

	public function atualiza_cliente($dados, $id)
	{

		$this->db->where('id', $id);
		$this->db->update('f_micros', $dados);
	}

	public function deleta_cliente($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('f_macros');
	}
}
