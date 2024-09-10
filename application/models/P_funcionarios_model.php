<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_funcionarios_model extends CI_Model {

	public function cadastrar_funcionario($dados){
		      
        $this->db->set($dados);
        $this->db->insert('p_funcionarios');
		 
    }
	
	 public function atualiza_funcionario($dados,$id)
		{
            $this->db->where('id', $id);
            $this->db->update('p_funcionarios', $dados);
    }
	
	
	public function recebe_funcionarios(){
		      
           $query = $this->db->get('p_funcionarios');
           return $query->result_array();
		
    }
	
	 public function recebe_funcionario($id){
           
			$this->db->where('id', $id);  
           $query = $this->db->get('p_funcionarios');
           return $query->row_array();
    }
	
	public function deleta_funcionario($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('p_funcionarios');
    
	}
	
}