<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_estoque_oleo_comum_model extends CI_Model
{

	public function inserir_estoque_oleo($dados)
	{
		$this->db->set($dados);
		$this->db->insert('f_estoque_oleo_comum');
	}


	public function recebe_estoque_oleo($data)
	{
		$this->db->where('dt_dia', $data);
		$query = $this->db->get('f_estoque_oleo_comum');
		return $query->row_array();
	}

	public function atualiza_estoque_oleo_comum($valor, $operacao, $data)
	{

		//echo $valor . ' ' . $operacao . ' ' . $data;

		if ($operacao == 'soma') {
			$this->db->query("UPDATE f_estoque_oleo_comum SET quantidade_dia = quantidade_dia + $valor WHERE dt_dia >= '$data'");
		} else {
			$this->db->query("UPDATE f_estoque_oleo_comum SET quantidade_dia = quantidade_dia - $valor WHERE dt_dia >= '$data'");
		}
	}


	// public function filtra_afericao_geral($data_final, $data_inicial){

	//        $this->db->where('data_afericao BETWEEN "'. date('Y-m-d', strtotime($data_final)). '" and "'. date('Y-m-d', strtotime($data_inicial)).'"');
	// 		$this->db->order_by('data_afericao', 'DESC');
	//        $query = $this->db->get('f_afericao');
	//        return $query->result_array();

	// }	



}