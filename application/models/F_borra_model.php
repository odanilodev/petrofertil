<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_borra_model extends CI_Model
{

	public function cadastrar_venda($dados)
	{
		$this->db->set($dados);
		$this->db->insert('f_venda_borra');
	}

	public function recebe_vendas()
	{
		$this->db->order_by('data_destinacao', 'DESC');
		$query = $this->db->get('f_venda_borra');

		return $query->result_array();
	}

	public function recebe_venda($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('f_venda_borra');

		return $query->row_array();
	}


	public function atualiza_venda($dados, $id)
	{	
		$this->db->where('id', $id);
		$this->db->update('f_venda_borra', $dados);
	}

	public function deleta_venda($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('f_venda_borra');
	}


	public function recebe_vendas_filtrada($data_final, $data_inicial){

		$this->db->where('data_destinacao BETWEEN "'. date('Y-m-d', strtotime($data_final)). '" and "'. date('Y-m-d', strtotime($data_inicial)).'"');
		$this->db->order_by('data_destinacao', 'DESC');  
	   /* $this->db->where('media <>', 0);*/
		$query = $this->db->get('f_venda_borra');
		return $query->result_array();
	 
 }

	
	public function recebe_venda_produto($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('f_venda_produtos_reciclagem');

		return $query->row_array();
	}
	
	public function atualiza_venda_produto($dados, $id)
	{	
		$this->db->where('id', $id);
		$this->db->update('f_venda_produtos_reciclagem', $dados);
	}

	public function edita_venda($dados, $id)
	{	
		$this->db->where('id', $id);
		$this->db->update('f_venda_reciclagem', $dados);
	}

	

	public function deleta_venda_produto($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('f_venda_produtos_reciclagem');
	}
}
