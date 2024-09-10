<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Destinacao_model extends CI_Model
{

	public function inserir_destinacao($dados)
	{
		$this->db->set($dados);
		$this->db->insert('destinacao');

	}

	public function localiza_numero()
	{
		$this->db->select_max('id');
		$query = $this->db->get('destinacao');
		return $query->row_array();
	}

	public function atualiza_destinacao($id, $dados)
	{

		$this->db->where('id', $id);
		$this->db->update('destinacao', $dados);

	}

	public function recebe_filtro_destinacoes($id, $data_final, $data_inicial)
	{

		$this->db->where('id_cliente', $id);
		$this->db->where('data BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->order_by('data', 'DESC');
		$query = $this->db->get('destinacao');

		return $query->result_array();
	}

	public function filtra_destinacao_clientes($ids, $data_final, $data_inicial)
	{
		$this->db->where_in('id_cliente', $ids);
		$this->db->where('data BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->order_by('data', 'DESC');
		$query = $this->db->get('destinacao');

		return $query->result_array();
	}

	public function recebe_filtro_destinacoes_geral($data_final, $data_inicial)
	{
		
		$this->db->where('data BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->order_by('data', 'DESC');
		$query = $this->db->get('destinacao');

		return $query->result_array();
	}

	public function recebe_destinacoes($id)
	{

		$this->db->where('id_cliente', $id);
		$this->db->order_by('data', 'DESC');
		$query = $this->db->get('destinacao');

		return $query->result_array();
	}
	
	public function recebe_destinacoes_geral()
	{
		$this->db->order_by('data', 'DESC');
		$this->db->limit(250); // Define o limite para 250 registros
		$query = $this->db->get('destinacao');

		return $query->result_array();
	}

	public function gera_destinacao($data_inicial, $data_final, $id)
	{

		$this->db->where('data BETWEEN "' . date('Y-m-d', strtotime($data_inicial)) . '" and "' . date('Y-m-d', strtotime($data_final)) . '"');
		$this->db->where('id_cliente', $id);
		$this->db->order_by('data');
		$query = $this->db->get('destinacao');
		return $query->result_array();
	}



	public function recebe_destinacao($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('destinacao');
		return $query->row_array();
	}

	public function recebe_clientes()
	{

		$this->db->order_by('nome', 'DESC');
		$query = $this->db->get('clientes_petrofertil');

		return $query->result_array();
	}

	public function deleta_destinacao($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('destinacao');

	}

	public function deleta_certificado($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('certificado');

		
	}
}