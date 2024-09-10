<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_contas_receber_model extends CI_Model
{


	public function inserir_conta($dados)
	{
		$this->db->set($dados);
		$this->db->insert('f_contas_receber');
	}

	public function inserir_conta_id($dados)
	{
		$this->db->set($dados);
		$this->db->insert('f_contas_receber');
		
		// Obtenha o ID gerado após a inserção
		$id_inserido = $this->db->insert_id();
	
		return $id_inserido;
	}
	

	public function atualiza_conta($id, $dados)
	{

		$this->db->where('id', $id);
		$this->db->update('f_contas_receber', $dados);
	}

	public function recebe_contas()
	{
		$this->db->order_by('vencimento', 'DESC');
		$query = $this->db->get('f_contas_receber');

		return $query->result_array();
	}

	public function recebe_contas_dia($data_atual)
	{
		$this->db->order_by('vencimento', 'DESC');
		$this->db->where('vencimento', $data_atual);
		$query = $this->db->get('f_contas_receber');

		return $query->result_array();
	}

	public function recebe_conta($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('f_contas_receber');

		return $query->row_array();
	}



	public function deleta_conta($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('f_contas_receber');
	}


	public function atualiza_status($id, $conta)
	{

		$this->db->where('id', $id);
		$this->db->update('f_contas_receber', $conta);
	}
}
