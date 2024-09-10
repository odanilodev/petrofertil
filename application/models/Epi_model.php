<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Epi_model extends CI_Model {

	public function inserir_epi($dados){
		      
        $this->db->set($dados);
        $this->db->insert('epis');
		redirect('Epis');
		 
    }
	
	public function recebe_epi($id){
		
		   $this->db->where('id', $id);
           $query = $this->db->get('epis');
			
           return $query->row_array();
		
    }
	
	public function recebe_epis(){
		
		   $this->db->order_by('nome', 'ASC');  
           $query = $this->db->get('epis');
			
           return $query->result_array();
		
    }
	
	 public function edita_epi($dados,$id){

            $this->db->where('id', $id);
            $this->db->update('epis', $dados);
			redirect('epis');
		 
    }
	
	public function deleta_epi($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('epis');
			redirect('Epis');
    
	}
	
	
	
}