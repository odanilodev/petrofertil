<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_quebra_oleo_acido_model extends CI_Model
{

	public function inserir_quebra($dados)
	{

		$this->db->set($dados);
		$this->db->insert('f_quebra_oleo_acido');
	}

	public function recebe_quebras()
	{

		$this->db->order_by('data_quebra', 'DESC');
		$query = $this->db->get('f_quebra_oleo_acido');

		return $query->result_array();
	}

	public function recebe_quebra($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('f_quebra_oleo_acido');
		return $query->row_array();
	}

	public function filtra_quebra($data_final, $data_inicial)
	{

		$this->db->where('data_quebra BETWEEN "' . date('Y-m-d', strtotime($data_inicial)) . '" and "' . date('Y-m-d', strtotime($data_final)) . '"');
		$this->db->order_by('data_quebra', 'DESC');
		/* $this->db->where('media <>', 0);*/
		$query = $this->db->get('f_quebra_oleo_acido');
		return $query->result_array();
	}

	public function deleta_quebra($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('f_quebra_oleo_acido');
	}


	public function filtra_quebra_geral($data_final, $data_inicial)
	{

		$this->db->where('data_quebra BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->order_by('data_quebra', 'DESC');
		/* $this->db->where('media <>', 0);*/
		$query = $this->db->get('f_quebra_oleo_acido');
		return $query->result_array();
	}
}
