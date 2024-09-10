<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function inserir_categoria($dados){
		      
        $this->db->set($dados);
        $this->db->insert('categoria');
		redirect('categoria');
		 
    }
	
	 public function edita_categoria($dados,$id)
		{

            $this->db->where('id', $id);
            $this->db->update('categoria', $dados);
			redirect('categoria');
		 
    }
	
	
	public function recebe_usuarios(){
		      
           $query = $this->db->get('usuarios');
           return $query->result_array();
		
    }
	
	 public function recebe_usuario($login)
		{
           
			$this->db->where('login', $login);  
           $query = $this->db->get('usuarios');
           return $query->row_array();
    }
	
	public function deleta_categoria($id){
		
           $this->db->where('id', $id);
		   $this->db->delete('categoria');
		redirect('categoria');
    
	}
	
}