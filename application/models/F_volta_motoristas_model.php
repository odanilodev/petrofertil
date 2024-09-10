<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_volta_motoristas_model extends CI_Model
{

	public function inserir_volta($dados)
	{
		$this->db->set($dados);
		$this->db->insert('f_volta_motoristas');
	}

	
	public function recebe_voltas_motorista($id)
	{
	
		$query = $this->db->get('f_volta_motoristas');
		
		return $query->result_array();
		
	}

	public function recebe_voltas()
	{
		
		$this->db->select('V.*,M.nome');
		$this->db->from('f_volta_motoristas V');
		$this->db->join('motoristas M','M.id = V.id_motorista','left');
		
		$this->db->limit(25);
		
		$this->db->order_by('V.data_volta', 'DESC');
		$query = $this->db->get('');
		
		return $query->result_array();

	}

	public function recebe_volta($id)
	{
		
		
		$this->db->where('id_motorista', $id);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('f_volta_motoristas');
		

		return $query->row_array();
	}

	public function recebe_voltas_filtrada($data_inicial, $data_final){

		$this->db->where('data_volta BETWEEN "'. date('Y-m-d 00:00:00', strtotime($data_inicial)). '" and "'. date('Y-m-d 23:59:59', strtotime($data_final)).'"');
		 
		 $this->db->select('V.*,M.nome');
		 $this->db->from('f_volta_motoristas V');
		 $this->db->join('motoristas M','M.id = V.id_motorista','left');
		 $this->db->order_by('M.nome', 'ASC'); 
		 $query = $this->db->get('');

		return $query->result_array();
	 
 	}

	public function recebe_volta_edit($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('f_volta_motoristas');
		$this->db->limit(5);

		return $query->row_array();
	}


	public function atualiza_volta($dados, $id)
	{

		$this->db->where('id', $id);
		$this->db->update('f_volta_motoristas', $dados);
	}


	public function deleta_volta($id)
	{ 
		$this->db->where('id', $id);
		$this->db->delete('f_volta_motoristas');
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
