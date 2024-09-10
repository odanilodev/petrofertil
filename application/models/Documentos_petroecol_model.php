<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos_petroecol_model extends CI_Model {

	public function insere_documento($dados){
		
        $this->db->where('id', 1);
        $this->db->update('documentos_petroecol', $dados);
		 
    }
	
	public function recebe_documento(){
		
		$this->db->where('id', 1);
		
        $query = $this->db->get('documentos_petroecol');
        return $query->row_array();
		
    }
	
}