<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_contas_model extends CI_Model
{

	public function inserir_contribuintes($dados)
	{
		$this->db->set($dados);
		$this->db->insert('f_contribuintes');
	}

	public function recebe_ultimo_id()
	{
		$query = $this->db->select('id')
                  		  ->from('f_contas')
                          ->order_by('id', 'desc')
                          ->limit(1)
                          ->get();

		return $query->row_array();
	}

	public function inserir_conta($dados)
	{
		$this->db->set($dados);
		$this->db->insert('f_contas');
	}

	public function atualiza_conta($dados, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('f_contas', $dados);
	
	}

	public function recebe_contribuintes()
	{
		$this->db->order_by('nome', 'DESC');
		$query = $this->db->get('f_contribuintes');

		return $query->result_array();
	}


	public function recebe_contas()
	{
		$this->db->order_by('vencimento', 'DESC');
		$this->db->limit(500); 
		$query = $this->db->get('f_contas');
		$this->db->order_by('vencimento', 'DESC');
		

		return $query->result_array();
	}

	public function recebe_contas_filtrada_data($data_final, $data_inicial)
	{
		$this->db->where('vencimento BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->order_by('vencimento', 'DESC');
		/* $this->db->where('media <>', 0);*/
		$query = $this->db->get('f_contas');
		return $query->result_array();
	}

	public function recebe_contas_filtrada_data_status($data_final, $data_inicial, $status)
	{		
		$this->db->where('vencimento BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->where('status', $status);
		$this->db->order_by('vencimento', 'DESC');
		/* $this->db->where('media <>', 0);*/
		$query = $this->db->get('f_contas');
		return $query->result_array();
	}

	public function recebe_contas_filtrada_macro($id_macro, $data_final, $data_inicial)
	{

		$this->db->where('id_macro', $id_macro);
		$this->db->where('vencimento BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->order_by('vencimento', 'DESC');
		/* $this->db->where('media <>', 0);*/
		$query = $this->db->get('f_contas');
		return $query->result_array();
	}

	public function recebe_contas_dia($data_atual)
	{
		$this->db->order_by('vencimento', 'DESC');
		$this->db->where('vencimento', $data_atual);
		$query = $this->db->get('f_contas');

		return $query->result_array();
	}

	public function recebe_contas_macro($id_macro)
	{
		$this->db->order_by('vencimento', 'DESC');
		$this->db->where('id_macro', $id_macro);
		$query = $this->db->get('f_contas');

		return $query->result_array();
	}

	public function recebe_conta($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('f_contas');

		return $query->row_array();
	}


	public function deleta_contribuinte($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('f_contribuintes');
	}

	public function deleta_conta($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('f_contas');
	}


	public function atualiza_status($id, $conta)
	{
		$this->db->where('id', $id);
		$this->db->update('f_contas', $conta);
	}
}
