<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionarios_model extends CI_Model {

	public function inserir_funcionario($dados){
		      
        $this->db->set($dados);
        $this->db->insert('funcionarios');
		redirect('Funcionarios');
		 
    }
	
	public function recebe_funcionario($id){
		
		   $this->db->where('id', $id);
           $query = $this->db->get('funcionarios');
			
           return $query->row_array();
		
    }
	
	public function recebe_funcionarios(){
		
		   $this->db->order_by('nome', 'ASC');  
           $query = $this->db->get('funcionarios');
			
           return $query->result_array();
		
    }
	
	 public function edita_funcionario($dados,$id){

            $this->db->where('id', $id);
            $this->db->update('funcionarios', $dados);
			redirect('Funcionarios');
		 
    }
	
	public function deleta_funcionario($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('funcionarios');
			redirect('Funcionarios');
    
	}
	
	
	
}