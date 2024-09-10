<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedores_model extends CI_Model {

	public function inserir_fornecedor($dados){
		      
        $this->db->set($dados);
        $this->db->insert('fornecedores');
		redirect('Fornecedores');
		 
    }
	
	public function recebe_fornecedores(){
		
		   $this->db->order_by('nome', 'ASC');  
           $query = $this->db->get('fornecedores');
			
           return $query->result_array();
		
    }
	
	 public function recebe_fornecedor($id){
           
			$this->db->where('id', $id);  
		 	$query = $this->db->get('fornecedores');
		 	return $query->row_array();
    }
	
	 public function atualiza_fornecedor($dados,$id){

            $this->db->where('id', $id);
            $this->db->update('fornecedores', $dados);
			redirect('Fornecedores');
    }
	
	public function deleta_fornecedor($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('fornecedores');
			redirect('Fornecedores');
    
	}
	
	 public function localiza_oficina($oficina){
           
			$this->db->where('nome', $oficina);  
		 	$query = $this->db->get('oficinas');
		 	return $query->row_array();
    }
	
}