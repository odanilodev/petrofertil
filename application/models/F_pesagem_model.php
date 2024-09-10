<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_pesagem_model extends CI_Model
{

	public function inserir_pesagem($dados)
	{

		$this->db->set($dados);
		$this->db->insert('f_pesagem');
	}

	public function recebe_pesagem()
	{
		$this->db->order_by('id', 'DESC');
		$this->db->limit('100');
		$query = $this->db->get('f_pesagem');

		return $query->result_array();
	}

	public function recebe_dado($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('f_pesagem');

		return $query->row_array();
	}

	public function deleta_pesagem($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('f_pesagem');
	}


	public function atualiza_pesagem($id, $dados)
	{
		$this->db->set($dados);
		$this->db->where('id', $id);
		$this->db->update('f_pesagem', $dados);
	}

	public function atualiza_status($id, $dados)
	{

		$this->db->where('id', $id);
		$this->db->update('f_pesagem', $dados);
	}


	public function filtra_pesagem($data_final, $data_inicial)
	{

		$this->db->where('data BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->order_by('data', 'DESC');
		/* $this->db->where('media <>', 0);*/
		$query = $this->db->get('f_pesagem');
		return $query->result_array();
	}
}
