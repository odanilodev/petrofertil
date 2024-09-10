<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_producao_model extends CI_Model {

	public function inserir_cliente_producao($dados){
		      
        $this->db->set($dados);
        $this->db->insert('f_empresas_producao');
		 
    }

	public function inserir_producao($dados){
		      
        $this->db->set($dados);
        $this->db->insert('f_producao_reciclagem');
		 
    }
	
	public function recebe_clientes_producao(){
		
		   $this->db->order_by('nome', 'DESC');  
           $query = $this->db->get('f_empresas_producao');
			
           return $query->result_array();
    }

	public function recebe_producao_empresa($id){
		
		$this->db->where('empresa', $id); 
		$this->db->order_by('data', 'DESC');  
		$this->db->limit('31');
		$query = $this->db->get('f_producao_reciclagem');
		 
		return $query->result_array();
 	}
	
	 public function recebe_producao_empresa_filtrada($id, $data_inicial, $data_final){
		
		$this->db->where('empresa', $id); 
		$this->db->order_by('data', 'DESC');  
		$this->db->where('data BETWEEN "'. date('Y-m-d', strtotime($data_inicial)). '" and "'. date('Y-m-d', strtotime($data_final)).'"');
		$query = $this->db->get('f_producao_reciclagem');
		 
		return $query->result_array();
 	}

	 public function recebe_producao_id($id){
           
		$this->db->where('id', $id);  
		 $query = $this->db->get('f_producao_reciclagem');
		 return $query->row_array();
}

	 public function recebe_empresa($id){
           
			$this->db->where('id', $id);  
		 	$query = $this->db->get('f_empresas_producao');
		 	return $query->row_array();
    }
	
	 public function atualizar_producao($dados,$id){

            $this->db->where('id', $id);
            $this->db->update('f_producao_reciclagem', $dados);
    }

	public function atualizar_cliente_producao($dados,$id){

		$this->db->where('id', $id);
		$this->db->update('f_empresas_producao', $dados);
}
	
	public function deleta_empresa_producao($id){
		
        	$this->db->where('id', $id);
			$this->db->delete('f_empresas_producao');
    
	}

	public function deleta_producao($id){
		
		$this->db->where('id', $id);
		$this->db->delete('f_producao_reciclagem');

}
	
}