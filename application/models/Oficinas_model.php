<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oficinas_model extends CI_Model {

	public function inserir_oficina($dados){
		      
        $this->db->set($dados);
        $this->db->insert('oficinas');
		redirect('Oficinas');
		 
    }
	
	public function recebe_oficinas(){
		
		   $this->db->order_by('nome', 'ASC');  
           $query = $this->db->get('oficinas');
			
           return $query->result_array();
		
    }
	
	 public function recebe_oficina($id){
           
			$this->db->where('id', $id);  
		 	$query = $this->db->get('oficinas');
		 	return $query->row_array();
    }
	
	 public function atualiza_oficina($dados,$id){

            $this->db->where('id', $id);
            $this->db->update('oficinas', $dados);
			redirect('oficinas');
    }
	
	public function deleta_oficina($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('oficinas');
			redirect('oficinas');
    
	}
	
	 public function localiza_oficina($oficina){
           
			$this->db->where('nome', $oficina);  
		 	$query = $this->db->get('oficinas');
		 	return $query->row_array();
    }
	
}