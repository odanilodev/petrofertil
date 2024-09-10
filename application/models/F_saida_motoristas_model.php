<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_saida_motoristas_model extends CI_Model
{

	public function inserir_saida($dados)
	{
		$this->db->set($dados);
		$this->db->insert('f_saidas_motoristas');
	}

	public function recebe_saidas()
	{
		$this->db->select('S.*,M.nome');
		$this->db->from('f_saidas_motoristas S');
		$this->db->join('motoristas M', 'M.id = S.id_motorista', 'left');	
		
		$this->db->limit(25);
		$this->db->order_by('S.data_saida', 'DESC');
		$query = $this->db->get('');


		return $query->result_array();
	}

	public function recebe_saidas_filtrada($data_inicial, $data_final)
	{

		$this->db->where('data_saida BETWEEN "' . date('Y-m-d 00:00:00', strtotime($data_inicial)) . '" and "' . date('Y-m-d 23:59:59', strtotime($data_final)) . '"');
		$this->db->order_by('data_saida', 'DESC');

		$this->db->select('S.*,M.nome');
		$this->db->from('f_saidas_motoristas S');
		$this->db->join('motoristas M', 'M.id = S.id_motorista', 'left');
		$this->db->limit(25);
		$query = $this->db->get('');

		return $query->result_array();
	}

	public function recebe_saida_edit($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('f_saidas_motoristas');

		return $query->row_array();
	}

	public function recebe_saida($id)
	{
		
		$this->db->where('id_motorista', $id);
		$this->db->select_max('id');
		$query = $this->db->get('f_saidas_motoristas');

		$this->db->limit(1);


		return $query->row_array();
	}

	public function recebe_saida_motorista($id)
	{
		$this->db->order_by('data_saida', 'DESC');
		$this->db->where('id_motorista', $id);
		$this->db->limit(5);
		$query = $this->db->get('f_saidas_motoristas');

		


		return $query->result_array();
	}

	public function deleta_saida($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('f_saidas_motoristas');
	}


	public function atualiza_saida($dados, $id)
	{

		$this->db->where('id', $id);
		$this->db->update('f_saidas_motoristas', $dados);
	}


	public function filtra_pesagem($data_final, $data_inicial)
	{

		$this->db->where('data BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->order_by('data', 'DESC');
		/* $this->db->where('media <>', 0);*/
		$query = $this->db->get('f_pesagem');
		return $query->result_array();
	}
}
