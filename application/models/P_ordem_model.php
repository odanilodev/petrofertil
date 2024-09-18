<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_ordem_model extends CI_Model
{

	public function inserir_ordem($dados)
	{

		$this->db->set($dados);
		$this->db->insert('p_ordem_servico');

	}

	public function localiza_codigo()
	{

		$this->db->select_max('id');
		$query = $this->db->get('p_ordem_servico');
		return $query->row_array();

	}

	public function recebe_ordens()
	{

		$this->db->order_by('data_ordem', 'DESC');
		$this->db->limit(100);

		$query = $this->db->get('p_ordem_servico');


		return $query->result_array();

	}

	public function recebe_ordem($id)
	{

		$this->db->order_by('id', 'ASK');
		$this->db->where('id', $id);
		$query = $this->db->get('p_ordem_servico');
		return $query->row_array();
	}


	public function recebe_ordem_placa($placa)
	{

		$this->db->where('placa', $placa);
		$query = $this->db->get('p_ordem_servico');
		return $query->result_array();
	}


	public function recebe_ordem_codigo($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('p_ordem_servico');
		return $query->row_array();
	}

	public function edita_ordem($data, $id)
	{

		$this->db->where('id', $id);
		$this->db->update('p_ordem_servico', $data);
		redirect('admin/inicio');
	}



}