<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_cidades_model extends CI_Model
{

	public function inserir_cidade($dados)
	{

		$this->db->set($dados);
		$this->db->insert('f_cidades');
	}

	public function recebe_cidades()
	{
		$this->db->order_by('nome', 'DESC');
		$query = $this->db->get('f_cidades');

		return $query->result_array();
	}

	public function recebe_cidade($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('f_cidades');
		return $query->row_array();
	}

	public function atualiza_Cidade($dados, $id)
	{

		$this->db->where('id', $id);
		$this->db->update('f_cidades', $dados);
	}


	public function deleta_cidade($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('f_cidades');
	}
}
