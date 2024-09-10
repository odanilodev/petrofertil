<?php
defined('BASEPATH') or exit('No direct script access allowed');

class S_fluxo_model extends CI_Model
{
	
	public function recebe_caixa($id)
	{
		
		$this->db->where('id', $id);
		$query = $this->db->get('s_caixa');

		return $query->row_array();
	}

	public function recebe_movimentacao($id)
	{
		
		$this->db->where('id', $id);
		$query = $this->db->get('s_fluxo');

		return $query->row_array();
	}

	public function recebe_id()
	{
		
		$this->db->select_max('id');
		$query = $this->db->get('s_caixa');

		return $query->row_array();
	}

	public function inserir_entrada_caixa($data)
	{
		$this->db->set($data);
		$this->db->insert('s_caixa');
	}

	public function inserir_entrada_fluxo($dados)
	{
		$this->db->set($dados);
		$this->db->insert('s_fluxo');
	}

		
	public function atualiza_entrada_fluxo($id,$dados){

		$this->db->where('id', $id);
		$this->db->update('f_fluxo', $dados);
}


	public function recebe_fluxo()
	{
		
		$this->db->limit(100);
		$this->db->order_by('data_registro', 'DESC');
		$query = $this->db->get('s_fluxo');

		return $query->result_array();
	}

	public function recebe_fluxo_filtrado($data_inicial, $data_final)
	{
		$this->db->where('data_movimentacao BETWEEN "' . date('Y-m-d', strtotime($data_inicial)) . '" and "' . date('Y-m-d', strtotime($data_final)) . '"');
		$this->db->order_by('data_movimentacao', 'DESC');
		/* $this->db->where('media <>', 0);*/
		$query = $this->db->get('s_fluxo');
		return $query->result_array();
	}

	public function seleciona_fluxo($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('f_fluxo');

		return $query->row_array();
	}


	public function deleta_movimentacao($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('s_fluxo');
	}

	public function deleta_fluxo_relacao($id_relacao)
	{

		$this->db->where('id_relacao', $id_relacao);
		$this->db->delete('f_fluxo');
	}


	public function filtra_fluxo_geral($data_final, $data_inicial)
	{

		$this->db->where('data_fluxo BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->order_by('data_fluxo', 'DESC');
		/* $this->db->where('media <>', 0);*/
		$query = $this->db->get('f_fluxo');
		return $query->result_array();
	}
}
