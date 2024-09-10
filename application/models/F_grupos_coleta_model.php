<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_grupos_coleta_model extends CI_Model {

	public function inserir_grupo($data){
		      
        $this->db->set($data);
        $this->db->insert('f_grupo_coletas');
		 
    }
	

	public function recebe_grupos(){
		
		   $this->db->order_by('nome', 'ASK');  
           $query = $this->db->get('f_grupo_coletas');
			
           return $query->result_array();
		
    }
	
	
}