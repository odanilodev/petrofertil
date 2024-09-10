<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Motoristasp_model extends CI_Model
{

	public function inserir_motorista($dados)
	{

		$this->db->set($dados);
		$this->db->insert('motoristas');
		redirect('Motoristas');
	}

	public function edita_motorista($dados, $id)
	{

		$this->db->where('id', $id);
		$this->db->update('motoristas', $dados);
	}


	public function recebe_motoristas()
	{

		$this->db->order_by('nome', 'ASK');
		$query = $this->db->get('motoristas');
		return $query->result_array();
	}

	public function recebe_motorista($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('motoristas');
		return $query->row_array();
	}

	public function recebe_usuario($login)
	{

		$this->db->where('usuario', $login);
		$query = $this->db->get('motoristas');
		return $query->row_array();
	}

	public function deleta_motorista($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('motoristas');
		redirect('motoristas');
	}
}
