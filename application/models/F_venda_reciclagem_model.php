<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_venda_reciclagem_model extends CI_Model
{

	public function cadastrar_venda($dados)
	{
		$this->db->set($dados);
		$this->db->insert('f_venda_reciclagem');
	}

	public function cadastrar_produto_individual($dados)
	{
		$this->db->set($dados);
		$this->db->insert('f_venda_produtos_reciclagem');
	}

	public function cadastrar_produto_individual2($dados)
	{
		$this->db->set($dados);
		$this->db->insert('f_venda_produtos_reciclagem2');
	}

	public function recebe_vendas()
	{
		$this->db->order_by('data_venda', 'DESC');
		$query = $this->db->get('f_venda_reciclagem');

		return $query->result_array();
	}

	public function recebe_vendas_filtrada($data_final, $data_inicial)
	{
		$this->db->where('data_venda BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->order_by('data_venda', 'DESC');
		/* $this->db->where('media <>', 0);*/
		$query = $this->db->get('f_venda_reciclagem');
		return $query->result_array();
	}

	public function recebe_vendas_filtrada_pagas($data_final, $data_inicial)
	{
		$this->db->where('data_venda BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->where('valor_recebido >', 0); // Adiciona a condição para valor_recebido maior que zero
		/* $this->db->where('media <>', 0);*/
		$query = $this->db->get('f_venda_reciclagem');
		return $query->result_array();
	}

	public function recebe_vendas_filtrada_naopagas($data_final, $data_inicial)
	{
		$this->db->where('data_venda BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->order_by('data_venda', 'DESC');
		$this->db->where('valor_recebido', 0);
		$this->db->where('data_recebimento', NULL);
		/* $this->db->where('media <>', 0);*/
		$query = $this->db->get('f_venda_reciclagem');
		return $query->result_array();
	}

	public function recebe_venda($id)
	{
		$this->db->where('id', $id);
		$this->db->order_by('data_venda', 'DESC');
		$query = $this->db->get('f_venda_reciclagem');

		return $query->row_array();
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

	public function deleta_venda($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('f_venda_reciclagem');
	}

	public function reseta_tabela_venda_produtos() //Cuidado, delete sem where
	{
		$this->db->query('DELETE from f_venda_produtos_reciclagem');
		
	}

	public function deleta_venda_produto($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('f_venda_produtos_reciclagem');
	}
}
