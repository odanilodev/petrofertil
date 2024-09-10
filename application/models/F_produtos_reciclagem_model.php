<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_produtos_reciclagem_model extends CI_Model
{

	public function cadastrar_produto($dados)
	{
		$this->db->set($dados);
		$this->db->insert('f_produtos_reciclagem');
	}

	public function recebe_produtos()
	{

		$this->db->order_by('nome', 'DESC');
		$query = $this->db->get('f_produtos_reciclagem');

		return $query->result_array();
	}

	public function recebe_produtos_relatorio($produto, $data_inicial, $data_final)
	{
		$this->db->where('produto', $produto);
		$this->db->where('data_venda BETWEEN "'. date('Y-m-d', strtotime($data_inicial)). '" and "'. date('Y-m-d', strtotime($data_final)).'"');
		$this->db->order_by('produto', 'DESC');
		$query = $this->db->get('f_venda_produtos_reciclagem');

		return $query->result_array();
	}

	public function recebe_produtos_geral($data_inicial, $data_final)
	{
		$this->db->where('data_venda BETWEEN "'. date('Y-m-d', strtotime($data_inicial)). '" and "'. date('Y-m-d', strtotime($data_final)).'"');
		$this->db->order_by('produto', 'DESC');
		$query = $this->db->get('f_venda_produtos_reciclagem');

		return $query->result_array();
	}


	public function recebe_produto($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('f_produtos_reciclagem');

		return $query->row_array();
	}

	public function edita_produto($dados, $id)
	{
		
		$this->db->where('id', $id);
		$this->db->update('f_produtos_reciclagem', $dados);
	}

	public function deleta_produto($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('f_produtos_reciclagem');
	}
}
