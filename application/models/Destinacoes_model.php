<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destinacoes_model extends CI_Model {

	public function inserir_destinacoes($dados){
		      
        $this->db->set($dados);
        $this->db->insert('destinacoes');
		 
    }
	
	public function recebe_destinacao($id){
		
		   $this->db->where('id', $id);
		
           $query = $this->db->get('destinacoes');
			
           return $query->row_array();
		
    }
	
	public function recebe_destinacoes(){
		
		
		$this->db->order_by('id', 'DESC'); 
           $query = $this->db->get('destinacoes');
			 
           return $query->result_array();
		
    }
	
	 public function edita_destinacao($dados,$id){

            $this->db->where('id', $id);
            $this->db->update('destinacoes', $dados);
			redirect('Estoque');
		 
    }
	
	public function deleta_destinacao($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('destinacoes');
			redirect('Estoque');
    
	}
	
	
	
}