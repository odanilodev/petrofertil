<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_macro_model extends CI_Model {

	public function inserir_cliente($dados){
		      
        $this->db->set($dados);
        $this->db->insert('f_macros');
		 
    }
	
	public function recebe_macros(){
		
		   $this->db->order_by('nome', 'ASK');  
           $query = $this->db->get('f_macros');
			
           return $query->result_array();
		
    }
	
	 public function recebe_macro($id_macro){
           
			$this->db->where('id', $id_macro);  
		 	$query = $this->db->get('f_macros');
		 	return $query->row_array();
    }
	
	 public function atualiza_cliente($dados,$id){

            $this->db->where('id', $id);
            $this->db->update('f_macros', $dados);
    }
	
	 public function recebe_detalhe($placa){
           
			$this->db->where('placa', $placa);  
		 	$query = $this->db->get('f_macros');
		 	return $query->result_array();
    }
	
	public function deleta_cliente($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('f_macros');
    
	}
	
}