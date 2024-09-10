<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_solicitacao_servico_model extends CI_Model
{

	public function inserir_solicitacao($dados)
	{

		$this->db->set($dados);
		$this->db->insert('p_solicitacao_servico_interno');
	}


	public function recebe_servicos_funcionario($nome)
	{

		$this->db->where('para', $nome);
		$query = $this->db->get('p_solicitacao_servico_interno');

		return $query->result_array();
	}

	public function recebe_servico_id($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('p_solicitacao_servico_interno');

		return $query->row_array();
	}


	public function atualiza_solicitacao($dados, $id)
	{
		$this->db->set($dados);
		$this->db->where('id', $id);
		$this->db->update('p_solicitacao_servico_interno', $dados);
	}


	public function deleta_servico($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('p_solicitacao_servico_interno');
	}

	public function atualiza_status_servico($dados, $id)
	{
		$this->db->set($dados);
		$this->db->where('id', $id);
		$this->db->update('p_solicitacao_servico_interno', $dados);
	}
}
