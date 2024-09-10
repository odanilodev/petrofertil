<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_destinacao_model extends CI_Model
{

	public function inserir_destinacao($dados)
	{

		$this->db->set($dados);
		$this->db->insert('p_destinacoes_estoque');
	}


	public function recebe_destinacoes()
	{
		$this->db->order_by('data_destinacao', 'DESC'); 
		$this->db->limit('100');
		$query = $this->db->get('p_destinacoes_estoque');
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


	public function deleta_destinacao($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('p_destinacoes_estoque');
	}

	public function atualiza_status_servico($dados, $id)
	{
		$this->db->set($dados);
		$this->db->where('id', $id);
		$this->db->update('P_solicitacao_servico_interno', $dados);
	}
}
