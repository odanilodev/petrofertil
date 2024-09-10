<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_solicitacoes_trello_model extends CI_Model
{

	public function inserir_solicitacao($dados)
	{

		$this->db->set($dados);
		$this->db->insert('f_solicitacoes_trello');
	}


	public function recebe_solicitacoes()
	{

		$query = $this->db->get('f_solicitacoes_trello');

		return $query->result_array();
	}


	public function deleta_solicitacao_trello($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('f_solicitacoes_trello');
	}


	public function atualiza_status_servico($dados, $id)
	{
		$this->db->set($dados);
		$this->db->where('id', $id);
		$this->db->update('f_solicitacao_servico_interno', $dados);
	}
}
