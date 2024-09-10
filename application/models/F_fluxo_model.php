<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_fluxo_model extends CI_Model
{

	public function inserir_entrada_fluxo($dados)
	{
		
		try {
			$this->db->set($dados);
			$this->db->insert('f_fluxo');
        } catch (Exception $e) {
            echo "Erro ao inserir os dados: " . $this->db->error();
        }
		
	}

		
	public function atualiza_entrada_fluxo($id,$dados){

		$this->db->where('id', $id);
		$this->db->update('f_fluxo', $dados);
}


	public function recebe_fluxo()
	{
		
		$this->db->limit(500);
		$this->db->order_by('data_fluxo', 'DESC');
		$query = $this->db->get('f_fluxo');

		return $query->result_array();
	}

	public function recebe_fluxo_nolimit($data_inicial, $data_final)
	{
		$this->db->where('data_fluxo BETWEEN "' . date('Y-m-d', strtotime($data_inicial)) . '" and "' . date('Y-m-d', strtotime($data_final)) . '"');
		$this->db->order_by('data_fluxo', 'DESC');
		$query = $this->db->get('f_fluxo');

		return $query->result_array();
	}

	public function recebe_fluxo_nolimit_empresa($data_inicial, $data_final, $empresa)
	{
		$this->db->where('data_fluxo BETWEEN "' . date('Y-m-d', strtotime($data_inicial)) . '" and "' . date('Y-m-d', strtotime($data_final)) . '"');
		$this->db->where('empresa', $empresa);
		$this->db->order_by('data_fluxo', 'DESC');
		$query = $this->db->get('f_fluxo');

		return $query->result_array();
	}

	public function recebe_fluxo_mensal($data_inicial, $data_final)
	{
		$this->db->where('data_fluxo BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->order_by('data_registro', 'DESC');
		/* $this->db->where('media <>', 0);*/
		$query = $this->db->get('f_fluxo');
		return $query->result_array();
	}

	public function seleciona_fluxo($id)
	{

		$this->db->where('id', $id);
		$query = $this->db->get('f_fluxo');

		return $query->row_array();
	}


	public function deleta_fluxo($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('f_fluxo');
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

	public function filtra_fluxo_geral_empresa($data_final, $data_inicial, $empresa)
	{

		$this->db->where('data_fluxo BETWEEN "' . date('Y-m-d', strtotime($data_final)) . '" and "' . date('Y-m-d', strtotime($data_inicial)) . '"');
		$this->db->where('empresa', $empresa);
		$this->db->order_by('data_fluxo', 'DESC');
		/* $this->db->where('media <>', 0);*/
		$query = $this->db->get('f_fluxo');
		return $query->result_array();
	}
}
