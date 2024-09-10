<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_clientes_reciclagem_model extends CI_Model {

	public function inserir_cliente($dados){
		      
        $this->db->set($dados);
        $this->db->insert('f_clientes_reciclagem');
		 
    }
	
	public function recebe_clientes(){
		
		   $this->db->order_by('nome', 'DESC');  
           $query = $this->db->get('f_clientes_reciclagem');
			
           return $query->result_array();
		
    }
	
	public function recebe_clientes_grupo($grupo){
		
		
		   $this->db->where_in('grupo', $grupo);  
		   $this->db->order_by('cidade', 'ASC');  
           $query = $this->db->get('f_clientes_reciclagem');
			
           return $query->result_array();
		
    }
	
	
	 public function recebe_clientes_cidade($cidade){
           
			$this->db->where('cidade', $cidade);  
		 	$query = $this->db->get('f_clientes_reciclagem');
		 	return $query->result_array();
    }
	
	 public function recebe_cliente($id){
           
			$this->db->where('id', $id);  
		 	$query = $this->db->get('f_clientes_reciclagem');
		 	return $query->row_array();
    }
	
	 public function atualiza_cliente($dados,$id){

            $this->db->where('id', $id);
            $this->db->update('f_clientes_reciclagem', $dados);
    }
	
	 public function recebe_detalhe($placa){
           
			$this->db->where('placa', $placa);  
		 	$query = $this->db->get('manutencoes');
		 	return $query->result_array();
    }
	
	
	
	public function deleta_cliente($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('f_clientes_reciclagem');
    
	}
	
}