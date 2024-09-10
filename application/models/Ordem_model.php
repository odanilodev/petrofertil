<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordem_model extends CI_Model {

	public function inserir_ordem($dados){
		      
        $this->db->set($dados);
        $this->db->insert('ordem_servico');
		 
    }
	
	public function localiza_codigo(){
		      
		$this->db->select_max('id');
      	$query = $this->db->get('ordem_servico');
		return $query->row_array();
		 
    }
	
	public function recebe_ordens(){
		
		$this->db->order_by('data_ordem', 'DESC'); 
		$this->db->limit(100);

           $query = $this->db->get('ordem_servico');
					 

           return $query->result_array();
		
    }
	
	 public function recebe_ordem($id){
           
		  $this->db->order_by('id', 'ASK');  
			$this->db->where('id', $id);  
		 	$query = $this->db->get('ordem_servico');
		 	return $query->row_array();
    }
	
	
	public function recebe_ordem_placa($placa){
           
			$this->db->where('placa', $placa);  
		 	$query = $this->db->get('ordem_servico');
		 	return $query->result_array();
    }
	
	
	public function recebe_ordem_codigo($id){
           
			$this->db->where('codigo', $id);  
		 	$query = $this->db->get('ordem_servico');
		 	return $query->row_array();
    }
	
	 public function edita_ordem($data,$id){

            $this->db->where('id', $id);
            $this->db->update('ordem_servico', $data);
			redirect('admin/inicio');
    }
	
	
	
}