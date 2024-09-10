<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_log_model extends CI_Model {

	public function set_log($dd){
		
		$dd['log_id_usuario'] = $this->session->userdata('id_usuario');
		$dd['log_login'] = $this->session->userdata('login');
		$dd['log_controlador'] = $this->router->fetch_class();
		$dd['log_funcao'] = $this->router->fetch_method();
		$dd['log_dt'] = date("Y-m-d h:i:s");
		      
        $this->db->set($dd);
        $this->db->insert('f_log');
		 
    }
	
	
	
}