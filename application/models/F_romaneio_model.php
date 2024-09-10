<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_romaneio_model extends CI_Model {

	public function inserir_romaneio($dados){
		      
        $this->db->set($dados);
        $this->db->insert('f_romaneio');
		 
    }
	

	public function recebe_romaneios(){
		
		   $this->db->order_by('id', 'DESCK');  
           $query = $this->db->get('f_romaneio');
			
           return $query->result_array();
		
    }
	
	public function recebe_romaneio($id_romaneio){
		
		$this->db->where('id', $id_romaneio);
        $query = $this->db->get('f_romaneio');
			
        return $query->row_array();
		
    }
	
}