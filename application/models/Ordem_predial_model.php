<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordem_predial_model extends CI_Model {

	public function inserir_ordem($dados){
		      
        $this->db->set($dados);
        $this->db->insert('ordem_predial');
		 
    }
	
	public function localiza_codigo(){
		      
		$this->db->select_max('id');
      	$query = $this->db->get('ordem_predial');
		return $query->row_array();
		 
    }
	
	public function recebe_ordens(){
		
		$this->db->order_by('data_ordem', 'DESC'); 
		$this->db->limit(100);

        $query = $this->db->get('ordem_predial');
			
        return $query->result_array();
		
    }
	
	 public function recebe_ordem($id){
           
		  $this->db->order_by('id', 'ASK');  
			$this->db->where('id', $id);  
		 	$query = $this->db->get('ordem_predial');
		 	return $query->row_array();
    }
	
	
	public function recebe_ordem_placa($placa){
           
			$this->db->where('placa', $placa);  
		 	$query = $this->db->get('ordem_predial');
		 	return $query->result_array();
    }
	
	
	public function recebe_ordem_codigo($id){
           
			$this->db->where('codigo', $id);  
		 	$query = $this->db->get('ordem_predial');
		 	return $query->row_array();
    }
	
	 public function deleta_ordem_predial($id){

            $this->db->where('id', $id);
            $this->db->delete('ordem_predial');
    }
	
	
	
}