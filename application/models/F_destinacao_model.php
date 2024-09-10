<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_destinacao_model extends CI_Model
{

	public function inserir_destinacao($dados)
	{

		$this->db->set($dados);
		$this->db->insert('f_destinacoes');
	}

	public function inserir_destinacao_oleo_acido($dados)
	{

		$this->db->set($dados);
		$this->db->insert('f_destinacoes_oleo_acido');
	}

	public function recebe_destinacoes()
	{

		$this->db->order_by('data_destinacao', 'DESC');
		$query = $this->db->get('f_destinacoes');

		return $query->result_array();
	}

	public function recebe_destinacoes_oleo_acido()
	{

		$this->db->order_by('data_destinacao', 'DESC');
		$query = $this->db->get('f_destinacoes_oleo_acido');

		return $query->result_array();
	}

	public function recebe_destinacao_oleo_acido($id)
	{
		
		$this->db->where('id', $id);
		$query = $this->db->get('f_destinacoes_oleo_acido');
		return $query->row_array();
	}

	public function recebe_destinacao($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('f_destinacoes');
		return $query->row_array();
	}

	public function atualiza_destinacao($dados, $id)
	{

		$this->db->where('id', $id);
		$this->db->update('f_destinacoes', $dados);
	}


	public function filtra_destinacoes($data_final, $data_inicial)
	{

		$this->db->where('data_destinacao BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->order_by('data_destinacao', 'DESC');
		/* $this->db->where('media <>', 0);*/
		$query = $this->db->get('f_destinacoes');
		return $query->result_array();
	}

	public function filtra_destinacoes_oleo_acido($data_final, $data_inicial)
	{

		$this->db->where('data_destinacao BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->order_by('data_destinacao', 'DESC');
		/* $this->db->where('media <>', 0);*/
		$query = $this->db->get('f_destinacoes_oleo_acido');
		return $query->result_array();
	}

	public function deleta_destinacao($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('f_destinacoes');
	}

	public function deleta_destinacao_acido($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('f_destinacoes_oleo_acido');
	}
}
