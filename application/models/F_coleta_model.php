<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_coleta_model extends CI_Model {

	public function inserir_coleta($dados){
		      
        $this->db->set($dados);
        $this->db->insert('f_coleta');
		
		 
    }
		
	public function recebe_coletas($cliente){
		
        	$this->db->where('id_cliente', $cliente);
			$query = $this->db->get('f_coleta');
		
			return $query->result_array();
    
	}

	
}