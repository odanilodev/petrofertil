<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_fornecedores_model extends CI_Model {

	public function inserir_fornecedor($dados){
		
        $this->db->set($dados);
        $this->db->insert('f_fornecedores');
		 
    }
	
	public function recebe_fornecedores(){
		
		   $this->db->order_by('nome', 'DESC');  
           $query = $this->db->get('f_fornecedores');
			
           return $query->result_array();
		
    }
	
	 public function recebe_fornecedor($id){
           
			$this->db->where('id', $id);  
		 	$query = $this->db->get('f_fornecedores');
		 	return $query->row_array();
    }
	
	 public function atualiza_fornecedor($dados,$id){

            $this->db->where('id', $id);
            $this->db->update('f_fornecedores', $dados);
    }
	
	
	
	public function deleta_fornecedor($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('f_fornecedores');
    
	}
	
}