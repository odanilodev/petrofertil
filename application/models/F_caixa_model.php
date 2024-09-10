<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_caixa_model extends CI_Model {

	public function atualiza_caixa($data){
		      
        $this->db->set($data);
        $this->db->update('f_caixa');
		 
    }
	
	public function atualiza_caixa_reciclagem($data){
		      
        $this->db->set($data);
        $this->db->update('f_caixa_reciclagem');
		 
    }
	
	public function recebe_caixa(){
		
        $query = $this->db->get('f_caixa');
        return $query->row_array();
		
    }
	
	public function recebe_caixa_reciclagem(){
		
        $query = $this->db->get('f_caixa_reciclagem');
        return $query->row_array();
		
    }
	

	
	
}