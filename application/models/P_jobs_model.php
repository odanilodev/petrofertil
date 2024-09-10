<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_jobs_model extends CI_Model {

	public function insere_job($dados){
		      
        $this->db->set($dados);
        $this->db->insert('teste_job');
		 
    }
	
	
}