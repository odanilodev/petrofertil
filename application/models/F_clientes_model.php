<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_clientes_model extends CI_Model {

	public function inserir_cliente($dados){
		      
        $this->db->set($dados);
        $this->db->insert('f_clientes');
		 
    }
	
	public function recebe_clientes(){
		
		   $this->db->order_by('nome', 'DESC');  
           $query = $this->db->get('f_clientes');
			
           return $query->result_array();
		
    }
	
	 public function recebe_cliente($id){
           
			$this->db->where('id', $id);  
		 	$query = $this->db->get('f_clientes');
		 	return $query->row_array();
    }
	
	 public function atualiza_cliente($dados,$id){

            $this->db->where('id', $id);
            $this->db->update('f_clientes', $dados);
    }
	
	 public function recebe_detalhe($placa){
           
			$this->db->where('placa', $placa);  
		 	$query = $this->db->get('manutencoes');
		 	return $query->result_array();
    }
	
	
	
	public function deleta_cliente($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('f_clientes');
    
	}
	
}