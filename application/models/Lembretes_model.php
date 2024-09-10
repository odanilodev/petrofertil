<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembretes_model extends CI_Model {

	public function inserir_lembrete($dados){
		      
        $this->db->set($dados);
        $this->db->insert('lembretes');
		redirect('Lembretes');
		 
    }
	
	public function recebe_lembretes(){
		
           $query = $this->db->get('lembretes');
			
           return $query->result_array();
		
    }
	
	public function deleta_lembrete($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('lembretes');
			redirect('lembretes');
    
	}
	
}