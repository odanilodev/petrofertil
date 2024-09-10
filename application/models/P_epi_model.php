<?php
defined('BASEPATH') or exit('No direct script access allowed');

class p_epi_model extends CI_Model
{

	public function inserir_epi($dados)
	{

		$this->db->set($dados);
		$this->db->insert('p_epis');
	}


	public function recebe_epis()
	{
		$query = $this->db->get('p_epis');
		return $query->result_array();
	}

	public function recebe_epi_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('p_epis');

		return $query->row_array();
	}


	public function atualiza_epi($dados, $id)
	{
		$this->db->set($dados);
		$this->db->where('id', $id);
		$this->db->update('p_epis', $dados);
	}


	public function deleta_epi($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('p_epis');
	}

	public function atualiza_status_servico($dados, $id)
	{
		$this->db->set($dados);
		$this->db->where('id', $id);
		$this->db->update('P_solicitacao_servico_interno', $dados);
	}
}
