<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motoristas_model extends CI_Model {

	public function inserir_motorista($dados){
		      
        $this->db->set($dados);
        $this->db->insert('motoristas_petrofertil');
		redirect('motoristas_petro');
		 
    }
	
	 public function edita_motorista($dados,$id)
		{
            $this->db->where('id', $id);
            $this->db->update('motoristas_petrofertil', $dados);
			redirect('motoristas_petro');
    }
	
	
	public function recebe_motoristas(){
		      
           $query = $this->db->get('motoristas_petrofertil');
           return $query->result_array();
		
    }
	
	 public function recebe_motorista($id){
           
			$this->db->where('id', $id);  
           $query = $this->db->get('motoristas_petrofertil');
           return $query->row_array();
    }
	
	public function deleta_motorista($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('motoristas_petrofertil');
			redirect('motoristas_petro');
    
	}
	
}